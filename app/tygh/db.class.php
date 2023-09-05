<?php

class DB 
{
    const USER = '';
    const PASS = '';
    const HOST = 'localhost';
    const DB = 'task27';

    public static function get_connection()
    {
        $user = self::USER;
        $pass = self::PASS;
        $host = self::HOST;
        $db = self::DB;

        return new PDO("mysql:host=$host;dbname=$db;charset=UTF8", $user, $pass);    
    }

    public function insert (array $data, string $table) 
    {        
        $columns = implode(", ", array_keys($data));
        $values = array_values($data);
        $v_placeholders = [];
        while (count($v_placeholders) < count($values)) {
            $v_placeholders[] = '? ';
        }
        $placeholders = implode(',', $v_placeholders);

        $query = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        $db = $this->get_connection();
        $stmt = $db->prepare($query);
        return $stmt->execute($values);    
    }

    public function get_data (string $table, string $column, $value)
    {
        $query = "SELECT * FROM $table WHERE $column = ?";
        $db = $this->get_connection();
        $stmt = $db->prepare($query);
        $stmt->execute([$value]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return $result;
        }
        return false; 
    }    

    public function update (string $table, array $column, array $condition) 
    {
        $col_name = implode('', array_keys($column));
        $cond_name = implode('', array_keys($condition));
        $values = [
            array_values($column),
            array_values($condition)
        ];
        $query = "UPDATE $table SET $col_name = ? WHERE $cond_name = ?";
        $db = $this->get_connection();
        $stmt = $db->prepare($query);
        return $stmt->execute($values);
    }

    public function get_permissions (int $user_id)
    {
        $query = 'SELECT perm_desc FROM permissions 
        JOIN role_perm ON permissions.perm_id = role_perm.perm_id
        JOIN user_role ON user_role.role_id = role_perm.role_id
        WHERE user_role.user_id = ?';
        $db = $this->get_connection();
        $stmt = $db->prepare($query);
        $stmt->execute([$user_id]);
        while ($row = $stmt->fetch(PDO::FETCH_COLUMN)) {
            $result[] = $row;
        }  
        if ($result) {
            return $result;
        }
        return false; 
    }
}
<?php

session_destroy();
unset ($_COOKIE['user_id']);
setcookie('user_id', null, -1, '/');
header("Location: /");
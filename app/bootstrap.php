<?php
session_start();
require_once 'core/model.php'; 
require_once 'core/view.php'; 
require_once 'core/controller.php'; 
require_once 'core/route.php'; 
require_once 'tygh/user.class.php';
require_once 'tygh/db.class.php';
require_once 'tygh/permissions.class.php';
Route::start();

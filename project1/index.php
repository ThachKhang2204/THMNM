<?php 
session_start();

require_once 'app/models/ProductModel.php';
require_once 'app/helpers/SessionHelper.php';

// Lấy URL từ tham số GET
$url = $_GET['url'] ?? '';
$url = rtrim($url, '/');
$url = filter_var($url, FILTER_SANITIZE_URL);
$url = explode('/', $url);

// Xác định tên Controller
$controllerName = isset($url[0]) && $url[0] != '' ? ucfirst($url[0]) . 'Controller' : 'DefaultController';

// Xác định tên Action (hàm)
$action = isset($url[1]) && $url[1] != '' ? $url[1] : 'index';

// Kiểm tra sự tồn tại của file Controller
if (!file_exists('app/controllers/' . $controllerName . '.php')) {
    die('Controller not found');
}

require_once 'app/controllers/' . $controllerName . '.php';

$controller = new $controllerName();

// Kiểm tra sự tồn tại của phương thức (action)
if (!method_exists($controller, $action)) {
    die('Action not found');
}

// Gọi phương thức (action), truyền các tham số nếu có
call_user_func_array([$controller, $action], array_slice($url, 2));

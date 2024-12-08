
<?php
require_once 'config/config.php';

// Router logic
if (isset($_GET['controller']) && isset($_GET['action'])) {
    // Xử lý controller và action từ URL
    $controller = $_GET['controller'] . 'Controller';
    $action = $_GET['action'];
    require_once 'controllers/' . $controller . '.php';
    $controllerInstance = new $controller();
    $controllerInstance->$action();

} else {
    // Route mặc định
    require_once 'controllers/HomeController.php';  
    $homeController = new HomeController();
    $homeController->index();
}
?>
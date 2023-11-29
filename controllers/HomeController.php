<?php
class HomeController {
    public function index() {
        require_once 'models/HomeModel.php';
        $model = new HomeModel();
        require_once 'views/homepage.php';
    }
}
?>
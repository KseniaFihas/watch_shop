<?php
class FilterController {
    public function index() {
        require_once 'models/FilterModel.php';
        $model = new FilterModel();
        require_once 'views/filterpage.php';
    }
}
?>
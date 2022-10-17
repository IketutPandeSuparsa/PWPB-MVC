<?php
class Controller {
    public function view($view, $data = [])
    {
        require_once "../APP/view/" . $view . '.php';
    }
    public function model($model) {
        require_once "../APP/model/" . $model . '.php';
        return new $model;
    }
}
?>
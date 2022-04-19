<?php
    namespace app\server\controllers;
    use app\server\App;

    class Controller
    {
        public function render($view, $params = [])
        {
            return App::$app->router->renderView($view, $params);
        }
    }
?>
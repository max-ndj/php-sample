<?php
    namespace app\server\controllers;
    use app\server\Request;
    use app\server\Response;

    class HomeController extends Controller
    {
        public function home(Request $_request, Response $_response)
        {
            return $this->render('home');
        }
    }
?>
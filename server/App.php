<?php
    namespace app\server;
    use app\server\controllers\Controller;

    class App
    {
        public static string $ROOT_DIR;
        public static App $app;
        public Request $request;
        public Response $response;
        public Router $router;
        public Database $database;
        public Controller $controller;

        public function __construct(string $rootPath, array $config)
        {
            self::$ROOT_DIR = $rootPath;
            self::$app = $this;
            $this->request = new Request();
            $this->response = new Response();
            $this->router = new Router($this->request, $this->response);
            $this->database = new Database($config['db']);
        }

        public function run()
        {
            echo $this->router->resolve();
        }
    }
?>
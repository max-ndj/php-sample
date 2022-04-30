<?php
    namespace app\server;
    use app\server\controllers\Controller;
    use app\server\models\DbModel;

    class App
    {
        public static string $ROOT_DIR;
        public static App $app;
        public Request $request;
        public Response $response;
        public Router $router;
        public Database $database;
        public Controller $controller;
        public ?DbModel $model;
        public Session $session;

        public function __construct($rootPath, array $config)
        {
            self::$ROOT_DIR = $rootPath;
            self::$app = $this;
            $this->request = new Request();
            $this->response = new Response();
            $this->router = new Router($this->request, $this->response);
            $this->database = new Database($config['db']);
            $this->session = new Session();
        }

        public function run()
        {
            echo $this->router->resolve();
        }

        public function login(DbModel $model)
        {
            $this->model = $model;
            $className = get_class($model);
            $primaryKey = $className::primaryKey();
            $value = $model->{$primaryKey};
            App::$app->session->set('user', $value);
    
            return true;
        }

        public function logout()
        {
            $this->model = null;
            self::$app->session->remove('user');
        }
    }
?>
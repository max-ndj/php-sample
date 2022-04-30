<?php
    namespace app\server;

    class Router
    {
        public Request $request;
        public Response $response;
        protected array $routes = [];

        public function __construct(Request $request, Response $response)
        {
            $this->request = $request;
            $this->response = $response;
        }

        public function get($path, $callback): void
        {
            $this->routes['get'][$path] = $callback;
        }

        public function post($path, $callback): void
        {
            $this->routes['post'][$path] = $callback;
        }

        public function resolve()
        {
            $path = $this->request->path();
            $method = $this->request->method();
            $callback = $this->routes[$method][$path] ?? false;
        
            if (!$callback) {
                $this->response->setStatusCode(404);

                return $this->renderView('404');
            } else if (is_string($callback))
                return $this->renderView($callback); 
            else if (is_array($callback)) {
                App::$app->controller = new $callback[0]();
                $callback[0] = App::$app->controller;
            }

            return call_user_func($callback, $this->request, $this->response);
        }

        public function renderView($view, $params = [])
        {
            foreach ($params as $key => $value)
                $$key = $value;
            ob_start();
            include_once App::$ROOT_DIR."/client/views/$view.php";

            return ob_get_clean();
        }
    }
?>
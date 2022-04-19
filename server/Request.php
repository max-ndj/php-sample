<?php
    namespace app\server;

    class Request
    {
        public function path()
        {
            $path = $_SERVER['REQUEST_URI'] ?? '/';
            $pos = strpos($path, '?');

            if (!$pos)
                return $path;
            
            return substr($path, 0, $pos);
        }

        public function method()
        {
            return strtolower($_SERVER['REQUEST_METHOD']);
        }

        public function isGet()
        {
            return $this->method() === 'get';
        }

        public function body()
        {
            $body = [];

            if ($this->isGet())
                foreach ($_GET as $key => $value)
                    $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            
            return $body;
        }
    }
?>
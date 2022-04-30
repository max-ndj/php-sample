<?php
    namespace app\server;

    class Response
    {
        public function setStatusCode(int $code): void
        {
            http_response_code($code);
        }

        public function redirect($url): void
        {
            header("Location: $url");
        }
    }
?>
<?php
    namespace app\server;

    class Database
    {
        public \PDO $pdo;

        public function __construct(array $config)
        {
            $dsn =  $config['DB_DSN'] ?? '';
            $user =  $config['DB_USER'] ?? '';
            $password =  $config['DB_PASSWORD'] ?? '';
            $this->pdo = new \PDO(
                $dsn,
                $user,
                $password,
                [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]
            );
        }

        public function prepare($sql): \PDOStatement
        {
            return $this->pdo->prepare($sql);
        }
    }
?>
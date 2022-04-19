<?php
    ini_set('display_errors', 1);
    use app\server\App;
    use app\server\controllers\HomeController;

    define("ROOT_DIR", dirname(dirname(__DIR__)));
    require_once ROOT_DIR.'/vendor/autoload.php';

    $dotenv = $dotenv = Dotenv\Dotenv::createImmutable(ROOT_DIR);
    $dotenv->load();
    $config = [
        'db' => [
            'DB_USER' => $_ENV['DB_USER'],
            'DB_PASSWORD' => $_ENV['DB_PASSWORD'],
            'DB_DSN' => $_ENV['DB_DSN']
        ]
    ];
    $app = new App(ROOT_DIR, $config);
    $app->router->get('/', 'home');
    $app->run();
?>
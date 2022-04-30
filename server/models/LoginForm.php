<?php
    namespace app\server\models;
    use app\server\App;

    class LoginForm extends Model
    {
        public string $email = '';
        public string $password = '';

        public function login(): bool
        {
            $user = UserModel::selectOne(['email' => $this->email]);

            if (!$user || !password_verify($this->password, $user->password))
                return false;

            return App::$app->login($user);
        }
    }
?>
<?php
    namespace app\server\models;

    class UserModel extends DbModel
    {
        public string $lastname = '';
        public string $firstname = '';
        public string $email = '';
        public string $password = '';

        public static function tableName(): string
        {
            return 'users';
        }

        public static function attributes(): array
        {
            return ['lastname', 'firstname', 'email', 'password'];
        }

        public function save(): bool
        {
            $this->password = password_hash($this->password, PASSWORD_BCRYPT);

            return parent::insert();
        }
    }
?>
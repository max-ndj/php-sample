<?php
    namespace app\server\models;
    use app\server\App;

    abstract class DbModel extends Model
    {
        abstract public static function tableName(): string;

        abstract public static function attributes(): array;

        public static function primaryKey(): string
        {
            return 'id';
        }

        public function insert()
        {
            $tableName = $this->tableName();
            $attributes = $this->attributes();
            $params = array_map(fn($attr) => ":$attr", $attributes);
            $statement = self::prepare("INSERT INTO $tableName (" . implode(",", $attributes) . ") 
                    VALUES (" . implode(",", $params) . ")");

            foreach ($attributes as $attribute) {
                $statement->bindValue(":$attribute", $this->{$attribute});
            }
    
            return $statement->execute();
        }

        public static function prepare($sql): \PDOStatement
        {
            return App::$app->database->prepare($sql);
        }

        public static function selectOne($where)
        {
            $tableName = static::tableName();
            $attributes = array_keys($where);
            $sql = implode("AND", array_map(fn($attr) => "$attr = :$attr", $attributes));
            $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");

            foreach ($where as $key => $item) {
                $statement->bindValue(":$key", $item);
            }
            $statement->execute();

            return $statement->fetchObject(static::class);
        }
    }
?>
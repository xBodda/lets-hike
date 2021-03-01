<?php
class DB{
        private static function connect(){
            $pdo = new PDO('mysql:host=localhost;dbname=lets-hike;charset=utf8mb4;collation=utf8mb4_general_ci', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //PDO::ATTR_EMULATE_PREPARES:
            //https://stackoverflow.com/questions/134099/are-pdo-prepared-statements-sufficient-to-prevent-sql-injection
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            return $pdo;
        }
        public static function query($query, $params = array()){
            //PDO real escape strings:
            //https://stackoverflow.com/questions/3716373/real-escape-string-and-pdo
            
            $statement = self::connect()->prepare($query);
            $statement->execute($params);
            if(explode(' ', $query)[0] == 'SELECT'){
                $data = $statement->fetchAll();
                return $data;
            }
    }
}
?>

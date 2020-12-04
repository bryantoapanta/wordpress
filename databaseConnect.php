<?php
include_once 'include/connect.php';
//include_once "DB.php";

class ModeloUserDB
{

    public static $dbh = null;

    public static function init()
    {

        if (self::$dbh == null) {
            try {
                // Cambiar  los valores de las constantes en DB.php
                $dsn = "mysql:host=" . host . ":3306;dbname=" . dbname . ";charset=utf8";
                self::$dbh = new PDO($dsn, username, password);
                // Si se produce un error se genera una excepción;
                self::$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Error de conexión " . $e->getMessage();
                exit();
            }
        }
    }




    public static function userCheck($user, $password)
    {
        $stmt = self::$dbh->prepare("SELECT usuario , contraseña , estado from usuarios_portal_tiendas where usuario = ?"); //preparo la consulta
        $stmt->bindValue(1, $user);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        //var_dump($resultado);
        try {
            if ($resultado != 0) {
                if ($user == $resultado["usuario"] && $password == $resultado["contraseña"] && $resultado["estado"] == 1) {
                    return true;
                } else return false;
            }
            return false;
        } catch (Exception $e) {
            echo "Error -> " . $e->getMessage() . "\n";
        }
    }
}

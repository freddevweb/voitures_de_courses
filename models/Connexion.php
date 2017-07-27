<?php 

class Connexion {

    private static $host = "mysql:host=localhost;dbname=vehicules;charset=utf8";
    private static $log = "root";
    private static $pass = "";

    private static $connexion;

    // *********** constructor
    public function __construct () {

    }

    public static function getConnexion(){

        if ( empty(self::$connexion) ) { 
            self::$connexion = new PDO(self::$host, self::$log, self::$pass);
            self::$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$connexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        }
        
        return self::$connexion;
    }


}
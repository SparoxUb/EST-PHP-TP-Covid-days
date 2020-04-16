<?php 


class DB_Connexion {


    protected $Connexion=null;
    private string $host="";
    private string $port="";
    private string $database="";
    private string $username="";
    private string $password="";


    protected function __construct()
    {
        $Config = include('./Config/Config.php');
        $this->host = $Config->host;
        $this->port = $Config->port;
        $this->username = $Config->username;
        $this->password = $Config->password;
        $this->database = $Config->database;
        $connexionString =  "mysql:dbname=".$this->database.";host=".$this->host.";port=".$this->port;
        
        /*
            PDO::__construct() émet une exception PDOException si la tentative de connexion à la base de données échoue.  https://www.php.net/manual/fr/pdo.construct.php
        */
        try{
        $this->Connexion = new PDO($connexionString,$this->username,$this->password);
        }catch(PDOException $exc){
            trigger_error(" La connexion à la base de données a échouée vérifiez la base de donnée et sa configuration .",E_USER_ERROR);
        }
    }



    protected function __destruct()
    {
        $this->Connexion = null;
    }



}




?>
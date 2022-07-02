<?php 


require_once("./Classes/DAO.php");
require_once("./Classes/DB_Connexion.php");

class Etudiant extends DB_Connexion implements DAO{


    public string $num_etu;
    public string $nom_etu;
    public string $CNE;
    public string $date_naiss;
    public string $sexe;
    private bool $inserted=false;

    
    public function __construct()
    {
        parent::__construct();
        $this->inserted=false;
        $this->num_etu="";
        $this->nom_etu="";
        $this->CNE="";
        $this->date_naiss="";
        $this->sexe="";
    }


    public function Insert(){
        if($this->inserted){
            trigger_error(" Etudiant Déja inséré ! ",E_USER_NOTICE);
            return false;
        }
        $string_of_insert = " INSERT INTO etudiant(nom_etu,CNE,date_naiss,sexe) Select '$this->nom_etu','$this->CNE','$this->date_naiss','$this->sexe' ";
        if( $this->Connexion->query( $string_of_insert) ){

            $res = $this->Connexion->query("SELECT LAST_INSERT_ID()");
            $dernierID = $res->fetchColumn();
            $this->num_etu = $dernierID;
            $this->inserted = true;
            return true;
        }
        return false;
    }


    public function Delete(){
        if(!$this->inserted){
            trigger_error(" Etudiant non inséré pour le supprimer ! ",E_USER_NOTICE);
            return false;
        }
        $string_of_delete = " DELETE FROM etudiant WHERE num_etu = $this->num_etu ";
        if( $this->Connexion->query( $string_of_delete) ){
            $this->num_etu = "";
            $this->inserted = false;
            return true;
        }
        return false;
    }


    public function Update(){
        if(!$this->inserted){
            trigger_error(" Etudiant non inséré pour le modifier ! ",E_USER_NOTICE);
            return false;
        }
        $string_of_update = " UPDATE etudiant SET nom_etu='$this->nom_etu', CNE='$this->CNE', date_naiss='$this->date_naiss', sexe='$this->sexe' WHERE num_etu = $this->num_etu ";
        if( $this->Connexion->query( $string_of_update) ){
            return true;
        }
        return false;
    }


    public function Find_By_CNE(string $CNE){
        $string_of_search = " SELECT * FROM etudiant WHERE CNE = '$CNE' ";
        $statement = $this->Connexion->query( $string_of_search);
        if( $statement && $row = $statement->fetch(PDO::FETCH_ASSOC) ){
            $this->num_etu = $row['num_etu'];
            $this->nom_etu = $row['nom_etu'];
            $this->date_naiss = $row['date_naiss'];
            $this->CNE = $row['CNE'];
            $this->sexe = $row['sexe'];
            $this->inserted = true;
            return true;
        }
        return false;
    }

    public function Find(string $id){
        $string_of_search = " SELECT * FROM etudiant WHERE num_etu = $id ";
        $statement = $this->Connexion->query( $string_of_search);
        if( $statement && $row = $statement->fetch(PDO::FETCH_ASSOC) ){
            $this->num_etu = $row['num_etu'];
            $this->nom_etu = $row['nom_etu'];
            $this->date_naiss = $row['date_naiss'];
            $this->CNE = $row['CNE'];
            $this->sexe = $row['sexe'];
            $this->inserted = true;
            return true;
        }
        return false;
    }

    public function GetAll(){
        $students = [];
        $sql_statement = "SELECT * FROM etudiant order by num_etu";
        $statement = $this->Connexion->query($sql_statement);
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($rows as $row){
            $student = (object) ['num_etu'=>''];
            $student->num_etu = $row['num_etu'];
            $student->nom_etu = $row['nom_etu'];
            $student->CNE = $row['CNE'];
            $student->date_naiss = $row['date_naiss'];
            $student->sexe= $row['sexe'];
            array_push($students,$student);
        }
        return $students;
    }   


    public function Check_CNE_for_Update(){
        $etudiant = new Etudiant();
        $etudiant->Find_By_CNE($this->CNE);
        if( $this->num_etu != $etudiant->num_etu)
            return true;
        return false;
    }

    public function __destruct()
    {
        parent::__destruct();
    }


}












?>
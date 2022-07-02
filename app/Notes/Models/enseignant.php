<?php 


require_once("./Classes/DAO.php");
require_once("./Classes/DB_Connexion.php");

class Enseignant extends DB_Connexion implements DAO{


    public string $num_ens;
    public string $nom_ens;
    public string $num_matr;
    public string $grade;
    public string $anciennete;
    private bool $inserted=false;

    
    public function __construct()
    {
        parent::__construct();
        $this->inserted=false;
        $this->num_ens="";
        $this->nom_ens="";
        $this->num_matr="";
        $this->anciennete="";
        $this->grade="";
    }


    public function Insert(){
        if($this->inserted){
            trigger_error(" Enseignant Déja inséré ! ",E_USER_NOTICE);
            return false;
        }
        $string_of_insert = " INSERT INTO enseignant(nom_ens,num_matr,anciennete,grade) Select '$this->nom_ens','$this->num_matr','$this->anciennete','$this->grade' ";
        if( $this->Connexion->query( $string_of_insert) ){

            $res = $this->Connexion->query("SELECT LAST_INSERT_ID()");
            $dernierID = $res->fetchColumn();
            $this->num_ens = $dernierID;
            $this->inserted = true;
            return true;
        }
        return false;
    }


    public function Delete(){
        if(!$this->inserted){
            trigger_error(" Enseignant non inséré pour le supprimer ! ",E_USER_NOTICE);
            return false;
        }
        $string_of_delete = " DELETE FROM enseignant WHERE num_ens = $this->num_ens ";
        if( $this->Connexion->query( $string_of_delete) ){
            $this->num_ens = "";
            $this->inserted = false;
            return true;
        }
        return false;
    }


    public function Update(){
        if(!$this->inserted){
            trigger_error(" Enseignant non inséré pour le modifier ! ",E_USER_NOTICE);
            return false;
        }
        $string_of_update = " UPDATE enseignant SET nom_ens='$this->nom_ens', num_matr='$this->num_matr', anciennete='$this->anciennete', grade='$this->grade' WHERE num_ens = $this->num_ens ";
        if( $this->Connexion->query( $string_of_update) ){
            return true;
        }
        return false;
    }


    public function Find_By_num_matr(string $num_matr){
        $string_of_search = " SELECT * FROM enseignant WHERE num_matr = '$num_matr' ";
        $statement = $this->Connexion->query( $string_of_search);
        if( $row = $statement->fetch(PDO::FETCH_ASSOC) ){
            $this->num_ens = $row['num_ens'];
            $this->nom_ens = $row['nom_ens'];
            $this->anciennete = $row['anciennete'];
            $this->num_matr = $row['num_matr'];
            $this->grade = $row['grade'];
            $this->inserted = true;
            return true;
        }
        return false;
    }

    public function Find(string $id){
        $string_of_search = " SELECT * FROM enseignant WHERE num_ens = $id ";
        $statement = $this->Connexion->query( $string_of_search);
        if( $statement && $row = $statement->fetch(PDO::FETCH_ASSOC) ){
            $this->num_ens = $row['num_ens'];
            $this->nom_ens = $row['nom_ens'];
            $this->anciennete = $row['anciennete'];
            $this->num_matr = $row['num_matr'];
            $this->grade = $row['grade'];
            $this->inserted = true;
            return true;
        }
        return false;
    }

    public function GetAll(){
        $profs = [];
        $sql_statement = "SELECT * FROM enseignant order by num_ens";
        $statement = $this->Connexion->query($sql_statement);
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($rows as $row){
            $prof = (object) ['num_ens'=>''];
            $prof->num_ens = $row['num_ens'];
            $prof->nom_ens = $row['nom_ens'];
            $prof->num_matr = $row['num_matr'];
            $prof->anciennete = $row['anciennete'];
            $prof->grade= $row['grade'];
            array_push($profs,$prof);
        }
        return $profs;
    }   


    public function Get_names_ids(){
        $profs = [];
        $sql_statement = "SELECT * FROM enseignant order by num_ens";
        $statement = $this->Connexion->query($sql_statement);
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($rows as $row){
            $prof = (object) ['num_ens'=>$row['num_ens']];
            $prof->nom_ens = $row['nom_ens'];
            array_push($profs,$prof);
        }
        return $profs;
    }


    public function Check_num_matr_for_Update(){
        $prof = new Enseignant();
        $prof->Find_By_num_matr($this->num_matr);
        if( $this->num_ens != $prof->num_ens)
            return true;
        return false;
    }

    public function __destruct()
    {
        parent::__destruct();
    }


}












?>
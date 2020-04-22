<?php 


require_once("./Classes/DAO.php");
require_once("./Classes/DB_Connexion.php");
require_once('./Models/enseignant.php');

class Matiere extends DB_Connexion implements DAO{


    public string $num_mat;
    public string $nom_mat;
    public string $_num_ens;
    public string $coef;
    private bool $inserted=false;

    
    public function __construct()
    {
        parent::__construct();
        $this->inserted=false;
        $this->num_mat="";
        $this->nom_mat="";
        $this->_num_ens="";
        $this->coef="";
    }


    public function Insert(){
        if($this->inserted){
            trigger_error(" Matiere Déja insérée ! ",E_USER_NOTICE);
            return false;
        }
        $string_of_insert = " INSERT INTO matiere(nom_mat,_num_ens,coef) Select '$this->nom_mat','$this->_num_ens','$this->coef' ";
        if( $this->Connexion->query( $string_of_insert) ){

            $res = $this->Connexion->query("SELECT LAST_INSERT_ID()");
            $dernierID = $res->fetchColumn();
            $this->num_mat = $dernierID;
            $this->inserted = true;
            return true;
        }
        return false;
    }


    public function Delete(){
        if(!$this->inserted){
            trigger_error(" Matiere non insérée pour la supprimer ! ",E_USER_NOTICE);
            return false;
        }
        $string_of_delete = " DELETE FROM matiere WHERE num_mat = $this->num_mat ";
        if( $this->Connexion->query( $string_of_delete) ){
            $this->num_mat = "";
            $this->inserted = false;
            return true;
        }
        return false;
    }


    public function Update(){
        if(!$this->inserted){
            trigger_error(" Matiere non insérée pour la modifier ! ",E_USER_NOTICE);
            return false;
        }
        $string_of_update = " UPDATE matiere SET nom_mat='$this->nom_mat', _num_ens='$this->_num_ens', coef='$this->coef' WHERE num_mat = $this->num_mat ";
        if( $this->Connexion->query( $string_of_update) ){
            return true;
        }
        return false;
    }


    public function Find_By__num_ens(string $_num_ens){
        $string_of_search = " SELECT * FROM matiere WHERE _num_ens = '$_num_ens' ";
        $statement = $this->Connexion->query( $string_of_search);
        if( $statement && $row = $statement->fetchAll(PDO::FETCH_ASSOC) ){
            $tmp = (object)[];
            foreach($row as $obj){
            $tmp->num_mat = $obj['num_mat'];
            $tmp->nom_mat = $obj['nom_mat'];
            $tmp->coef = $obj['coef'];
            $tmp->_num_ens = $obj['_num_ens'];
            }
            return $tmp;
        }
        return false;
    }

    public function Find(string $id){
        $string_of_search = " SELECT * FROM matiere WHERE num_mat = $id ";
        $statement = $this->Connexion->query( $string_of_search);
        if( $statement && $row = $statement->fetch(PDO::FETCH_ASSOC) ){
            $this->num_mat = $row['num_mat'];
            $this->nom_mat = $row['nom_mat'];
            $this->coef = $row['coef'];
            $this->_num_ens = $row['_num_ens'];
            $this->inserted = true;
            return true;
        }
        return false;
    }

    public function GetAll(){
        $matieres = [];
        $sql_statement = "SELECT * FROM matiere order by num_mat";
        $statement = $this->Connexion->query($sql_statement);
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($rows as $row){
            $matiere = (object) ['num_mat'=>''];
            $matiere->num_mat = $row['num_mat'];
            $matiere->nom_mat = $row['nom_mat'];
            $matiere->_num_ens = $this->Get_Matieres_Ens($row['_num_ens']) ;
            $matiere->coef = $row['coef'];
            array_push($matieres,$matiere);
        }
        return $matieres;
    }   


    public function Get_Matieres_Ens($id){
        $tmp = new Enseignant();
        if ( $tmp->Find($id) ){
            return (object) ['nom'=>$tmp->nom_ens,'id'=>$tmp->num_ens];
        }
        return false;
    }
    

    public function Check__num_ens_for_Update(){
        $matiere = new matiere();
        $matiere->Find_By__num_ens($this->_num_ens);
        if( $this->num_mat != $matiere->num_mat)
            return true;
        return false;
    }

    
    public function __destruct()
    {
        parent::__destruct();
    }

}


?>
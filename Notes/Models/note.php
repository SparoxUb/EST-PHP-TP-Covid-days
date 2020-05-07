<?php 


require_once("./Classes/DAO.php");
require_once("./Classes/DB_Connexion.php");

class Note extends DB_Connexion implements DAO{

    public string $id;
    public string $_num_etu;
    public string $_num_mat;
    public string $note;
    private bool $inserted=false;

    
    public function __construct()
    {
        parent::__construct();
        $this->inserted=false;
        $this->id = "";
        $this->_num_etu="";
        $this->_num_mat="";
        $this->note='';
    }


    public function Insert(){
        if($this->inserted){
            trigger_error(" Note Déja insérée ! ",E_USER_NOTICE);
            return false;
        }
        if($this->note=="NULL")
        $string_of_insert = " UPDATE notes SET _num_etu='$this->_num_etu', _num_mat= $this->_num_mat, note=NULL WHERE id = $this->id ";
        else
        $string_of_insert = " INSERT INTO notes(_num_etu,_num_mat,note) Select '$this->_num_etu','$this->_num_mat','$this->note' ";
        if( $this->Connexion->query( $string_of_insert) ){
            $res = $this->Connexion->query("SELECT LAST_INSERT_ID()");
            $dernierID = $res->fetchColumn();
            $this->id = $dernierID;
            $this->inserted = true;
            return true;
        }
        return false;
    }


    public function Delete(){
        if(!$this->inserted){
            trigger_error(" Note non insérée pour la supprimer ! ",E_USER_NOTICE);
            return false;
        }
        $string_of_delete = " DELETE FROM notes WHERE id = $this->id ";
        if( $this->Connexion->query( $string_of_delete) ){
            $this->id = "";
            $this->inserted = false;
            return true;
        }
        return false;
    }


    public function Update(){
        if(!$this->inserted){
            trigger_error(" Note non insérée pour la modifier ! ",E_USER_NOTICE);
            return false;
        }
        
        $string_of_update = " UPDATE notes SET _num_etu='$this->_num_etu', _num_mat= $this->_num_mat, note='$this->note' WHERE id = $this->id ";
        if( $this->Connexion->query( $string_of_update) ){
            return true;
        }
        return false;
    }


    public function Find(string $id){
        $string_of_search = " SELECT * FROM notes WHERE id = $id ";
        $statement = $this->Connexion->query( $string_of_search);
        if( $statement && $row = $statement->fetch(PDO::FETCH_ASSOC) ){
            $this->id = $row['id'];
            $this->_num_etu = $row['_num_etu'];
            $this->_num_mat = $row['_num_mat'];
            $this->note = $row['note'];
            $this->inserted = true;
            return true;
        }
        return false;
    }

    public function GetAll(){
        $matieres = [];
        $sql_statement = "SELECT * FROM notes order by _num_etu";
        $statement = $this->Connexion->query($sql_statement);
        if(!$statement)
        return [];
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($rows as $row){
            $matiere = (object) ['_num_etu'=>''];
            $matiere->id = $row['id'];
            $matiere->_num_etu = $row['_num_etu'];
            $matiere->_num_mat = $row['_num_mat'] ;
            $matiere->note = $row['note'];
            array_push($matieres,$matiere);
        }
        return $matieres;
    }   

    public function Get_Matieres_Notes( $matiereId){

        $notes= [];

        $sql_statement = "SELECT * FROM notes WHERE _num_mat = $matiereId";
        $statement = $this->Connexion->query($sql_statement);
        if(!$statement)
        return [];
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($rows as $row){
            $notes = array_merge($notes,[ "'".$row['_num_etu']."'" => $row['note'] ]);
        }
        return $notes;
    }



    public function Set_Matiere_Notes( $MatiereID, $Notes_and_studentsIDS){

        $this->Connexion->query(" DELETE FROM notes WHERE _num_mat=$MatiereID ");
        foreach( $Notes_and_studentsIDS as $etu_id => $note ){

            $Noteobj = new Note();
            $Noteobj->_num_etu = $etu_id;
            $Noteobj->_num_mat= $MatiereID;
            $Noteobj->note= $note;

            $Noteobj->Insert();
        }
        return true;
    }
    

    
    public function __destruct()
    {
        parent::__destruct();
    }

}


?>
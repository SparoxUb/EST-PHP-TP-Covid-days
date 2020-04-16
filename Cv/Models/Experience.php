<?php 



require_once('./Classes/DAO.php');
require_once('./Classes/Fichier.php');


class Experience extends Fichier implements DAO{

    public string $id;
    public string $duree;
    public string $debut;
    public string  $entreName;
    public string $Edesc;

    
    public function __construct(string $id,string $duree,string $debut,string $entreName,string $Edesc)
    {
        parent::__construct("./data/Experience.txt","r");
        $this->id = $id;
        $this->duree = $duree;
        $this->debut = $debut;
        $this->entreName = $entreName;
        $this->Edesc = $Edesc;
   
    }

    public function Insert(){
        $string_i = implode(':',[$this->id,$this->duree,$this->debut,$this->entreName,$this->Edesc."\n"]);
        if($this->Ecrire($string_i)) 
        return true;
        return false;
    }


    public function Delete(){
        $objs= $this->GetAll();
        $i=0;
        for($i=0; $i<count($objs);$i++){
            if($objs[$i]->id==$this->id)
            break;  
        }
        if($i==count($objs))
            return false;

        array_splice($objs,$i,1);
        if( !$this->Effacer())
            return false;
            
        foreach($objs as $obj){
        $string_i =implode(':',[$obj->id,$obj->duree,$obj->debut,$obj->entreName,$obj->Edesc."\n"]);
        $this->Ecrire($string_i);
        }
        return true;
    }

    //public function Update();
    public function Find(string $id){
        $objs= $this->GetAll();
        for($i=0; $i<count($objs);$i++){
            if($objs[$i]->id==$id)
            break;  
        }
        if($i==count($objs))
            return false;
        return new Experience( $objs[$i]->id,$objs[$i]->duree,$objs[$i]->debut,$objs[$i]->entreName,$objs[$i]->Edesc) ;
    }

    public function GetAll(){
        $lines = $this->Get_Array();
        $objs=[];
        foreach($lines as $line){
            $obj=(object)[];
            $tmp = explode(':',$line);
            $obj->id =  $tmp[0];
            $obj->duree =  $tmp[1];
            $obj->debut =  $tmp[2];
            $obj->entreName =  $tmp[3];
            $obj->Edesc =  str_replace("\n","",$tmp[4]); /// this one

            array_push($objs,$obj);
        }
        return $objs;
    }
    public function __destruct()
    {
        parent::__destruct();
    }

}


?>
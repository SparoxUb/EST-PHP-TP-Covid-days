<?php 



require_once('./Classes/DAO.php');
require_once('./Classes/Fichier.php');


class Formation extends Fichier implements DAO{

    public string $id;
    public string $annee;
    public string  $nomE;
    public string $dip;
    public string   $desc;
 

    
    public function __construct(string $id,string $annee,string $nomE,string $dip,string $desc)
    {
        parent::__construct("./data/Formation.txt","r");
        $this->id = $id;
        $this->annee = $annee;
        $this->nomE = $nomE;
        $this->dip = $dip;
        $this->desc = $desc;
   
    }

    public function Insert(){
        $string_i = implode(':',[$this->id,$this->annee,$this->nomE,$this->dip,$this->desc."\n"]);
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
        $string_i =implode(':',[$obj->id,$obj->annee,$obj->nomE,$obj->dip,$obj->desc."\n"]);
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
        return new Formation( $objs[$i]->id,$objs[$i]->annee,$objs[$i]->nomE,$objs[$i]->dip,$objs[$i]->desc) ;
    }

    public function GetAll(){
        $lines = $this->Get_Array();
        $objs=[];
        foreach($lines as $line){
            $obj=(object)[];
            $tmp = explode(':',$line);
            $obj->id =  $tmp[0];
            $obj->annee =  $tmp[1];
            $obj->nomE =  $tmp[2];
            $obj->dip =  $tmp[3];
            $obj->desc =  str_replace("\n","",$tmp[4]); /// this one

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
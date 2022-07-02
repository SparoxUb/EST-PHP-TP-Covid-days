<?php 



require_once('./Classes/DAO.php');
require_once('./Classes/Fichier.php');


class Loisir extends Fichier implements DAO{

    public string $id;
    public string $L1;
    public string $L2;
    public string $L3;

    
    public function __construct(string $id,string $L1,string $L2,string $L3)
    {
        parent::__construct("./data/Loisirs.txt","r");
        $this->id = $id;
        $this->L1 = $L1;
        $this->L2 = $L2;
        $this->L3 = $L3;
   
    }

    public function Insert(){
        $string_i = implode(':',[$this->id,$this->L1,$this->L2,$this->L3."\n"]);
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
        $string_i =implode(':',[$obj->id,$obj->L1,$obj->L2,$obj->L3."\n"]);
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
        return new Loisir( $objs[$i]->id,$objs[$i]->L1,$objs[$i]->L2,$objs[$i]->L3) ;
    }

    public function GetAll(){
        $lines = $this->Get_Array();
        $objs=[];
        foreach($lines as $line){
            $obj=(object)[];
            $tmp = explode(':',$line);
            $obj->id =  $tmp[0];
            $obj->L1 =  $tmp[1];
            $obj->L2 =  $tmp[2];
            $obj->L3 =  str_replace("\n","",$tmp[3]); /// this one

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
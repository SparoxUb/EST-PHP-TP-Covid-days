<?php 



require_once('./Classes/DAO.php');
require_once('./Classes/Fichier.php');


class EtatCivile extends Fichier implements DAO{

    public string $id;
    public string $nom;
    public string  $prenom;
    public string $addr;
    public string  $Sex;
    public string  $Tel;
    public string  $age;
    public string  $pic;
    public string  $email;
    
    public function __construct(string $id,string $nom,string $prenom,string $addr,string $Sex,string $Tel,string $age,string $pic,string $email)
    {
        parent::__construct("./data/Etat_civile.txt","r");
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->addr = $addr;
        $this->Sex = $Sex;
        $this->Tel = $Tel;
        $this->age = $age;
        $this->pic = $pic;
        $this->email = $email;
    }

    public function Insert(){
        $string_i = implode(':',[$this->id,$this->nom,$this->prenom,$this->addr,$this->Sex,$this->Tel,$this->age,$this->pic,$this->email."\n"]);
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
        $string_i = implode(':',[$obj->id,$obj->nom,$obj->prenom,$obj->addr,$obj->Sex,$obj->Tel,$obj->age,$obj->pic,$obj->email."\n"]);
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
        return new EtatCivile($objs[$i]->id, $objs[$i]->nom, $objs[$i]->prenom,$objs[$i]->addr, $objs[$i]->Sex, $objs[$i]->Tel, $objs[$i]->age, $objs[$i]->pic, $objs[$i]->email);
    }

    public function GetAll(){
        $lines = $this->Get_Array();
        $objs=[];
        foreach($lines as $line){
            $obj=(object)[];
            $tmp = explode(':',$line);
            $obj->id =  $tmp[0];
            $obj->nom =  $tmp[1];
            $obj->prenom =  $tmp[2];
            $obj->addr =  $tmp[3];
            $obj->Sex =  $tmp[4];
            $obj->Tel =  $tmp[5];
            $obj->age =  $tmp[6];
            $obj->pic =  $tmp[7];
            $obj->email =   str_replace("\n","",$tmp[8]); /// this one

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
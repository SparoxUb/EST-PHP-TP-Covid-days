<?php 


require_once('./Classes/DAO.php');
require_once('./Classes/Fichier.php');


class User extends Fichier implements DAO{

    public string $id;
    public string $Pseudo;
    public string $pwd;

    public function __construct(string $Pseudo,string $pwd)
    {
        parent::__construct("./data/users.txt","r");
        $this->Pseudo = $Pseudo;
        $this->pwd = $pwd;
    }

    public function login(){
        $users= $this->GetAll();


        foreach( $users as $user){
            $PseudoT =(string) $user->Pseudo;
            //$pwdT = substr($user->pwd, 0, -1);
            $pwdT =(string)$user->pwd;
            if( strcmp($PseudoT,$this->Pseudo)==0 &&  strcmp( $pwdT, $this->pwd )==0  )
                {
                    $this->id = $user->id;
                    return true;
                }
        }

       
       

        return false;

    }

    public function Insert(){
        $users= $this->GetAll();
        $Last_User = array_pop($users);
        $this->id= @((int)$Last_User->id)+1;
        $string_i = $this->id.':'.$this->Pseudo.':'.$this->pwd."\n";
        if($this->Ecrire($string_i)) 
        return true;
        return false;
    }

    public function check_Pseudo(){
        $users= $this->GetAll();
        $i=0;
        for($i=0; $i<count($users);$i++){
            if($users[$i]->Pseudo==$this->Pseudo)
            return true;
        }
            return false;
    }

    public function Delete(){
        $users= $this->GetAll();
        $i=0;
        for($i=0; $i<count($users);$i++){
            if($users[$i]->id==$this->id)
            break;  
        }
        if($i==count($users))
            return false;

        array_splice($users,$i,1);
        if( !$this->Effacer())
            return false;
            
        foreach($users as $user){
        $string_i = $user->id.':'.$user->Pseudo.':'.$user->pwd."\n";
        $this->Ecrire($string_i);
        }
        return true;
    }

    //public function Update();
    public function Find(string $id){
        $users= $this->GetAll();
        for($i=0; $i<count($users);$i++){
            if($users[$i]->id==$id)
            break;  
        }
        if($i==count($users))
            return false;
        return $users[$i];
    }

    public function GetAll(){
        $lines = $this->Get_Array();
        $users=[];
        foreach($lines as $line){
            $user=(object)[];
            $tmp = explode(':',$line);
            $user->id= $tmp[0];
            $user->Pseudo = $tmp[1];
            $user->pwd = str_replace("\n","",$tmp[2]); /// this one
            array_push($users,$user);
        }
        return $users;
    }
    public function __destruct()
    {
        parent::__destruct();
    }

}


?>
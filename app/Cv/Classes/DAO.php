<?php 
interface DAO {
public function Insert();
public function Delete();
//public function Update();
public function Find(string $id);
public function GetAll();
}

?>
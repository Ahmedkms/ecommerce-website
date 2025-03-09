<?php

namespace App;
use PDO;
use Database\DatabaseManager;


class Contactus{
    private $db;
    public function __construct(){
        $this->db=DatabaseManager::getConnection();
     }


     public function addcontact($email,$name, $massage){
        $sql = "INSERT INTO `contactus`( `email`, `name`, `massage`) VALUES(:email,:name,:massage)";
    
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            
           ':email' => $email,
           ':name'=> $name, 
           ':massage'=> $massage]);
    }




}
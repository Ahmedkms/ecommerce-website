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
        $sql = "INSERT INTO `contact`( `email`, `name`, `message`,`user_id`) VALUES(:email,:name,:massage,:user_id)";
    
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            
           ':email' => $email,
           ':name'=> $name, 
           ':massage'=> $massage,
           ':user_id'=> $_SESSION['id']
        ]);
    }




}
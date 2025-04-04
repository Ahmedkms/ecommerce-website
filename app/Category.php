<?php

namespace App;
use PDO;
use Database\DatabaseManager;


 class Category{
 private $db;


 public function __construct(){
    $this->db=DatabaseManager::getConnection();
 }

 public function AddCategory($name){
    $sql = "INSERT INTO categorys (`name`) VALUES (:name)";
    $stmt = $this->db->prepare($sql);
    return $stmt->execute([':name' => $name]);

 }

 public function GetAllCategory(){
    $sql = "SELECT * FROM  categorys";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
 }
 public function GetCategoryById($id) {
   $sql = "SELECT * FROM categorys WHERE id = :id";
   $stmt = $this->db->prepare($sql);
   $stmt->execute([':id' => $id]);
   return $stmt->fetch(PDO::FETCH_ASSOC); // Fetch a single category
}

 public function DeleteCategory($id) {
    $sql = "DELETE FROM categorys WHERE id = ?";
    $stmt = $this->db->prepare($sql);
    return $stmt->execute([$id]);
}




 }

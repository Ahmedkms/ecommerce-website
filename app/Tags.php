<?php
namespace App;
use PDO;
use Database\DatabaseManager;

class Tags {
    private $db;
    public function __construct() {
        $this->db = DatabaseManager::getConnection();
    }
    public function AddTags($name,$product_id){
        $sql = "INSERT INTO tags (`name`,`product_id`) VALUES (:name,:product_id)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':name' => $name,'product_id'=>$product_id]);
    
    }

    public function GetAllTags(){
        $sql = "SELECT * FROM  tags ORDER BY created_at DESC LIMIT 3";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
     public function GetTagsByProduct($product_id){
        $sql = "SELECT * FROM  tags where `product_id`=:product_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([":product_id"=>$product_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
}
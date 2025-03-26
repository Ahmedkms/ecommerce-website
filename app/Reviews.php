<?php


namespace App;
use PDO;
use Database\DatabaseManager;

class Reviews{
    private $db;
    public function __construct(){
        $this->db=DatabaseManager::getConnection();
     }
     public function CreateReview($product_id,$user_name, $content){
        $sql = "INSERT INTO `reviews`( `user_name`, `product_id`, `content`) VALUES(:user_name,:product_id,:content)";
    
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            
           ':user_name' => $user_name,
           ':product_id'=> $product_id, 
           ':content'=> $content]);
    }
    public function getreviestsByproductId(int $product_id): array {
        $sql = "
            SELECT content, id,created_at, user_name 
            FROM reviews
            WHERE product_id = :product_id
            ORDER BY id DESC
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['product_id' => $product_id]);
        
        // Fetch all results as an associative array
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }




    }


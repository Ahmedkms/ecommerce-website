<?php
namespace App;
use PDO;
use Database\DatabaseManager;



class Blogs{
    use FileManegerTrat;
    private $db;
    public function __construct(){
        $this->db=DatabaseManager::getConnection();
     }
     public function CreateBlog($product_id, $title,$description,$img=""){
         $sql = "INSERT INTO `blogs`(  `product_id`, `title`, `description`, `img`) VALUES(:product_id,:title,:description,:img)";
         $imagePath='';
         if (!empty($img)){
         $imagePath = $this->uploadFile($img);}
         $stmt = $this->db->prepare($sql);
         return $stmt->execute([
             
            
            ':product_id'=> $product_id, 
            ':description'=> $description, 
            ':img'=> $imagePath, 
            ':title'   => $title]);
     }


     public function GetAllBlogs(){
        $sql="SELECT * FROM `blogs`  ORDER BY created_at DESC";
        $stmt=$this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }

    //  public function getBlogssByUser($user_id) {
    //     $sql = "SELECT * FROM `blogs` WHERE user_id = ? ORDER BY created_at DESC";
    //     $stmt = $this->db->prepare($sql);
    //     $stmt->execute([$user_id]);
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }
    public function getBlogssByProduct($product_id) {
        $sql = "SELECT * FROM `blogs` WHERE product_id = ? ORDER BY created_at DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$product_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function GetBlogById($blog_id) {
        $sql = "SELECT * FROM blogs WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$blog_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);  
    }
    public function GetLastThreeBlogs() {
        $sql = "SELECT * FROM `blogs` ORDER BY created_at DESC LIMIT 3";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function searchblogsByName($word) {
        $sql = "SELECT * FROM blogs WHERE title LIKE ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['%' . $word . '%']);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    
    public function DeleteBloge($blog_id){
        $sql = "DELETE FROM blogs WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$blog_id]);
    }

}
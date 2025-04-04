<?php


namespace App;
use PDO;
use Database\DatabaseManager;

class Shiping{
    private $db;
    public function __construct(){
        $this->db=DatabaseManager::getConnection();
    }
    public function CreateShiping($user_id,$order_id,$address,$city,$country,$phone,$note=null,$status='panding'){
        $sql="INSERT INTO `shippings`(`user_id`, `order_id`, `address`, `city`, `country`, `status`,`phone`,`note`) VALUES(:user_id,:order_id,:address,:city,:country,:status,:phone,:note)"; 
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            
           ':user_id' => $user_id,
           ':order_id'=> $order_id, 
           ':address'=> $address, 
           ':city'=> $city, 
           ':country'=> $country, 
           ':phone'=> $phone, 
           ':note'=> $note, 
           ':status'=> $status]);
    }


    public function CombleteShiping($ship_id,$status){
        $sql = "UPDATE shippings SET `status` = :status WHERE id =:id";
        $stmt=$this->db->prepare($sql);
       return $stmt->execute([
        ':status'=>$status,
        ':id'=>$ship_id]);

    }


    public function DeleteShiping($ship_id){
        $sql = "DELETE FROM shippings WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$ship_id]);
    }





}







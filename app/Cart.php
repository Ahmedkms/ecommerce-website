<?php
namespace App;
use PDO;
use Database\DatabaseManager;

class Cart {
    private $db;

    public function __construct() {
        $this->db = DatabaseManager::getConnection();
    }

    //add product to cart
    public function addToCart($user_id, $product_id, $quantity) {
        // check if product already in cart or not, if it exist update quantity, if not, add it
        $sql = "SELECT * FROM carts WHERE user_id = ? AND product_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$user_id, $product_id]);
        $existingItem = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existingItem) {
            $newQuantity = $existingItem['quantity'] + $quantity;
            $sql = "UPDATE carts SET quantity = ? WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$newQuantity, $existingItem['id']]);
        } else {
            
            $sql = "INSERT INTO carts (user_id, product_id, quantity, created_at) VALUES (?, ?, ?, NOW())";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$user_id, $product_id, $quantity]);
        }
    }

    public function getNumberofbroductinCart($user_id){
        $sql="SELECT count(product_id) as product_count FROM carts  WHERE user_id=:user_id  ";
        $stml=$this->db->prepare($sql);
        $stml->execute([":user_id"=>$user_id]);
        $result = $stml->fetch(PDO::FETCH_ASSOC);
        return $result['product_count'];
    }

    //return all items from cart to one user by user id
    public function getCartItems($user_id) {
        $sql = "SELECT 
                    c.id AS cart_id, 
                    c.user_id, 
                    c.product_id, 
                    c.quantity AS QTY, 
                    p.name AS product_name, 
                    p.image AS product_image, 
                    p.price AS product_price 
                FROM carts AS c
                INNER JOIN products AS p ON c.product_id = p.id
                WHERE c.user_id = ?";
    
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function TotalPrice($user_id) {
        $sql = "SELECT 
                (c.quantity * p.price) AS item_total_price  
                FROM carts AS c
                INNER JOIN products AS p ON c.product_id = p.id
                WHERE c.user_id = ?";
    
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$user_id]);
        $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $totalPrice = array_sum(array_column($cartItems, 'item_total_price'));
    
        return $totalPrice;  // Return the total price along with items
        
    }
    

    //update quantity in cart
    public function updateCartItem($cart_id, $quantity) {
        $sql = "UPDATE carts SET quantity = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$quantity, $cart_id]);
    }

    //delete cart item 
    public function deleteCartItem($cart_id) {
        $sql = "DELETE FROM carts WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$cart_id]);
    }

    // clear Cart in case of complete order for one user
    public function clearCart($user_id) {
        $sql = "DELETE FROM cart WHERE user_id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$user_id]);
    }
}
?>

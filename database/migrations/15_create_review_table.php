<?php 

class CreateReviewTable{
    public function up($conn)
    {
        $sql = "CREATE TABLE IF NOT EXISTS reviews (
            id INT AUTO_INCREMENT PRIMARY KEY,
            content text NOT NULL,
            user_name varchar(50) NOT NULL,
            product_id INT NOT NULL,         
            FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,          
            created_at  TIMESTAMP  DEFAULT CURRENT_TIMESTAMP
        
        )";

        $conn->exec($sql);
    }
}
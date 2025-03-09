<?php 

class CreateTagsTable{
    public function up($conn)
    {
        $sql = "CREATE TABLE IF NOT EXISTS tags (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            product_id INT NOT NULL,
            FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,          
            created_at  TIMESTAMP  DEFAULT CURRENT_TIMESTAMP
        
        )";

        $conn->exec($sql);
    }
}
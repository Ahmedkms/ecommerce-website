<?php 
include "includes/nav.php"; 
include "includes/sidebar.php"; 
use App\Product;
use App\Category;
$product = new Product();
$products = $product->getAllProducts();
$category = new Category();
?>

<div class="content-wrapper">
    <div class="container mt-2">
        <div class="card shadow p-2">
            <!-- <h3 class="mb-2 text-center">Orders Management</h3> -->
            <table class="table table-bordered table-striped text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Items</th>
                        <th>Total Price ($)</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $orders = [
                        ["id" => 101, "customer" => "Ahmed Ali", "items" => "Laptop, Mouse", "total" => 1500, "status" => "Pending", "date" => "2025-03-09"],
                        ["id" => 102, "customer" => "Sara Mohamed", "items" => "Phone, Headset", "total" => 1200, "status" => "Processing", "date" => "2025-03-08"],
                        ["id" => 103, "customer" => "Mohamed Gamal", "items" => "Keyboard, Monitor", "total" => 900, "status" => "Completed", "date" => "2025-03-07"],
                        ["id" => 104, "customer" => "Nour Hassan", "items" => "Tablet, Charger", "total" => 700, "status" => "Canceled", "date" => "2025-03-06"]
                    ];

                    foreach ($orders as $order): 
                    ?>
                    <tr>
                        <td><?= $order['id'] ?></td>
                        <td><?= $order['customer'] ?></td>
                        <td><?= $order['items'] ?></td>
                        <td><?= $order['total'] ?></td>
                        <td>
                            <span class="badge 
                                <?php 
                                    if ($order['status'] == 'Pending') echo 'bg-warning'; 
                                    elseif ($order['status'] == 'Processing') echo 'bg-info'; 
                                    elseif ($order['status'] == 'Completed') echo 'bg-success'; 
                                    else echo 'bg-danger';
                                ?>">
                                <?= $order['status'] ?>
                            </span>
                        </td>
                        <td><?= $order['date'] ?></td>
                        <td>
                        <a href="add-product.php" class="btn btn-sm btn-warning">Edit</a>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>

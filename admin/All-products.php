<?php include "includes/nav.php"; 
 include "includes/sidebar.php"; 
use App\Product;
$product = new Product();
$products = $product->getAllProducts();

?>

<div class="content-wrapper">
    <div class="container-fluid mt-5">
        <div class="card shadow p-4">
            <table class="table table-bordered table-striped text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Stock</th>
                        <th>Price ($)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?= $product['id'] ?></td>
                            <td>
                                
                                <img src="../public/<?= $product['image']?>" alt="Product Image" class="img-thumbnail" style="width: 80px; height: 80px;">
                            </td>
                            <td> <?= $product['name'] ?></td>
                            <td> <?= $product['name']?></td>
                            <td><?= $product['description']?></td>
                            <td><?=$product['stock'] ?></td>
                            <td><?= $product['price'] ?></td>
                            <td>
                                <a href="add-product.php?id=<?=$product['id']?>" class="btn btn-sm btn-warning">Edit</a>
                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $i ?>">Delete</button>

                                <!-- Delete Confirmation Modal -->
                                <div class="modal fade" id="deleteModal<?= $i ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete <strong>Product <?= $i ?></strong>?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

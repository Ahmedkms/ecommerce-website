<?php
include "includes/nav.php";
include "includes/sidebar.php";

use App\User;

$users = [
    ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com', 'role' => 'Admin'],
    ['id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@example.com', 'role' => 'Seller'],
    ['id' => 3, 'name' => 'Michael Brown', 'email' => 'michael@example.com', 'role' => 'Seller'],
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['addUser'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $role = $_POST['role'];

        $users[] = [
            'id' => count($users) + 1,
            'name' => $name,
            'email' => $email,
            'role' => $role
        ];

        header("Location: users.php");
        exit();
    } elseif (isset($_POST['updateRole'])) {
        $userId = $_POST['user_id'];
        $newRole = $_POST['role'];

        // تحديث الدور في البيانات الوهمية
        foreach ($users as &$user) {
            if ($user['id'] == $userId) {
                $user['role'] = $newRole;
                break;
            }
        }

        header("Location: users.php");
        exit();
    }
}
?>
<div class="content-wrapper">
    <div class="container mt-2">

        <div class="container mt-2">
            <div class="card shadow p-4">
                <h3 class="mb-4 text-center">Users Management</h3>

                <!-- Form لإضافة مستخدم جديد -->
                <form method="POST" class="mb-4">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <input type="text" name="name" class="form-control" placeholder="User Name" required>
                        </div>
                        <div class="col-md-4">
                            <input type="email" name="email" class="form-control" placeholder="User Email" required>
                        </div>
                        <div class="col-md-3">
                            <select name="role" class="form-select" required>
                                <option value="Seller">Seller</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <button type="submit" name="addUser" class="btn btn-success w-100">Add</button>
                        </div>
                    </div>
                </form>

                <!-- جدول عرض المستخدمين -->
                <table class="table table-bordered table-striped text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= $user['id'] ?></td>
                                <td><?= $user['name'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td>
                                    <form method="POST">
                                        <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                        <select name="role" class="form-select d-inline-block w-auto">
                                            <option value="Seller" <?= $user['role'] == 'Seller' ? 'selected' : '' ?>>Seller</option>
                                            <option value="Admin" <?= $user['role'] == 'Admin' ? 'selected' : '' ?>>Admin</option>
                                        </select>
                                        <button type="submit" name="updateRole" class="btn btn-sm btn-primary">Update</button>
                                    </form>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>

</html>
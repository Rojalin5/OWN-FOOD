<?php

session_start();

require_once("../config/db.php");

// Must be logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: ../log-in.php");
    exit();
}

// Must be admin
if ($_SESSION["role"] !== "admin") {
    header("Location: ../user/dashboard.php");
    exit();
}

// Get all menu items
$sql = "SELECT * FROM menu_items ORDER BY id DESC";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manage Menu | OwnFood</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">

<div class="container py-5">

    <!-- HEADER -->

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <a href="dashboard.php"
               class="text-decoration-none">

                <i class="bi bi-arrow-left"></i>
                Dashboard

            </a>

            <h2 class="fw-bold mt-3">
                Manage Menu
            </h2>

            <p class="text-muted">
                Add, edit and manage your food items.
            </p>

        </div>

        <a href="add-food.php"
           class="btn btn-success">

            <i class="bi bi-plus-lg"></i>
            Add New Food

        </a>

    </div>


    <!-- MENU TABLE -->

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>

                        <tr>

                            <th>ID</th>
                            <th>Food</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Availability</th>
                            <th>Action</th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php while ($food = $result->fetch_assoc()) { ?>

                        <tr>

                            <!-- ID -->

                            <td>
                                #<?php echo $food["id"]; ?>
                            </td>


                            <!-- FOOD -->

                            <td>

                                <strong>
                                    <?php
                                    echo htmlspecialchars(
                                        $food["name"]
                                    );
                                    ?>
                                </strong>

                                <small class="d-block text-muted">

                                    <?php
                                    echo htmlspecialchars(
                                        $food["description"]
                                    );
                                    ?>

                                </small>

                            </td>


                            <!-- CATEGORY -->

                            <td>

                                <?php
                                echo htmlspecialchars(
                                    $food["category"]
                                );
                                ?>

                            </td>


                            <!-- PRICE -->

                            <td>

                                ₹<?php
                                echo number_format(
                                    $food["price"],
                                    2
                                );
                                ?>

                            </td>


                            <!-- AVAILABILITY -->

                            <td>

                                <?php if ($food["is_available"] == 1) { ?>

                                    <span class="badge bg-success">
                                        Available
                                    </span>

                                <?php } else { ?>

                                    <span class="badge bg-secondary">
                                        Unavailable
                                    </span>

                                <?php } ?>

                            </td>


                            <!-- ACTION -->

                            <td>

                                <a
                                    href="edit-food.php?id=<?php echo $food["id"]; ?>"
                                    class="btn btn-sm btn-outline-primary">

                                    <i class="bi bi-pencil"></i>
                                    Edit

                                </a>


                                <a
                                    href="delete-food.php?id=<?php echo $food["id"]; ?>"
                                    class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Are you sure you want to delete this food?');">

                                    <i class="bi bi-trash"></i>
                                    Delete

                                </a>

                            </td>

                        </tr>

                    <?php } ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</body>

</html>
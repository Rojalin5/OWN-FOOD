<?php

session_start();

require_once("../config/db.php");


// Admin protection
if (!isset($_SESSION["user_id"])) {
    header("Location: ../log-in.php");
    exit();
}

if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
    header("Location: ../user/dashboard.php");
    exit();
}


// Get all menu items
$result = $conn->query(
    "SELECT * FROM menu_items ORDER BY id DESC"
);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Manage Food | OwnFood</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">


<!-- NAVBAR -->

<nav class="navbar bg-white border-bottom">

    <div class="container py-2">

        <a
            href="dashboard.php"
            class="navbar-brand fw-bold">

            🍔 OwnFood Admin

        </a>

        <div>

            <a
                href="dashboard.php"
                class="btn btn-outline-dark btn-sm me-2">

                Dashboard

            </a>

            <a
                href="../auth/logout.php"
                class="btn btn-outline-danger btn-sm">

                Logout

            </a>

        </div>

    </div>

</nav>


<!-- CONTENT -->

<div class="container py-5">


    <!-- HEADER -->

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Manage Food
            </h2>

            <p class="text-muted mb-0">
                Manage the food items available on OwnFood.
            </p>

        </div>


        <a
            href="add-food.php"
            class="btn btn-success">

            <i class="bi bi-plus-lg"></i>

            Add Food

        </a>

    </div>


    <!-- TABLE -->

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

                            <th>Status</th>

                            <th class="text-end">
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                    <?php if ($result->num_rows > 0) { ?>

                        <?php while ($food = $result->fetch_assoc()) { ?>

                            <tr>

                                <td>
                                    #<?php echo $food["id"]; ?>
                                </td>


                                <td>

                                    <strong>

                                        <?php
                                        echo htmlspecialchars(
                                            $food["name"]
                                        );
                                        ?>

                                    </strong>

                                </td>


                                <td>

                                    <?php
                                    echo htmlspecialchars(
                                        $food["category"]
                                    );
                                    ?>

                                </td>


                                <td>

                                    ₹<?php
                                    echo number_format(
                                        $food["price"],
                                        2
                                    );
                                    ?>

                                </td>


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


                                <td class="text-end">


                                    <!-- EDIT -->

                                    <a
                                        href="edit-food.php?id=<?php echo $food["id"]; ?>"
                                        class="btn btn-sm btn-outline-primary">

                                        <i class="bi bi-pencil"></i>

                                        Edit

                                    </a>


                                    <!-- DELETE -->

                                    <a
                                        href="delete-food.php?id=<?php echo $food["id"]; ?>"
                                        class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Are you sure you want to delete this food item?');">

                                        <i class="bi bi-trash"></i>

                                        Delete

                                    </a>


                                </td>

                            </tr>

                        <?php } ?>


                    <?php } else { ?>


                        <tr>

                            <td
                                colspan="6"
                                class="text-center py-5 text-muted">

                                No food items found.

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
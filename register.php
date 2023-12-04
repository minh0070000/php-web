<?php
// Define variable to check if user is not registered, show register form
$isSuccess = isset($_GET['success']) ? $_GET['success'] : null;
//$isSuccess = $_GET['success'];

// Receive post data
if (!empty($_POST)) {
    // Receive post form dat   a
    $username = ($_POST['username']);
    // hashing password
    $password = $_POST['password'];
    $fullname = ($_POST['fullname']);

    $email = ($_POST['email']);


    // Define and execute SQL Query
    $sql = "INSERT INTO users(`username`, `password`, `fullname`, `email` )
        VALUES('$username', '$password', '$fullname',  '$email' )";

    // Define an array to contain errors when execute query,
    //  if there are errors, we will ouput to screen
    $errors = [];
    try {
        $result = $mysql->query($sql);
        // After insert data to MySQL, set form to hidden
        header('Location: index.php?m=register&success=true');
        exit;
    } catch (Exception $e) {
        // if there is error, push the error message to array $error
        array_push($errors, $e->getMessage());
    }
}
?>
<!-- MAIN content -->



<div id="main">
    <div id="main-content">
        <h3>Register User</h3>
        <?php
        // Check if there is any error, ouput the error to screen.
        if (isset($errors) && !empty($errors)) {
            foreach ($errors as $error) {
                echo '<p>' . $error . '</p>';
            }
        }
        ?>
        <?php
        // Check if user not registered, show form
        if (!$isSuccess) { ?>
            <form method="post" class="form-register">
                <p>
                    <label>Username: </label>
                    <input type="text" name="username" />
                </p>
                <p>
                    <label>Email: </label>
                    <input type="text" name="email" />
                </p>
                <p>
                    <label>Full Name: </label>
                    <input type="text" name="fullname" />
                </p>
                <p>
                    <label>Password: </label>
                    <input type="password" name="password" />
                </p>
                <p><input type="submit" value="Register" /></p>
            </form>
        <?php // if user registered, show welcome message 
        } else {
            echo "<p>Welcome to our website!</p>";
        } ?>
    </div>
    <!-- embed sidbar.php -->
    <?php require __DIR__ . '/modules/partials/sidebar.php'; ?>
</div>
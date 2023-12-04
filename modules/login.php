<?php
// Receive form data 

$username = ($_POST['username']);
$password = $_POST["password"];


// query user data by $username and $password
$sql = "SELECT * 
    FROM users 
    WHERE username = '$username' AND password = '$password'
    LIMIT 0,1";

$result = $mysql->query($sql);
$user = $result->fetch_array() ?? false;

if (!$user) {
    //header('Location: index.php');
    echo "<p>Login failed</p>";
} else {
    // Set session for login
    $_SESSION["login_user_id"] = $user['id'];
    // Redirect to home page after login
    header('Location: index.php');
}

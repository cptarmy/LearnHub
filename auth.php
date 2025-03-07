<?php
include 'db.php';

if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password);
    $stmt->execute();

    echo "Signup successful! Check your email for verification.";
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password, is_verified FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($id, $hashed_password, $is_verified);
    $stmt->fetch();

    if (password_verify($password, $hashed_password)) {
        if ($is_verified) {
            session_start();
            $_SESSION['user_id'] = $id;
            header("Location: ../dashboard.html");
        } else {
            echo "Please verify your email first!";
        }
    } else {
        echo "Invalid credentials!";
    }
}
?>

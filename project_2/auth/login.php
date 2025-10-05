<?php
session_start();
include '../config/connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $psw = $_POST['psw'];

    try {
        // Connect to the database
        $pdo = new PDO("mysql:host=localhost;dbname=ysf_db", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Fetch the user by email
        $stmt = $pdo->prepare("SELECT id_Client, Prenom, Nom, psw FROM Client WHERE email = :email");
        $stmt->execute([':email' => $email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($psw, $user['psw'])) {
            // Successful login
            $_SESSION['user_id'] = $user['id_Client'];
            $_SESSION['user_name'] = $user['Prenom'] . ' ' . $user['Nom'];

            echo "<p style='color: green;'>Login successful! Welcome, " . htmlspecialchars($_SESSION['user_name']) . ".</p>";

            // Redirect if needed:
            header("Location: ../pages/index.php");
            exit;
        } else {
            echo "<p style='color: red;'>Invalid email or password.</p>";
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
    </head>
    <body>
    <nav class="navbar navbar-expaind-lg">
    <a href="#" class="navbar-brand">
    <img src="#" alt="#" width="50" height="50">
    </a>
    </nav>
    <main class="container d-flex align-items-center justify-content-center">
        <form action="login.php" method="post" class="p-4 border rounded bg-light justify-content-center">
            <h1 class="p-3">sign in to your account</h1>
            <p>New to toys? <a href="register.php">Create account</a></p>
            <label for="email" class="form-label"></label><br>
            <input 
                type="email" 
                class="form-control" 
                id="email" 
                name="email" 
                placeholder="Enter your email" 
                required><br>
            <label for="psw" class="form-label"></label><br>
            <input 
                type="password" 
                class="form-control" 
                id="psw" 
                name="psw" 
                placeholder="Enter your password" 
                required><br>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </main>
</body>
</html>
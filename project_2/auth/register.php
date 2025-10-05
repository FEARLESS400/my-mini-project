<?php
session_start();
include '../config/connect.php';
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $adr = $_POST['adr'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $psw = $_POST['psw'];

    
    try {
        // conn to db
        $pdo = new pdo("mysql:host=localhost;dbname=ysf_db", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // insert query
        $stmt = $pdo->prepare("INSERT INTO Client (Prenom, Nom, Adresse, Tel, email, psw)
                               VALUES (:f_name, :l_name, :adr, :tel, :email, :psw)");

        // execute with user input
        $stmt->execute([
            ':f_name' => $_POST['f_name'],
            ':l_name' => $_POST['l_name'],
            ':adr' => $_POST['adr'],
            ':tel' => $_POST['tel'],
            ':email' => $_POST['email'],
            ':psw' => password_hash($_POST['psw'], PASSWORD_BCRYPT)
        ]);

        echo "<p id='' style='color: green;'>User registred successfully!</p>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>register</title>
        <style>
            .min-height {
                min-height: 100vh;
            }
            /* nav p a {
                font-style: black;
            } */
            footer {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expaind-lg">
            <a href="#" class="navbar-brand">
                <img src="#" alt="#" width="50" height="50">
            </a>
            <p class="ms_auto">
                already have an account? <a href="login.php">Sign in</a>
            </p>
        </nav> 
        <main class="min-height container d-flex align-items-center justify-content-center">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" class="p-4 border rounded bg-light justify-content-center">
                <h1 class="p-3"><strong> Create an account</strong></h1><br>
                <div class="row w-100"> 
                    <input type="text" class="form-control col" id="f_name" name="f_name" placeholder="First name" required>
                    <input type="text" class="form-control col" id="l_name" name="l_name" placeholder="Last name" required>
                </div><br>
                <input 
                    type="text" 
                    class="form-control" 
                    id="adr" 
                    name="adr" 
                    placeholder="Enter your address" 
                    required><br>
                <input 
                    type="tel" 
                    class="form-control" 
                    id="tel" 
                    name="tel" 
                    placeholder="Enter your phone number" 
                    required><br>
                <input 
                    type="email" 
                    class="form-control" 
                    id="email" 
                    name="email" 
                    placeholder="Enter your email" 
                    required><br>
                <input 
                    type="password" 
                    class="form-control" 
                    id="psw" 
                    name="psw" 
                    placeholder="Enter your password"
                    minlength="8"
                    required><br>
                <button type="submit" class="btn btn-dark w-100">Create account</button>
            </form>
        </main>
    <footer>
        <p class="m-5">Copyright © 2025 . All Rights Reserved.</p>
    </footer>
    </body>
</html>

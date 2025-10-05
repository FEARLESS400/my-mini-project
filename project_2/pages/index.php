<?php
session_start();
include '../config/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Layout Example</title>
  <style>
    body {
      display: grid;
      grid-template-areas: 
        "nav nav"
        "aside main"
        "footer footer";
      grid-template-columns:1fr 4fr;
      grid-template-rows: auto 1fr auto;
      min-height: 100vh;
      margin: 0;
    }
    
    header {
      grid-area: nav;
      background: white;
      padding: 2em;
    }

    nav {
      grid-area: nav;
      background: white;
      padding: 1em;
    }

    .card-container {
      display: flex;
      gap: 20px; 
      flex-wrap: wrap; 
      justify-content: center; 
    }
    .card {
      width: 7cm;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      text-align: center;
      margin-bottom: 20px;
    }

    aside {
      grid-area: aside;
      background: grey;
      padding: 1em;
    }
    main {
      grid-area: main;
      background: #f4f4f4;
      padding: 1em;
    }

    footer {
      grid-area: footer;
      background: #333;
      color: white;
      text-align: center;
      padding: 1em;
    }
  </style>
</head>
<body>
  <?php include "../components/header.php"; ?>

  <main class="container">
    <div class="card-container">
      <?php
        $sql = "SELECT * FROM product";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
      ?>
        <div class="card">
          <img class="card-img-top" src="../images/product_pic.png" alt="<?= $row['Name'] ?>">
          <div class="card-body">
            <h5 class="card-title"><?= $row['Name'] ?></h5>
            <p class="card-text"><?= $row['Description'] ?></p>
            <p class="card-text"><strong><?= $row['Price'] ?> MAD</strong></p>
            <form method="POST" action="add_to_cart.php">
              <input type="hidden" name="Id_product" value="<?= $row['Id_product'] ?>">
              <button type="submit" name="add" class="btn btn-primary">Add to Cart</button>
            </form>
          </div>
        </div>
      <?php
          }
      } else {
          echo "<p>No products found.</p>";
      }
      ?>
    </div>
  </main>

  <?php
    include "../components/aside.php";
    include "../components/footer.php";
  ?>
</body>
</html>

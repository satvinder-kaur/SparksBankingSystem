<!doctype html>
<html lang="en">

<head>
  <style>
    .welcome {
      color: #892CDC;
      font: 50px;
      text-align: center;
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      padding: 10px 10px;


    }

    p {
      margin-top: 100px;

    }
  </style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
  <?php
  include 'navbar.php'
    ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
  <br><br>
  <div style="background-image: radial-gradient(circle,white,#7479FF);">
    <div class="welcome">
      <p>
      <h2>Welcome to Sparks Bank</h2>
      </p>
    </div>
   
    <main style="margin:1rem; text-align:center;">
      <div class="card" style="width:13rem;margin:1rem;float:left;margin-left:33%;">
        <img src="images\customers.png" class="card-img-top" alt="customers">
        <div class="card-body" style="height:11rem;">
          <h5 class="card-title">View Customers</h5>
          <p class="card-text" style="text-align:center;">View our customers and transfer money</p>
          <div style="text-align:center;"><a href="transfer.php" class="btn btn-primary">View and Transfer</a></div>
        </div>
      </div>

      <div class="card" style="width:13.5rem;margin:1rem;float:left;position:relative;">
        <img src="images\transaction.png" class="card-img-top" alt="history">
        <div class="card-body" style="height:11rem;">
          <h5 class="card-title">Transaction history</h5>
          <p class="card-text" style="text-align:center;">View all your transaction history here</p>
          <div style="text-align:center;"><a href="transactionhistory.php" class="btn btn-primary">View History</a>
          </div>
        </div>
      </div>
    </main>
  </div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <footer class="text-center mt-5 py-2">
    <p>&copy 2022.<b>Sparks Bank</b><br>Banking Foundation</p>
  </footer>

</body>

</html>
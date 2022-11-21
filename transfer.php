<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transfer Money</title>
    <comment></comment>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <style type="text/css">
        *{
            font-size:1 rem;
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        button {
            transition: 1s;
            background-color: white;
            color: #6C4AB6;
            border: 3px white solid;
            padding:6px;
            border-radius: 50%;
        }

        button:hover {
            background-color: #6C4AB6;
             color: white;
        }

        th{
            background-color: #6C4AB6;
            color:white;
        }
    </style>
</head>

<body style="background-color: #d5beff;background-image: radial-gradient(circle, white, #D5BEFF);">
    <?php
  include 'config.php';
  $sql = "SELECT * FROM users"; 
  $result = mysqli_query($conn, $sql);
  ?>

    <?php
  include 'navbar.php';
  ?>

    <div class="container">
        <h2 class="text-center pt-4" style="color:black;">Our Customers</h2>
        <br>
        <div class="row">
            <div class="col">
                <div class="table-responsive-sm">
                    <table class="table table-hover table-sm table-striped table-condensed" style="border:5px #C3A7F6 solid;">
                        <thead style=" background-color: #6C4AB6;
            color:white;">
                            <tr>
                                <th scope="col" class="text-center py-2">Id</th>
                                <th scope="col" class="text-center py-2">Name</th>
                                <th scope="col" class="text-center py-2">Account No.</th>
                                <th scope="col" class="text-center py-2">Balance</th>
                                <th scope="col" class="text-center py-2">Operation</th>
                            </tr>
                        </thead>


                        <tbody>
                            <?php
        while ($rows = mysqli_fetch_assoc($result)) {
        ?>
                            <tr style="color:black;">
                                <td class="py-2">
                                    <?php echo $rows['id'] ?>
                                </td>
                                <td class="py-2">
                                    <?php echo $rows['name'] ?>
                                </td>
                                <td class="py-2">
                                    <?php echo $rows['account'] ?>
                                </td>
                                <td class="py-2">
                                    <?php echo $rows['balance'] ?>
                                </td>
                                <td><a href="userDetails.php?id=<?php echo $rows['id']; ?>"><button type="button">Send Money</button>
                            </tr>

                            <?php
        }
        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center mt-5 py-2">
        <p>&copy 2022.<b>Sparks Bank</b><br>Banking Foundation</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>

</body>

</html>
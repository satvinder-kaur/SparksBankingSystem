<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transaction History</title>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <style>
        *{
            font-size:1rem;
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        </style>
</head>

<body style="background-color:#E2FFFF;background-image: radial-gradient(circle, white, #E2FFFF);font-size:1rem;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
    <?php
  include 'navbar.php'
      ?>

    <div class="container">
        <h2 class="text-center pt-4" style="color:#B983FF;font-family:arial 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">Transaction History</h2>
        <br>
        <div class="row">
            <div class="col">
                <div class="table-responsive-sm">
                    <table class="table table-hover table-sm table-striped table-condensed" style="border: 2px #94DAFF solid;">
                        <thead style="color:white;background-color:#6995FF">
                            <tr style="border: 2px #94DAFF solid;">
                                <th scope="col" class="text-center">S No.</th>
                                <th scope="col" class="text-center">Sender</th>
                                <th scope="col" class="text-center">Receiver</th>
                                <th scope="col" class="text-center">Amount</th>
                                <th scope="col" class="text-center">Date & Time</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            include 'config.php';
                            $sql = "SELECT * FROM transaction ";
                            $query = mysqli_query($conn, $sql);
                            while ($rows = mysqli_fetch_assoc($query)) {
                            ?>
                            <tr style="color:black;">
                                <td class="py-2">
                                    <?php echo $rows['sno'] ?>
                                </td>
                                <td class="py-2">
                                    <?php echo $rows['sender'] ?>
                                </td>
                                <td class="py-2">
                                    <?php echo $rows['receiver'] ?>
                                </td>
                                <td class="py-2">
                                    <?php echo $rows['balance'] ?>
                                </td>
                                <td class="py-2">
                                    <?php echo $rows['datetime'] ?>
                                </td>
                                
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

    <footer class="text-center mt-5 py-2" style="color:#467DFF;">
        <p>&copy 2022.<b>Sparks Bank</b><br>Banking Foundation</p>
    </footer>





    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>
<?php
include 'config.php';
if(isset($_POST['submit'])){

    $from=$_GET['id'];
    $to=$_POST['to'];
    $amount=$_POST['amount'];

    $sql="SELECT * FROM users where id=$from";
    $query=mysqli_query($conn,$sql);
    $sql1=mysqli_fetch_array($query);

    $sql="SELECT * FROM users where id=$to";
    $query=mysqli_query($conn,$sql);
    $sql2=mysqli_fetch_array($query);

    if(($amount)<0){
        echo '<script type="text/javascript">';
        echo 'alert ("Negative values of amount cannot be transferred !!")';
        echo '</script>';
    }

    else if($amount>$sql1['balance']){
        echo '<script type="text/javascript">';
        echo 'alert("Insufficient Balance ! ")';
        echo '</script>';
    }

    else if($amount==0){
        echo '<script type="text/javascript">';
        echo 'alert("Zero values cannot be transferrred !")';
        echo '</script>';
    }

    else{

        $newBalance=$sql1['balance']-$amount;
        $sql="UPDATE users SET balance=$newBalance where id=$from";
        mysqli_query($conn,$sql);

        $newBalance=$sql2['balance']+$amount;
        $sql="UPDATE users SET balance=$newBalance where id=$to";
        mysqli_query($conn,$sql);

        $sender=$sql1['name'];
        $receiver=$sql2['name'];
        $sql = "INSERT INTO `transaction` (`sender`, `receiver`, `balance`, `datetime`) VALUES ( '$sender', '$receiver', '$amount', current_timestamp())";
        $query=mysqli_query($conn,$sql);

        if($query){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Transaction is successful!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>';
        }
        else{
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> We are facing some technical issue and transaction was not successful .We regret the inconvinience caused!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>';
            echo "Transaction not successful due to error --> ".mysqli_error($conn);
        }

        $newbalance=0;
        $amount=0;
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transfer Money</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">

    <style type="text/css">
        *{
            font-size:1 rem;
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        #myBtn{
            color:#4A51FE;
            border:3px #4A51FE solid;
            background:white;
        }

        #myBtn:hover{
            background-color:#4A51FE;
            border:1.5px white solid;
            color:white;
            transition: 1s;
        }
    </style>
</head>

<body style="background-color:#9CD2FF;background-image: radial-gradient(circle,#9cd2ff,white);">
    <?php
  include 'navbar.php'
      ?>

     <div class="container">
        <h2 class="text-center pt-4" style="color:#4A51FE;">Transaction</h2>
        <?php 
        include 'config.php';
        $sid=$_GET['id'];
        $sql="select * from users where id=$sid";
        $result=mysqli_query($conn,$sql);
        if(!$result){

            echo 'Error : '.$sql.'<br>'.mysqli_error($conn);
        }

        $rows=mysqli_fetch_assoc($result);
        
    ?>

    <form method="post" name="tcredit" class="tabletext">
        <br>
    <div><label style="color:black;"><b>Transfer from : </b></label>
        <table class="table table-striped table-condensed table-bordered" style="border: 2px #9CCDF7 solid ;">
  <thead>
    <tr style="color:black;">
      <th class="text-center">Id</th>
      <th class="text-center">Name</th>
      <th class="text-center">Account No.</th>
      <th class="text-center">Balance</th>
    </tr>
  </thead>

  <tr>
      <td class="py-2"><?php echo $rows['id']?></td>
      <td class="py-2"><?php echo $rows['name']?></td>
      <td class="py-2"><?php echo $rows['account']?></td>
      <td class="py-2"><?php echo $rows['balance']?></td>
    </tr>
        </table>
    </div>
    <br><br><br>
    <label style="color:black;"><b>Transfer to : </b></label>
    <select name="to" class="form-control" required>  
        <option value="" disabled selected>Choose</option>
        <?php 
        include 'config.php';
        $sid=$_GET['id'];
        $sql="SELECT * FROM users WHERE id!=$sid";    //displaying options of the dropdown
        $result=mysqli_query($conn,$sql);
        if(!$result){
            echo "Error ".$sql."<br>".mysqli_error($conn);
        }
        while($rows=mysqli_fetch_assoc($result)){
           ?>

        <option class="table" value="<?php echo $rows['id'];?>">
           <?php echo $rows['name'];?>(Balance : <?php echo $rows['balance'];?>)
        </option>

       <?php 
        }
        ?>

        <div>
    </select>
    <br><br>
    <label style="color:black;"><b>Amount:</b></label>
    <input type="number" class="form-control" name="amount" required>
    <br><br>
    <div class="text-center">
    <button class="btn mt-3" name="submit" type="submit" id="myBtn">Transfer</button>
    </div>
    </form>
    </div>
    <footer class="text-center mt-5 py-2">
        <p>&copy 2022.<b>Sparks Bank</b><br>Banking Foundation</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>
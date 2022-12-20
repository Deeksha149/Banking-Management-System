<?php
include 'connection.php';
if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from customers where id=$from";
    $query = mysqli_query($connection,$sql);

    $sql1 = mysqli_fetch_array($query); 

    $sql = "SELECT * from customers where id=$to";
    $query = mysqli_query($connection,$sql);
    if (!$query) {
          printf("Error: %s\n", mysqli_error($connection));
          exit();
            
  }
    $sql2 = mysqli_fetch_array($query);



    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  
        echo '</script>';
    }


  
    else if($amount > $sql1['balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")'; 
        echo '</script>';
    }
    


    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
                $newbalance = $sql1['balance'] - $amount;
                $sql = "UPDATE customers set balance=$newbalance where id=$from";
                mysqli_query($connection,$sql);
             
                $newbalance = $sql2['balance'] + $amount;
                $sql = "UPDATE customers set balance=$newbalance where id=$to";
                mysqli_query($connection,$sql);
                
                $sender = $sql1['name'];
                $receiver = $sql2['name'];
                $sql = "INSERT INTO transfers(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($connection,$sql);

                if($query){
                     echo "<script> alert('Transaction Successful');
                                     window.location='transfer.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel='icon' href='favicon.ico' type='image/x-icon'/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Basic banking system</title>
    <style>
    .btn {
    color:black;
    border:2px black solid;  
    }

    .div1{
    margin-left: 200px;
    margin-right: 200px;
    
    
    }
    .card{
      margin-left:200px;
      margin-right:200px;
      height:500px;
    }
    .l1{
      padding-left:100px;
    }
   
    @media  only screen and (max-width:720px) and (min-width:320px){
     
    .div1{
    margin-left: 0px;
    margin-right: 0px;
    margin-top: -400px;
    }
    .card{
      margin-left:0px;
      margin-right:0px;
      height:500px;
    }
    .l1{
      padding-left:0px;
    }
    .scroll1{
    height:500px;
    overflow: scroll;
}
    }

    </style>
  </head>
  <body bgcolor=#8080df>


  <?php
    include 'header.php';
    ?>

      <div class="l1" >
      
<div class="card" >
<div class="card-body">

<h1 style="text-align:center;">TRANSACTION</h1>

<?php
                include 'connection.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  customers where id=$sid";
                $result=mysqli_query($connection,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($connection);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>

<form method="post" name="tcredit" class="tabletext" >
<div class="scroll1">
<table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">BALANCE</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <td><?php echo $rows["id"]?></td>
      <td><?php echo $rows["name"]?></td>
      <td><?php echo $rows["email"]?></td>
      <td><?php echo $rows["balance"]?></td>
    </tr>
  </tbody>
</table>
</div>
<br>


<div class="div1">
Transfer To:
<?php

?>

<select name="to" class="form-select" aria-label="Default select example"  style="background-color:#212529;color:white;" required>
<option disabled selected ></option>
<?php
include 'connection.php';

$query = "SELECT * FROM customers";
$query_run = mysqli_query($connection,$query);

if($query_run)
{
  foreach($query_run as $row)
  {
?>
<option  style="margin:10px" value="<?php echo $row["id"]; ?>">

<?php echo $row["name"];?> 
  [ Balance : <?php echo $row["balance"];?> ]

</option>

<?php
      }
    }
    else
    {
      echo "No record found";
    }

    ?>  
</select>
<br>
Amount
<input type="number" name="amount" class="form-control" id="exampleFormControlInput1" placeholder="999999" style="background-color:#212529;color:white;" required>
<br>
<center><button  type="submit" name="submit" class="btn btn-outline-success" >Transfer credits</button></center>

</div>
</form>
</div>
</div>
</div>
    
    <hr/ style="color:white;height:5px">

    <div class="footer">
        This project is made by <span style="font-weight: 500;margin-left:0px;font-size:20px;color:red;">Subhram </span>#2021.
        <br>
        <br>
      THE SPARKS FOUNDATION
      <br>
      <br>
      <br>
  </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

  </body>
</html>
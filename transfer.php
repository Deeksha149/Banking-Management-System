<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Basic banking system</title>
  </head>
  <body bgcolor=#8080df>
  <?php
    include 'header.php';
    ?>
      <div class="l1">


    <div class="card" style="margin: 70px;">
      <?php
      include 'connection.php';

      $query = "SELECT * FROM transfers";
      $query_run = mysqli_query($connection,$query);

      ?>
<div class="scroll">
<table class="table">
  <thead>
    <tr>
      <th scope="col">SL.NO</th>
      <th scope="col">SENDER</th>
      <th scope="col">RECEIVER</th>
      <th scope="col">AMOUNT TRANSFER</th>
      <th scope="col">DATE & TIME</th>
    </tr>
  </thead>
  <tbody >

  <?php

if($query_run)
{
  foreach($query_run as $row)
  {
?>
    <tr>
    <td><?php echo $row["sno"]?></td>
      <td><?php echo $row["sender"]?></td>
      <td><?php echo $row["receiver"]?></td>
      <td><?php echo $row["balance"]?></td>
      <td><?php echo $row["datetime"]?></td>
    </tr>
<?php
  }
}
?>

  </tbody>
</table>
</div>
</div>
      </div>
    <hr/ style="color:white;height:5px">
    <div class="footer">
        THIS PROJECT IS MADE BY ME <span style="font-weight: 500;margin-left:0px;font-size:20px;color:red;">ANSHU </span>#2021.
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
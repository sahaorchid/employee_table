<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- external CSS -->
    <link rel="stylesheet" href="index.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title> Employees Table</title>
  </head>
  <body>
    <div class="container">

      <h1 id="heading">Employees Table</h1>
    </div>
    <div class="container">
      <button class="open-button" onclick="openForm()">Add</button>
    </div>



    <div class="form-popup" id="myForm">
    <form class="form-container" method="post">
        <h4 class="hp">Add Employee</h4>

        <label for="Name"><b>Name</b></label>
        <input type="text" placeholder="Enter Name" name="Name" required>
        
        <label for="Designation"><b>Designation</b></label>
        <input type="text" placeholder="Enter Designation" name="Designation" required>

        <label for="address"><b>Address</b></label>
        <input type="text" placeholder="Enter Address" name="Address" required>
        
        <label for="Phone"><b>Phone</b></label>
        <input type="number" placeholder="Enter Phone" name="Phone" required>

        <button type="submit" class="btn">Add</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
    </form>
    </div>


    <div class="container">
      <table class="table table-striped" id="table">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Designation</th>
                <th scope="col">Address</th>
                <th scope="col">Phone</th>
              </tr>
            </thead>

      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <!-- external JS -->
      <script src="index.js"></script>
      
        <?php
          $servername="localhost";
          $username="root";
          $password="";
          $database="employee";
          $con=mysqli_connect($servername,$username,$password,$database);
          if(!$con){
          echo"your connection is failed".mysqli_connect_erroe();
          }
          if($_SERVER['REQUEST_METHOD']=='POST'){
              $name=$_POST['Name'];
              $designation=$_POST['Designation'];
              $address=$_POST['Address'];
              $phone=$_POST['Phone'];
            $sql="INSERT INTO `employees` (`name`, `designation`, `address`, `phone`) VALUES ( '$name', '$designation', '$address', '$phone')";
            $result=mysqli_query($con,$sql);
            if(!$result){
              echo"not succesfully entered";   
            }
          }
      ?>
      <?php

      //fetch data from database
      
      $sql="SELECT * FROM `employees`";
      $result=mysqli_query($con,$sql);
      $num=mysqli_num_rows($result);
          while($rows=mysqli_fetch_assoc($result)){
              
              //show data
              
              echo"
              <tbody>".
                  "<tr>".
                  "<th scope="."row".">".$rows['name']."</th>".
                  "<td>".$rows['designation']."</td>".
                  "<td>".$rows['address']."</td>".
                  "<td>".$rows['phone']."</td>".
                  "</tr>".
              "</tbody>";
              }
      ?> 
      </table> 
    </div> 
    
</body>
</html>

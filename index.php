<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Forms</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>HTML FORM</h1>
    <div class="container">
        <form action="connect.php" method="post">
    <div>
    <label for="name">Name</label>
    <input type="text" name="name" placeholder="Enter your name" required>
    </div>    

    <div>
    <label for="email">Email</label>
    <input type="email" name="email" placeholder="Enter your email" required>
    </div>
    
    <div class="genderContainer">
    <label for="gender">Gender</label>
    <input class="gender1" type="radio" name="gender" value="m">Male
    <input class="gender1" type="radio" name="gender" value="f">Female
    <input class="gender1" type="radio" name="gender" value="o">Others
    </div>

    <div>
    <label for="mobile">Mobile</label>
    <input type="text" name="mobile" placeholder="Enter your mobile" required>
    </div>

    <div>    
    <label for="password">Password</label>
    <input type="password" name="password" placeholder="Enter your password" required>
    </div>
     
    <div class="btn">
        <button type="submit">Submit data</button>
    </div>
    
    </form>
    </div>
    <br><br><br>

    <div class="info">
        <!--Create a button called 'View Info' inside a form element and set the action to this same page-->
        <form action="" method="post"><button name="submit" type="submit">View Info</button></form>
    </div>

</body>
<div class="final">
    <style>
        #results{
            border: 2px solid black;
            width: 1000px;
            margin-left: 17%;
        }
        #results th, #results td{
            border: 2px solid black;
        }
    </style>
    <br>




<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //1. Establish a connection to the database 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "form";

    //Create connection
    $conn= new mysqli($servername, $username, $password, $dbname);

    //Check connection
    if ($conn->connect_error) {
        die("Connection failed :" .$conn->connect_error);
    }

    //Create a SELECT Query to select all database records from our database table 'data'
    $sql = "SELECT id, name, email, gender, mobile, password FROM data";
    $result = mysqli_query($conn,$sql);

    //Display the results in a table
    echo "<h2>READ</h2>";
    if ($result->num_rows >0){
        echo "<table id='results'>
        <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Mobile</th>
        <th>Password</th>
        <th>Action</th>
        </tr>";
        //output data of each row
        while($row= $result->fetch_assoc()){
            echo "<tr>
            <td>".$row["name"]."</td>
            <td>".$row["email"]."</td>
            <td>".$row["gender"]."</td>
            <td>".$row["mobile"]."</td>
            <td>".$row["password"]."</td>
            <td><a href='update.php?uid=".$row["id"]."'>Edit</a></td>
            </tr>";
        }
        echo "</table";
    } else {
        echo "0 results";
    }
    $conn->close();
    
}
?>
</div>
</html>

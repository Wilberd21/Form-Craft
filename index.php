
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

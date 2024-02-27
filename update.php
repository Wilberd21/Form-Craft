<?php
if(ISSET($_GET['id'])){
    $dataID = $_GET['id'];

//echo "Data ID: ".$id;
$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "data";

//Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//Check connection
if ($conn->connect_error) {
    die("Connection failed : " .$conn->connect_error);
}

//Select user data from the database where the 'id' matches the $dataID variable value
$sql = "SELECT Name, Email, Gender, Mobile, Password FROM data WHERE
id='$dataID'";
$result = mysqli_query($conn, $sql);
if ($result->num_rows >0) {
    while($row = $result->fetch_assoc()){
        $name = $row["Name"];
        $email = $row["Email"];
        $gender = $row["Gender"];
        $mobile = $row["Mobile"];
        $password = $row["Password"];
    }
}
}
//Create a form that submits data in this same page for the fields and set the input 'value' to the field values
?>
<form action="" method="post">
<label for="name">Name</label>
    <input type="text"  value="<?php echo $name; ?>" name="name">
    </div>    

    <div>
    <label for="email">Email</label>
    <input type="email" value="<?php echo $email; ?>" name="email">
    </div>
    
    <div class="genderContainer">
    <label for="gender">Gender</label>
    <input class="gender1" type="radio" name="gender" value="m">Male
    <input class="gender1" type="radio" name="gender" value="f">Female
    <input class="gender1" type="radio" name="gender" value="o">Others
    </div>

    <div>
    <label for="mobile">Mobile</label>
    <input type="text"  value="<?php echo $mobile; ?>" name="mobile">
    </div>

    <div>    
    <label for="password">Password</label>
    <input type="password" value="<?php echo $password; ?>" name="password">
</form>


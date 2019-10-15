<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "root", "db_nomobo");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$email = mysqli_real_escape_string($link, $_REQUEST['email']);

// Validate email 
if (filter_var($email, FILTER_VALIDATE_EMAIL)) { 
    echo(""); 
}  
else { 
    die("Email is not a valid email address"); 
} 
 
// Attempt insert query execution
$sql = "INSERT INTO Singnup (email) VALUES ('$email')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
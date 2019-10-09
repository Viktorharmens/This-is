<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>This ADE</title>
    <link href="dist/main.css" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="js/countdown.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Raleway:400,700&display=swap" rel="stylesheet">
</head>
<body>

<?php
// define variables and set to empty values
$emailErr = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<div class="wrapper">

    <div class="video">
            <iframe src="https://player.vimeo.com/video/338657694?loop=1&autoplay=1?background=1" width="100%" height="600" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
    </div>

    <div class="count_down" id="countdown"></div>

    <div class="signup">
        <p>“Remind me for the final countdown”</p>
        <form method="post" action="insert.php">
            <input type="text" class="email" name="email" placeholder="My e-mail address" value="<?php echo $email;?>"><span class="error"><?php echo $emailErr;?></span>
            <input type="submit" name="submit" value="Submit" class="submit"> 
        </form>
    </div>

    <?php
    echo $email;
    ?>

</div>
    
</body>
</html>

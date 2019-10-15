<!DOCTYPE >
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <!--AJAX-->
        <script>
            $(document).ready(function() {
                $("#form-signup").submit(function(e) {
                    e.preventDefault();
                    $.ajax( {
                        
                        url: "insert.php",
                        method: "post",
                        data: $("form").serialize(),
                        dataType: "text",
                        success: function(strMessage) {
                            $(".message").text(strMessage);
                            $("#form-signup")[0].reset();
                        }
                    });
                });
            });
        </script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-150075064-1"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-150075064-1');
        </script>
        <!-- Facebook Pixel Code -->

        <script>
          !function(f,b,e,v,n,t,s)
          {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
          n.callMethod.apply(n,arguments):n.queue.push(arguments)};
          if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
          n.queue=[];t=b.createElement(e);t.async=!0;
          t.src=v;s=b.getElementsByTagName(e)[0];
          s.parentNode.insertBefore(t,s)}(window,document,'script',
          'https://connect.facebook.net/en_US/fbevents.js');

          fbq('init', '969365140070346'); 
          fbq('track', 'PageView');
        </script>

        <noscript>
        <img height="1" width="1" src="https://www.facebook.com/tr?id=969365140070346&ev=PageView&noscript=1"/>
        </noscript>

<!-- End Facebook Pixel Code -->
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
      <div class="video__overlay"></div>
        <video width="100%" height="auto" autoplay loop muted playsinline> 
          <source src="img/thisis.mp4" type="video/mp4">
          Your browser does not support the video tag.
        </video>
    </div>

    <div class="count_down" id="countdown"></div>

    <div class="signup">
        <p>Remind me for the final countdown</p>
        <form method="post" action="insert.php" id="form-signup" class="form">
            <input type="email" class="email" name="email" placeholder="My e-mail address" value="<?php echo $email;?>"><span class="error"><?php echo $emailErr;?></span>
            <input type="submit" name="submit" value="Submit" class="submit"> 
        </form>
    </div>

  <div class="message"></div>

</div>
    
</body>
</html>

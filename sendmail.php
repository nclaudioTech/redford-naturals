<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="description" content="Example contact form">
    <meta name="keywords" content="VICOM-128, HTML Contact Form">
	<title>Contact Form</title>
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="stylesheet" href="styles/normalize.css">
	<link rel="stylesheet" href="styles/contact.css">
    <link rel="stylesheet" href="styles/slicknav.css"	
</head>

<body>
    <header>
<!--      <nav id="mobile"></nav>-->
       <div class="container">
           <div class="hero-image">
               
               <nav class="nav_bar">
            <ul>
                <li class="current"><a href="index.html" class="current">Home</a></li>
                <li><a href="">Dog</a>
                    <ul>
                        <li><a href="drydog.html">Dry</a></li>
                        <li><a href="wetdog.html">Wet</a></li>
                        <li><a href="dogtreats.html">Treats</a></li>
                    </ul>
                </li>
                <li><a href="" class="lastItem">Cat</a>
                    <ul>
                        <li><a href="drycat.html">Dry</a></li>
                        <li><a href="wetcat.html">Wet</a></li>
                    </ul>
                </li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
                </nav>
           </div>
       </div>     
    </header>


<h1>Email Confirmation</h1>    
<!--    <section id="form">-->
<section id="form">
<!--	<form action="sendmail.php" method="post" name="contact_form" id="contact_form">-->
		<fieldset id="contact_form">
        	<legend>Contact Information</legend>
<!--            <label for="first_name">First Name:</label>-->
			<input type="text" name="first_name" class="contact-info" id="first_name" value="<?php echo $_REQUEST['first_name'] ?>" disabled><br>
<!--			<label for="last_name">Last Name:</label>-->
			<input type="text" name="last_name" class="contact-info" id="last_name" value="<?php echo $_REQUEST['last_name'] ?>" disabled><br>
<!--        	<label for="email">Email Address:</label>-->
        	<input type="email" name="email" class="contact-info" id="email" value="<?php echo $_REQUEST['email'] ?>" disabled><br>
<!--        	<label for="verify">Verify Email:</label>-->
        	<input type="email" name="verify" class="contact-info" id="verify" value="<?php echo $_REQUEST['email'] ?>" disabled><br>
<!--			<label for="phone">Phone Number:</label>-->
			<input type="tel" name="phone" class="contact-info" id="phone" value="<?php echo $_REQUEST['phone'] ?>" disabled><br>
		</fieldset>
		<fieldset>
		<legend>Message Information</legend>
			<label for="reservation_date">Today's Date:</label>
			<input type="date" name="reservation_date" id="reservation_date" value="<?php echo $_REQUEST['reservation_date'] ?>" disabled><br>
			<?php echo $_REQUEST['subject'] ?>
			<label for="message">Message: </label>
			<textarea id="message" name="message" rows="4" disabled>
			    <?php echo $_REQUEST['message'] ?>
			</textarea>
		</fieldset>  
</section>

<!-- This entire script, including the opening and closing ?php tags, can be nested inside of any other tag, such as div or p, to control positioning and formatting of confirmation message spit out by the email script -->
<h1>
<?php
  if (isset($_REQUEST['email'])) { //if "email" variable is filled out, send email
  
  //Set admin email for email to be sent to (use you own MATC email address)
    $admin_email = "claudion@gmatc.matc.edu"; 

  //Set PHP variable equal to information completed on the HTML form
    $email = $_REQUEST['email']; //Request email that user typed on HTML form
    $phone = $_REQUEST['phone']; //Request phone that user typed on HTML form
    $reservation_date = $_REQUEST['reservation_date']; //Request subject that user typed on HTML form
    $subject = $_REQUEST['subject']; //Request subject that user typed on HTML form
    $message = $_REQUEST['message']; //Request message that user typed on HTML form
  //Combine first name and last name, adding a space in between
    $name = $_REQUEST['first_name'] . " " .  $_REQUEST['last_name']; 
            
  //Start building the email body combining multiple values from HTML form    
    $body  = "From: " . $name . "\n"; 
    $body .= "Email: " . $email . "\n"; //Continue the email body
    $body .= "Phone: " . $phone . "\n"; //Continue the email body
    $body .= "Reservation Date: " . $reservation_date . "\n"; //Continue the email body
    $body .= "Message: " . $message; //Continue the email body
  
  //Create the email headers for the from and CC fields of the email     
    $headers = "From: " . $name . " <" . $email . "> \r\n"; //Create email "from"
    $headers .= "CC: " . $name . " <" . $email . ">"; //Send CC to visitor
    
  //Actually send the email from the web server using the PHP mail function
  mail($admin_email, $subject, $body, $headers); 
    
  //Display email confirmation response on the screen
  echo "Thank you for contacting us!"; 
  }
  
  //if "email" variable is not filled out, display an error
  else  { 
     echo "There has been an error!";
        }
?>

</h1>
    <footer>
        <p>&copy; 2020 | Site by Nicholas Claudio | WEBDEV - 114</p>
        <nav>
            <ul>
                <li>
                   <a href="https://www.facebook.com/pspgreenfield/"><img src="images/facebook-logo.png" alt="" height="25" width="25"></a>
                </li>                
                <li>
                   <a href="https://twitter.com/petsuppliesplus?lang=en"><img src="images/twitter-logo.png" alt="" height="25" width="25"></a>
                </li>
                <li>
                    <a href="https://www.instagram.com/petsuppliesplus/?hl=en"><img src="images/instagram-logo.png" alt="" height="25" width="25"></a>
                </li>
            </ul>
        </nav>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="jquery.slicknav.js"></script>
    <script>
        $('.nav_bar').slicknav();
    </script>  
</body>
</html>
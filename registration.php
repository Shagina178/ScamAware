<!--Registration form-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles.css" rel="stylesheet">
    <title>Register</title>
</head>
<body>
    <div class="container-wrapper">
    <div class="video-section">
        <video autoplay muted loop>
        <source src="videos/registerVideo.mp4" type="video/mp4">
        Your browser does not support the video tag.
        </video>
    </div>

    
<div class="form-section">
    <div class="container">
        <h1>Register</h1>
        <p>Please fill in this form to create an account.</p>
       
        <form action="registration.php" method="post">
      <label for="name"><b>Name</b></label>   
      <input type="text" name="name">
     <br>

      <label for="surname"><b>Surname</b></label> 
      <input type="text" name="surname">
     <br>

      <label for="email"><b>Email</b></label> 
      <input type="email" name="email">
      <br>

      <label for="phoneNumber"><b>Phone Number</b></label> 
      <input type="tel" name="phoneNumber">
     <br>
      
      <label for="password"><b>Password</b></label> 
      <input type="password" name="password" >
      <br>
     
      <label for="passwordConfirmation"><b>Confirm password</b></label> 
      <input type="password" name="passwordConfirmation">
      <br>
    
      <button type="submit" class="regButton">Submit</button>
   

    <div class="container-register">
        <p>Already have an account? <a href="login.php">Sign in</a>.</p>
    </div>
    </form>
    </div>
</div>
</div>
</body>
</html>
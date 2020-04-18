<!DOCTYPE html>
<html>
    
    <link rel="stylesheet" type="text/css" href="css/contact_style.css"/>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" charset = "utf-8">
        

        
              <title> Contact Form </title>
        
                
        
    </head>
    
          <body>
              <div class="topnav">
            <a href="homepage.php">Home</a>
            <a href="login_options.php">Login</a>
            <a href="contact_form.php">Contact</a>
            <a href="about_us.php">About</a>
                </div>
            
            <h1 id="heading">UH Medical Clinic</h1>
                
                
            <h2>Contact Us</h2>
            
              
            
            
              <div class="container">
            <form action = "contact_form.php">
                
                <p><label for="fname">First Name</label></p>
                <input type = "text" id="fname" name = "firstname" placeholder = "First Name">
                <p><label for="lname">Last Name</label></p>
                <input type = "text" id="lname" name = "lastname" placeholder = "Last Name">
                <p><label for="pnumber">Phone Number</label></p>
                <input type ="tel" id="phone" name="phonenumber" placeholder = "Phone Number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
                
                <p><label for="email">Email Address</label></p>
                <input type = "text" id=email name = "email" placeholder = "Your E-mail...">
                
                <p><label for="Comments">Comments</label></p>
                <textarea id="Comments" name="Comments" placeholder="Comments" style="height:100px"></textarea>
                <button type = "submit" name "Submit">SEND</button>
                
            </form>
              </div>
                
            
    </body>
    
</html>


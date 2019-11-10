<link rel="stylesheet" type="text/css" href="register.css"/>

<form action="BDD_inscription.php" method  ="POST" enctype="application/x-www-form-urlencoded" style="border:1px solid #ccc">
<div class="bg-img">
  
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="Name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" required>

    <label for="Surname"><b>Surname</b></label>
    <input type="text" placeholder="Enter Surname" name="surname" required>

    <label for="location"><b>CESI Academy</b></label>
    <input type="text" placeholder="Enter location of your CESI" name="location" required>

    <label for="mail"><b>E-mail</b></label>
    <input type="text" placeholder="Please enter your email" name="mail"  required>

    <label for="psw"><b>Put Password</b></label>
    <input type="password" placeholder="Write down your password" name="psw" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat your password" name="psw-repeat" required>

    <label>
      <input type="checkbox" checked="" name="accept" required> Accept Customers Terms & Privacy
    </label>
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
    <button type="button" onclick="history.back()" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</div>
</form>
</div>

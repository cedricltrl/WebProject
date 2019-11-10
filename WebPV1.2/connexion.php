<link rel="stylesheet" type="text/css" href="connexion.css"/>
<div class="all" id="corps">
  <div class="container">
      <section>
      <div id="container">
        <div id="wrapper">
          <div id="login" class="animate form">
          <div class="bg-img">
                <form action="checkConnection.php" method="post">
               
                  <div class="imgcontainer">
                    <img src="Image/man_and_woman.jpg" alt="Avatar" class="avatar">
                  </div>

                  <div class="container">
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="uname" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>

                    <button type="submit">Login</button>
                    <label>
                      <input type="checkbox" checked="" name="remember"> Remember me
                    </label>
                  </div>

                  <div class="container" style="background-color:#f1f1f1">
                  <div class="clearfix">
                    <button type="button" onclick="history.back()" class="cancelbtn">Cancel</button>
                    <span class="psw"><a href="#">Forgot password ?</a></span>
                  </div>
                </div>
              </form>
          </div>
        </div>
      </div>
      </section>
  </div>
</div>

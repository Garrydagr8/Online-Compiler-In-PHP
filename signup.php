<html>
<head>
<title>Sign up</title>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
</style>
<link rel = "stylesheet" href = "signupcss.css">

<body background="g.jpg">



  <?php

	if(isset($_POST['submit1'])){
		$conn = mysqli_connect("localhost", "shreyansh", "1234", "onlinecompiler");
  	    $txt1=$_POST['email'];
  	    $txt2=$_POST['password'];
        $txt3=$_POST['name'];
		$txt4=$_POST['re_password'];
		$result=mysqli_query($conn,"SELECT * FROM login_info where Username='$txt1'");

		if(mysqli_num_rows($result)!= 0){
			$message = "Username already exists";
            echo "<script>alert('$message');</script>";

        }
		else if(strcmp($txt2,$txt4)!=0){
			$mg1="re-typed password doesn\'t match";
			echo "<script>alert('$mg1');</script>";
		}
		else if(!isset($_POST['agree-term'])){
			$mg="Please accept terms and conditions";
	        echo "<script>alert('$mg');</script>";
		}
		
		else{
        mysqli_query($conn, "INSERT INTO login_info (Username, password, name) VALUES ('$txt1', '$txt2', '$txt3')");
		}
		mysqli_close($conn);

	}


?>
  <nav class="navbar">
  <div class="container">
    <ul>
      <li>
    <a href="home.html"><b>CODIFY</b></a>
  </li>
</ul>
    <div>
      <ul>
        <li>
        <a href="home.html">Home</a>
      </li>
        <li>
          <a href="signup.php">Signup</a>
        </li>
        <li>
          <a href="online compiler.php">Login</a>
        </li>
        <li>
          <a href="compiler.php">Compiler</a>
        </li>

  </ul>
    </div>
  </div>
</nav>


<div class="container">
              <div class="signup-content">
                  <form method="POST" action="signup.php" id="signup-form" class="signup-form">
                      <h2>Create account</h2>
                      <div class="form-group">
                          <input type="text" class="form-input" name="name" id="name" placeholder="Your Name" required/>
                      </div>
                      <div class="form-group">
                          <input type="email" class="form-input" name="email" id="email" placeholder="Your Email" required/>
                      </div>
                      <div class="form-group">
                          <input type="password" class="form-input" name="password" id="password" placeholder="Password" required/>

                      </div>
                      <div class="form-group">
                          <input type="password" class="form-input" name="re_password" id="re_password" placeholder="Repeat your password" required/>
                      </div>
                      <div class="form-group">
                          <input type="checkbox" name="agree-term" id="agree-term" />
                          <label for="agree-term"><span><span></span></span>I agree all statements in  <a href="#">Terms of service</a></label>
                      </div>
                      <div class="form-group">
                          <input type="submit" name="submit1" id="submit" class="form-submit" value="Sign up"/>
                      </div>
                  </form>
                  <p>
                      Have already an account ? <a href="online compiler.php">Login here</a>
                  </p>
              </div>
</div>
</body>
</head>
</html>

<html>
<head>
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
<title>Sign in</title>
<link rel = "stylesheet" href = "signupcss.css">
<body background="ge.jpg">
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
<?php
if(isset($_POST['submit']))
{
	$conn = mysqli_connect("localhost", "shreyansh", "1234", "onlinecompiler");
	$txt1=$_POST['username'];
	$txt2=$_POST['password'];
	$result=mysqli_query($conn, "SELECT * FROM login_info where Username='$txt1'");

	if(mysqli_num_rows($result)!= 0)
	{
		$result1=mysqli_query($conn,"SELECT Password FROM login_info where Username='$txt1'");
	    $row=mysqli_fetch_array($result1);
		$p=$row['Password'];
		if($p==$txt2){
		header("location:compiler.php");
		}
		else{
		$message = "incorrect password";
        echo "<script>alert('$message');</script>";
		}
	}
	else if(mysqli_num_rows($result)== 0){
		$message1 = "username does not exists";
        echo "<script>alert('$message1');</script>";
	}
	mysqli_close($conn);
}
?>



<div class="container">
              <div class="signup-content">
                  <form method="POST" id="signup-form" class="signup-form">
                      <h2>Login</h2>
                      <div class="form-group">
                          <input type="text" class="form-input" name="username" id="name" placeholder="User Name" required/>
                      </div>
                      <div class="form-group">
                          <input type="password" class="form-input" name="password" id="password" placeholder="Password" required/>
                      </div>


                      <div class="form-group">
                          <input type="submit" name="submit" id="submit" class="form-submit" value="Sign in"/>
                      </div>
                  </form>
                  <p>
                      Not a Member ? <a href="signup.php">Sign up now</a>
                  </p>
              </div>
</div>
</body>
</head>
</html>

<?php
  session_start();
  $title = "Sign In";
	include("./template/header.php");
?>

	<div class="container">
        <div class="starter-template">
            <h1 class="text-info">SIGN IN</h1>
            <p class="lead">Please enter your name, user ID, and password and click Register</p>
			<?php
				if(isset($_SESSION["errmsg"])){
					if($_SESSION["errmsg"] == 1){
			?>
				<h5 class="text-danger">A Email is required!</h5>
				<h5 class="text-danger">Please RE-enter your name, userID, password and click Register.</h5>
			<?php
					}
					elseif($_SESSION["errmsg"] == 2){
			?>
				<h5 class="text-danger">A Password is required!</h5>
        <h5 class="text-danger">Please RE-enter your name, userID, password and click Register.</h5>
			<?php
					}
          $_SESSION["errmsg"] = NULL;
				}
			?>    
            <!-- div class to make form smaller -->
            <div class="col-md-4"></div>

            <form action="./validation/verify.php" method="post" class="form-horizontal col-md-4">
                <div class="form-group">
                  	<label class="control-label col-sm-3"for="user_email">Email:</label>
                  	<div class="col-sm-9">
                    	<input type="email" class="form-control" id="user_email" name="user_email" placeholder="Email">
                  	</div>
                  	<br/>
                </div>
                <div class="form-group">
                  	<label class="control-label col-sm-3" for="user_password">Password:</label>
                  	<div class="col-sm-9">
                    	<input type="password" class="form-control" id="user_password" name="user_password" placeholder="Password">
                  	</div>
                  	<br/>
                </div>
                <input type="submit" class="btn btn-default" value="Register" name="submit"/>
            </form>

           	<div  class="col-md-4"></div>
        </div>
    </div><!-- /.container -->
    <br/>
    <p class="text-info text-center">All fields are required</p>	

<?php
	include("./template/footer.php");
?>
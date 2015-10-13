<?php
	session_start();
	$title = "Registration";
	include("./template/header.php");
?>

	<div class="container">
        <div class="starter-template">
            <h1 class="text-info">REGISTRATION</h1>
            <p class="lead">Please enter your name, user ID, and password and click Register</p>
			<?php
				if(isset($_SESSION["errmsg"])){
					if($_SESSION["errmsg"] == 1){
			?>
				<h5 class="text-danger">A name is required!</h5>
				<h5 class="text-danger">Please RE-enter your name, userID, password and click Register.</h5>
			<?php
					}
					elseif($_SESSION["errmsg"] == 2){
			?>
				<h5 class="text-danger">A User ID is required!</h5>
        <h5 class="text-danger">Please RE-enter your name, userID, password and click Register.</h5>
			<?php
					}
					elseif($_SESSION["errmsg"] == 3){
			?>
				<h5 class="text-danger">A Password is required!</h5>
        <h5 class="text-danger">Please RE-enter your name, userID, password and click Register.</h5>
			<?php
					}
				}
			?>    
            <!-- div class to make form smaller -->
            <div class="col-md-4"></div>

            <form action="./validation/enterName.php" method="post" class="form-horizontal col-md-4">
                <div class="form-group">
                  	<label class="col-sm-3 control-label" for="name">Name:</label>
                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="user_name" name="user_name" placeholder="Name">
                  	</div>
                </div>
                <div class="form-group">
                  	<label class="control-label col-sm-3"for="email">Email:</label>
                  	<div class="col-sm-9">
                    	<input type="email" class="form-control" id="user_email" name="user_email" placeholder="Email">
                  	</div>
                  	<br/>
                </div>
                <div class="form-group">
                  	<label class="control-label col-sm-3" for="passwd">Password:</label>
                  	<div class="col-sm-9">
                    	<input type="password" class="form-control" id="user_passwd" name="user_passwd" placeholder="Password">
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
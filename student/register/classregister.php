<?php
	$classid = $_GET["recordID"];
	$title = "Class Register";
	require_once("../../validation/doorway.php");
	//Connecto to database
	require_once("../../functions/database.php");
	$connection = connection();

	$query = "SELECT * FROM class WHERE class_id='$classid'";
	$result = mysqli_query($connection, $query);
	if(!$result){
		echo "Query failed! " . mysqli_error();
		exit();
	}
	
	include("../../template/header_sidebar.php");
?>
	<div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
        	<p class="text-info">Go To:</p>
        	<ul class="nav nav-sidebar">
        		<li><a href="../classes.php">Class List</a></li>
        	</ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Class Register</h1>
          <p class="lead text-info">To register for this class, please enter your email address twice and click Continue.</p>

          <table class="table table-striped table-hover ">
			  <thead>
			    <tr class="info">
			      <th>Class ID</th>
			      <th>Class Title</th>
			      <th>Class Start</th>
			      <th>Class Description</th>
			      <th>Class Cost</th>
			      <th>Class Instructor</th>
			    </tr>
			  </thead>
			  <tbody>
			    <?php
			    	$classrow = mysqli_fetch_assoc($result);
			    ?>
			    <tr>
			    	<td><?= $classrow["class_id"]; ?></td>
			    	<td><?= $classrow["class_title"]; ?></td>
			    	<td><?= date('m/d/y', strtotime($classrow["class_start"])); ?></td>
			    	<td><?= $classrow["class_descr"]; ?> &nbsp; </td>
			    	<td>$<?= number_format($classrow["class_cost"], 0, '.', ','); ?></td>
			    	<td><?= $classrow["class_instr"]; ?></td>
			    </tr>
			  </tbody>
			</table> 

			<form action="checkemail.php" method="post" class="form-horizontal col-md-6">
                <input type="hidden" name="classid" value="<?= $classrow['class_id'];?>"/>
                <div class="form-group">
                  	<label class="control-label col-lg-3"for="email">Email:</label>
                  	<div class="col-lg-9">
                    	<input type="email" class="form-control" id="email" name="email">
                  	</div>
                  	<br/>
                </div>
                <input type="submit" class="btn btn-default" value="Register" name="submit"/>
            </form>
        </div>
      </div>
    </div>
	
<?php
	include("../../template/footer_sidebar.php");
?>
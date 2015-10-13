<?php
	$title = "Class List";
  	require_once("../validation/doorway.php");
	//Connect to the ClassRegistration database
	require_once("../functions/database.php");
	$connection = connection();

	// Get records from the class table
	$query = "SELECT * FROM class ORDER BY class_id";
	$result = mysqli_query($connection, $query);
	if(!$result){
		echo "Select from class failed. " . mysqli_error();
		exit();
	}

	include("../template/header_sidebar.php");
?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><p class="text-justified text-primary">Go To:</p></li>
            <li><a href="./add/classentry.php">Enter New Classes</a></li>
            <li class="active"><a href="#">Update &amp; Delete Classes</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Class List</h1>
          <p class="lead text-info">Choose to Update or Delete a class.</p>

          <table class="table table-striped table-hover ">
			  <thead>
			    <tr class="info">
			      <th>Class ID</th>
			      <th>Class Title</th>
			      <th>Class Start</th>
			      <th>Class Description</th>
			      <th>Class Cost</th>
			      <th>Class Instructor</th>
			      <th>&nbsp;</th>
			      <th>&nbsp;</th>
			    </tr>
			  </thead>
			  <tbody>
			    <?php
			    	while($classrow = mysqli_fetch_assoc($result)){
			    ?>
			    <tr>
			    	<td><?= $classrow["class_id"]; ?></td>
			    	<td><?= $classrow["class_title"]; ?></td>
			    	<td><?= date('m/d/y', strtotime($classrow["class_start"])); ?></td>
			    	<td><?= $classrow["class_descr"]; ?> &nbsp; </td>
			    	<td>$<?= number_format($classrow["class_cost"], 0, '.', ','); ?></td>
			    	<td><?= $classrow["class_instr"]; ?></td>
			    	<td><a href="./update/classupdate.php?recordID=<?= $classrow['class_id'];?>">Update</a></td>
			    	<td><a href="./delete/classdelete.php?recordID=<?= $classrow['class_id'];?>">Delete</a></td>
			    </tr>
			    <?php
			    	}
			    ?>
			  </tbody>
			</table> 
        </div>
      </div>
    </div>
<?php
  include("../template/footer_sidebar.php");
?>
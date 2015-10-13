<?php
  $title = "Class Delete";
  require_once("../../validation/doorway.php");

	//Connect to the ClassRegistration database
	require_once("../../functions/database.php");
  $connection = connection();

  $class_id = $_GET["recordID"];

	// Get records from the class table
	$query = "SELECT * FROM class WHERE class_id = $class_id";
	$result = mysqli_query($connection, $query);
	if(!$result){
		echo "Select from class failed. " . mysqli_error();
		exit();
	}

  $classrow = mysqli_fetch_assoc($result);

  include("../../template/header_sidebar.php");
?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><p class="text-justified text-primary">Go To:</p></li>
            <li><a href="../add/classentry.php">Enter New Classes</a></li>
            <li class="active"><a href="../classlist.php">Update &amp; Delete Classes</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Class Delete</h1>
          <p class="lead text-info">If you are sure you want to delete this class, click Delete.</p>
          <!-- Class entry form -->
          <form action="deleteclass.php?recordID=<?= $class_id; ?>" method="post" class="form-horizontal">
            <fieldset>
              <div class="form-group">
                <label for="class_id" class="col-lg-2 control-label">Class ID:</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="class_id" value="<?= $classrow['class_id']; ?>" disabled="">
                </div>
              </div>
              <div class="form-group">
                <label for="class_title" class="col-lg-2 control-label">Class Title:</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="class_title" value="<?= $classrow['class_title']; ?>" disabled="">
                </div>
              </div>
              <div class="form-group">
                <label for="class_start" class="col-lg-2 control-label">Class Start Date:</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="class_start" value="<?= $classrow['class_start']; ?>" disabled="">
                </div>
              </div>
              <div class="form-group">
                <label for="class_descr" class="col-lg-2 control-label">Class Description:</label>
                <div class="col-lg-10">
                  <textarea class="form-control" rows="4" name="class_descr" disabled=""><?= $classrow['class_descr']; ?></textarea>
                  <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
                </div>
              </div>
              <div class="form-group">
                <label for="class_cost" class="col-lg-2 control-label">Class Cost:</label>
                <div class="col-lg-2">
                  <input type="text" class="form-control" name="class_cost" value="<?= $classrow['class_cost']; ?>" disabled="">
                </div>
              </div>
              <div class="form-group">
                <label for="class_instr" class="col-lg-2 control-label">Class Instructor:</label>
                <div class="col-lg-2">
                  <input type="text" class="form-control" name="class_instr" value="<?= $classrow['class_instr']; ?>" disabled="">
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="submit" class="btn btn-primary">Delete</button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>

<?php
  include("../../template/footer_sidebar.php");
?>
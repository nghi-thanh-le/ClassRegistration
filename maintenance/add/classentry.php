<?php
  $title = "Class Entry";
  require_once("../../validation/doorway.php");
  include("../../template/header_sidebar.php");
?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><p class="text-justified text-primary">Go To:</p></li>
            <li class="active"><a href="#">Enter New Classes</a></li>
            <li><a href="../classlist.php">Update &amp; Delete Classes</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Database Entry and Maintenance</h1>
          <p class="lead text-warning">Please enter class information and click Add.</p>
          <?php
            if(isset($_SESSION["errmsg"])){
              if($_SESSION["errmsg"] == 1){
          ?>
            <p class="text-danger">A Class Title is required.</p>
            <p class="text-danger">Please RE-enter class information and click add</p>
          <?php
              }
              elseif($_SESSION["errmsg"] == 2){
          ?>
            <p class="text-danger">A Start Date is required.</p>
            <p class="text-danger">Please RE-enter class information and click add</p>
          <?php
              }
              elseif($_SESSION["errmsg"] == 3){
          ?>
            <p class="text-danger">A Class Description is required.</p>
            <p class="text-danger">Please RE-enter class information and click add</p>
          <?php
              }
              elseif($_SESSION["errmsg"] == 4){
          ?>
            <p class="text-danger">A Class Cost is required.</p>
            <p class="text-danger">Please RE-enter class information and click add</p>
          <?php
              }
              elseif($_SESSION["errmsg"] == 5){
          ?>
            <p class="text-danger">An Instructor is required.</p>
            <p class="text-danger">Please RE-enter class information and click add</p>
          <?php
              } else{
                $_SESSION["errmsg"] == NULL;
              }
            }
          ?>

          <form action="addclass.php" method="post" class="form-horizontal">
            <fieldset>
              <div class="form-group">
                <label for="class_title" class="col-lg-2 control-label">Class Title:</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="class_title">
                </div>
              </div>
              <div class="form-group">
                <label for="class_start" class="col-lg-2 control-label">Class Start Date<span style="color: red;">*</span>:</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="class_start">
                </div>
              </div>
              <div class="form-group">
                <label for="class_descr" class="col-lg-2 control-label">Class Description:</label>
                <div class="col-lg-10">
                  <textarea class="form-control" rows="4" name="class_descr"></textarea>
                  <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
                </div>
              </div>
              <div class="form-group">
                <label for="class_cost" class="col-lg-2 control-label">Class Cost:</label>
                <div class="col-lg-2">
                  <input type="text" class="form-control" name="class_cost">
                </div>
              </div>
              <div class="form-group">
                <label for="class_instr" class="col-lg-2 control-label">Class Instructor:</label>
                <div class="col-lg-2">
                  <input type="text" class="form-control" name="class_instr">
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="reset" class="btn btn-default">Cancel</button>
                  <button type="submit" class="btn btn-primary">Add</button>
                </div>
              </div>
            </fieldset>
          </form>
          <p class="text-danger">ALL fields required.<br/>
          *Enter date fields as YYYYMMDD.</p>
        </div>
      </div>
    </div>

<?php
  include("../../template/footer_sidebar.php");
?>
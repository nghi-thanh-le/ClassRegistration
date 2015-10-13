<?php
	$title = "Error";
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
          <h1 class="page-header text-warning">Something wrong happens</h1>
          <p class="lead text-info">Can't find the student email in database. Please try again later!</p>

          
<?php
	include("../../template/footer_sidebar.php");
?>

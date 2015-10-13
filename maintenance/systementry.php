<?php
  $title = "System Entry";
  require_once("../validation/doorway.php");
  include("../template/header_sidebar.php");
?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><p class="text-justified text-primary">Go To:</p></li>
            <li><a href="./add/classentry.php">Enter New Classes</a></li>
            <li><a href="classlist.php">Update &amp; Delete Classes</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Database Entry and Maintenance</h1>
          <p>Hello <?= $name ?></p>
          <p>Please choose the task you want to perform from the menu on the left.</p>
          </div>
        </div>
      </div>
    </div>

<?php
  include("../template/footer_sidebar.php");
?>
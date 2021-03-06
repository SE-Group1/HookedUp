<?php $baseUrl = getClientUrl(); ?>
<nav class="navbar navbar-inverse" style="border-radius:0px">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?= $baseUrl ?>index.php"><img src="<?= $baseUrl ?>logo_white.png" width="112" height="30"></a>
    </div>
    <ul class="nav navbar-nav">
      <?php if($loggedIn) { ?>
        
        <!-- Connections dropdown -->
        <li class="dropdown"><a href="<?= $baseUrl ?>connections/">Connections<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?= $baseUrl ?>connections/">My Connections</a></li>
            <li><a href="<?= $baseUrl ?>connections/visual.php">Comparison</a></li>
          </ul>
        </li>
      
        <!-- Companies dropdown -->
        <li class="dropdown"><a href="<?= $baseUrl ?>companies/">Companies<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?= $baseUrl ?>companies/">Following</a></li>
            <li><a href="<?= $baseUrl ?>companies/create.php">Create a company</a></li>
          </ul>
        </li>

        <!-- Search bar -->
        <div class="pull-left">
          <form class="navbar-form" action="<?= $baseUrl ?>search/" method="GET">
            <div class="input-group">
                <input name="filter" class="form-control" placeholder="Search HookedUp">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>
          </form>
        </div>
      <?php } ?>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <?php if($loggedIn) { ?>
        <li><a href="<?= $baseUrl . "profile/?id=" . getUserId(); ?>"><?= getUserFullName(); ?></a></li>
        <li><a id="logoutButton" href="<?= $baseUrl ?>logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
      <?php } ?>
      <!--<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>-->
    </ul>
  </div>
</nav>
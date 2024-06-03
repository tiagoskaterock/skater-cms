<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
  <div class="container">

    <a class="navbar-brand" href="<?php echo URLROOT ?>">
    	<?php echo SITENAME ?>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav ml-auto mb-2 mb-lg-0">

        <!-- username -->
        <li class="nav-item">
          <span class="nav-link">
            Hello, <?= $_SESSION['user_name'] ?>!
          </span>
        </li>

      	<!-- home -->
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?php echo URLROOT ?>">
          	Home
          </a>
        </li>

        <?php if ( ! isset($_SESSION['user_id'])): ?>
          <!-- about -->
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT ?>/pages/about">
            	About
            </a>
          </li>
        <?php endif ?>

        <?php if ( ! isset($_SESSION['user_id'])): ?>
        	<!-- home -->
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?php echo URLROOT ?>/users/register">
            	Register
            </a>
          </li>       

          <!-- login -->
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT ?>/users/login">
            	Login
            </a>
          </li>          
          
        <?php else: ?>
          <!-- logout -->
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT ?>/users/logout">
              Logout
            </a>
          </li> 
        <?php endif ?>        

      </ul>
      <!-- end right -->

    </div>

  </div>

</nav>

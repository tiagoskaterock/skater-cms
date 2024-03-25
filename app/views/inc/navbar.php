<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
  <div class="container-fluid">

    <a class="navbar-brand" href="<?php echo URLROOT ?>">
    	<?php echo SITENAME ?>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav ml-auto mb-2 mb-lg-0">

      	<!-- home -->
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?php echo URLROOT ?>">
          	Home
          </a>
        </li>

        <!-- about -->
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT ?>/pages/about">
          	About
          </a>
        </li>

      	<!-- home -->
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?php echo URLROOT ?>/users/register">
          	Register
          </a>
        </li>

        <!-- about -->
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT ?>/users/login">
          	Login
          </a>
        </li>

      </ul>
      <!-- end right -->

    </div>

  </div>

</nav>

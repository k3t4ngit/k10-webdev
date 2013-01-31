 <script type="application/javascript">
    
        $("li").click(function()
          {
            $('.active').removeClass('active');
            $(this).addClass('active');
          });
       
      
   
      
    </script>
<div class="navbar  navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
         <!-- <img src="../assets/img/AppBinder_Logo.png"> -->
          <a class="brand" href="login.php">AppBinder </a>
          <div class="nav-collapse collapse">
            <div class="controls pull-right">
              <!-- <a href="login.php" class="btn">Login</a> -->
            </div>
             <ul class="nav">
              <li class="active"><a href="<?php echo base_url();?>">Add Event</a></li>
              <li><a href="<?php echo base_url();?>index.php/welcome/listevent">List Events</a></li>
              <li><a href="#">Manage Events</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
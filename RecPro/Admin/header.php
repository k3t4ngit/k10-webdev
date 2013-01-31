

<!DOCTYPE html>
<html lang="en">
  <head>
   
   
    <meta charset="utf-8">
<title><?php echo $title;?> | RecPro &middot; Admin Panel </title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script> 
 <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
  <script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
   <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" type="text/css" href="jquery.cleditor.css" />
    <!-- Le styles -->
    <link href="bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 40px;
      }

      /* Custom container */
      .container-narrow {
        margin: 0 auto;
        max-width: 700px;
      }
      .container-narrow > hr {
        margin: 30px 0;
      }

      /* Main marketing message and sign up button */
      .jumbotron {
        margin: 60px 0;
        text-align: center;
      }
      .jumbotron h1 {
        font-size: 72px;
        line-height: 1;
      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }

      /* Supporting marketing content */
      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }
    </style>
    
    <link href="bootstrap.css" rel="stylesheet">
    <link href="bootstrap-min.css" rel="stylesheet">
    <link href="bootstrap-responsive.css" rel="stylesheet">
    <link href="bootstrap-responsive-min.css" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
    
                                  
  </head>

  <body>
   
    <div class="container">

      <div class="masthead">
        <?php if (isset($_SESSION['logged_in'])) {?>
       <ul class="nav nav-pills pull-right">
          <li <?php if($title=="Home"){echo "class='active'";}?>>
            <a href="admin.php">Home</a>
          </li>
          <li <?php if($title=="Manage Posts"){echo "class='active'";}?>><a href="manage_posts.php">Manage Posts</a></li>
          <li <?php if($title=="Manage Problems"){echo "class='active'";}?>><a href="manage_problems.php">Manage Problems</a></li>
          <li <?php if($title=="Statistics"){echo "class='active'";}?>><a href="statistics.php">Statistics</a></li>
        </ul><?php }?>
        <h3 class="muted">Admin Panel</h3>

      </div>
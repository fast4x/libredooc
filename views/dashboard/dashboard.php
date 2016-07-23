<?php
/**
 * PHP-nMVC is a simple, clean and secure WebApp Skeleton based on NO-Model only View and Controller 
 *
 * PHP-nMVC is not a framework like CodeIgniter or similar
 * It is proof that you can develop applications in MVC logic without complicated framework, simply using native PHP code.
 *
 * @author Rino Russo
 * @link https://github.com/rinorusso/php-nMVC
 * @site http://www.fasttools.it/fast-php-nmvc/
 * @license http://opensource.org/licenses/GPL-2.0
 */
 ?>

<!DOCTYPE html>
<html lang="it">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title><?php echo $app_nome; ?> - Dashboard</title>
		<meta name="generator" content="Bluefish 2.2.9" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="<?php echo $app_icon; ?>">
		<link href="<?php echo $views_dash; ?>assets/css/bootstrap.min.css" rel="stylesheet">
		
		

		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		 <link href="<?php echo $views_dash; ?>assets/css/styles.css" rel="stylesheet">

		<!-- <script src="<?php echo $views_dash; ?>assets/js/jquery-1.11.0.min.js"></script> -->
		
		<script src="<?php echo $views_dash; ?>assets/js/jquery-2.1.4.min.js"></script>		
		
		<script src="<?php echo $views_dash; ?>assets/js/bootstrap.min.js"></script>		

		<script src="<?php echo $views_dash; ?>assets/js/eModal.min.js"></script>
				
		<script src="<?php echo $views_dash; ?>assets/js/script.js"></script>

		<script src="https://use.fontawesome.com/60a34c76b2.js"></script>		

	</head>
	<body>
<!-- Header -->
<div id="top-nav" class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-toggle"></span>
      </button>
      <a class="navbar-brand" href="#"><img src="<?php echo $app_icon; ?>" width="32" height="32" alt="" border="0" /> <?php echo $app_nome; ?></a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown">
          <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#">
            <i class="fa fa-cog" aria-hidden="true"></i> <?php echo $_SESSION['user_name']; ?> <span class="caret"></span></a>
          <ul id="g-account-menu" class="dropdown-menu" role="menu">
           <?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 0) { ?>  
            <li><a href="<?php echo $dir_base; ?>?c=users"><i class="fa fa-user" aria-hidden="true"></i></i> Utenti</a></li>
            <?php } ?>
            <li><a href="<?php echo $dir_base; ?>?logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
          </ul>
        </li>
      </ul>

    
      
    </div>
  </div><!-- /container -->
</div>
<!-- /Header -->

<!-- Main -->
<div class="container">
  
<div class="page-header">
  <h2>Dashboard <small>I tuoi files</small></h2>
</div>  


  
  <!-- upper section -->
  <div class="row ">

<div class="panel panel-default" id="panelviewer" style="display: none;">
  <div class="panel-heading"><?php echo $app_nome; ?> - Viewer</div>
  <div class="panel-body">
		<iframe style="display: none;" id="viewer" src="" width="100%" height="500" allowfullscreen webkitallowfullscreen></iframe>  
  </div>
  <div class="panel-footer"><button id="iframeBtn" type="button" class="btn btn-default">Chiudi</button></div>
</div>



	<div class="filemanager">

	
		<div class="search">
			<input type="search" placeholder="File o cartella..." />
			<i class="fa fa-search" aria-hidden="true"></i>
		</div>

		<div class="breadcrumbs"></div>

		<ul class="data"></ul>

		<div class="nothingfound">
			<a href="/libredooc"><img src="<?php echo $views_dash; ?>assets/img/empty-folder.png" /></a><br>
			<span>Nessun file.</span>
		</div>

		<div class="loading">
			<img src="<?php echo $views_dash; ?>assets/img/loading.gif" />
		</div>

	</div>  


	


  </div><!--/row-->
  <!-- /upper section -->
  
  <!-- lower section -->
<!--   <div class="row">
  <a href="#" class="btn" id="iframeBtn">Reset iframe</a>
  <a href="#" class="btn" id="openBtn">Open modal</a>
<a href="#" data-toggle="modal" data-target="#myModal">Open modal 2</a> 
    <hr>
  </div> --><!--/row-->
  

 
</div><!--/container-->
<!-- /Main -->


<footer class="text-center"><?php echo $app_nome; ?> - <?php echo $app_footer_info; ?></footer>



	<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <input type="search" placeholder="Find a file.." />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



		
	</body>
</html>
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

<?php session_start(); ?>

<!DOCTYPE html>
<html lang="it">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title><?php echo $app_nome; ?> - Registrazione</title>
		<meta name="generator" content="Bluefish 2.2.7" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="icon" type="image/png" href="<?php echo $app_icon; ?>">
		<link href="<?php echo $views_register; ?>css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="<?php echo $views_register; ?>css/styles.css" rel="stylesheet">
	
	</head>
	<body>
	
<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
          <h1 class="text-center"><img src="<?php echo $app_icon; ?>" width="64" height="64" alt="" border="0" /> <?php echo $app_nome; ?></h1>
                 <?php
       	 if ($_SESSION['reg_messages']) {
       ?>
				<div class="alert alert-info alert-dismissible" role="alert">
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  				<strong>Info: </strong> 
  		<?php	
  				foreach ($_SESSION['reg_messages'] as $message) {
            	echo $message.'<br>';
        		}
      ?>
				</div>      
      <?php  	
        		 }  
      ?>	
      
       <?php
       	 if ($_SESSION['reg_errors']) {
       ?>
				<div class="alert alert-danger alert-dismissible" role="alert">
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  				<strong>Attenzione! </strong> 
  		<?php	
  				foreach ($_SESSION['reg_errors'] as $error) {
            	echo $error.'<br>';
        		}
      ?>
				</div>      
      <?php  	
        		 }  
      ?>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block" action="./?c=register" name="loginform" method="POST">
            <div class="form-group">              
              <input id="login_input_username" class="form-control input-lg" type="text" pattern="[a-zA-Z0-9]{2,64}" placeholder="Username" name="user_name" required />
            </div>
            <div class="form-group">              
              <input id="login_input_email" class="form-control input-lg" type="email" placeholder="Email" name="user_email" required />              
            </div>
            <div class="form-group">
              <input type="password" id="login_input_password_new"  class="form-control input-lg" placeholder="Password (min. 6 caratteri)" name="user_password_new" pattern=".{6,}" autocomplete="off" required>
            </div>
            <div class="form-group">
              <input type="password" id="login_input_password_repeat"  class="form-control input-lg" placeholder="Ripeti password (min. 6 caratteri)" name="user_password_repeat" pattern=".{6,}" autocomplete="off" required>
            </div>
            <div class="form-group">              
              <input class="btn btn-primary btn-lg btn-block" type="submit"  name="register" value="Crea utente" />
              
            </div>
         
            
            
          </form>
          
         
      </div>
     
      <div class="modal-footer">
      
        <?php if($_SESSION['user_role']=='0') { ?>
	      <a href="<?php echo $dir_base; ?>?c=users" class="btn btn-primary btn-xs">Gestione utenti</a>
		  <?php   }  ?>
      		 
      </div>
      
  </div>
  </div>
</div>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="<?php echo $views_register; ?>js/bootstrap.min.js"></script>
	</body>
</html>
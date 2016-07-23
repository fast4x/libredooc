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
		<title><?php echo $app_nome; ?> - Users</title>
		<meta name="generator" content="Bluefish 2.2.7" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="icon" type="image/png" href="<?php echo $app_icon; ?>">
		<link href="<?php echo $views_users; ?>css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="<?php echo $views_users; ?>css/styles.css" rel="stylesheet">
		
		<script src="<?php echo $views_users; ?>js/jquery.min.js"></script>
		
		<script src="<?php echo $views_users; ?>js/bootstrap.min.js"></script>		

		<script src="<?php echo $views_users; ?>js/function.js"></script>		
		
		
		
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
            <i class="glyphicon glyphicon-user"></i> <?php echo $_SESSION['user_name']; ?> <span class="caret"></span></a>
          <ul id="g-account-menu" class="dropdown-menu" role="menu">
            <li><a href="<?php echo $dir_base; ?>"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
            <li><a href="<?php echo $dir_base; ?>?logout"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
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
  <h2>Gestione <small>utenti <a href="<?php echo $dir_base; ?>?c=register" class="btn btn-primary btn-xs">Crea nuovo utente</a></small></h2>
</div>  
  
  <!-- lower section -->
  <div class="row">

    <div class="col-md-12">
      
      <table class="table table-striped">
        <thead>
          <tr><th>Stato</th><th>ID</th><th>Username</th><th>Email</th><th>Upload</th><th>Ruolo</th></tr>
        </thead>
        <tbody>
			<?php
			foreach ($_SESSION['users'] as $row) {
				echo "<tr><td>".(($row['user_active']=='0') ? '<font color="red">NON ATTIVO</font>' : 'Attivo')."</td><td>".$row['user_id']."</td><td><a href='#' id='".$row['user_id']."' name='users' data-toggle='modal' data-target='#addmodutente'>".$row['user_name']."</a></td><td>".$row['user_email']."</td><td>".(($row['upload']=='1') ? 'Permesso' : '<font color="red">Non permesso</font>')."</td><td>".(($row['user_role']=='0') ? '<font color="navy">Amministratore</font>' : 'Utente')."</td></tr>";    
			}         
			?>        
         
        </tbody>
      </table>
      
     
      

    
    </div>

  
</div><!--/container-->
<!-- /Main -->


<footer class="text-center"><?php echo $app_nome; ?> - <?php echo $app_footer_info; ?></footer>


<div class="modal fade" id="addmodutente" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="boxtitlecamp">Utente</h4>
      </div>
      <div class="modal-body">
       
			<form class="form form-vertical" id="formaddmodutente">

				<input type="hidden" name="userid" id="userid" >
				<div class="control-group">
              <label>Username</label>
              <div class="controls">
                <input type="text" class="form-control" id="username" name="username" readonly="readonly" placeholder="Username">
              </div>
            </div>     
            <div class="row"> 
            <div class="col-lg-8"> 
            <div class="control-group">
              <label>Password</label>
              <div class="controls">
                <input type="password" class="form-control" id="password" name="password"  placeholder="Password">
                
              </div>
            </div>
            </div>
            
            <div class="col-lg-4"> 
            <div class="control-group">
              <label>Cambio password</label>
              <div class="controls">
                <input type="checkbox" class="form-control" name="cambiopwd" id="cambiopwd" value="1">
                
              </div>
            </div>
            </div>
            
            </div>
            <div class="row"> 
            <div class="col-lg-6">            
 				<div class="control-group">
              <label>Email</label>
              <div class="controls">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                
              </div>
            </div> 
            </div>      
            <div class="col-lg-6">              
            <div class="control-group">
              <label>Ruolo</label>
              <div class="controls">
                <select class="form-control" id="role" name="role" ><option value="1">Utente</option><option value="0">Amministratore</option></select>
              </div>
            </div>
            </div>
            </div>
            <div class="row"> 
            <div class="col-lg-6">
             <div class="control-group">
              <label>Stato</label>
              <div class="controls">
                <select class="form-control" id="active" name="active" ><option value="1">Attivo</option><option value="0">Non attivo</option></select>
              </div>
            </div>   
            </div> 
            <div class="col-lg-6">
            <div class="control-group">
              <label>Upload</label>
              <div class="controls">
                <select class="form-control" id="upload" name="upload" ><option value="1">Permesso</option><option value="0">Non permesso</option></select>
              </div>
            </div>    
				</div>
            </div>
            
            <div class="control-group">
              <label>Territorio di competenza</label>
              <div class="controls">
                
						<?php
							foreach ($_SESSION['sedi'] as $row) {
								echo '<div class="checkbox"><label><input type="checkbox" vclass="form-control" name="itemsede[]" id="itemsede" value="'.$row['cod'].'">&nbsp;&nbsp;'.$row['nome'].'</label></div>';
							}         
						?>        
    
              </div>
            </div>
          </form>       
       
      </div>
      <div class="modal-footer">
        <a href="#" class="btn" id="btnAnnulla" data-dismiss="modal">Annulla</a>
        <a href="#" class="btn btn-primary"id="btnSalva" >Salva</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dalog -->
</div><!-- /.modal -->




	</body>
</html>
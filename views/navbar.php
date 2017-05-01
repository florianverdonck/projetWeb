<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php?user=login">IPL Présences</a>
    </div>
    
    <?php if (!empty($_SESSION['authenticated'])) { ?> 
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">    
      <ul class="nav navbar-nav">
      	<?php if ($_SESSION['authenticated'] != 'student' && $_SESSION['authenticated'] != 'professor') { ?>
	  	<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu de gestion <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="index.php?user=professor">Prise de présences</a></li>     
            
            <?php if ($_SESSION['authenticated'] == 'bloc_responsible' || $_SESSION['authenticated'] == 'blocs_responsible' || $_SESSION['authenticated'] == 'admin' ) { ?>  
            <li role="separator" class="divider"></li>
            <li><a href="index.php?user=bloc_responsible">Gestionnaire de bloc</a></li>
            	<li><a href="index.php?user=bloc_responsible">-> Importer UE/AA</a></li>
            	<li><a href="index.php?user=bloc_responsible&action=series">-> Créer/modifier séries</a></li>
            	<li><a href="index.php?user=bloc_responsible&action=seance_templates">-> Gérer séances types</a></li>
            <?php } ?> <!-- bloc responsible -->       
            
            <?php if ($_SESSION['authenticated'] == 'blocs_responsible' || $_SESSION['authenticated'] == 'admin' ) { ?>  
            <li role="separator" class="divider"></li>       
            <li><a href="index.php?user=blocs_responsible">Gestionnaire de blocs</a></li>
            <?php } ?> <!-- blocs responsible -->         
            
            <?php if ($_SESSION['authenticated'] == 'admin') { ?>  
            <li role="separator" class="divider"></li>
            <li><a href="index.php?user=admin">Admin</a></li>      
            <?php } ?> <!-- admin -->  
                   
          </ul>
        </li>
        <?php } ?> <!-- student or professor -->
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          	<span class="glyphicon glyphicon-user" aria-hidden="true"></span> 
          	<?php echo strtoupper(unserialize($_SESSION['user'])->html_name()) ?> <?php echo unserialize($_SESSION['user'])->html_first_name() ?>
          	<span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="#"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Mon compte</a></li>
            <li><a href="index.php?user=logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Déconnexion</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
    <?php } ?>   
  </div><!-- /.container-fluid -->
</nav>

<?php	
if (!empty($update_message)) {
?>
	<div class="container">
		<div class="alert alert-<?=$update_message['error_code'];?> alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<?=$update_message['error_message'];?>
		</div>
	</div>
<?php
}	
?>

<div class="pt30 hidden-xs"></div>
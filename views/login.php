<?php $page="login"; ?>
<!DOCTYPE html>
<html lang="fr">
  	<?php require_once(PATH_VIEWS . "header.php"); ?>
  
	<body>
		<?php require_once(PATH_VIEWS . "navbar.php"); ?>
		<div class="container" id="loginContainer">
			<div class="row pt50">
				<div class="col-md-4 col-md-offset-4">
					<img class="frontLogo" src="<?=PATH_IMAGES?>logo_vinci.jpeg" />
				</div>
			</div>
			
			<div class="row pt30">
				<div class="col-md-4 col-md-offset-4">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Entrez votre email</h3>
						</div>
						<div class="panel-body">
							<form class="" action="index.php?page=login" method="post">
								<input type="email" id="inputEmail" name="inputEmail" class="form-control" required autofocus>
								<div class="checkbox pull-right">
									<label>
									<input type="checkbox" value="remember" name="inputRemember"> Se souvenir de moi
									</label>
								</div>
								<button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /container -->
		
		<?php require_once(PATH_VIEWS . "js_files.php"); ?>
		
	</body>
</html>

<?php $page="login"; ?>
<!DOCTYPE html>
<html lang="fr">
  	<?php include_once(PATH_VIEWS . "header.php"); ?>
  
	<body>
		<?php include_once(PATH_VIEWS . "navbar.php"); ?>
		<div class="container">
			<div class="row pt50">
				<div class="col-md-4 col-md-offset-4">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Entrez votre email</h3>
						</div>
						<div class="panel-body">
							<form class="" action="index.php?page=login" method="post">
								<label for="inputEmail" class="sr-only">prenom.nom@student.vinci.be</label>
								<input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="prenom.nom@student.vinci.be" required autofocus>
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
		
		<?php include_once(PATH_VIEWS . "js_files.php"); ?>
		
	</body>
</html>

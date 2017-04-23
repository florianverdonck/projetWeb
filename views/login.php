<!DOCTYPE html>
<html lang="fr">
  <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Page de connexion à la plateforme de prise de présences de l'IPL">
		<meta name="author" content="Christopher CASTEL et Florian VERDONCK">
		<title>IPL Présences - Page de connexion</title>
		<!-- Bootstrap core CSS -->
		<link href="<?=PATH_BS_CSS; ?>bootstrap.min.css" rel="stylesheet">
		<!-- Custom CSS -->
		<link href="<?=PATH_CSS; ?>custom.css" rel="stylesheet">
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<link href="<?=PATH_BS_CSS; ?>ie10-viewport.min.css" rel="stylesheet">
	</head>
	<body>
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
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="<?=PATH_BS_JS; ?>ie10-viewport.min.js"></script>
	</body>
</html>

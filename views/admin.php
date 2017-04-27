<?php $page="admin"; ?>
<!DOCTYPE html>
<html lang="fr">
	<?php require_once(PATH_VIEWS . "header.php"); ?>
	<body>
		<?php require_once(PATH_VIEWS . "navbar.php"); ?>
		<div class="container">
			<div class="row">
				<div class="pt30 hidden-xs"></div>
				<div class="col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Filtrez ici pour voir vos présences</h3>
						</div>
						<div class="panel-body">
							<form action="index.php?page=admin" method="post">
								<br><br>
								<button class="btn btn-lg btn-primary btn-block" type="submit">Filtrer</button>
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
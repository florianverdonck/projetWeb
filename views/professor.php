<?php $page="professor"; ?>
<!DOCTYPE html>
<html lang="fr">
	<?php include_once(PATH_VIEWS . "header.php"); ?>
	<body>
		<?php include_once(PATH_VIEWS . "navbar.php"); ?>
		<div class="container">
			<div class="row">
				<div class="pt30 hidden-xs"></div>
				<div class="col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Filtrez ici pour consulter ou prendre les présences</h3>
						</div>
						<div class="panel-body">
							<form action="index.php?user=professor" method="post">
								<input name="user" value="professor" type="hidden"> 
								<label for="inputBlocSelect">Sélectionnez le bloc </label><br>
								<div class="btn-group" data-toggle="buttons" id="inputBlocSelect">
									<label class="btn btn-default active btn-sm">
										<input type="radio" name="bloc" value="1" checked>Bloc 1
									</label>
									<label class="btn btn-default btn-sm">
										<input type="radio" name="bloc" value="2">Bloc 2
									</label>
									<label class="btn btn-default btn-sm">
									    <input type="radio" name="bloc" value="3">Bloc 3
									</label>
								</div>
								<br><br>
								<label for="inputTermSelect">Sélectionnez le quadrimestre </label><br>
								<div class="btn-group" data-toggle="buttons" id="inputBlocSelect">
									<label class="btn btn-default active btn-sm">
										<input type="radio" name="term" value="1" checked>Quadrimestre 1
									</label>
									<label class="btn btn-default btn-sm">
										<input type="radio" name="term" value="2">Quadrimestre 2
									</label>
								</div>
								<br><br>
								<input class="btn btn-lg btn-primary btn-block" type="submit" value="Filtrer">
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Table de présences</h3>
						</div>
						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Nom<span class="hidden-xs"> de famille</span></th>
									<th>Pré<span class="hidden-xs">nom</span></th>		
									<th>Prés<span class="hidden-xs">ence</span></th>
									<th>Cert<span class="hidden-xs">ificat</span></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="4">Complétez le formulaire pour pouvoir prendre les présences</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- /container -->
		<?php include_once(PATH_VIEWS . "js_files.php"); ?>
	</body>
</html>
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
							<h3 class="panel-title">Enregistrez le nouvel agenda académique</h3>
						</div>
						<div class="panel-body">
							<form action="index.php?user=admin" method="post" enctype="multipart/form-data">
								<label for="file_agenda" class="control-label">Selectionnez un fichier agenda</label>
								<input id="file_agenda" type="file" name="userfile" class="filestyle" data-buttonName="btn-primary">
								<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
								<br>
								<input class="btn btn-lg btn-primary btn-block" type="submit" value="Créer l'agenda" name="form_agenda">
							</form>
							<p><?php echo $agenda_message?></p>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Liste des professeurs</h3>
						</div>
						<div class="panel-body">
							<table class="table">
								<thead>
									<tr>
										<th>Mail</th>
										<th>Nom</th>
										<th>Prenom</th>
										<th>Responsable</th>
									</tr>
								</thead>
								<tbody>								
									<tr>
										<td>gregory.seront@vinci.be</td>
										<td>Seront</td>
										<td>Gregory</td>
										<td>true</td>
									</tr>
									<tr>
										<td>gregory.seront@vinci.be</td>
										<td>Seront</td>
										<td>Gregory</td>
										<td>true</td>
									</tr>
								</tbody>
							</table>
							<form action="index.php?user=admin" method="post" enctype="multipart/form-data">
								<label for="file_agenda" class="control-label">Selectionnez un fichier professeurs</label>
								<input id="file_agenda" type="file" name="userfile" class="filestyle" data-buttonName="btn-primary">
								<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
								<br>
								<input class="btn btn-lg btn-primary btn-block" type="submit" value="Mettre à jour" name="form_professors">
							</form>
							<p><?php echo $professors_message?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /container -->
		<?php require_once(PATH_VIEWS . "js_files.php"); ?>
	</body>
</html>
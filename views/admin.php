<?php $page="admin"; ?>
<!DOCTYPE html>
<html lang="fr">
	<?php require_once(PATH_VIEWS . "header.php"); ?>
	<body>
		<?php require_once(PATH_VIEWS . "navbar.php"); ?>
		<div class="container">
			<div class="row">
				
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
						</div>
					</div>
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Enregistrez des changements de professeurs</h3>
						</div>
						<div class="panel-body">
							<form action="index.php?user=admin" method="post" enctype="multipart/form-data">
								<label for="file_professors" class="control-label">Selectionnez un fichier professeurs</label>
								<input id="file_professors" type="file" name="userfile" class="filestyle" data-buttonName="btn-primary">
								<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
								<br>
								<input class="btn btn-lg btn-primary btn-block" type="submit" value="Mettre à jour" name="form_professors">
							</form>
						</div>
					</div>
					<div class="panel panel-primary">
						<div class="panel-heading">
							<label class="control-label">Selectionnez les données à supprimer</label>
						</div>
						<div class="panel-body">
							<form action="index.php?user=admin" method="post">
								<label class="control-label">Selectionnez les données à supprimer</label>
								<div class="checkbox">
								  <label>
								    <input type="checkbox" value="attendances" name="tables[]"> Les présences  
								  </label>
								</div>
								<div class="checkbox">
								  <label>
								    <input type="checkbox" value="series" name="tables[]"> Les séries  
								  </label>
								</div>
								<div class="checkbox">
								  <label>
								    <input type="checkbox" value="students" name="tables[]"> Les étudiants  
								  </label>
								</div>
								<div class="checkbox">
								  <label>
								    <input type="checkbox" value="weeks" name="tables[]"> L'agenda  
								  </label>
								</div>
								<div class="checkbox">
								  <label>
								    <input type="checkbox" value="courses" name="tables[]"> UE/AA  
								  </label>
								</div>
								<div class="checkbox ">
								  <label>
								    <input class="styled" type="checkbox" value="professors" name="tables[]"> Les professeurs  
								  </label>
								</div>
								<input class="btn-danger btn-lg btn-primary btn-block" type="submit" value="Supprimer" name="form_delete">
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-8">
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
										<th>Pré<span class="hidden-xs">nom</span></th>
										<th>Resp<span class="hidden-xs">onsable</span></th>
									</tr>
								</thead>
								<tbody>		
									<?php if($array_professors != null)  {
											foreach ($array_professors as $professor) { ?>						
									<tr>
										<td><?php echo $professor->html_mail()?></td>
										<td><?php echo $professor->html_name()?></td>
										<td><?php echo $professor->html_first_name()?></td>
										<td><?php echo $professor->html_responsible()?></td>
									</tr>
									<?php } 
									} ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /container -->
		<?php require_once(PATH_VIEWS . "js_files.php"); ?>
	</body>
</html>
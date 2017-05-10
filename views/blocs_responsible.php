<?php $page="blocs_responsible"; ?>
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
							<h3 class="panel-title">Mettre à jour les étudiants</h3>
						</div>
						<div class="panel-body">
							<form action="index.php?user=blocs_responsible" method="post" enctype="multipart/form-data">
								<label for="inputStudentsFile" class="control-label">Selectionnez un fichier d'étudiants</label>
								<input id="inputStudentsFile" type="file" name="inputStudentsFile" class="filestyle" data-buttonName="btn-primary">
								<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
								<br>
								<input class="btn btn-lg btn-primary btn-block" type="submit" value="Mettre à jour" name="formStudentsUpload">
							</form>
						</div>
					</div>
					<div class="panel panel-primary">
						<div class="panel-heading">
							<label class="control-label">Selectionnez les données à supprimer</label>
						</div>
						<div class="panel-body">
							<form action="index.php?user=blocs_responsible" method="post">
								<label class="control-label">Selectionnez les données à supprimer</label>
								<div class="checkbox">
								  <label>
								    <input type="checkbox" value="attendance_sheets" name="tables[]"> Les présences  
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
								<div class="checkbox ">
								  <label>
								    <input class="styled" type="checkbox" value="professors" name="tables[]"> Les professeurs  
								  </label>
								</div>
								<input class="btn-danger btn-lg btn-primary btn-block" type="submit" value="Supprimer" name="formDeleteData">
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Liste des étudiants</h3>
						</div>
						<div class="panel-body">
							<table class="table">
								<thead>
									<tr>
										<th>Mail</th>
										<th>Nom</th>
										<th class="hidden-xs">Prénom</th>
										<th>Bloc</th>
									</tr>
								</thead>
								<tbody>		
									<?php if($array_students != null)  {
											foreach ($array_students as $student) { ?>						
									<tr>
										<td>
											<?php echo explode("@", $student->html_mail())[0];?><span class="hidden-xs"><?php echo "@" . explode("@", $student->html_mail())[1];?></span>
										</td>
										<td><?php echo $student->html_name()?></td>
										<td class="hidden-xs"><?php echo $student->html_first_name()?></td>
										<td><?php echo $student->html_bloc()?></td>
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
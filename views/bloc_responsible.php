<?php $page="bloc_responsible"; ?>
<!DOCTYPE html>
<html lang="fr">
	<?php include_once(PATH_VIEWS . "header.php"); ?>
	<body>
		
		<!-- UE/AA --- Séries --- Séances types -->
		
		<?php include_once(PATH_VIEWS . "navbar.php"); ?>
		
		<div class="container">
		
			<div class="row">
				
				<div class="col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Importer UE/AA</h3>
						</div>
						<div class="panel-body">
							<form action="index.php?user=bloc_responsible" method="POST" enctype='multipart/form-data'>
								<label for="inputBlocSelect">Sélectionnez le bloc </label><br>
								<div class="btn-group" data-toggle="buttons" id="inputBlocSelect">
								  <label class="btn btn-default <?=$ueBlocButtonsStatusVisual[1]?> btn-sm">
								    <input type="radio" name="inputBloc" value="1" <?=$ueBlocButtonsStatusCheck[1]?>>Bloc 1
								  </label>
								  <label class="btn btn-default <?=$ueBlocButtonsStatusVisual[2]?> btn-sm">
								    <input type="radio" name="inputBloc" value="2" <?=$ueBlocButtonsStatusCheck[2]?>>Bloc 2
								  </label>
								  <label class="btn btn-default <?=$ueBlocButtonsStatusVisual[3]?> btn-sm">
								    <input type="radio" name="inputBloc" value="3" <?=$ueBlocButtonsStatusCheck[3]?>>Bloc 3
								  </label>
								</div><br><br>
								
								<label for="inputUEFile">Sélectionnez le fichier à importer </label><br>
								<input class="pb10" type="file" id="inputUEFile" name="inputUEFile"><br>
								
								<button class="btn btn-lg btn-primary btn-block" name="formUEUpload" type="submit">Importer</button>
							</form>
						</div>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Séries d'étudiants</h3>
						</div>
						<div class="panel-body">
							<label for="labelNumberOfStudents">Nombre d'étudiants</label><br>
							<p id="labelNumberOfStudents">Il y a <span class="badge"><?=$numberOfStudents?></span> étudiants</p><br>
							
							<label for="labelNumberOfSeries">Nombre de séries</label><br>
							<p id="labelNumberOfSeries">Il y a <span class="badge"><?=$numberOfSeries?></span> séries</p><br>
							
							<a href="index.php?user=bloc_responsible&action=series"><button class="btn btn-lg btn-primary btn-block" type="submit">Modifier les séries</button></a>
						</div>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Séances types</h3>
						</div>
						<div class="panel-body">
							<label for="labelNumberOfSeanceTemplates">Nombre de séances types</label><br>
							<p id="labelNumberOfSeanceTemplates">Il y a <span class="badge"><?=$numberOfSeances?></span> séances types</p><br>
							
							<br><br><br><br>
							
							<a href="index.php?user=bloc_responsible&action=seance_templates"><button class="btn btn-lg btn-primary btn-block" type="submit">Modifier les séances types</button></a>
						</div>

					</div>
				</div>
				
			</div>
		
		</div>
		
		<?php include_once(PATH_VIEWS . "js_files.php"); ?>
	</body>
</html>
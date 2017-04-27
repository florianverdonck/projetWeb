<?php $page="bloc_responsible_series"; ?>
<!DOCTYPE html>
<html lang="fr">
	<?php include_once(PATH_VIEWS . "header.php"); ?>
	<body>
		<?php include_once(PATH_VIEWS . "navbar.php"); ?>
		
		<div class="container">
				
			<div class="row">
				
				<div class="col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Introduire des seances types</h3>
						</div>
						<div class="panel-body">
							<label for="inputUESelect">UE/AA concernée</label><br>
							<select class="selectpicker" id="inputUESelect">
									<option>Algo</option>
									<option>SD</option>
									<option>Math2</option>
									<option>Math1</option>
									<option>Linux</option>
									<option>Systèmes d'exploitation</option>
									<option>Web</option>
									<option>Projet Web</option>
									<option>Anglais</option>
								</select><br><br>
							
							<label for="inputWeekSelect">Numéro de la semaine</label><br>
							<select class="selectpicker" id="inputWeekSelect">
									<option>Semaine n°1</option>
									<option>Semaine n°2</option>
									<option>Semaine n°3</option>
									<option>Semaine n°4</option>
									<option>Semaine n°5</option>
									<option>Semaine n°6</option>
									<option>Semaine n°7</option>
									<option>Semaine n°8</option>
									<option>Semaine n°9</option>
							</select><br><br>
							
							<label for="inputSerieSelect">Série concernée</label><br>
							<select class="selectpicker" id="inputSerieSelect">
									<option>Série 1</option>
									<option>Série 2</option>
									<option>Série 3</option>
									<option>Série 4</option>
									<option>Série 5</option>
									<option>Série 6</option>
									<option>Série 7</option>
									<option>Série 8</option>
									<option>Série 9</option>
							</select><br><br>
							
							<label for="inputTypeOfPresence">Type de présence </label>
							<div class="btn-group floatRight" data-toggle="buttons" id="inputTypeOfPresence">
							  <label class="btn btn-default active btn-sm">
							    <input type="radio" name="options">X
							  </label>
							  <label class="btn btn-default btn-sm">
							    <input type="radio" name="options">XO
							  </label>
							  <label class="btn btn-default btn-sm">
							    <input type="radio" name="options">Noté</span>
							  </label>
							</div><br><br>
							
							
							
							<button class="btn btn-lg btn-primary btn-block" type="submit">Ajouter la séance type</button>
						</div>
					</div>
				</div>
				
				<div class="col-md-8">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Séances types actuelles</h3>
						</div>
						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Nom<span class="hidden-xs"> de la séance</span></th>
									<th>UE/AA<span class="hidden-xs"> concernée</span></th>
									<th><span class="hidden-xs">Type de</span> présence</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="4" class="weekSeparator"><span class="label label-primary">Semaine 1</span></td>
								</tr>
								<tr>
									<td>1</td>
									<td>Algo 1 p 1</td>
									<td>Algorithmique</td>
									<td>XO</td>
								</tr>
								<tr>
									<td>2</td>
									<td>Algo 1 p 2</td>
									<td>Algorithmique</td>
									<td>XO</td>
								</tr>
								<tr>
									<td>3</td>
									<td>Math 1</td>
									<td>Mathématiques Q1</td>
									<td>XO</td>
								</tr>
								<tr>
									<td colspan="4" class="weekSeparator"><span class="label label-primary">Semaine 2</span></td>
								</tr>
								<tr>
									<td>1</td>
									<td>Algo 1 p 1</td>
									<td>Algorithmique</td>
									<td>XO</td>
								</tr>
								<tr>
									<td>2</td>
									<td>Algo 1 p 2</td>
									<td>Algorithmique</td>
									<td>XO</td>
								</tr>
								<tr>
									<td>3</td>
									<td>Math 1</td>
									<td>Mathématiques Q1</td>
									<td>XO</td>
								</tr>
								<tr>
									<td colspan="4" class="weekSeparator"><span class="label label-primary">Semaine 3</span></td>
								</tr>
								<tr>
									<td>1</td>
									<td>Algo 1 p 1</td>
									<td>Algorithmique</td>
									<td>XO</td>
								</tr>
								<tr>
									<td>2</td>
									<td>Algo 1 p 2</td>
									<td>Algorithmique</td>
									<td>XO</td>
								</tr>
								<tr>
									<td>3</td>
									<td>Math 1</td>
									<td>Mathématiques Q1</td>
									<td>XO</td>
								</tr>
							</tbody>
					</div>
				</div>
				
			</div>
			
		</div>
		
		<?php include_once(PATH_VIEWS . "js_files.php"); ?>
	</body>
</html>

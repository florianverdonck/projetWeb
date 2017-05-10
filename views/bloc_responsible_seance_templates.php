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
									
									<?php
										
										foreach ($array_ue as $key => $ue) {
									
									?>		
											<option value="<?=$ue->code();?>"><?=$ue->name();?></option>	
									<?php		
										}
									?>
							</select><br><br>
							
							<label for="inputWeekSelect">Numéro de la semaine</label><br>
							<select class="selectpicker" id="inputWeekSelect">
								<?php foreach ($weeks as $key => $week) { ?>
									<option value="<?=$week->week_id();?>">Semaine n°<?=$week->week_number();?></option>
								<?php } ?>
							</select><br><br>
														
							<label for="inputTypeOfPresence">Type de présence par défaut</label>
							<div class="btn-group" data-toggle="buttons" id="inputTypeOfPresence">
							  <label class="btn btn-default active btn-sm">
							    <input type="radio" name="presenceType" value="x">X
							  </label>
							  <label class="btn btn-default btn-sm">
							    <input type="radio" name="presenceType" value="xo">XO
							  </label>
							  <label class="btn btn-default btn-sm">
							    <input type="radio" name="presenceType" value="noted">Noté</span>
							  </label>
							</div><br><br>
							
							<label for="inputTypeOfPresence">Séries concernées</label>
							<div class="btn-group" data-toggle="buttons" id="inputTypeOfPresence">
							  <label class="btn btn-default active btn-sm">
							    <input type="radio" name="options">1
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

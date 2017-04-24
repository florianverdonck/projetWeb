<?php $page="student"; ?>
<!DOCTYPE html>
<html lang="fr">
	<?php include_once(PATH_VIEWS . "header.php"); ?>
	<body>
		<?php include_once(PATH_VIEWS . "navbar.php"); ?>
		<div class="container">
			<div class="row pt30">
				<div class="col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Filtrez ici pour voir vos présences</h3>
						</div>
						<div class="panel-body">
							<form class="" action="index.php?page=student" method="post">
								<label for="inputWeekSelect">Sélectionnez la semaine </label><br>
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
								</select>
								<br><br>
								<label for="seanceTemplateSelect">Sélectionnez la séance type </label><br>
								<select class="selectpicker" id="seanceTemplateSelect">
									<option>Algo I</option>
									<option>Algo II</option>
									<option>Math EX I</option>
								</select>
								<br><br>
								<label for="typeOfPresenceSelect">Sélectionnez le type de présence </label><br>
								<select class="selectpicker" id="typeOfPresenceSelect">
									<option>Présent</option>
									<option>Absent</option>
									<option>Certificat</option>
								</select>
								<br><br>
								<button class="btn btn-lg btn-primary btn-block" type="submit">Filtrer</button>
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
									<th>Mat<span class="hidden-xs">ricule</span></th>
									<th>Pré<span class="hidden-xs">nom</span></th>
									<th>Nom<span class="hidden-xs"> de famille</span></th>
									<th>Prés<span class="hidden-xs">ence</span></th>
									<th>Cert<span class="hidden-xs">ificat</span></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th scope="row">2</th>
									<td>281</td>
									<td>C<span class="hidden-xs">hristopher</span></td>
									<td>Castel</td>
									<td>
										<div class="btn-group" data-toggle="buttons">
										  <label class="btn btn-default active btn-sm">
										    <input type="radio" name="options" id="option1" autocomplete="off"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span><span class="hidden-xs"> Présent</span>
										  </label>
										  <label class="btn btn-default btn-sm">
										    <input type="radio" name="options" id="option2" autocomplete="off" checked><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span><span class="hidden-xs"> Absent</span>
										  </label>
										</div>
									</td>
									<td>
										<div class="btn-group" data-toggle="buttons">
										  <label class="btn btn-default btn-sm">
										    <input type="checkbox" autocomplete="off"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span><span class="hidden-xs"> Justifié</span>
										  </label>
										</div>
									</td>
								</tr>
								<tr>
									<th scope="row">3</th>
									<td>121</td>
									<td>M<span class="hidden-xs">arco</span></td>
									<td>Amory</td>
									<td>
										<div class="btn-group" data-toggle="buttons">
										  <label class="btn btn-default active btn-sm">
										    <input type="radio" name="options" id="option1" autocomplete="off"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span><span class="hidden-xs"> Présent</span>
										  </label>
										  <label class="btn btn-default btn-sm">
										    <input type="radio" name="options" id="option2" autocomplete="off" checked><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span><span class="hidden-xs"> Absent</span>
										  </label>
										</div>
									</td>
									<td>
										<div class="btn-group" data-toggle="buttons">
										  <label class="btn btn-default btn-sm">
										    <input type="checkbox" autocomplete="off"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span><span class="hidden-xs"> Justifié</span>
										  </label>
										</div>
									</td>
								</tr>
								<tr>
									<th scope="row">4</th>
									<td>200</td>
									<td>F<span class="hidden-xs">lorian</span></td>
									<td>Verdonck</td>
									<td>
										<div class="btn-group" data-toggle="buttons">
										  <label class="btn btn-default active btn-sm">
										    <input type="radio" name="options" id="option1" autocomplete="off"> 0
										  </label>
										  <label class="btn btn-default btn-sm">
										    <input type="radio" name="options" id="option2" autocomplete="off"> 1
										  </label>
										  <label class="btn btn-default btn-sm">
										    <input type="radio" name="options" id="option2" autocomplete="off" checked> Abs<span class="hidden-xs">ent</span>
										  </label>
										</div>
									</td>
									<td>
										<div class="btn-group" data-toggle="buttons">
										  <label class="btn btn-default btn-sm">
										    <input type="checkbox" autocomplete="off"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span><span class="hidden-xs"> Justifié</span>
										  </label>
										</div>
									</td>
								</tr>
								<tr>
									<th scope="row">4</th>
									<td>200</td>
									<td><span class="hidden-xs">Florian</span></td>
									<td>Verdonck</td>
									<td>
										<div class="btn-group" data-toggle="buttons">
										  <label class="btn btn-default active btn-sm">
										    <input type="radio" name="options" id="option1" autocomplete="off"> 0
										  </label>
										  <label class="btn btn-default btn-sm">
										    <input type="radio" name="options" id="option2" autocomplete="off"> 1
										  </label>
										  <label class="btn btn-default btn-sm">
										    <input type="radio" name="options" id="option2" autocomplete="off" checked> Abs<span class="hidden-xs">ent</span>
										  </label>
										</div>
									</td>
									<td>
										<div class="btn-group" data-toggle="buttons">
										  <label class="btn btn-default btn-sm">
										    <input type="checkbox" autocomplete="off"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span><span class="hidden-xs"> Justifié</span>
										  </label>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
						<div class="panel-body">
							<label for="basic-url">Entrez un élève absent de la liste</label>
							<div class="input-group">
							  <span class="input-group-addon" id="basic-addon3">Matricule</span>
							  <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
							  <div class="input-group-btn">
							    <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter à la liste</button>
							  </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /container -->
		<?php include_once(PATH_VIEWS . "js_files.php"); ?>
	</body>
</html>
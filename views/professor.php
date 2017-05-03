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
							<form class="" action="index.php?user=professor" method="post">
								<label for="inputBlocSelect">Sélectionnez le bloc </label><br>
								<div class="btn-group" data-toggle="buttons" id="inputBlocSelect">
									<label class="btn btn-default active btn-sm">
										<input type="radio" name="inputBloc" value="1" checked>Bloc 1
									</label>
									<label class="btn btn-default btn-sm">
										<input type="radio" name="inputBloc" value="2">Bloc 2
									</label>
									<label class="btn btn-default btn-sm">
									    <input type="radio" name="inputBloc" value="3">Bloc 3
									</label>
								</div>
								<br><br>
								<label for="inputTermSelect">Sélectionnez le quadrimestre </label><br>
								<div class="btn-group" data-toggle="buttons" id="inputBlocSelect">
									<label class="btn btn-default active btn-sm">
										<input type="radio" name="inputTerm" value="1" checked>Quadrimestre 1
									</label>
									<label class="btn btn-default btn-sm">
										<input type="radio" name="inputTerm" value="2">Quadrimestre 2
									</label>
								</div>
								<br><br>
								<label for="inputWeekSelect">Sélectionnez la semaine </label><br>
								<select class="selectpicker" id="inputWeekSelect">
									<?php for($i = 1; $i <= 13; $i++) {?>
									<option>Semaine <?php echo $i?></option>
									<?php }?>
								</select>
								<br><br>
								<label for="seanceTemplateSelect">Sélectionnez la séance type </label><br>
								<select class="selectpicker" id="seanceTemplateSelect">
									<option>Algo I</option>
									<option>Algo II</option>
									<option>Math EX I</option>
								</select>
								<br><br>
								<label for="inputAttendanceType">Sélectionnez le type de présence </label><br>
								<div class="btn-group" data-toggle="buttons" id="inputAttendanceType">
									<label class="btn btn-default active btn-sm">
										<input type="radio" name="inputTerm" value="X" checked>X
									</label>
									<label class="btn btn-default btn-sm">
										<input type="radio" name="inputTerm" value="XO">XO
									</label>
									<label class="btn btn-default btn-sm">
										<input type="radio" name="inputTerm" value="Noted">Noté
									</label>
								</div>
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
										    <input type="radio" name="options"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span><span class="hidden-xs"> Présent</span>
										  </label>
										  <label class="btn btn-default btn-sm">
										    <input type="radio" name="options" checked><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span><span class="hidden-xs"> Absent</span>
										  </label>
										</div>
									</td>
									<td>
										<div class="btn-group" data-toggle="buttons">
										  <label class="btn btn-default btn-sm">
										    <input type="checkbox"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span><span class="hidden-xs"> Justifié</span>
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
										    <input type="radio" name="options"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span><span class="hidden-xs"> Présent</span>
										  </label>
										  <label class="btn btn-default btn-sm">
										    <input type="radio" name="options" checked><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span><span class="hidden-xs"> Absent</span>
										  </label>
										</div>
									</td>
									<td>
										<div class="btn-group" data-toggle="buttons">
										  <label class="btn btn-default btn-sm">
										    <input type="checkbox"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span><span class="hidden-xs"> Justifié</span>
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
										    <input type="radio" name="options"> 0
										  </label>
										  <label class="btn btn-default btn-sm">
										    <input type="radio" name="options"> 1
										  </label>
										  <label class="btn btn-default btn-sm">
										    <input type="radio" name="options" checked> Abs<span class="hidden-xs">ent</span>
										  </label>
										</div>
									</td>
									<td>
										<div class="btn-group" data-toggle="buttons">
										  <label class="btn btn-default btn-sm">
										    <input type="checkbox"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span><span class="hidden-xs"> Justifié</span>
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
										    <input type="radio" name="options"> 0
										  </label>
										  <label class="btn btn-default btn-sm">
										    <input type="radio" name="options"> 1
										  </label>
										  <label class="btn btn-default btn-sm">
										    <input type="radio" name="options" checked> Abs<span class="hidden-xs">ent</span>
										  </label>
										</div>
									</td>
									<td>
										<div class="btn-group" data-toggle="buttons">
										  <label class="btn btn-default btn-sm">
										    <input type="checkbox"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span><span class="hidden-xs"> Justifié</span>
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
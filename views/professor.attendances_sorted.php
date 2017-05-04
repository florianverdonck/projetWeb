<?php $page="professor"; ?>
<!DOCTYPE html>
<html lang="fr">
	<?php include_once(PATH_VIEWS . "header.php"); ?>
	<body>
		<?php include_once(PATH_VIEWS . "navbar.php"); ?>
		<div class="container">
			<div class="row">
				<div class="pt30 hidden-xs"></div>
				<form action="index.php?user=professor" method="post"> 				
				<div class="col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Filtrez ici pour consulter ou prendre les présences</h3>
						</div>
						<div class="panel-body">
								<input type="hidden" name="bloc" value="<?php echo $_POST['bloc']?>">
								<input type="hidden" name="term" value="<?php echo $_POST['term']?>">	
								<label for="seanceTemplateSelect">Sélectionnez la séance type </label><br>
								<select name="seance" class="selectpicker" id="seanceTemplateSelect">
									<?php foreach ($seances_templates as $st) { ?>
										<option <?php if (isset($_POST['seance']) && $_POST['seance'] == $st->name()) echo "selected=\"selected\""?>><?php echo $st->html_name() ?></option>
									<?php } ?>
								</select>
								<br><br>
								<label for="inputWeekSelect">Sélectionnez la semaine </label><br>
								<select name="week" class="selectpicker" id="inputWeekSelect">
								<?php if ($weeks_created) { ?>
									<?php for($i = 1; $i <= 13; $i++) {?>
									<option <?php if (isset($_POST['week']) && $_POST['week'] == "Semaine " . $i) echo "selected=\"selected\""?>>Semaine <?php echo $i?></option>
									<?php }?>
								<?php } ?>
								</select>
								<br><br>
								<label for="inputWeekSelect">Sélectionnez la série </label><br>
								<select name="serie" class="selectpicker" id="inputSerieSelect">
									<?php foreach($series as $serie) {?>
									<option <?php if (isset($_POST['serie']) && $_POST['serie'] == $serie->html_serie_numero()) echo "selected=\"selected\""?>><?php echo $serie->html_serie_numero()?></option>
									<?php }?>
								</select>
								<br><br>
								<label for="inputAttendanceType">Sélectionnez le type de présence </label><br>
								<div class="btn-group" data-toggle="buttons" id="inputAttendanceType">
									<label class="btn btn-default active btn-sm">
										<input type="radio" name="attendance_type" value="X" checked>X
									</label>
									<label class="btn btn-default btn-sm">
										<input type="radio" name="attendance_type" value="XO">XO
									</label>
									<label class="btn btn-default btn-sm">
										<input type="radio" name="attendance_type" value="Noted">Noté
									</label>
								</div>
								<br><br>
								<input class="btn btn-lg btn-primary btn-block" type="submit" value="Filtrer" name="form_sort_attendances">
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
								<?php if ($students != null) {?>
									<?php foreach ($students as $student) { ?>						
									<tr>
										<th scope="row">5</th>
										<td><?php echo $student->html_name()?></td>
										<td><?php echo substr($student->html_first_name(), 0, 1)?><span class="hidden-xs"><?php echo substr($student->html_first_name(), 1, strlen($student->html_first_name()))?></span>
										</td>
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
									<?php } ?>
								<?php } ?>
								</tbody>
							</table>
							<?php if (!empty($_POST['seance'])) {?>
							<div class="panel-body">
								<label for="basic-url">Entrez un élève absent de la liste</label>
								<div class="input-group">
								  <span class="input-group-addon" id="basic-addon3">Matricule</span>
								  <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
								  <div class="input-group-btn">
								    <input name="form_add_student_attendance" value="Ajouter à la liste" type="submit" class="btn btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
								  </div>
								</div>
								<br>
								<input class="btn btn-lg btn-primary btn-block" type="submit" value="Confirmer" name="form_take_attendances">							
							</div>
							<?php } ?>
					</div>
				</div>
				</form>			
			</div>
		</div>
		<!-- /container -->
		<?php include_once(PATH_VIEWS . "js_files.php"); ?>
	</body>
</html>
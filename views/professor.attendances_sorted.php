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
								<input type="hidden" name="bloc" value="<?php echo $_POST['bloc']?>">
								<input type="hidden" name="term" value="<?php echo $_POST['term']?>">	
								<label for="seanceTemplateSelect">Sélectionnez la séance type </label><br>
								<select name="seance" class="selectpicker" id="seanceTemplateSelect">
								<?php if ($seances_templates != '') { ?>
									<?php foreach ($seances_templates as $st) { ?>
										<option value="<?php echo $st->html_seance_template_id() ?>" <?php if (isset($_POST['seance']) && $_POST['seance'] == $st->html_seance_template_id()) echo "selected=\"selected\""?>><?php echo $st->html_name() ?></option>
									<?php } ?>
								<?php } ?>
								</select>
								<br><br>
								<label for="inputWeekSelect">Sélectionnez la semaine </label><br>
								<select name="week" class="selectpicker" id="inputWeekSelect">	
								<?php if ($weeks != '') { ?>									
									<?php foreach ($weeks as $w) { ?>
									<option value="<?php echo $w->html_week_id() ?>" <?php if (isset($_POST['week']) && $_POST['week'] == $w->html_week_id()) echo "selected=\"selected\""?>>
									<?php echo $w->html_week_number() ?>
									</option>
									<?php } ?>
								<?php } ?>
								</select>
								<br><br>
								<label for="inputWeekSelect">Sélectionnez la série </label><br>
								<select name="serie" class="selectpicker" id="inputSerieSelect">
																
								<?php if ($series != '') { ?>
									<option value=""> Toutes les séries
									<?php foreach($series as $serie) {?>
									<option value="<?php echo $serie->html_serie_id()?>" <?php if (isset($_POST['serie']) && $_POST['serie'] == $serie->html_serie_id()) echo "selected=\"selected\""?>><?php echo $serie->html_serie_numero()?></option>
									<?php }?>
								<?php } ?>
								</select>
								<br><br>
								<label for="inputAttendanceType">Sélectionnez le type de présence </label><br>
								<div class="btn-group" data-toggle="buttons" id="inputAttendanceType">
									<?php if (isset($_POST['attendance_type'])) { ?>
									<label class="btn btn-default <?php if ($_POST['attendance_type'] == 'X') echo "active"?> btn-sm">
										<input type="radio" name="attendance_type" value="X" <?php if ($_POST['attendance_type'] == 'X') echo "checked=\"checked\""?>>X
									</label>
									<label class="btn btn-default <?php if ($_POST['attendance_type'] == 'XO') echo "active"?> btn-sm">
										<input type="radio" name="attendance_type" value="XO" <?php if ($_POST['attendance_type'] == 'XO') echo "checked=\"checked\""?>>XO
									</label>
									<label class="btn btn-default <?php if ($_POST['attendance_type'] == 'Noted') echo "active"?> btn-sm">
										<input type="radio" name="attendance_type" value="Noted" <?php if ($_POST['attendance_type'] == 'Noted') echo "checked=\"checked\""?>>Noté
									</label>
									<label class="btn btn-default btn-sm">
										<input type="radio" name="attendance_type" value="default">Défaut
									</label>
									<?php } else { ?>
									<label class="btn btn-default btn-sm">
										<input type="radio" name="attendance_type" value="X">X
									</label>
									<label class="btn btn-default btn-sm">
										<input type="radio" name="attendance_type" value="XO">XO
									</label>
									<label class="btn btn-default btn-sm">
										<input type="radio" name="attendance_type" value="Noted">Noté
									</label>
									<label class="btn btn-default active btn-sm">
										<input type="radio" name="attendance_type" value="default" checked="checked">Défaut
									</label>
									<?php } ?>
								</div>								
								<br><br>
								<input class="btn btn-lg btn-primary btn-block" type="submit" value="Filtrer" name="form_sort_attendances">
								</form>							
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Table de présences</h3>
						</div>
							<form action="index.php?user=professor" method="post"> 									
								<input type="hidden" name="bloc" value="<?php echo $_POST['bloc']?>">
								<input type="hidden" name="term" value="<?php echo $_POST['term']?>">
								<input type="hidden" name="seance" value="<?php if (isset($_POST['seance'])) echo $_POST['seance']?>">
								<input type="hidden" name="week" value="<?php if (isset($_POST['week'])) echo $_POST['week']?>">
								<input type="hidden" name="serie" value="<?php if (isset($_POST['serie'])) echo $_POST['serie']?>">
								<input type="hidden" name="attendance_type" value="<?php if (isset($_POST['attendance_type'])) echo $_POST['attendance_type']?>">
							<table class="table">
								<thead>
									<tr>
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
										<td><?php echo $student->html_name()?></td>
										<td><?php echo substr($student->html_first_name(), 0, 1)?><span class="hidden-xs"><?php echo substr($student->html_first_name(), 1, strlen($student->html_first_name()))?></span>
										</td>
										<td>
											<div class="btn-group" data-toggle="buttons">
											<?php if (isset($_POST['attendance_type'])) { ?>
											<?php $attendance = $student->html_attendance();
												  $student_id = $student->student_id();   ?>
												<?php if ($_POST['attendance_type'] == 'XO'){ ?>
												  <label class="btn btn-default <?php if ($attendance == 'active') echo "active"?> btn-sm">
												    <input value="active" type="radio" name="attendance['<?php echo $student_id?>']" <?php if ($attendance == 'active') echo "checked=\"checked\""?>><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span><span class="hidden-xs"> Actif</span>
												  </label>
												  <label class="btn btn-default <?php if ($attendance == 'passive') echo "active"?> btn-sm">
												    <input value="passive" type="radio" name="attendance['<?php echo $student_id?>']" <?php if ($attendance == 'passive') echo "checked=\"checked\""?>><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span><span class="hidden-xs"> Passif</span>
												  </label>
												  <label class="btn btn-default <?php if ($attendance == 'absent') echo "active"?> btn-sm">
												    <input value="absent" type="radio" name="attendance['<?php echo $student_id?>']" <?php if ($attendance == 'absent') echo "checked=\"checked\""?>><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span><span class="hidden-xs"> Absent</span>
												  </label>
												 <?php } elseif ($_POST['attendance_type'] == 'X') { ?>
												 <label class="btn btn-default <?php if ($attendance == 'present') echo "active"?> btn-sm">
												    <input value="present" type="radio" name="attendance['<?php echo $student_id?>']" <?php if ($attendance == 'present') echo "checked=\"checked\""?>><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span><span class="hidden-xs"> Present</span>
												  </label>
												  <label class="btn btn-default <?php if ($attendance == 'absent') echo "active"?> btn-sm">
												    <input value="absent" type="radio" name="attendance['<?php echo $student_id?>']" <?php if ($attendance == 'absent') echo "checked=\"checked\""?>><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span><span class="hidden-xs"> Absent</span>
												  </label>
												 <?php } elseif ($_POST['attendance_type'] == 'Noted') { ?>	
												    <input value="<?php echo $attendance ?>" type="text" class="form-control" name="attendance['<?php echo $student_id?>']"> 
												 <?php } ?>	
											 <?php } ?>						  
											</div>
										</td>
										<td>
											<div class="btn-group" data-toggle="buttons">
											  <label class="btn btn-default btn-sm">
											    <input value="justified" name="sick_note['<?php echo $student->student_id()?>']" type="checkbox" ><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span><span class="hidden-xs"> Justifié</span>
											  </label>
											</div>
										</td>
									</tr>
									<?php } ?>
								<?php } else { ?>
									<tr>
										<td colspan="4"></td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
							<?php if (!empty($_POST['seance'])) {?>
							<div class="panel-body">
								<label for="basic-url">Ajoutez un élève à la liste</label>
								<div class="input-group">
								 	<input name="student_mail" type="text" class="form-control" aria-describedby="basic-addon3">
  									<span class="input-group-addon" id="basic-addon3">@student.vinci.be</span>
								  <div class="input-group-btn">
								    <input name="form_add_student_attendance" value="Ajouter" type="submit" class="btn btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
								  </div>
								</div>
								<br>
								<input class="btn btn-lg btn-primary btn-block" type="submit" value="Enregistrer" name="form_take_attendances">							
							</div>
							<?php } ?>
							</form> 									
							
						</div>					
					</div>
			</div>
		</div>
		<!-- /container -->
		<?php include_once(PATH_VIEWS . "js_files.php"); ?>
	</body>
</html>
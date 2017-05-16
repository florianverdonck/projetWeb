<?php $page="professor"; ?>
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
									<?php if (isset($_POST['week'])) {?>								
										<?php foreach ($weeks as $week) { ?>
											<option value="<?php echo $week->html_week_id() ?>" <?php if ($_POST['week'] == $week->html_week_id()) echo "selected=\"selected\""?>>
											Semaine n°<?php echo $week->html_week_number() ?>
											</option>
										<?php } ?>								
									<?php } else { ?>
										<?php foreach ($weeks as $week) { ?>
											<option value="<?php echo $week->html_week_id() ?>" <?php if ($week->html_week_number() == $current_week->html_week_number()) echo "selected=\"selected\""?>>
											Semaine n°<?php echo $week->html_week_number() ?>
											</option>
										<?php } ?>
									<?php } ?>									
								<?php } ?>
								</select>
								<br><br>
								<label for="inputWeekSelect">Sélectionnez la série </label><br>
								<select name="serie" class="selectpicker" id="inputSerieSelect">
																
								<?php if ($series != '') { ?>
									<option value=""> Toutes les séries
									<?php foreach($series as $serie) {?>
									<option value="<?php echo $serie->html_serie_id()?>" <?php if (isset($_POST['serie']) && $_POST['serie'] == $serie->html_serie_id()) echo "selected=\"selected\""?>>
									Série n°<?php echo $serie->html_serie_numero()?></option>
									<?php }?>
								<?php } ?>
								</select>
								<br><br>
								<label>Sélectionnez le type de présence </label><br>
								<div class="btn-group" data-toggle="buttons">
									<label class="btn btn-default btn-sm">
										<input type="radio" name="attendance_type" value="X">X
									</label>
									<label class="btn btn-default btn-sm">
										<input type="radio" name="attendance_type" value="XO">XO
									</label>
									<label class="btn btn-default btn-sm">
										<input type="radio" name="attendance_type" value="noted">Noté
									</label>
									<label class="btn btn-default active btn-sm">
										<input type="radio" name="attendance_type" value="default" checked="checked">Défaut
									</label>				
								</div>								
								<br><br>
								<input class="btn btn-lg btn-primary btn-block" type="submit" value="Filtrer" name="form_sort_attendances">
								</form>							
						</div>
					</div>
					<?php if (!empty($_POST['seance']) && !empty($_POST['week'])) {?>	
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Recherchez un élève par mot-clé</h3>
						</div>
						<div class="panel-body">
								<form action="index.php?user=professor" method="post"> 									
									<input type="hidden" name="bloc" value="<?php echo $_POST['bloc']?>">
									<input type="hidden" name="term" value="<?php echo $_POST['term']?>">
									<input type="hidden" name="seance" value="<?php if (isset($_POST['seance'])) echo $_POST['seance']?>">
									<input type="hidden" name="week" value="<?php if (isset($_POST['week'])) echo $_POST['week']?>">
									<input type="hidden" name="serie" value="<?php if (isset($_POST['serie'])) echo $_POST['serie']?>">
									<input type="hidden" name="attendance_type" value="<?php if (isset($_POST['attendance_type'])) echo $_POST['attendance_type']?>">
									<label for="student">Entrez le nom ou prénom de l'élève </label><br>
									<input id="student" name="keyword" type="text" class="form-control">
									<br>
									<input class="btn btn-lg btn-primary btn-block" type="submit" value="Rechercher" name="form_search_student">	
								</form>							
						</div>
					</div>
					<?php } ?>
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
										<th>Détails</th>								
										<th>Nom<span class="hidden-xs"> de famille</span></th>
										<th>Pré<span class="hidden-xs">nom</span></th>
										<?php if (isset($_POST['attendance_type']) && $_POST['attendance_type'] == 'noted') { ?>
										<th>Note</th>
										<?php } else { ?>	
										<th>Prés<span class="hidden-xs">ence</span></th>
										<?php } ?>
										<th>Cert<span class="hidden-xs">ificat</span></th>
									</tr>
								</thead>
								<tbody>
								<?php if ($students != null) {?>
									<?php foreach ($students as $student) { ?>		
									<tr>
										<td><a href="index.php?user=student&viewStudent=<?php echo $student->html_student_id()?>"> <span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span></a></td>
										<td><?php echo $student->html_name()?></td>
										<td><?php echo substr($student->html_first_name(), 0, 1)?><span class="hidden-xs"><?php echo substr($student->html_first_name(), 1, strlen($student->html_first_name()))?></span>
										</td>
										<td>
											<div class="btn-group" data-toggle="buttons">
											<?php if (isset($_POST['attendance_type'])) { ?>
											<?php $attendance = $student->html_attendance();
												  $student_id = $student->html_student_id();   ?>
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
												 <?php } elseif ($_POST['attendance_type'] == 'noted') { ?>	
												    <input value="<?php if (preg_match('/[0-9]+/', $attendance)) { echo $attendance; } ?>" type="text" class="form-control" name="attendance['<?php echo $student_id?>']">
												 <?php } ?>	
											 <?php } ?>						  
											</div>
										</td>
										<td>
											<div class="btn-group" data-toggle="buttons">
											  <label class="btn btn-default <?php if ( $student->html_sick_note() == 'justified') echo "active"?> btn-sm">
											    <input value="justified" name="sick_note['<?php echo $student->student_id()?>']" type="checkbox" <?php if ( $student->html_sick_note() == 'justified') echo "checked=\"checked\""?> ><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span><span class="hidden-xs"> Justifié</span>
											  </label>
											</div>
										</td>
									</tr>
									<?php } ?>
								<?php } if ($new_student != null) { ?>
									<tr>
										<td><a href="index.php?user=student&viewStudent=<?php echo $student->html_student_id()?>"> <span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span></a></td>
										<td><?php echo $new_student->html_name()?></td>
										<td><?php echo substr($new_student->html_first_name(), 0, 1)?><span class="hidden-xs"><?php echo substr($new_student->html_first_name(), 1, strlen($new_student->html_first_name()))?></span>
										</td>
										<td>
											<div class="btn-group" data-toggle="buttons">
											<?php if (isset($_POST['attendance_type'])) { ?>
											<?php $attendance = $new_student->html_attendance();
												  $student_id = $new_student->html_student_id();  ?>
												<?php if ($_POST['attendance_type'] == 'XO'){ ?>
												  <label class="btn btn-default active btn-sm">
												    <input value="active" type="radio" name="attendance['<?php echo $student_id?>']" checked="checked" ><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span><span class="hidden-xs"> Actif</span>
												  </label>
												  <label class="btn btn-default btn-sm">
												    <input value="passive" type="radio" name="attendance['<?php echo $student_id?>']"><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span><span class="hidden-xs"> Passif</span>
												  </label>
												  <label class="btn btn-default btn-sm">
												    <input value="absent" type="radio" name="attendance['<?php echo $student_id?>']"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span><span class="hidden-xs"> Absent</span>
												  </label>
												 <?php } elseif ($_POST['attendance_type'] == 'X') { ?>
												  <label class="btn btn-default active btn-sm">
												    <input value="present" type="radio" name="attendance['<?php echo $student_id?>']" checked="checked"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span><span class="hidden-xs"> Present</span>
												  </label>
												  <label class="btn btn-default btn-sm">
												    <input value="absent" type="radio" name="attendance['<?php echo $student_id?>']"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span><span class="hidden-xs"> Absent</span>
												  </label>
												 <?php } elseif ($_POST['attendance_type'] == 'noted') { ?>	
												    <input value="<?php if (preg_match('/[0-9]+/', $attendance)) { echo $attendance; } ?>" type="text" class="form-control" name="attendance['<?php echo $student_id?>']">
												 <?php } ?>	
											 <?php } ?>						  
											</div>
										</td>
										<td>
											<div class="btn-group" data-toggle="buttons">
											  <label class="btn btn-default <?php if ( $new_student->html_sick_note() == 'justified') echo "active"?> btn-sm">
											    <input value="justified" name="sick_note['<?php echo $new_student->student_id()?>']" type="checkbox" <?php if ( $new_student->html_sick_note() == 'justified') echo "checked=\"checked\""?> ><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span><span class="hidden-xs"> Justifié</span>
											  </label>
											</div>
										</td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
							<?php if (!empty($_POST['seance']) && !empty($_POST['week']) && !empty(isset($_POST['serie']))) {?>	
							<div class="panel-body">
								<label>Ajoutez un élève présent d'un autre bloc ou série</label>
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
		<?php require_once(PATH_VIEWS . "js_files.php"); ?>
	</body>
</html>
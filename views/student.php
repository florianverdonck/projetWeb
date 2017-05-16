<?php $page="student"; ?>
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
							<h3 class="panel-title">Filtrez ici pour voir vos présences</h3>
						</div>
						<div class="panel-body">
							<form class="" action="index.php?user=student" method="post">
								
								<label for="inputWeekSelect">Sélectionnez la semaine </label><br>
								<select class="selectpicker" id="inputWeekSelect" name="inputWeekSelect">
										<option value="not_specified">
											Toutes les semaines
										</option>
									
									<?php foreach ($weeks_term1 as $week) { ?>
										<option value="<?php echo $week->html_week_id() ?>">
											Semaine n°<?php echo $week->html_week_number() ?>
										</option>
									<?php } ?>	
									<option data-divider="true"></option>
									<?php foreach ($weeks_term2 as $week) { ?>
										<option value="<?php echo $week->html_week_id() ?>">
											Semaine n°<?php echo $week->html_week_number() ?>
										</option>
									<?php } ?>	
								</select>
								<br><br>
								<label for="seanceTemplateSelect">Sélectionnez l'UE/AA</label><br>
								<select class="selectpicker" id="inputUESelect" name="inputUESelect">
									
										<option value="not_specified">
											Toutes les UE/AA
										</option>
									
										<?php foreach ($courses as $key => $course) { ?>
											<option value="<?=$key?>">
											<?=$course?>
											</option>
										<?php } ?>	
								</select>
								<br><br>
								<label for="typeOfPresenceSelect">Sélectionnez le type de présence </label><br>
								<select class="selectpicker" id="inputPresenceSelect" name="inputPresenceSelect">
									<option value="not_specified">Tout type de présence</option>
									<option value="active">Présent</option>
									<option value="absent">Absent</option>
								</select>
								<br><br>
								<button class="btn btn-lg btn-primary btn-block" type="submit" name="formSeancesFilter">Filtrer</button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Table de présences <?php if (isset($_GET['viewStudent'])) { ?>de <?= $this->_student->html_first_name() . " " . $this->_student->html_name(); }?></h3>
						</div>
						<table class="table">
							<thead>
								<tr>
									<th>Semaine <span class="hidden-xs">n°</span></th>
									<th>Séance<span class="hidden-xs"> type</span></th>
									<th>Présence</th>
									<th>Cert<span class="hidden-xs">ificat</span></th>
								</tr>
							</thead>
							<tbody>
								
								<?php foreach ($attendances as $key => $attendance) { ?>
																
								<tr>
									<th scope="row"><?=$attendance->html_week_number();?></th>
									<td><?=$attendance->html_seance_template_name();?></td>
									<td>
										
										<?php
											
											$noted = false;
											$presentButtonStatus = "";
											$absentButtonStatus = "";
											$sickNoteButtonStatus = "";
											
											if ($attendance->html_sick_note()=="justified") {
												$sickNoteButtonStatus = "active";
											}
											
											if ($attendance->html_attendance() == "present") {
												$presentButtonStatus = "active";
											} else if ($attendance->html_attendance() == "absent") {
												$absentButtonStatus = "active";
											} else {
												$noted = true;
											}
											
										?>
										
										<?php if (!$noted) { ?>
										<div class="btn-group" data-toggle="buttons">
										  <label class="btn btn-default <?=$presentButtonStatus?> btn-sm">
										    <input type="radio" name="options"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span><span class="hidden-xs"> Présent</span>
										  </label>
										  <label class="btn btn-default <?=$absentButtonStatus?> btn-sm">
										    <input type="radio" name="options" checked><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span><span class="hidden-xs"> Absent</span>
										  </label>
										</div>
										<?php } else { ?>
										
										<div class="input-group">
										  <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?=$attendance->html_attendance()?>">
										</div>
										
										<?php } ?>
									</td>
									<td>
										<div class="btn-group" data-toggle="buttons">
										  <label class="btn btn-default <?=$sickNoteButtonStatus?> btn-sm">
										    <input type="checkbox"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span><span class="hidden-xs"> Justifié</span>
										  </label>
										</div>
									</td>
									
								</tr>
								
								<?php } ?>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- /container -->
		<?php include_once(PATH_VIEWS . "js_files.php"); ?>
	</body>
</html>
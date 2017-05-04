<?php $page="bloc_responsible_series"; ?>
<!DOCTYPE html>
<html lang="fr">
	<?php include_once(PATH_VIEWS . "header.php"); ?>
	<body>
		<?php include_once(PATH_VIEWS . "navbar.php"); ?>
		<div class="container">
			<div class="row">
				<div class="col-md-10">
					<?php
						
					// Loop on each serie available in database and create a "col-md-3" for each
					for ($serie = 1; $serie <= $numberOfSeries; $serie++) {
						
						// If it's a 1, 5, 9, ... serie, it should begin a new row ! Mark it as opened so we are sure we close it at the end
						if (((($serie-1)%4)) == 0) { $opened = true; ?>
						
						<!-- BALISE ROW OUVERTE -->
						<div class="row">
							
						<?php } ?>
						
						
						<div class="col-md-3 col-sm-6">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h3 class="panel-title">Série <?php echo $serie; ?></h3>
								</div>
								<table class="table">
									<thead>
										<tr>
											<th>#</th>
											<th>Nom</th>
										</tr>
									</thead>
									<tbody>
										<?php if($studentsInSerie[$serie] != null) { foreach ($studentsInSerie[$serie] as $key => $value){ ?>
										<tr>
											<th scope="row"><?=$key+1;?></th>
											<td><?=$value->name() . " " . $value->first_name();?></td>
										</tr>
										<?php } } else { ?>
										<tr>
											<th scope="row">0</th>
											<td>Aucun étudiant</td>
										</tr>
										<?php
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
						
						<?php 
							
							// If it's a 4, 8, ... serie, we should close the "row" opened previously, and mark it as closed !
							
							if ((($serie)%4) == 0) { $opened = false; ?>
						
							</div> <!-- FERMETURE DE ROW -->
					
							<?php } ?>
					
					<?php
						
					// Mark the end of the FOR looping over series	
						
					}
					
					?>
					
					<?php
						// If the "row wasn't closed previously, close it now. It happens when the counter doens't pass 4 or 8, so it is opened but the row is not full so never closed
						
						if ($opened) { ?>
						
						</div> <!-- FERMETURE DE ROW AVANT L'HEURE -->
					
					<?php } ?>
			</div>
			<div class="col-md-2 col-sm-12">
				<div class="col-md-2 col-sm-12 affix mobileNotFixed">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Editer les séries</h3>
						</div>
						<div class="panel-body">
							<form action="index.php?user=bloc_responsible&action=series" method="POST">
								<label for="inputStudentSelect">Nom de l'élève</label><br>
								<select class="selectpicker" id="inputStudentSelect" name="studentMail">
									<?php 
										foreach ($studentsNotInSeries as $student) {
										
										?>
									<option value="<?php echo $student->html_mail();?>"><?php echo $student->html_name();?> <?php echo $student->html_first_name();?></option>
									<?php
										}	
										?>
								</select>
								<br><br>
								<label for="inputWeekSelect">Placer dans</label><br>
								<select class="selectpicker dropup" data-dropup-auto="false" id="inputWeekSelect" name="destinationSerie">
									<?php foreach ($series as $key => $serie){ ?>
									<option value="<?=$serie->serie_id()?>">Série <?=$serie->serie_numero()?></option>
									<?php } ?>
								</select>
								<br><br>
								<button class="btn btn-lg btn-primary btn-block" type="submit" name="formInsertSerie">Insérer<span class="hidden-md"> l'élève</span></button>
							</form>
						</div>
						<div class="panel-body">
							<form action="index.php?user=bloc_responsible&action=series" method="POST">
								<label for="inputWeekSelect">Série de l'étudiant</label><br>
								<select class="selectpicker dropup" data-dropup-auto="false" id="inputWeekSelect" name="originSerie">
									<?php foreach ($series as $key => $serie){ ?>
									<option value="<?=$serie->serie_id()?>">Série <?=$serie->serie_numero()?></option>
									<?php } ?>
								</select>
								<br><br>
								<label for="inputWeekSelect">Numéro de l'élève</label><br>
								<select class="selectpicker dropup" data-dropup-auto="false" id="inputWeekSelect" name="studentNumber">
									<?php
										for ($studentNumberGenerated = 1; $studentNumberGenerated <= $maxNumberOfStudentsSerie; $studentNumberGenerated++) {
									?>
										<option value="<?=$studentNumberGenerated;?>">Etudiant n°<?=$studentNumberGenerated;?></option>
									<?php
										}
									?>
								</select>
								<br><br>
								<label for="inputWeekSelect">Déplacer dans</label><br>
								<select class="selectpicker dropup" data-dropup-auto="false" id="inputWeekSelect" name="destinationSerie">
									<?php foreach ($series as $key => $serie){ ?>
									<option value="<?=$serie->serie_id()?>">Série <?=$serie->serie_numero()?></option>
									<?php } ?>
								</select>
								<br><br>
								<button class="btn btn-lg btn-primary btn-block" type="submit" name="formChangeSerie">Déplacer<span class="hidden-md"> l'élève</span></button>
							</form>
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
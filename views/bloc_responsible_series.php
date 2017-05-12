<?php $page="bloc_responsible_series"; ?>
<!DOCTYPE html>
<html lang="fr">
	<?php include_once(PATH_VIEWS . "header.php"); ?>
	<body>
		<?php include_once(PATH_VIEWS . "navbar.php"); ?>
		<div class="container">
			<div class="row">
				<form action="index.php?user=bloc_responsible&action=series&bloc=<?=$this->_bloc;?>&trim=<?=$this->_term;?>" method="post">
				<?php if ($numberOfSeries > 0) { ?>
				<div class="col-md-10" id="series">

					<?php
							$serieCounter = 1;
							// Loop on each serie available in database and create a "col-md-3" for each
							foreach ($studentsInSerie as $serie_id => $studentsInThis) {
								
								
								// If it's a 1, 5, 9, ... serie, it should begin a new row ! Mark it as opened so we are sure we close it at the end
								if (((($serieCounter-1)%4)) == 0) { $opened = true; ?>
								
								<!-- BALISE ROW OUVERTE -->
								<div class="row">
									
								<?php } ?>
								
								
								<div class="col-md-3 col-sm-6">
									<div class="panel panel-primary">
										<div class="panel-heading">
											
											   <button type="submit" class="submit-with-icon pull-right" name="formDeleteSerie" value="<?=$serie_id?>">
											     <span class="glyphicon glyphicon-remove"></span>
											   </button>
											
											
											<h3 class="panel-title">Série <?php echo $serieCounter; ?></h3>
											
										</div>
										<table class="table">
											<thead>
												<tr>
													<th>#</th>
													<th>Nom</th>
												</tr>
											</thead>
											<tbody>
												<?php if($studentsInThis != null) { foreach ($studentsInThis as $key => $student){ ?>
												<tr>
													<th scope="row"><?=$key+1;?></th>
													<td><?=$student->name() . " " . $student->first_name();?></td>
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
									
									if ((($serieCounter)%4) == 0) { $opened = false; ?>
								
									</div> <!-- FERMETURE DE ROW -->
							
									<?php } ?>
							
							<?php
								
							// Mark the end of the FOR looping over series	
								$serieCounter++;
							}
							
							?>
							
							<?php
								// If the "row wasn't closed previously, close it now. It happens when the counter doens't pass 4 or 8, so it is opened but the row is not full so never closed
								
								if ($opened) { ?>
								
								</div> <!-- FERMETURE DE ROW AVANT L'HEURE -->
							
							<?php } ?>
				</form>							
			</div>
			<div class="col-md-2 col-sm-12">
				<div class="col-md-2 col-sm-12 affix mobileNotFixed">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Editer les séries</h3>
						</div>
						<div class="panel-body">
							<form action="index.php?user=bloc_responsible&action=series&bloc=<?=$this->_bloc;?>&term=<?=$this->_term;?>" method="POST">
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
							<form action="index.php?user=bloc_responsible&action=series&bloc=<?=$this->_bloc;?>&term=<?=$this->_term;?>" method="POST">
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
									<option value="delete">Enlever de la série</option>
								</select>
								<br><br>
								<button class="btn btn-lg btn-primary btn-block" type="submit" name="formChangeSerie">Déplacer<span class="hidden-md"> l'élève</span></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
						
					// If there is no series
					
					} else { ?>
					
					<!-- VUE AUCUNE SERIE -->
					
						<div class="col-md-12 col-sm-12">
							
							<h2 class="pb20">Répartition automatique des étudiants par séries</h2>
							
							<div class="panel panel-primary">
										<div class="panel-heading">
											<h3 class="panel-title">Aide à la répartition</h3>
										</div>
										<form action="index.php?user=bloc_responsible&action=series&bloc=<?=$this->_bloc;?>&term=<?=$this->_term;?>" method="POST">
											<table class="table">
												<thead>
													<tr>
														<th>Nombre de séries</th>
														<?php for ($seriesIterator = 1; $seriesIterator<=12; $seriesIterator++) { ?>
														<th><?=$seriesIterator?></th>
														<?php } ?>
													</tr>
												</thead>
												<tbody>
													<tr>
														<th scope="row">Etudiants par série</th>
														<?php for ($seriesIterator = 1; $seriesIterator<=12; $seriesIterator++) { ?>
														<td><?php echo (int)($numberStudents/$seriesIterator) ?></td>
														<?php } ?>
													</tr>
													<tr>
														<th scope="row">Répartir les étudiants</th>
														<?php for ($seriesIterator = 1; $seriesIterator<=12; $seriesIterator++) { ?>
														<td><button class="btn btn-xs btn-primary" name="formAutoFillSeries" value="<?=$seriesIterator?>" type="submit"><?=$seriesIterator?></button></td>
														<?php } ?>
													</tr>
												</tbody>
											</table>
										</form>
									</div>

							
						</div>
						
					<?php } ?>		

		</div>
		</div>
		<!-- /container -->
		<?php include_once(PATH_VIEWS . "js_files.php"); ?>
	</body>
</html>
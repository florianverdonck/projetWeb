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
								<input name="user" value="professor" type="hidden"> 
								<label for="inputBlocSelect">Sélectionnez le bloc </label><br>
								<div class="btn-group" data-toggle="buttons" id="inputBlocSelect">
									<label class="btn btn-default active btn-sm">
										<input type="radio" name="bloc" value="1" checked>Bloc 1
									</label>
									<label class="btn btn-default btn-sm">
										<input type="radio" name="bloc" value="2">Bloc 2
									</label>
									<label class="btn btn-default btn-sm">
									    <input type="radio" name="bloc" value="3">Bloc 3
									</label>
								</div>
								<br><br>
								<label for="inputTermSelect">Sélectionnez le quadrimestre </label><br>
								<div class="btn-group" data-toggle="buttons" id="inputBlocSelect">
									<label class="btn btn-default active btn-sm">
										<input type="radio" name="term" value="1" checked>Quadrimestre 1
									</label>
									<label class="btn btn-default btn-sm">
										<input type="radio" name="term" value="2">Quadrimestre 2
									</label>
								</div>
								<br><br>
								<input class="btn btn-lg btn-primary btn-block" type="submit" value="Filtrer">
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
									
	<!-- 								<tr> -->
	<!-- 									<th scope="row">4</th> -->
	<!-- 									<td>200</td> -->
	<!-- 									<td><span class="hidden-xs">Florian</span></td> -->
	<!-- 									<td>Verdonck</td> -->
	<!-- 									<td> -->
	<!-- 										<div class="btn-group" data-toggle="buttons"> -->
	<!-- 										  <label class="btn btn-default active btn-sm"> -->
	<!-- 										    <input type="radio" name="options"> 0 -->
	<!-- 										  </label> -->
	<!-- 										  <label class="btn btn-default btn-sm"> -->
	<!-- 										    <input type="radio" name="options"> 1 -->
	<!-- 										  </label> -->
	<!-- 										  <label class="btn btn-default btn-sm"> -->
	<!-- 										    <input type="radio" name="options" checked> Abs<span class="hidden-xs">ent</span> -->
	<!-- 										  </label> -->
	<!-- 										</div> -->
	<!-- 									</td> -->
	<!-- 									<td> -->
	<!-- 										<div class="btn-group" data-toggle="buttons"> -->
	<!-- 										  <label class="btn btn-default btn-sm"> -->
	<!-- 										    <input type="checkbox"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span><span class="hidden-xs"> Justifié</span> -->
	<!-- 										  </label> -->
	<!-- 										</div> -->
	<!-- 									</td> -->
	<!-- 								</tr> -->
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
						</form>				
					</div>
				</div>
			</div>
		</div>
		<!-- /container -->
		<?php include_once(PATH_VIEWS . "js_files.php"); ?>
	</body>
</html>
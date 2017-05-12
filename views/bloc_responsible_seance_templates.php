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
							<form action="index.php?user=bloc_responsible&action=seance_templates&bloc=<?=1;?>&term=<?=$this->_term;?>" method="POST">

								<label for="inputUESelect">UE/AA concernée</label><br>
								<select class="selectpicker" id="inputUESelect" name="inputUESelect">										
									<?php  if ($array_ue != null) { foreach ($array_ue as $key => $ue) { ?>		
										<option value="<?=$ue->code();?>"><?=$ue->name();?></option>	
									<?php		
										} }
									?>
								</select><br><br>
								
								<div class="form-group">
							        <label>Nom de la séance type</label>
							        <input type="text" name="inputSeanceName" class="form-control" />
							    </div>
								
															
								<label for="inputTypeOfPresence">Type de présence par défaut</label><br>
								<div class="btn-group" data-toggle="buttons" id="inputTypeOfPresence">
								  <label class="btn btn-default active btn-sm">
								    <input type="radio" name="presenceType" value="x" checked>X
								  </label>
								  <label class="btn btn-default btn-sm">
								    <input type="radio" name="presenceType" value="xo">XO
								  </label>
								  <label class="btn btn-default btn-sm">
								    <input type="radio" name="presenceType" value="noted">Noté</span>
								  </label>
								</div><br><br>
								
								<label for="inputTypeOfPresence">Séries concernées</label><br>
								<div class="btn-group" data-toggle="buttons" id="inputTypeOfPresence">
								  			
								  			<label class="btn btn-default btn-sm active">
												<input type="checkbox" autocomplete="off" name="seriesSelected[]" value="all" checked>Toutes les séries
											</label>
								  							  
								  	<?php
									  		if ($array_series != null) {
										
											foreach ($array_series as $key => $serie) {
										
										?>		
											<label class="btn btn-default btn-sm">
												<input type="checkbox" autocomplete="off" name="seriesSelected[]" value="<?=$serie->serie_id();?>"><?=$serie->serie_numero();?>
											 </label>
									<?php		
										} }
									?>
									
											
	
								</div>
								<br><br><br>
	
								<button class="btn btn-lg btn-primary btn-block" type="submit" name="formAddSeanceTemplate">Ajouter la séance type</button>
							</form>
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
									<th>Nom<span class="hidden-xs"> de la séance</span></th>
									<th>UE/AA<span class="hidden-xs"> concernée</span></th>
									<th><span class="hidden-xs">Type de</span> présence</th>
									<th><span class="hidden-xs">Séries</span> impliquées</th>
								</tr>
							</thead>
							<tbody>
								
								<?php
									
									if ($array_seances_templates != null) {
									
									foreach ($array_seances_templates as $key => $seance_template) {
										
								?>
								<tr>
									<td><?=$seance_template->html_name();?></td>
									<td><?=$seance_template->html_ue_name();?></td>
									<td><?=$seance_template->html_attendance_type();?></td>
									<td>
										<?php
											
											foreach ($seance_template->series() as $key => $serie) {
												
										?>
										
											<span class="label label-default"><?=$serie;?></span>
										
										<?php
												
											}
											
										?>
									</td>
								</tr>
								
								<?php
									
									} }
										
								?>
								
							</tbody>
					</div>
				</div>
				
			</div>
			
		</div>
		
		<?php include_once(PATH_VIEWS . "js_files.php"); ?>
	</body>
</html>

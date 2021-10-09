<div class="row">
	 
 	<div class="col-12 card p-3 mb-3">
	
		<h2>Certificats</h2>
		<table class="table" border="1">
			<tr>
				<th>Idcertif</th>
				<th>Titre</th>
				<th>Date Effectuee</th>
				<th>Periode</th>
				<th>Actions</th>
			</tr>
			<?php foreach($certificats as $c){ ?>
			<tr>
				<td>
					<?php echo $c['idcertif']; ?>
 				</td>
				<td class="text-truncate" style="max-width:100px;"><?php echo $c['title']; ?></td>
				<td><?php echo $c['dateeffectuee']; ?></td>
				<td><?php echo $c['periode']; ?></td>
				<td>

					<!-- <a href="<?php //echo site_url('certificat/edit/'.$c['idcertif']); ?>" class="btn btn-warning">Modifier</a> -->
					<a href="<?php echo site_url('certificat/detail/'.$c['idcertif']); ?>" class='btn btn-primary text-white'>Ouvrir</a>
					<a href="<?php echo site_url('certificat/remove/'.$c['idcertif']); ?>" class="btn btn-danger">Supprimer</a>
					<!-- <a href="<?php// echo site_url('certificat/pdf/'.$c['idcertif']); ?>" class="btn btn-success" target="_blank">Generate PDF</a> -->
				</td>
			</tr>
			<?php } ?>
		</table>
		<a href="<?php echo site_url('certificat/add'); ?>" class="btn btn-outline w-25 btn-dark">Ajouter Certificat</a>
		
		<br><br> 
		<!-- <h2>Benificiares</h2>

		<table class="table" border="1" width="100%">
			<tr>
				<th>Userid</th>
				<th>Usertype</th>
				<th>Matricule</th>
				<th>Cin</th>
				<th>Nom</th>
				<th>Prenom</th>
				<th>Num Etab Sec</th>
				<th>Cod Category</th>
				<th>Cod Tva</th>
			<th>benificiare</th>
				<th>Actions</th>
			</tr>
			<?php //foreach($benificiares as $u){ ?>
			<tr>
				<td><?php //echo $u['userid']; ?></td>
				<td><?php// echo $u['usertype']; ?></td>
				<td><?php //echo $u['matricule']; ?></td>
				<td><?php //echo $u['cin']; ?></td>
				<td><?php //echo $u['nom']; ?></td>
				<td><?php// echo $u['prenom']; ?></td>
				<td><?php// echo $u['num_etab_sec']; ?></td>
				<td><?php// echo $u['cod_category']; ?></td>
				<td><?php// echo $u['cod_tva']; ?></td>
					<td><?php //echo $u['is_benificiare']; ?></td>
				<td>
					<a href="<?php //echo// site_url('user/edit/'.$u['userid']); ?>">Edit</a> | 
					<a href="<?php //echo //site_url('user/remove/'.$u['userid']); ?>">Delete</a>
				</td>
			</tr>
			<?php //} ?>
		</table> -->

	</div>
	<div class="col-12 card p-3 card h-100  mb-3 p-3">
		<h2>Historiques</h2> 
		<table class="table" border="1">
			<tr>
				<th>ID</th>
 				<th>User</th>
				<th>Certificat</th>
				<th>Date Rempli</th>
				<th>Actions</th>
			</tr>
			<?php foreach($histories as $h){ ?>
			<tr>
				<td> 
				<?php echo $h['id_history']; ?>
				</td>
				<td><?php echo $h['user_id']; ?></td>
				<td><?php echo $h['certif_id']; ?></td>
				<td><?php echo $h['date_rempli']; ?></td>
 				<td>
 				 <a href="<?php echo site_url('history/pdf/'.$h['id_history']); ?>" class="btn btn-success" target="_blank">Generer PDF</a>
				</td>
			</tr>
			<?php } ?>
			<tr>
				<td>
					<a href="<?php echo site_url('history/add'); ?>" class="btn btn-secondary">Ajouter</a>	
				</td>
			</tr>
		</table>
	</div>
</div>
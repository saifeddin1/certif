<table class="table" border="1">
    <tr>
		<th>Idcertif</th>
		<th>Dateeffectuee</th>
		<th>Periode</th>
		<th>Datesignature</th>
		<th>User Id</th>
		<th>Actions</th>
    </tr>
 	<?php foreach($certificats as $c){ ?>
    <tr>
		<td>
		<a href="<?php echo site_url('certificat/detail/'.$c['idcertif']); ?>" class='fs-4'>
				<?php echo $c['idcertif']; ?>
			</a>
		</td>
		<td><?php echo $c['dateeffectuee']; ?></td>
		<td><?php echo $c['periode']; ?></td>
		<td><?php echo $c['datesignature']; ?></td>
		<td><?php echo $c['user_id']; ?></td>
		<td>
            <a href="<?php echo site_url('certificat/edit/'.$c['idcertif']); ?>" class="btn btn-warning">Edit</a>
            <a href="<?php echo site_url('certificat/remove/'.$c['idcertif']); ?>" class="btn btn-danger">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
<a href="<?php echo site_url('certificat/add'); ?>" class="btn btn-outline btn-dark">Ajouter Certificat</a>
 
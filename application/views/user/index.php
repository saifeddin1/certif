<table border="1" width="100%">
    <tr>
		<th>Userid</th>
		<th>Usertype</th>
		<th>Matricule</th>
		<th>Cin</th>
		<th>Nom</th>
		<th>Prenom</th>
		<th>Address</th>
		<th>Num Etab Sec</th>
		<th>Cod Category</th>
		<th>Cod Tva</th>
		<th>benificiare</th>
		<th>Actions</th>
    </tr>
	<?php foreach($users as $u){ ?>
    <tr>
		<td><?php echo $u['userid']; ?></td>
		<td><?php echo $u['usertype']; ?></td>
		<td><?php echo $u['matricule']; ?></td>
		<td><?php echo $u['cin']; ?></td>
		<td><?php echo $u['nom']; ?></td>
		<td><?php echo $u['prenom']; ?></td>
		<td><?php echo $u['adress']; ?></td>
		<td><?php echo $u['num_etab_sec']; ?></td>
		<td><?php echo $u['cod_category']; ?></td>
		<td><?php echo $u['cod_tva']; ?></td>
		<td><?php echo $u['is_benificiare']; ?></td>
		<td>
            <a href="<?php echo site_url('user/edit/'.$u['userid']); ?>">Edit</a> | 
            <a href="<?php echo site_url('user/remove/'.$u['userid']); ?>">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>

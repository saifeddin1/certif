<table border="1" width="100%">
    <tr>
		<th>Id Montant Items</th>
		<th>Montant Brut</th>
		<th>Retenue</th>
		<th>Montant Net</th>
		<th>Label Id</th>
		<th>Actions</th>
    </tr>
	<?php foreach($montant_items as $m){ ?>
    <tr>
		<td><?php echo $m['id_montant_items']; ?></td>
		<td><?php echo $m['montant_brut']; ?></td>
		<td><?php echo $m['retenue']; ?></td>
		<td><?php echo $m['montant_net']; ?></td>
		<td><?php echo $m['label_id']; ?></td>
		<td>
            <a href="<?php echo site_url('montant_item/edit/'.$m['id_montant_items']); ?>">Edit</a> | 
            <a href="<?php echo site_url('montant_item/remove/'.$m['id_montant_items']); ?>">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>

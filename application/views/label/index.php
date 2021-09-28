<table border="1" width="100%">
    <tr>
		<th>Id Label</th>
		<th>Label Text</th>
		<th>Certif Id</th>
		<th>Actions</th>
    </tr>
	<?php foreach($labels as $l){ ?>
    <tr>
		<td><?php echo $l['id_label']; ?></td>
		<td><?php echo $l['label_text']; ?></td>
		<td><?php echo $l['certif_id']; ?></td>
		<td>
            <a href="<?php echo site_url('label/edit/'.$l['id_label']); ?>">Edit</a> | 
            <a href="<?php echo site_url('label/remove/'.$l['id_label']); ?>">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>

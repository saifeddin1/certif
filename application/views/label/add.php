<?php echo form_open('label/add'); ?>
<h1>Ajouter label</h1>

	<div>
		Label Text : 
		<input type="text" name="label_text" value="<?php echo $this->input->post('label_text'); ?>" required/><br>
	</div>
	<div>
 		Certif : 
			<select name="certif_id" value="<?php echo $this->input->post('certif_id'); ?>">

				<?php foreach($certificats as $c){ ?>
				<option value='<?php echo $c['idcertif'];?>'>
					<?php echo $c['title'] ;?>
				</option>
				<?php } ?>
			</select>
 	</div>
	
	<button type="submit">Save</button>
 
<?php echo form_close(); ?>
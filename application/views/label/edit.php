<?php echo form_open('label/edit/'.$label['id_label']); ?>

	<div>
		Label Text : 
		<input type="text" name="label_text" value="<?php echo ($this->input->post('label_text') ? $this->input->post('label_text') : $label['label_text']); ?>" />
	</div>
	<div>
		Certif  : 
			<select name="certif_id" value="<?php echo ($this->input->post('certif_id') ? $this->input->post('certif_id') : $label['certif_id']); ?>" >
				<option value='<?php echo $certificat['idcertif'];?>'>
					<?php echo $certificat['title'] ;?>
				</option>
				<?php foreach($certificats as $c){ ?>
				<option value='<?php echo $c['idcertif'];?>'>
					<?php echo $c['title'] ;?>
				</option>
				<?php } ?>
			</select>
 	</div>
	
	<button type="submit">Save</button>
	
<?php echo form_close(); ?>
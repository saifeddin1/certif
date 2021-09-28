<?php echo form_open('montant_item/edit/'.$montant_item['id_montant_items']); ?>

	<div>
		Montant Brut : 
		<input type="text" name="montant_brut" value="<?php echo ($this->input->post('montant_brut') ? $this->input->post('montant_brut') : $montant_item['montant_brut']); ?>" />
	</div>
	<div>
		Retenue : 
		<input type="text" name="retenue" value="<?php echo ($this->input->post('retenue') ? $this->input->post('retenue') : $montant_item['retenue']); ?>" />
	</div>
	<div>
		Montant Net : 
		<input type="text" name="montant_net" value="<?php echo ($this->input->post('montant_net') ? $this->input->post('montant_net') : $montant_item['montant_net']); ?>" />
	</div>
	<div>
		Label Id :
		<select name="label_id" 
		value="<?php echo ($this->input->post('label_id') ? $this->input->post('label_id') : $montant_item['label_id']); ?>">
		<option value='<?php echo $label['id_label'];?>' selected='selected'>
				<?php echo $label['label_text'] ;?>
		</option>
			<?php foreach($labels as $l){ ?>		
			<option value='<?php echo $l['id_label'];?>'>
				<?php echo $l['label_text'] ;?>
			</option>
			<?php } ?>
		</select>  		 
	</div>
	
	<button type="submit">Save</button>
	
<?php echo form_close(); ?>
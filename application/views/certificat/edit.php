<?php echo form_open('certificat/edit/'.$certificat['idcertif']); ?>

	<div>
		Titre : 
		<input type="text" name="titre" value="<?php echo ($this->input->post('titre') ? $this->input->post('titre') : $certificat['title']); ?>" />
	</div>
 
	<div>
		Dateeffectuee : 
		<input type="date" name="dateeffectuee" value="<?php echo ($this->input->post('dateeffectuee') ? $this->input->post('dateeffectuee') : $certificat['dateeffectuee']); ?>" />
	</div>
	<div>
		Periode : 
		<input type="text" name="periode" value="<?php echo ($this->input->post('periode') ? $this->input->post('periode') : $certificat['periode']); ?>" <?php echo(isset($certificat['dateeffectuee'])?'disabled':'') ?> />
	</div>
	<div>
		User : 
		<select name="user_id">
			<option value="">---Choisir---</option>
			<?php foreach($users as $user){ ?>
			<option value='<?php echo $user['userid'];?>'>
				<?php echo $user['nom'].' '.$user['prenom'] ;?>
			</option>
			<?php } ?>
		</select>
 	</div>
	 <div>
		Benificiare: 
		<select name="user_id" id="">
			<option value="">---Choisir---</option>
			<?php foreach($benificiares as $benificiare){ ?>
			<option value='<?php echo $benificiare['userid'];?>'>
				<?php echo $benificiare['nom'].' '.$benificiare['prenom'] ;?>
			</option>
			<?php } ?>
		</select>
 	</div>
	
	<button type="submit">Save</button>
	
<?php echo form_close(); ?>
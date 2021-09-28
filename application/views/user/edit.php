<?php echo form_open('user/edit/'.$user['userid']); ?>

	<div>
		Usertype : 
		<input type="text" name="usertype" value="<?php echo ($this->input->post('usertype') ? $this->input->post('usertype') : $user['usertype']); ?>" />
	</div>
	<div>
		Matricule : 
		<input type="text" name="matricule" value="<?php echo ($this->input->post('matricule') ? $this->input->post('matricule') : $user['matricule']); ?>" />
	</div>
	<div>
		Cin : 
		<input type="text" name="cin" value="<?php echo ($this->input->post('cin') ? $this->input->post('cin') : $user['cin']); ?>" />
	</div>
	<div>
		Nom : 
		<input type="text" name="nom" value="<?php echo ($this->input->post('nom') ? $this->input->post('nom') : $user['nom']); ?>" />
	</div>
	<div>
		Prenom : 
		<input type="text" name="prenom" value="<?php echo ($this->input->post('prenom') ? $this->input->post('prenom') : $user['prenom']); ?>" />
	</div>
	<div>
		Addresse : 
		<input type="text" name="adress" value="<?php echo ($this->input->post('adress') ? $this->input->post('adress') : $user['adress']); ?>" />
	</div>
	<div>
		Num Etab Sec : 
		<input type="text" name="num_etab_sec" value="<?php echo ($this->input->post('num_etab_sec') ? $this->input->post('num_etab_sec') : $user['num_etab_sec']); ?>" />
	</div>
	<div>
		Cod Category : 
		<input type="text" name="cod_category" value="<?php echo ($this->input->post('cod_category') ? $this->input->post('cod_category') : $user['cod_category']); ?>" />
	</div>
	<div>
		Cod Tva : 
		<input type="text" name="cod_tva" value="<?php echo ($this->input->post('cod_tva') ? $this->input->post('cod_tva') : $user['cod_tva']); ?>" />
	</div>
	
	<button type="submit">Save</button>
	
<?php echo form_close(); ?>

<a href="<?php echo site_url('user/add'); ?>" class="btn btn-success mt-3">Ajouter Nouveau</a>
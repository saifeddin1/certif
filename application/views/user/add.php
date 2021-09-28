<?php echo form_open('user/add'); ?>
	<h1>Ajouter benificiare</h1>
	<div>
		Usertype : 
 		<select name="usertype" value="<?php echo $this->input->post('usertype'); ?>"> 
			<option value="freelancer">Freelancer</option>
			<option value="societe">Societé</option>
		</select>
	</div>
	<div>
		Matricule : 
		<input type="text" name="matricule" value="<?php echo $this->input->post('matricule'); ?>" />
	</div>
	<div>
		Cin : 
		<input type="text" name="cin" value="<?php echo $this->input->post('cin'); ?>" />
	</div>
	<div>
		Nom : 
		<input type="text" name="nom" value="<?php echo $this->input->post('nom'); ?>" />
	</div>
	<div>
		Prenom : 
		<input type="text" name="prenom" value="<?php echo $this->input->post('prenom'); ?>" />
	</div>
	<div>
		Addresse : 
		<input type="text" name="adress" value="<?php echo $this->input->post('adress'); ?>" />
	</div>
	<div>
		Num Etab Sec : 
		<input type="text" name="num_etab_sec" value="<?php echo $this->input->post('num_etab_sec'); ?>" />
	</div>
	<div>
		Cod Category : 
		<input type="text" name="cod_category" value="<?php echo $this->input->post('cod_category'); ?>" />
	</div>
	<div>
		Cod Tva : 
		<input type="text" name="cod_tva" value="<?php echo $this->input->post('cod_tva'); ?>" />
	</div>
	Benificiare :<input type="text" name="is_benificiare" value="<?php echo $this->input->post('is_benificiare'); ?>"> <br>
	
	<button type="submit">Save</button>

<?php echo form_close(); ?>
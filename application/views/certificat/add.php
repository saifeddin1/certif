<?php echo form_open('certificat/add'); ?>
<h1>Info certificat</h1>
	<div>
		Titre : 
		<input type="text" name="titre" value="<?php echo $this->input->post('titre'); ?>" />
	</div>
	<div>
		Dateeffectuee : 
		<input type="date" onchange='disable()' name="dateeffectuee" value="<?php echo $this->input->post('dateeffectuee'); ?>" />
	</div>
	<div>
		Periode : 
		<input type="text" name="periode" value="<?php echo $this->input->post('periode'); ?>" />
	</div>
	<div>
		Payeur : 
		<select name="user_id" id="">

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
			<?php foreach($benificiares as $benificiare){ ?>
			<option value='<?php echo $benificiare['userid'];?>'>
				<?php echo $benificiare['nom'].' '.$benificiare['prenom'] ;?>
			</option>
			<?php } ?>
		</select>
 	</div>
	<h2>Labels</h2>
			<div id="labels">

			</div>	
				<button type="button" onclick="add_label()">
					+
				</button>
				<input type="text" id="count" name="count" hidden> 
				<br><br>
		<div>

			<button type="submit">Save</button>
		</div>


	
	<script>

		var i=0;
		function add_label(){
			let input = document.createElement("input");
			let br = document.createElement("br");
			let count = document.getElementById("count");

 			count.setAttribute("value", i);

			input.setAttribute("type", "text");
			input.setAttribute("name", "label_text"+i);
 			input.setAttribute("placeholder", "Label "+i);
			document.getElementById('labels').appendChild(input); 
			document.getElementById('labels').appendChild(br);
			i++;
		}

	function disable(){
		if(document.getElementsByName('dateeffectuee')[0].value != ''){
			document.getElementsByName('periode')[0].setAttribute('disabled',true)
			}
		}
</script>

<?php echo form_close(); ?>




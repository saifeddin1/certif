<?php echo form_open('montant_item/add'); ?>
<h1>Ajouter montants</h1>

	<select name="" id="certif">
		<?php foreach($certificats as $certif){; ?>
			<option value="<?php echo $certif['idcertif'] ?>"><?php echo $certif['idcertif'] ?></option>
		<?php }; ?>

	</select>
	<br><br>
	<div id="certif_label"> </div>
<br><br><br>

	 
 
		<input type="text" id="counter" name="counter" hidden>
	 <button type="submit">Save</button>
 	

<?php echo form_close(); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


<script>

	
	$('#certif').change(function(){
		$('#certif_label').empty(); 
		var i =0;
		var counter = document.getElementById('counter');
		// counter.setAttribute("value",i) ;
		let DropDownSelectedValue = $("#certif").find(":selected").text();
		fetch("<?php echo site_url('certificat/get_labels/'); ?>"+DropDownSelectedValue)
			.then(resp=>resp.json())
				.then(data=>{
					data.items.forEach((item, index)=>{
						var label = document.createElement("label");  
						var labelValue = document.createElement("input");  
						labelValue.setAttribute("name", "label_id"+index);
						labelValue.setAttribute("value", item.id_label);
						labelValue.setAttribute("hidden", true);
						var br = document.createElement("br");  
						var montantBrutInput = document.createElement("input");
						montantBrutInput.setAttribute("name", "montant_brut"+index)
						montantBrutInput.setAttribute("placeholder", `Montant brut ${index}`)
						var retenueInput = document.createElement("input");
						retenueInput.setAttribute("name", "retenue"+index)
						retenueInput.setAttribute("placeholder", `Retenue ${index}`)
						var montantNetInput = document.createElement("input");
						montantNetInput.setAttribute("name", "montant_net"+index) 
						montantNetInput.setAttribute("placeholder", `Montant net ${index}`) 
						
						label.innerHTML = item.label_text;
						counter.setAttribute("value",index) ;

						$('#certif_label').append(label, labelValue, montantBrutInput,retenueInput,montantNetInput, br);
						console.log(counter.value);
					})
				})
});
</script>
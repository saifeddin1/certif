<?php echo form_open('user/register'); ?>

 
<?php echo validation_errors('<div>','</div>'); ?>

<input type="text" name="nom" placeholder="nom"> <br>
<input type="text" name="prenom" placeholder="prenom"> <br>
<input type="text" name="adress" placeholder="adress"> <br>
<input type="text" name="username" placeholder="username"> <br>
<input type="password" name="password" placeholder="password"> <br>
<select name="usertype" id="usertype">
    <option value="">---------</option>
    <option value="freelancer">Freelancer</option>
    <option value="societe">Societé</option>
</select> <br>

<input type="text" name="cin" placeholder="cin" id="cin">  <br>

<input type="text" name="matricule" placeholder="matricule" class="societe"> <br>
<input type="text" name="num_etab_sec" placeholder="num_etab_sec" class="societe">  <br>
<input type="text" name="cod_category" placeholder="cod_category" class="societe"> <br>
<input type="text" name="cod_tva" placeholder="cod_tva"  class="societe">  <br>

<button type="submit">
    Creer un compte
</button>
<?php echo form_close(); ?>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


<script>
    $(document).ready(function(){
        $('#cin').css('display','none');
        $('.societe').hide();
    })
	$('#usertype').change(function(){
        let DropDownSelectedValue = $("#usertype").find(":selected").val();
        console.log(DropDownSelectedValue);
        if(DropDownSelectedValue ==='societe'){
            $('#cin').hide();
            $('.societe').show();
        }else if(DropDownSelectedValue ==='freelancer'){
            $('#cin').show();
            $('.societe').hide();
        }
        
});
</script>
 
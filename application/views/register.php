<div class="container text-center w-50">

    <?php echo form_open('auth/register'); ?>

    
    <?php echo validation_errors('<div>','</div>'); ?>

    <h1>Creer votre compte</h1>
    <input class="my-2 form-control" type="text" name="nom" placeholder="nom"> <br>
    <input class="my-2 form-control" type="text" name="prenom" placeholder="prenom"> <br>
    <input class="my-2 form-control" type="text" name="adress" placeholder="adress"> <br>
    <input class="my-2 form-control" type="text" name="username" placeholder="username"> <br>
    <input class="my-2 form-control" type="password" name="password" placeholder="password"> <br>
    <select name="usertype" id="usertype">
        <option value="">---------</option>
        <option value="freelancer">Freelancer</option>
        <option value="societe">Societé</option>
    </select> <br>

    <input class="my-2 form-control" type="text" name="cin" placeholder="cin" id="cin">  <br>

    <input type="text" name="matricule" placeholder="matricule" class="societe my-2 form-control"> <br>
    <input type="text" name="num_etab_sec" placeholder="num_etab_sec" class="societe my-2 form-control">  <br>
    <input type="text" name="cod_category" placeholder="cod_category" class="societe my-2 form-control"> <br>
    <input type="text" name="cod_tva" placeholder="cod_tva"  class="societe my-2 form-control">  <br>


    <button type="submit" class="btn btn-success">
        Creer un compte
    </button>
    <?php echo form_close(); ?>
    <br>
    <a href="<?php echo site_url('auth/login'); ?>">Se Connecter</a> <br>
</div>
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
    
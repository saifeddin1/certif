<div class="container text-center  card shadow-sm p-5" style="border-radius:30px;width:470px;">

    <?php echo form_open('auth/register'); ?>

    
    <?php echo validation_errors('<div>','</div>'); ?>

    <h1>Creer votre compte</h1>
    <div class="my-4 d-flex justify-content-between">
        <input class="mr-3 form-control" type="text" name="nom" placeholder="Nom"> <br>
        <input class="ml-3 form-control" type="text" name="prenom" placeholder="Prenom"> <br>
    </div>
    <input class="my-2 form-control" type="text" name="adress" placeholder="Address"> <br>
    <input class="my-2 form-control" type="text" name="username" placeholder="Username"> <br>
    <input class="my-2 form-control" type="password" name="password" placeholder="Password"> <br>
    <select name="usertype" id="usertype" class="form-select">
        <option value="">---------</option>
        <option value="freelancer">Freelancer</option>
        <option value="societe">Societé</option>
    </select>  

    <input class="my-2 form-control" type="text" name="cin" placeholder="cin" id="cin">  <br>

  <div id="societe">
    <div class="my-4 d-flex justify-content-between">
        <input type="text" name="matricule" placeholder="Matricule" class="my-2 form-control"> <br>
        <input type="text" name="num_etab_sec" placeholder="N° Etab. Secondaire" class="my-2 form-control">  <br>
    </div>
    <div class="my-4 d-flex justify-content-between">
        <input type="text" name="cod_category" placeholder="Code Category" class="my-2 form-control"> <br>
        <input type="text" name="cod_tva" placeholder="Code T.V.A"  class="my-2  form-control">  <br>
    </div>
  </div>
    

    <button type="submit" class="btn btn-dark w-100 rounded-pill">
       CREER UN COMPTE
    </button>
    <?php echo form_close(); ?>
    <br>
    <a href="<?php echo site_url('auth/login'); ?>">Se Connecter</a> <br>
</div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


    <script>
        $(document).ready(function(){
            $('#cin').css('display','none');
            $('#societe').hide();
        })
        $('#usertype').change(function(){
            let DropDownSelectedValue = $("#usertype").find(":selected").val();
            console.log(DropDownSelectedValue);
            if(DropDownSelectedValue ==='societe'){
                $('#cin').hide();
                $('#societe').show();
            }else if(DropDownSelectedValue ==='freelancer'){
                $('#cin').show();
                $('#societe').hide();
            }
            
    });
    </script>
    
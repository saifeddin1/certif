<div class="container text-center w-50">
<?php if(isset($_SESSION['success'])){ ;?>

<div class="alert alert-success">
<?php echo $_SESSION['success']; ?>
</div>

<?php }else if(isset($_SESSION['error'])){; ?>
    <div class="alert alert-danger"><?php echo $_SESSION['error'];?></div>
<?php }; ?>
<h1>Login</h1>

<?php echo form_open('auth/login'); ?>
    <input class="form-control"  type="text" name="username" placeholder="username"> <br>
    <input  class="form-control" type="password" name="password" placeholder="password"> <br>
    <input  class="btn btn-success" type="submit" value="connecter">
    <?php echo form_close();  ?>
 <br>
<a href="<?php echo site_url('auth/register'); ?>">Creer un compte</a> <br>
</div>
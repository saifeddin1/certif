<?php if(isset($_SESSION['success'])){
echo $_SESSION['success'];
echo $_SESSION['error'];

} ?>
<h1>Login</h1>

<?php echo form_open('user/login'); ?>
    <input type="text" name="username" placeholder="username"> <br>
    <input type="password" name="password" placeholder="password"> <br>
    <input type="submit" value="connecter">
<?php echo form_close();  ?>
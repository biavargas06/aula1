<?php
$pass = $_POST['pass'] ?? false;
if ($pass){

    echo password_hash($pass, PASSWORD_BCRYPT,[
      'cost'  => 12,
    ]); 
    
}
?>

<form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
<input type="password" name="pass">
<br>
<input type="submit" value="Criptografar">
</form>
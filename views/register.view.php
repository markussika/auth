<?php require "views/componentes/head.php" ?>
<?php require "views/componentes/navbar.php" ?>
<h1>register</h1>

<form method="POST">
    <label>
    Email: 
    <input type="email" name="email">
    </label>
    <?php if(isset($errors["email"])){?>
        <p><?= $errors["email"]?></p>
    <?php  }?>
    <label>
    Password<span class="explanation">(jābut tik un tik rakstzimem, simboliem utt.)</span>:
    <input type="password" name="password">
    </label>
    
    <button>Register</button>
</form>

<?php require "views/componentes/footer.php" ?>
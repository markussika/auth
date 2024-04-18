<?php require "views/components/head.php" ?>
<h1>Register</h1>

<form method="POST">
  <label>
    email:
    <input name="email" type="email"/>
  </label>
  <?php if(isset($errors["email"])) {?>
    <p><?= $errors["email"] ?></p>
  <?php } ?>
  <label>
    Password <span class="explanation">(jābūt 8 rakstzīmēm, 1 lielam, 1 mazam un 1 īpaša simbolam un 1 ciparam, good luck)</span>:
    <input name="password" type="password"/>
  </label>
  <?php if(isset($errors["password"])) {?>
    <p><?= $errors["password"] ?></p>
  <?php } ?>
  <button>Register</button>
  
</form>

<?php require "views/components/footer.php" ?>
<!--Headline-->
<div class="headline">
  <h2>Min Profil</h2>
  <div>
    <button id="<?php echo $_SESSION['login_id'] ?>" class="delete">Slet Profil</button>
  </div>
</div>
<?php
$profil = $crud->Select('Users', 'id', $_SESSION['login_id']);
?>
<!--Profile form-->
<form id="profile" onSubmit="return false;">
  <div>
    <div>
      <label for="name">Navn</label>
      <input type="text" name="name" value="<?php echo $profil->name; ?>" id="name" required>
    </div>

    <div>
      <label for="email">Email</label>
      <input type="email" name="emil" value="<?php echo $profil->email; ?>" id="email" required>
    </div>
  </div>

  <div>
    <div>
      <label for="birthday">Fødselsdag</label>
      <input type="date" name="birthday" value="<?php echo $profil->birthday; ?>" id="birthday" required>
    </div>

    <div>
      <label for="password">Skift Password</label>
      <input type="password" name="password" id="password">
    </div>
  </div>

  <div>
    <input type="text" name="userid" id="userid" class="userid" value="<?php echo $_SESSION['login_id']; ?>">
  </div>

    <input id="profile-but" type="submit" value="Gem">
</form>
<script src="js/updateprofile.js"></script>
<script src="js/deleteuser.js"></script>

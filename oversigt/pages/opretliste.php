<div class="headline">
  <h2>Opret Ønskeliste</h2>
  <div>
    <a href="oversigt">Annuller</a>
  </div>
</div>

<form onsubmit="return false;">
  <label for="title">Ønskeliste navn</label>
  <input type="text" name="listname" id="title" required>

  <label for="description">Beskrivelse</label>
  <textarea name="description" id="description"></textarea>

  <input type="text" name="user" id="user_id" value="<?php echo $_SESSION['login_id']; ?>" disabled class="userid">

  <input id="newlist-but" type="submit" value="Opret">
</form>

<script src="js/newlist.js"></script>

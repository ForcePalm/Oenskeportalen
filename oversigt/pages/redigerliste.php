<div class="headline">
  <h2>Rediger ├śnskesedel</h2>
  <div>
    <a href="/oversigt">Annuller</a>
  </div>
</div>

<form onsubmit="return false;">
  <label for="listname">├śnskeliste navn</label>
  <input type="text" name="listname" id="listname" value="" required>

  <label for="description">Beskrivelse</label>
  <textarea name="description" id="description"></textarea>

  <input type="text" name="listid" id="listid" value="" disabled class="userid">

  <input id="editlist-but" type="submit" value="Gem">
</form>

<script src="js/getlist.js"></script>
<script src="js/updatelist.js"></script>

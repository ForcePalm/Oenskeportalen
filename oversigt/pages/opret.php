<div class="headline">
  <h2>Opret Ønske</h2>
  <div>
    <a href="liste">Annuller</a>
  </div>
</div>

<form onsubmit="return false;" enctype="multipart/form-data" id="wishform">
  <div>
    <div>
      <label for="wishname">Ønske navn</label>
      <input type="text" name="wishname" id="wishname" required>

      <label for="wishprice">Pris</label>
      <input type="number" name="wishprice" id="wishprice">

      <label for="wishlink">Link</label>
      <input type="url" name="wishlink" id="wishlink">

      <label for="wishdescription">Beskrivelse</label>
      <textarea name="wishdescription" id="wishdescription"></textarea>
    </div>

    <div>
      <label for="wishimg">Billede</label>
      <input type="file" name="wishimg" id="wishimg" accept="image/*">

      <label for="">Uploadede billede</label>
      <div class="wishpreview">
        <img src="../gfx/nopic.jpg" alt="Uploaded billede" id="output" />
      </div>

    </div>
  </div>

  <input id="newwish-btn" type="submit" value="Opret">
</form>

<!--Preview upload script-->
<script src="../js/preview_upload_script.js"></script>

<script src="js/newwish.js"></script>

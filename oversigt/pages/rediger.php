<div class="headline">
  <h2>Rediger Ønske</h2>
  <div>
    <a href="liste">Annuller</a>
  </div>
</div>

<form onsubmit="return false;">
  <div>
    <div>
      <label for="wishname">Ønske navn</label>
      <input type="text" name="wishname" id="wishname" required>

      <label for="wishprice">Pris</label>
      <input type="number" name="wishprice" id="wishprice">

      <label for="wishlink">Link</label>
      <input type="url" name="wishlink" id="wishlink" value="https://www.pricerunner.dk/pl/165-3200095859/Spil-controllere/Sony-PS5-DualSense-Wireless-Controller-White-Black-Sammenlign-Priser">

      <label for="description">Beskrivelse</label>
      <textarea name="description" id="description">Jeg ønsker mig den i grøn.</textarea>
    </div>

    <div>
      <label for="wishimg">Billede</label>
      <input type="file" name="wishimg" id="wishimg" accept="image/*">

      <label for="">Uploadede billede</label>
      <div class="wishpreview">
        <img id="output" />
      </div>
    </div>
  </div>

  <input type="submit" value="Gem" id="editwish">
</form>

<!--Preview upload script-->
<script src="../js/preview_upload_script.js"></script>

<script src="js/editwish.js"></script>

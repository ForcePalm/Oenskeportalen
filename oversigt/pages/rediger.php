<div class="headline">
  <h2>Rediger Ønske</h2>
  <div>
    <a href="?page=liste">Annuller</a>
  </div>
</div>

<form>
  <div>
    <div>
      <label for="wishname">Ønske navn</label>
      <input type="text" name="wishname" id="wishname" value="PS5 controller" required>

      <label for="wishprice">Pris</label>
      <input type="number" name="wishprice" id="wishprice" value="500">

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
        <img src="wishimgs/controller.png" alt="Uploaded billede" id="output" />
      </div>
    </div>
  </div>

  <input type="submit" value="Gem">
</form>

<!--Preview upload script-->
<script src="../js/preview_upload_script.js"></script>

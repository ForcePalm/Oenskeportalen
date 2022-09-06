<!--Headline-->
<div class="headline">
  <h2>Min Profil</h2>
  <div>
    <button>Slet Profil</button>
  </div>
</div>

<!--Profile form-->
<form onSubmit="return false;">
  <div>
    <div>
      <label for="name">Navn</label>
      <input type="text" name="name" value="Lasse Schmidt" id="name" required>
    </div>

    <div>
      <label for="email">Email</label>
      <input type="email" name="emil" value="lass8465@cvkweb.dk" id="email" required>
    </div>
  </div>

  <div>
    <div>
      <label for="birthday">Fødselsdag</label>
      <input type="date" name="birthday" value="1995-03-29" id="birthday" required>
    </div>

    <div>
      <label for="password">Skift Password</label>
      <input type="password" name="password" id="password">
    </div>
  </div>

    <input type="submit" value="Gem">
</form>

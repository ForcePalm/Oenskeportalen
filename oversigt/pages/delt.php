<div class="headline">
  <h2>Ønskelister delt med mig</h2>
</div>

<!--Wishlist-->
<div class="wishlist-wrapper">

  <?php
    $result = $crud->SelectAll('Shared', 'users_id', $_SESSION['login_id']);

    while ($sharedid = $result->fetch_object()) {

      $wishid = $crud->Select('Wishlist', 'id', $sharedid->wishlist_id);
      $row = $crud->SelectCountID('Wish', 'wishlist_id', $wishid->id);
      ?>
        <div class="wishlist">
          <p class="listheader"><?php echo $wishid->title; ?></p>
          <p class="listdescription"><?php echo $wishid->description; ?></p>
          <p class="wishcount">Ønsker: <?php echo $row->Amount; ?></p>
          <div class="wishlist-links">
            <button id="<?php echo $wishid->id; ?>" onclick="getshareid();" >Se Liste</button>
            <button id="<?php echo $wishid->id; ?>" onclick="removelist();" >Fjern</button>
          </div>
        </div>
      <?php
    }

   ?>
</div>

<script src="js/sharelistid.js"></script>
<script src="js/remove.js"></script>

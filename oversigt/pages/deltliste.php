<?php
  $wishlist = $crud->Select('Wishlist', 'id', $_SESSION['sharelistid']);
?>

<div class="headline">
  <h2><?php echo $wishlist->title; ?></h2>
  <div>
    <a href="delt">Tilbage</a>
  </div>
</div>

<p class="description"><?php echo $wishlist->description; ?></p>
<h3>Ønsker</h3>

<!--Wish wrapper-->
<div class="wish-wrapper">
  <?php
    $result = $crud->SelectAll('Wish', 'wishlist_id', $_SESSION['sharelistid']);
    while ($row = $result->fetch_object()) {
      $val = $crud->Select('Reserved', 'Wish_id', $row->id);
      ?>
        <div class="wish">
          <div class="wish-img">
            <img src="../wishimgs/<?php echo $row->image; ?>" alt="<?php echo $row->title; ?>" />
            <?php
              if(!empty($val) && $val->Users_id == $_SESSION['login_id']){
                ?>
                  <img src="../gfx/Reserveret_af_mig.png" alt="Reserveret af mig" class="banner">
                <?php
              }
              if(!empty($val) && $val->Users_id != $_SESSION['login_id']){
                ?>
                  <img src="../gfx/Reserveret.png" alt="Reserveret af en anden" class="banner">
                <?php
              }
            ?>
          </div>
          <div class="wish-text">
            <p><?php echo $row->title; ?></p>
            <p>
              <?php
              if(empty($row->description)){
                echo "&nbsp;";
              }else{
                echo $row->description;
              }
              ?>
            </p>

            <p class="wish-price"><?php echo number_format($row->price); ?> Kr.</p>
            <div class="wish-links">
              <?php
                if(!empty($row->link)){
                  ?>
                    <a href="<?php echo $row->link; ?>" target="_blank">Link</a>
                  <?php
                }else{
                  ?>
                    <button class="disabled">Intet Link</button>
                  <?php
                }

                if(!empty($val) && $val->Users_id == $_SESSION['login_id']){
                  ?>
                    <button onclick="cancelres();" id="<?php echo $val->id; ?>">Annuller</button>
                  <?php
                }else if(!empty($val) && $val->Users_id != $_SESSION['login_id']){
                  ?>
                    <button disabled class="disabled">Reserveret</button>
                  <?php
                }else {
                  ?>
                    <button id="<?php echo $row->id; ?>" onclick="reserveWish();">Reserver</button>
                  <?php
                }
              ?>
            </div>
          </div>
        </div>
      <?php
    }
   ?>
</div>

<script src="js/cancel.js"></script>

<script src="js/reserve.js"></script>

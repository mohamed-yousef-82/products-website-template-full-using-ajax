<?php
$pageTitle ="Show Items";
include "init.php";
?>
<div class="container">
<div class="page-style-one item-details">
<?php
/*--- Select Item Details From Database ---*/
$id =$_POST['id'];
$item_data = sql("SELECT * FROM accordion WHERE id = $id AND activity = 1 ORDER BY id","fetch");
                ?>
                <h2 class='page-title'><?php echo $item_data['title'] ?></h2>
              <img class='item-image' src='<?php echo $item_data['image'] ?>' />
                <p><?php echo $item_data['description'] ?><p>
</div>
</div>

<?php
include "init.php";
?>
<div class="container">
<div class="page-style-one">
<!-- <h2 class="page-title"><?php  echo str_replace("-","",$_GET['name']); ?></h2> -->
<div class="row row-reverse">
<?php
/*--- Get Category Items ---*/
$id =$_POST['id'];
$Items = sql("SELECT * FROM items WHERE cat_id = $id AND activity = 1 ORDER BY id","fetchAll");
if (!empty ($Items)){
foreach($Items As $Item){
  echo "<div class='box box-1 category-item'>";
  echo "<span class='item-date'><i class='fa fa-calendar' aria-hidden='true'></i>$Item[date]</span>";
  $img = $Item['image'];
  $src=str_replace("../","",$img);
  echo"<img class='item-img' src='$src' />";
  echo "<a class='link' data-id='$Item[id]' data-page='items'>$Item[name]</a>";
  echo "<p>$Item[description]</p>";
  echo "</div>";
}
}else {
  echo "There In No Items";
}
?>
</div>
</div>
</div>

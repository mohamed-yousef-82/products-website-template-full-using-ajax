<?php
include "init.php";
?>
<div class="container">
<div class="page-style-one">
<!-- <h2 class="page-title">About Us</h2> -->
<?php
  // Get Sub Categoriey
 $about_page = sql("SELECT * FROM about","fetch");
 ?>
 <?php
 echo "<h2 class='page-title'>$about_page[title]</h2>";
 echo "<img class='about-img' src='$about_page[image]' />";
 echo "<p>$about_page[description]</p>";
?>
</div>
</div>

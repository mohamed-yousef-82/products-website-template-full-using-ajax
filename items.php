<?php
$pageTitle ="Show Items";
include "init.php";
?>
<div class="container">
<div class="page-style-one item-details">
<?php
/*--- Select Item Details From Database ---*/
$id =$_POST['id'];
// $itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid'])?intval($_GET['itemid']) : 0;
// $item_data = sql("SELECT * FROM items WHERE id = $id AND activity = 1 ORDER BY id","fetch");
$item_data = sql("SELECT items.*,categories.name AS category_name,users.username FROM items
                INNER JOIN categories ON categories.id = items.cat_id
                INNER JOIN users ON users.id = items.user_id
                WHERE items.id = $id  AND items.activity = 1 ","fetch");
                if ($count > 0){
                echo "<h2 class='page-title'>$item_data[name]</h2>";
                echo "<img class='item-image' src='$item_data[image]' />";
                echo "$item_data[description]"."<br/>";
                echo "$item_data[price]"."<br/>";
                echo "$item_data[date]"."<br/>";
                echo "<a href='categories.php?id=$item_data[cat_id]'>$item_data[category_name]</a>"."<br/>";
                echo "$item_data[username]"."<br/>";
                ?>
                <!--Add Comment By User --->
                <?php if(isset($_SESSION['user'])){ ?>
                <div class="container">

                <form class="form" method="post" action="<?php echo $_SERVER['PHP_SELF'].'?itemid='.$item_data['item_id']?>">
                <textarea  class="form-control" name="comment" required></textarea>
                <input type="submit" value="Send" class="start-btn blue" />
                </form>
                </div>
                <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $comment  = filter_var($_POST['comment'],FILTER_SANITIZE_STRING);
                $userid   = $item_data['user_id'];
                $itemid   = $item_data['item_id'];
                if(!empty($comment)){
                  $insert_comment = sql("INSERT INTO comments (comment, status, comment_date, item_id,user_id)
                  VALUES ('$comment',0,NOW(),'$itemid',$_SESSION[uid])","");
                if($insert_comment){
                    echo "Comment Added Successfully";
                }
                }
                }
                }else{
                echo "<a href='login.php'>Login </a> Or <a href='login.php'> Regester </a> To Add Comment";
                }
                }else{
                echo "There Is No Items Or Not Approved";
                }

/*--- Select Comments From database ---*/
$comments = sql("SELECT comments.*,users.username As username,users.image As image FROM comments
                INNER JOIN users ON users.id = comments.user_id
                WHERE comments.item_id = $item_data[id] AND comments.activity = 1 ORDER BY id Desc","fetchAll");
                foreach ($comments as $comment) {
                echo "$comment[comment]"."<br/>";
                echo "$comment[comment_date]"."<br/>";
                echo "$comment[username]"."<br/>";
                echo"<img style='width:100px;height:100px;' src='$comment[image]' />";
}
?>
</div>
</div>

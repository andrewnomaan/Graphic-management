<?php
 require('top.php');
 ?>
<?php
$id='';
if(isset($_GET['id']) && $_GET['id']!=''){
   $id=$_GET['id'];
}
else{
    ?>
    <script>
    window.location="index.php";
</script>
<?php
}
//For delete user buy product
 if(isset($_GET['type']) && $_GET['type']!=''){
      $type=get_safe_value($conn,$_GET['type']);
      if($type=='delete'){
          $id=get_safe_value($conn,$_GET['id']);
        //   query to select buy graphics of user
          $select_del_graphic="select graphics_id from buy_graphics where id='$id'";
          $res_delete_graphic=mysqli_query($conn,$select_del_graphic);
          $row=mysqli_fetch_assoc($res_delete_graphic);
          //   query to delete buy graphics of user
          $delete_buy_graphic="delete from buy_graphics where id='$id'";
          $delete_buy_graphic_res=mysqli_query($conn,$delete_buy_graphic);
          if($delete_buy_graphic_res){
               //   query to delete graphics
          $delete_graphic="delete from graphics where id='$row[graphics_id]'";
          $delete_graphic_res=mysqli_query($conn,$delete_graphic);
          }
          
          ?>
            <script>
                alert("Deleted Successfully");
                window.location="index.php";
            </script>
          <?php
      }
 }
 //Query for select graphics for particular user
 $sql="SELECT buy_graphics.*,graphics.graphic FROM buy_graphics,graphics where buy_graphics.user_id='$id' and graphics.id=buy_graphics.graphics_id  order by buy_graphics.id desc";
 $res=mysqli_query($conn,$sql);
 //Query for select  particular user
 $sql2="SELECT * FROM users where id='$id'";
 $res2=mysqli_query($conn,$sql2);
 $row2=mysqli_fetch_assoc($res2);
?>
<div class="content pb-0">
    <div class="orders">
        <div class="row col-md-12">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <a href="index.php" class="box-title visit" id="element1"><?php echo ucfirst($row2['name']);?> Graphics</a>
                    </div>
                </div>
                <!-- Add graphics button -->
                <div class="col-lg-12 ">
                    <h4 class="box-link"><a href="manage_graphics.php?user_id=<?php echo $id;?>" class="btn btn-success float-right mt-0"
                            style="color:white;">Add graphics for <?php echo ucfirst($row2['name']);?><b>+</b></a></h4>
                </div>
          <!-- Graphics card -->
                <div class="row mt-5 search_item">

                    <?php
                    // loop for fetch graphics
                     while ($row=mysqli_fetch_assoc($res)) {
                    ?>
                    <div class="col-md-4 col-12">
                        <div class="card my-4 card-width col-12">
                            <div class="card-body">
                                        <!-- Graphics -->
                                        <img class="float-left" src="img/<?php echo $row['graphic']?>" alt="Card image cap"
                                            width="273.66" height="273.66">
                                        <a href="?type=delete&id=<?php echo $row['id']?>"
                                                    class="btn btn-danger mt-4 col-12" onclick="return confirm('Are you sure to delete this')">Delete</a>
                               
                            </div>
                        </div>
                    </div>

                    <?php
                                     }
                                     ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
 require('footer.php');
?>







<!--  -->
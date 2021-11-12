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
window.location = "index.php";
</script>
<?php
}
//For delete user buy product
 if(isset($_GET['type']) && $_GET['type']!=''){
      $type=get_safe_value($conn,$_GET['type']);
      if($type=='delete'){
          $approve_id=get_safe_value($conn,$_GET['approve_id']);
               //   query to delete graphics
          $delete_graphic="delete from graphics where id='$approve_id'";
          $delete_graphic_res=mysqli_query($conn,$delete_graphic);
          ?>
       <script>
         alert("Deleted Successfully");
         window.location="user_buy.php?id=<?php echo $id;?>";
       </script>
<?php
          }
      if($type=='approve'){
          $delete_id=get_safe_value($conn,$_GET['delete_id']);
               //   query to delete graphics
          $update_graphic="update graphics set approve_admin=1, approve_superadmin=1 where id='$delete_id'";
          $update_graphic_res=mysqli_query($conn,$update_graphic);
          if($update_graphic_res){
          ?>
       <script>
           console.log("<?php echo $id;?>");
         alert("Approved Successfully");
        //  var id=<?php echo $id;?>;
        //  window.location="user_buy.php?id=`${id}`";
        </script>
   <?php
          }
          } 
      }
 
 //Query for select graphics for particular user
//  $sql="SELECT buy_graphics.*,graphics.graphic,graphics.approve_admin,graphics.approve_superadmin FROM buy_graphics,graphics where buy_graphics.user_id='$id' and graphics.id=buy_graphics.graphics_id  order by buy_graphics.id desc";
 $sql="SELECT * FROM graphics where user_id='$id' order by id desc";
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
                        <a href="index.php" class="box-title visit" id="element1"><?php echo ucfirst($row2['name']);?>
                            Graphics</a>
                    </div>
                </div>
                <!-- Add graphics button -->
                <div class="col-lg-12 ">
                    <h4 class="box-link"><a href="manage_graphics.php?user_id=<?php echo $id;?>"
                            class="btn btn-success float-right mt-0" style="color:white;">Add graphics for
                            <?php echo ucfirst($row2['name']);?><b>+</b></a></h4>
                </div>
                <!-- Graphics card -->
                <div class="row mt-5 search_item">

                    <?php
                    // loop for fetch graphics
                     while ($row=mysqli_fetch_assoc($res)) {
                    ?>
                    <div class="col-md-4 col-12">
                        <div class="card my-4 card-width col-12">
                            <a href="" class="card-body" type="button" data-toggle="modal" data-target="#exampleModal<?php echo $row['id']?>">
                                <!-- Graphics -->
                                <img class="float-left" src="img/<?php echo $row['graphic']?>" alt="Card image cap"
                                    width="273.66" height="273.66">
                                <?php
                                            //   if($row['approve']==0){
                                            ?>
                                <!-- <p class="font-weight-bold text-center" style="color:black !important;">Not Approve</p> -->
                                <?php 
                                            //   }
                                            ?>
                                <!-- <a href="?type=delete&id=<?php
                                //  echo  $row['id']
                                 ?>" class="btn btn-danger mt-2 col-12"
                                    onclick="return confirm('Are you sure to delete this')">Delete</a> -->

                            </a>
                            <div class="modal fade" id="exampleModal<?php echo $row['id']?>" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                         <div class="row align-items-center">  
                                        <img class="float-left col-8" src="img/<?php echo $row['graphic']?>" alt="Card image cap">
                                        <div class="col-4">
                                            <b>Category:</b>
                                            <p></p>
                                            <b>Admin:</b>
                                            <?php
                                              if($row['approve_admin']==0){
                                            ?>
                                            <p>Not Approved</p>
                                            <?php
                                              } else{
                                                ?>
                                                <p>Approved</p>
                                                <?php
                                              }
                                                ?>
                                           
                                            <b>Superadmin:</b>
                                        <?php
                                              if($row['approve_superadmin']==0){
                                            ?>
                                            <p>Not Approved</p>
                                            <?php
                                              }
                                              else{
                                            ?>
                                            <p>Approved</p>
                                            <?php
                                              }
                                            ?>
                                         </div> 
                                         </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                                <a href="?type=approve&approve_id=<?php echo $row['id']?>" class="btn btn-primary"
                                                   onclick="return confirm('Are you sure to approve it')">Approve</a>
                                                <a href="?type=delete&delete_id=<?php echo $row['id']?>" class="btn btn-danger"
                                                   onclick="return confirm('Are you sure to delete this')">Delete</a>
                                        </div>
                                    </div>
                                </div>
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
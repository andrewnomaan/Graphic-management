<?php
 require('top.php');
 ?>
<?php
//For delete graphics
 if(isset($_GET['type']) && $_GET['type']!=''){
      $type=get_safe_value($conn,$_GET['type']);
     
      if($type=='delete'){
          $id=get_safe_value($conn,$_GET['id']);
          $delete_status="delete from graphics where id='$id'";
          $res_delete=mysqli_query($conn,$delete_status);
          ?>
            <script>
                alert("Deleted Successfully");
                window.location="index.php";
            </script>
          <?php
      }
 }
 //Query for graphics
 $sql="SELECT graphics.*,graphics_category.category FROM graphics,graphics_category where graphics.cat_id=graphics_category.id order by graphics.id desc";
 $res=mysqli_query($conn,$sql);
?>
<div class="content pb-0">
    <div class="orders">
        <div class="row col-md-12">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <a href="index.php" class="box-title visit" id="element1">Graphics</a>
                    </div>
                </div>
                <!--Add graphics button-->
                <div class="col-lg-12 ">
                    <h4 class="box-link"><a href="manage_graphics.php" class="btn btn-success float-right mt-0"
                            style="color:white;">Add graphics <b>+</b></a></h4>
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
                                        <!-- Graphics image -->
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
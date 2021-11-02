<?php
 require('top.php');
 //For delete categories of graphics
 if(isset($_GET['type']) && $_GET['type']!=''){
      $type=get_safe_value($conn,$_GET['type']);
      if($type=='delete'){
          $id=get_safe_value($conn,$_GET['id']);
          $delete_category="delete from graphics_category where id='$id'";
          $delete_graphic="delete from graphics where cat_id='$id'";
          $res_delete=mysqli_query($conn,$delete_category);
          $res_graphic=mysqli_query($conn,$delete_graphic);
          ?>
          <script>
           window.location="categories.php";
           </script>
          <?php
      }
 }
//  For categories
 $sql="SELECT * FROM graphics_category";
 $res=mysqli_query($conn,$sql);
?>
<div class="content pb-0">
    <div class="orders">
        <div class="row col-md-12">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <a href="categories.php" class="box-title visit" id="element2">Category</a>
                    </div>
            </div> 
                  <div class="col-lg-12">
                    <h4 class="box-link "><a href="manage_categories.php" class="btn btn-success float-right mx-3"
                            style="color:white;">Add categories <b>+</b></a></h4>
                </div>
                  <div class="row mt-5">
                       
                       
                                     <?php
                                     $i=1;
                                    //  Fetching categories
                                     while ($row=mysqli_fetch_assoc($res)) {
                                        ?>
                                         <div class="col-md-4 col-12">
                        <div class="card my-4 card-width col-12">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <a href="" class="link-dark">
                                            <!-- Name of category -->
                                            <b style="font-family: Nunito, sans-serif;">
                                                <?php echo ucfirst($row['category']) ?> Graphics
                                            </b>
                                        </a>
                                        
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <!-- Graphic of categories button -->
                                        <a href="cat_graphics.php?cat_id=<?php echo $row['id'];?>" class="btn btn-secondary col-12" style="color:white;">Click to see Graphics</a>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <!-- Delete categories -->
                                        <a href="?type=delete&id=<?php echo $row['id']?>" class="btn btn-danger col-12" onclick="return confirm('Are you sure to delete this')">Delete</a>
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
//  echo'&nbsp;<span class="badge badge-edit"><a href="manage_categories.php?id='.$row['id'].'" style="color:black;">Edit</a></span>&nbsp;';
//  echo'&nbsp;<span class="badge badge-delete"><a href="?type=delete&id='.$row['id'].'" style="color:black;">Delete</a></span>';
 require('footer.php');
?>          
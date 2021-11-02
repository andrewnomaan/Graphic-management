<?php
 require('top.php');
 $id="";
 if(isset($_GET['cat_id']) && $_GET['cat_id']!=''){
      $id=get_safe_value($conn,$_GET['cat_id']);
 }
 else{
     ?>
       <script>
           window.location="categories.php";
       </script>
     <?php
 }
 //For delete graphics
 if(isset($_GET['type']) && $_GET['type']!=''){
      if($_GET['type']=='delete'){
          $id=get_safe_value($conn,$_GET['id']);
          $delete_status="delete from graphics where id='$id'";
          $res_delete=mysqli_query($conn,$delete_status);
      }
 }
 //Query for select products of selected category
 $sql="SELECT * FROM graphics where cat_id ='$id' order by id desc";
 $res=mysqli_query($conn,$sql);
 //Query for select category
 $sql1="SELECT * FROM graphics_category where id='$id'";
 $res1=mysqli_query($conn,$sql1);
 $row1=mysqli_fetch_assoc($res1);
?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-12">
               <div class="d-flex text-center col-12">
               <div class="border-sec"></div>
                <p class="p_name"><b class="cat_name"><?php echo $row1['category']?> Graphics</b> </p>
                <div class="border-1"></div>
                </div>
          <!-- Graphics card -->
                <div class="row mt-5 search_item">

                    <?php
                    // loop for fetch category grpahics
                     while ($row=mysqli_fetch_assoc($res)) {
                    ?>
                    <div class="col-md-4 col-12">
                        <div class="card my-4 card-width col-12">
                            <div class="card-body">
                                        <!-- Graphics -->
                                        <img class="float-left" src="img/<?php echo $row['graphic']?>" alt="Card image cap"
                                            width="273.66" height="273.66">
                                        <a onclick="return confirm('Are you sure to want to delete')" href="?type=delete&id=<?php echo $row['id']?>"
                                                    class="btn btn-danger mt-4 col-12">Delete</a>
                               
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
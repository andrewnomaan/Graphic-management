<?php
ob_start();
 require('top.php');
 $categories='';
 $msg='';
 if(isset($_POST['submit'])){
    $cat=get_safe_value($conn,$_POST['categories']);
    // Query if same name cateory already exist
    $res=mysqli_query($conn,"select * from categories where cat_name='$cat'");
    $check=mysqli_num_rows($res);
    if($check>0){
        $msg="This category already exist!";
  }
    if($msg==''){
    $sql=mysqli_query($conn,"insert into graphics_category(category) values('$cat')");
    $last_id = mysqli_insert_id($conn);
    header("Location:categories.php");
    die(); 
    }
    }

?>
  <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Categories</strong></div>
                        <div class="card-body card-block">
                           <form action="" method="post" enctype="multipart/form-data">
                           <div class="form-group"><label for="categories" class=" form-control-label">Category Name</label>
                           <input type="text" id="categories" name="categories" placeholder="Enter categories name" class="form-control" required value="<?php echo $categories; ?>"></div>
                           <button id="cat-button" type="submit" class="mx-auto btn btn-lg btn-info btn-block col-md-12" name="submit">
                           <span id="payment-button-amount">Submit</span>
                           </button>
                           <div class="field_error"><?php
                             echo $msg;
                           ?></div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
<?php
 require('footer.php');
?>          
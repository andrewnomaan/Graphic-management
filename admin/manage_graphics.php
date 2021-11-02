<?php
ob_start();
 require('top.php');
 $categories_id='';
 $image='';
 $filename='';
 $msg='';
 $id='';
 $img='';
 $image_required='required';
 $user_id='';

 //For update the graphics detail or edit
 if(isset($_GET['id']) && $_GET['id']!=''){
   $image_required='';
   $id=get_safe_value($conn,$_GET['id']);
   $res=mysqli_query($conn,"select * from graphics where id='$id'");
   $check=mysqli_num_rows($res);
   if($check>0){
   $row=mysqli_fetch_assoc($res);
   $categories_id=$row['cat_id'];
   }
   else{
      header("Location:index.php");
      die(); 
   }
}
if(isset($_GET['user_id']) && $_GET['user_id']!=''){
   $user_id=$_GET['user_id'];
}

//After submiting product detail
 if(isset($_POST['submit'])){
    $categories_id=get_safe_value($conn,$_POST['categories_id']);
    $image=$_FILES['file'];
    $file_tmp=$image['tmp_name'];
      $filename=$image['name'];
      $fileext=explode('.',$filename);
      $filecheck=strtolower(end($fileext));
      $filestored=array('png','jpg','jpeg','gif');
    if($categories_id==0){
       $msg="Select your categories first";
    }
    if($filename!=''){
    if(!in_array($filecheck,$filestored)){
       $msg="Only png,jpg,jpeg and gif format are allowed";
    }   
  } 
    if($msg==''){
    if(isset($_GET['id']) && $_GET['id']!=''){
       if($filename!=''){
      $destinationfile='img/'.$filename;
      move_uploaded_file($file_tmp,$destinationfile);
      $sql=mysqli_query($conn,"update graphics set cat_id='$categories_id',graphic='$filename' where id='$id'");
    }
    else{
      
      $sql=mysqli_query($conn,"update graphics set cat_id='$categories_id' where id='$id'");
    }
   }
   else if(isset($_GET['user_id'])){
      $destinationfile='img/'.$filename;
      move_uploaded_file($file_tmp,$destinationfile);
    $sql=mysqli_query($conn,"insert into graphics(cat_id,graphic) values('$categories_id','$filename')");
    $graphics_id=mysqli_insert_id($conn);
    $sql2=mysqli_query($conn,"insert into buy_graphics(user_id,graphics_id) values('$user_id','$graphics_id')");
    header("Location:customers.php");
    die(); 
   }
    else{
      $destinationfile='img/'.$filename;
      move_uploaded_file($file_tmp,$destinationfile);
    $sql=mysqli_query($conn,"insert into graphics(cat_id,graphic) values('$categories_id','$filename')");
     
    }
    header("Location:index.php");
    die(); 
   }
 
   

  
}

?>
  <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>
                           Add Product</strong></div>
                        <div class="card-body card-block">
                           <form action="" method="post" enctype="multipart/form-data">
                           <div class="form-group">
                           <label for="categories" class=" form-control-label">Categories</label>
                           <select name="categories_id" class="form-control">
                               <option>Select Categories</option>
                                <?php
                                //For showing categories in product details form
                                $res=mysqli_query($conn,"select id,category from graphics_category");
                                   while($row=mysqli_fetch_assoc($res)){
                                      if($row['id']==$categories_id){
                                       echo "<option selected value=".$row['id'].">".$row['category']."</option>";
                                      }
                                      else{
                                       echo "<option value=".$row['id'].">".$row['category']."</option>";
                                      }
                                   }
                                ?>
                           </select>
                            </div>
                          
                        <div class="form-group">
                               <label for="categories" class=" form-control-label">Graphics</label>
                           <input type="file" id="img" name="file" class="form-control" <?php echo $image_required ?>>
                        </div>
                         
                         
                           <button id="cat-button" type="submit" class="btn btn-lg btn-info btn-block" name="submit">
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
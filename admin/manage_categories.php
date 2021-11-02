<?php
ob_start();
 require('top.php');
 $categories='';
 $msg='';
 $image_required="required";
 $id='';
 $filename='';
 if(isset($_GET['id']) && $_GET['id']!=''){
   $image_required='';
   $id=get_safe_value($conn,$_GET['id']);
   $res=mysqli_query($conn,"select * from categories where id='$id'");
   $check=mysqli_num_rows($res);
   if($check>0){
   $row=mysqli_fetch_assoc($res);
   $categories=$row['cat_name'];
   }
   else{
      header("Location:index.php");
      die(); 
   }
}
 if(isset($_POST['submit'])){
    $cat=get_safe_value($conn,$_POST['categories']);
    $image=$_FILES['file'];
    $file_tmp=$image['tmp_name'];
      $filename=$image['name'];
      $fileext=explode('.',$filename);
      $filecheck=strtolower(end($fileext));
      $filestored=array('png','jpg','jpeg');
    $res=mysqli_query($conn,"select * from categories where cat_name='$cat'");
    $check=mysqli_num_rows($res);
    if($filename!=''){
      if(!in_array($filecheck,$filestored)){
         $msg="Only jpg,png and jpeg files are allowed";
      }   
    } 
    if($check>0){
      if(isset($_GET['id']) && $_GET['id']!=''){
           $getData=mysqli_fetch_assoc($res);
           if($id==$getData['id']){

           }
           else{
            $msg="This category already exist!";
           }
      }
      else{
        $msg="This category already exist!";
      }
    }
    if($msg==''){
      if(isset($_GET['id']) && $_GET['id']!=''){
         if($filename!=''){
        $destinationfile='img/'.$filename;
        move_uploaded_file($file_tmp,$destinationfile);
      $sql=mysqli_query($conn,"update categories set cat_name='$cat',img='$filename' where id='$id'");
    }
    else{
      $sql=mysqli_query($conn,"update categories set cat_name='$cat' where id='$id'");
    }
   }
    else{
      $destinationfile='img/'.$filename;
      move_uploaded_file($file_tmp,$destinationfile);
    $sql=mysqli_query($conn,"insert into categories(cat_name,img) values('$cat','$filename')");
    $last_id = mysqli_insert_id($conn);
    $sql2=mysqli_query($conn,"insert into banners(cat_id,banner) values('$last_id','$filename')");
    }
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
                           <div class="form-group"><label for="categories" class=" form-control-label">Category Image</label>
                           <input type="file" id="file" name="file" class="form-control" <?php echo $image_required; ?>></div>
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
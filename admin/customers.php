<?php
 require('top.php');
//  Select users
 $sql="SELECT * FROM users order by id desc";
 $res=mysqli_query($conn,$sql);
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Users</h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                     $i=1;
                                    //  Fetching user details
                                     while ($row=mysqli_fetch_assoc($res)) {
                                        echo'
                                        <tr>
                                       <td class="serial">'.$i++.'</td>
                                       <td class="serial">'.$row['name'].'</td>
                                       <td>'.$row['email'].'</td>
                                       <td>';
                                       echo'&nbsp;<span class="btn btn-secondary"><a href="user_buy.php?id='.$row['id'].'" style="color:white;">Click to see graphics</a></span>';
                                       // echo'&nbsp;<span class="btn btn-primary"><a href="user_buy.php?id='.$row['id'].'" style="color:white;">Add graphics</a></span>';
                                      
                                       //
                                      echo' </td>
                                    </tr>';
                                     }
                                     ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
<?php
 require('footer.php');
?>          
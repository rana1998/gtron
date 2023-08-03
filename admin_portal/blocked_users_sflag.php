<?php 

    include "header.php";
  

// Blocked User

 if  (isset($_GET['id']) && $_GET['action']=='Unblock'){
     $id = $_GET['id'];
        $update = "UPDATE user_registration SET sflag = '1' WHERE id ='$id'";
        $run=mysqli_query($con,$update);
        
        $adminLogQuery="INSERT INTO `admin_log`(`user_name`, `activity`) VALUES ('$currentAdmin','User Unblock Email Flag $userNameShow')";
        $adminLogResult = mysqli_query($con,$adminLogQuery);
        
            if(!$run){
                echo mysqli_error($con);
            }else{
            $_SESSION['successMsg'] = "User login status is Unblocked";
                header("Location: blocked_users_sflag.php");
                exit();

            }

    
}


?>  

                        <!-- Main-body start -->
                        <div class="main-body">
                            <div class="page-wrapper">
                                <!-- Page-header start -->
                                <div class="page-header">
                                    <div class="row align-items-end">
                                        <div class="col-lg-8">
                                            <div class="page-header-title">
                                                <div class="d-inline">
                                                    <h4>List of Email Blocked Users</h4>
                                                    <span>Following are the list of blocked users </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="page-header-breadcrumb">
                                                <ul class="breadcrumb-title">
                                                    <li class="breadcrumb-item">
                                                        <a href="index-1.htm"> <i class="feather icon-home"></i> </a>
                                                    </li>
                                                    <li class="breadcrumb-item"><a href="#!">All Users</a> </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Page-header end -->

                                <div class="page-body">
                          <div class="row">
                                            <div class="col-sm-12">
                                                <!-- HTML5 Export Buttons table start -->
                                                <div class="card">
                                                     <div class="card-header table-card-header">
                                                                <!-- Sussess Message  -->
                                                        <?php if (isset($_SESSION['successMsg'])) {
                                                        ?>
                                                        <div class="alert alert-success background-success">
                                                            <button type="button" class="close m-0" data-dismiss="alert" aria-label="Close">
                                                            <i class="icofont icofont-close-line-circled text-default"></i>
                                                            </button>
                                                            <strong>Success!</strong> <?php echo $_SESSION['successMsg'];?>
                                                        </div>
                                                        <?php
                                                        unset($_SESSION['successMsg']);
                                                        } ?>


                                                    </div>
                                                    <div class="card-block">
                                                        <div class="dt-responsive table-responsive">
                                                            <table id="basic-btn" class="table table-striped table-bordered nowrap" data-page-length='100'>
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Full Name</th>
                                                                        <th>User Name</th>
                                                                        <th>Email</th>
                                                                        <th>Status</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                        <?php 
                        $sql = "SELECT * FROM  user_registration where sflag ='0'";
                        $result = mysqli_query($con, $sql);
                        $x= 1;
                        while ( $data = mysqli_fetch_array($result)):
                            $id = $data['id'];
                            $status = $data['status'];
                            $loginStatus = $data['login_status'];
    // echo "$pos";
                        ?>
                                                            <tr>
                                                                <td><?php echo $x++;  ?></td>
                                                                <td><?php echo $data['full_name'];  ?></td>
                                                                <td><?php echo $data['user_name'];  ?></td>
                                                                <td><?php echo $data['email'];  ?></td>
                                                                
                                                                <td>
  	                                                               <span class="badge badge-danger">Locked</span>
  	                                                            </td>
                                                                <td>
                                                                    
                                                                    <a href="blocked_users_sflag.php?id=<?php echo $id ; ?>&action=Unblock" class="btn btn-outline-success btn-sm" >Unlock</a>

                                                                </td>
                                                            </tr>
                        <?php endwhile; ?>                                    
                                                        </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Full Name</th>
                                                                        <th>User Name</th>
                                                                        <th>Email</th>
                                                                        <th>Status</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- HTML5 Export Buttons end -->
                                            </div>
                                        </div>


                                </div>
                            </div>
                        </div>


<?php
    include "footer.php";
?>
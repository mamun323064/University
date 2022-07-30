<?php
  require_once('functions/function.php');
  get_header();
  get_sidebar();
?>
<div class="col-md-12 main_content">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> All User Information</h4>
                </div>
                <div class="col-md-4 text-right">
                    <a class="btn btn-sm btn-dark card_top_btn" href="all-user.php"><i class="fa fa-th"></i> All User</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form class="form-inline my-2 my-lg-0" method="get" action="search-user.php">
                        <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form><br>
                </div>
            </div>
            <table class="table table-bordered table-striped table-hover custom_table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Username</th>
                        <th scope="col">Role</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i=1;
                    $search=$_GET['search'];
                    $sel="SELECT * FROM cs_user NATURAL JOIN cs_role WHERE user_name LIKE '%$search%' || user_phone LIKE '%$search%'";
                    $Q=mysqli_query($con,$sel);
                    while($data=mysqli_fetch_assoc($Q)){
                  ?>
                    <tr>
                        <td>
                            <?php
                        $check=$i++;
                        if($check<10){
                          echo "0".$check;
                        }else{
                          echo $check;
                        }
                      ?>
                        </td>
                        <td><?php echo $data['user_name']; ?></td>
                        <td><?= $data['user_phone']; ?></td>
                        <td><?= $data['user_email']; ?></td>
                        <td><?= $data['user_username']; ?></td>
                        <td><?= $data['role_name']; ?></td>
                        <td>
                            <?php if($data['user_photo']!=''){?>
                            <img style="height:50px; max-width:80px" class="img-thumbnail" src="uploads/<?= $data['user_photo']; ?>" alt="" />
                            <?php }else{ ?>
                            <img style="height:50px; max-width:80px" class="img-thumbnail" src="images/avatar.jpg" alt="" />
                            <?php } ?>
                        </td>
                        <td>
                            <a href="view-user.php?v=<?= $data['user_id'] ?>"><i class="fa fa-plus-square fa-lg"></i></a>
                            <a href="edit-user.php?e=<?= $data['user_id']; ?>"><i class="fa fa-pencil-square fa-lg"></i></a>
                            <a href="delete-user.php?d=<?= $data['user_id']; ?>"><i class="fa fa-trash fa-lg"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer text-center">
        </div>
    </div>
</div>
<?php
  get_footer();
?>
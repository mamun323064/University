<?php
 require_once('functions/function.php');
 needLogged();
 get_header();
 get_sidebar();

$id=$_GET['e'];
$sel="SELECT * FROM cs_user WHERE user_id='$id'";
$Q=mysqli_query($con,$sel);
$data=mysqli_fetch_assoc($Q);

if(!empty($_POST)){
  $eid=$_POST['eid'];
  $name=$_POST['name'];
  $phone=$_POST['phone'];
  $email=$_POST['email'];

   
     $update="UPDATE cs_user SET user_name='$name', user_phone='$phone', user_email='$email' WHERE user_id='$eid'";

    
    if(mysqli_query($con,$update)){
    
    header('Location:view-user.php?v='.$id);
    }else{
     header('Location:edit-user.php?e='.$id);
    }
}
?>

<div class="row">
    <div class="col-md-12 main_content">
        <form method="post" action="" enctype="multipart/form-data">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="card_header_title"><i class="fa fa-gg-circle"></i>Update User Information</h4>
                        </div>
                        <div class="col-md-4 text-right">
                            <a class="btn btn-sm btn-dark card_top_btn" href="all-user.php"><i class="fa fa-th"></i> All User</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-3 col-form-label">Name:</label>
                        <div class="col-sm-7">
                           <input type="hidden" name="eid" value="<?= $data['user_id']; ?>"/>
                            <input type="text" class="form-control" id="" name="name" value="<?= $data['user_name']; ?>">
                        </div>
                    </div>
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-3 col-form-label">Phone Number:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="" name="phone" value="<?= $data['user_phone']; ?>" >
                        </div>
                    </div>
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-3 col-form-label">Email:</label>
                        <div class="col-sm-7">
                            <input type="email" class="form-control" id="" name="email" value="<?= $data['user_email']; ?>">
                        </div>
                    </div>
                   <div class="form-group row custom_form_group">
                        <label class="col-sm-3 col-form-label">UserName:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="" name="user" value="<?= $data['user_username']; ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-3 col-form-label">User Role:</label>
                        <div class="col-sm-7">
                            <select class="form-control" id="" name="role">
                                <?php
                                    $sclr="SELECT * FROM cs_role ORDER BY role_id";
                                    $Qr=mysqli_query($con,$sclr);
                                    while($urole=mysqli_fetch_assoc($Qr)){
                                ?>
                                <option value="<?= $urole['role_id']; ?>" <?php if($data['role_id']==$urole['role_id']){
                                
                                echo "selected";}?>><?= $urole['role_name']; ?></option>
                                <?php } ?>


                            </select>
                        </div>
                    </div>
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-3 col-form-label">Photo:</label>
                        <div class="col-sm-4">
                            <input type="file" id="" name="">

                        </div>
                        <div class="col-md-2">
                            <?php if($data['user_photo']!=''){?>
                                <img style="height:50px; max-width:80px;" class="img-thumbnail" src="uploads/<?php echo $data['user_photo']; ?>" alt="">
                                <?php }else{ ?>
                                <img style="height:50px; max-width:80px;" class="img-thumbnail" src="images/avatar.jpg" alt="">
                             <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-sm btn-dark submit_btn">UPDATE</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
 require_once('functions/function.php');
get_footer();
?>
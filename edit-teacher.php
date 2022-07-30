<?php
 require_once('functions/function.php');
 needLogged();
 get_header();
 get_sidebar();

$id=$_GET['e'];
$sel="SELECT * FROM cs_teacher WHERE teacher_id='$id'";
$Q=mysqli_query($con,$sel);
$data=mysqli_fetch_assoc($Q);

if(!empty($_POST)){
  $eid=$_POST['eid'];
  $name=$_POST['name'];
  $designatin=$_POST['designatin'];
  $details=$_POST['details'];


   
     $update="UPDATE cs_teacher SET teacher_name='$name', teacher_designation='$designatin', teacher_details='$details' WHERE teacher_id='$eid'";

    
    if(mysqli_query($con,$update)){
    
    header('Location:view-teacher.php?v='.$id);
    }else{
     header('Location:edit-teacher.php?e='.$id);
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
                            <h4 class="card_header_title"><i class="fa fa-gg-circle"></i>Update Banner Information</h4>
                        </div>
                        <div class="col-md-4 text-right">
                            <a class="btn btn-sm btn-dark card_top_btn" href="all-banner.php"><i class="fa fa-th"></i> All Banner</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-3 col-form-label">Name:</label>
                        <div class="col-sm-7">
                           <input type="hidden" name="eid" value="<?= $data['teacher_id']; ?>"/>
                            <input type="text" class="form-control" id="" name="name" value="<?= $data['teacher_name']; ?>">
                        </div>
                    </div>
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-3 col-form-label">Designatin:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="" name="designatin" value="<?= $data['teacher_designation']; ?>" >
                        </div>
                    </div>
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-3 col-form-label">Button:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="" name="details" value="<?= $data['teacher_details']; ?>">
                        </div>
                    </div>
                  
                  
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-3 col-form-label">Image:</label>
                        <div class="col-sm-4">
                            <input type="file" id="" name="">

                        </div>
                        <div class="col-md-2">
                            <?php if($data['teacher_photo']!=''){?>
                                <img style="height:50px; max-width:80px;" class="img-thumbnail" src="admin/uploads/<?php echo $data['teacher_photo']; ?>" alt="">
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
<?php
 require_once('functions/function.php');
 needLogged();
 get_header();
 get_sidebar();

$id=$_GET['e'];
$sel="SELECT * FROM cs_feture WHERE future_id='$id'";
$Q=mysqli_query($con,$sel);
$data=mysqli_fetch_assoc($Q);

if(!empty($_POST)){
  $eid=$_POST['eid'];
  $title=$_POST['title'];
  $subtitle=$_POST['subtitle'];
  $icon=$_POST['icon'];
  $bg=$_POST['bg'];

   
     $update="UPDATE cs_feture SET feture_title='$title', feture_subtitle='$subtitle', feture_icon='$icon', feture_bg='$bg' WHERE future_id='$eid'";

    
    if(mysqli_query($con,$update)){
    
    header('Location:view-feature.php?v='.$id);
    }else{
     header('Location:edit-feature.php?e='.$id);
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
                            <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> Update Feature Information</h4>
                        </div>
                        <div class="col-md-4 text-right">
                            <a class="btn btn-sm btn-dark card_top_btn" href="all-feature.php"><i class="fa fa-th"></i> All Feature</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-3 col-form-label">Title:</label>
                        <div class="col-sm-7">
                           <input type="hidden" name="eid" value="<?= $data['future_id']; ?>"/>
                            <input type="text" class="form-control" id="" name="title" value="<?= $data['feture_title']; ?>">
                        </div>
                    </div>
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-3 col-form-label">Subtitle:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="" name="subtitle" value="<?= $data['feture_subtitle']; ?>" >
                        </div>
                    </div>
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-3 col-form-label">Icon:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="" name="icon" value="<?= $data['feture_icon']; ?>">
                        </div>
                    </div>
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-3 col-form-label">BG:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="" name="bg" value="<?= $data['feture_bg']; ?>">
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
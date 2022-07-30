<?php
 require_once('functions/function.php');
 needLogged();
 get_header();
 get_sidebar();

$id=$_GET['e'];
$sel="SELECT * FROM cs_offer WHERE offer_id='$id'";
$Q=mysqli_query($con,$sel);
$data=mysqli_fetch_assoc($Q);

if(!empty($_POST)){
  $eid=$_POST['eid'];
  $title=$_POST['title'];
  $subtitle=$_POST['subtitle'];
  $icon=$_POST['icon'];

   
     $update="UPDATE cs_offer SET offer_title='$title', offer_subtitle='$subtitle', offer_icon='$icon' WHERE offer_id='$eid'";

    
    if(mysqli_query($con,$update)){
    
    header('Location:view-offer.php?v='.$id);
    }else{
     header('Location:edit-offer.php?e='.$id);
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
                            <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> Update offer Information</h4>
                        </div>
                        <div class="col-md-4 text-right">
                            <a class="btn btn-sm btn-dark card_top_btn" href="all-offer.php"><i class="fa fa-th"></i> All offer</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-3 col-form-label">Title:</label>
                        <div class="col-sm-7">
                           <input type="hidden" name="eid" value="<?= $data['offer_id']; ?>"/>
                            <input type="text" class="form-control" id="" name="title" value="<?= $data['offer_title']; ?>">
                        </div>
                    </div>
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-3 col-form-label">Subtitle:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="" name="subtitle" value="<?= $data['offer_subtitle']; ?>" >
                        </div>
                    </div>
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-3 col-form-label">Button:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="" name="icon" value="<?= $data['offer_icon']; ?>">
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
<?php
  require_once('functions/function.php');
  needLogged();
  if($_SESSION['role']==1){
  get_header();
  get_sidebar();
  if(isset($_POST['submit'])){
    $image=$_FILES['pic'];
    $imageName='';
      if($image['name']!=''){
    $imageName='user-'.time().'-'.rand(100000,9999999).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
      }
    
      if(!empty($image)){
        
          $insert="INSERT INTO cs_gallery(gallery_img)
          VALUES('$imageName')";

          if(mysqli_query($con,$insert)){
            move_uploaded_file($image['tmp_name'],'uploads/'.$imageName);
            echo "Succesfully upload banner information.";
          }else{
            echo "Opps! banner uploads failed!";
          }
      
      }else{
        echo "Please upload banner image!";
      }
    
  }
?>
    <div class="col-md-12 main_content">
        <form method="post" action="" enctype="multipart/form-data">
          <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                          <h4 class="card_header_title"><i class="fa fa-gg-circle"></i>Add gallery Information</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <a class="btn btn-sm btn-dark card_top_btn" href="all-gly-img.php"><i class="fa fa-th"></i> All gallery</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group row custom_form_group">
                   <label class="col-sm-3 col-form-label">Gallery Image:</label>
                   <div class="col-sm-7">
                   <input type="file" name="pic" onchange="readURL(this);"/><br/><br/>
                     <img id="uploadPic" class="file_img" src="images/avatar.png" alt="your image" />
                   </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-sm btn-dark submit_btn" name="submit">UPLOAD </button>
            </div>
          </div>
      </form>
    </div>
<?php
    get_footer();
  }else{
   header('Location:index.php');
   }
?>

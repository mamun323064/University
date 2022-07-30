<?php
  require_once('functions/function.php');
  needLogged();
  if($_SESSION['role']==1){
  get_header();
  get_sidebar();
  if(isset($_POST['submit'])){
    $title=$_POST['title'];
    $subtitle=$_POST['subtitle'];
    $btn=$_POST['button'];
    $image=$_FILES['pic'];
    $imageName='';
      if($image['name']!=''){
    $imageName='user-'.time().'-'.rand(100000,9999999).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
      }
    if(!empty($title)){
      if(!empty($image)){
        
          $insert="INSERT INTO cs_courses(courses_title,courses_details,courses_button,courses_img)
          VALUES('$title','$subtitle','$btn','$imageName')";

          if(mysqli_query($con,$insert)){
            move_uploaded_file($image['tmp_name'],'uploads/'.$imageName);
            echo "Succesfully upload banner information.";
          }else{
            echo "Opps! banner uploads failed!";
          }
      
      }else{
        echo "Please upload banner image!";
      }
    }else{
      echo "Please enter your tite!";
    }
  }
?>
    <div class="col-md-12 main_content">
        <form method="post" action="" enctype="multipart/form-data">
          <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                          <h4 class="card_header_title"><i class="fa fa-gg-circle"></i>Add Courses Information</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <a class="btn btn-sm btn-dark card_top_btn" href="all-courses.php"><i class="fa fa-th"></i> All Courses</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card-body">
               <div class="form-group row custom_form_group">
                  <label class="col-sm-3 col-form-label">COURSES Title:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="" name="title">
                  </div>
                </div>
                <div class="form-group row custom_form_group">
                   <label class="col-sm-3 col-form-label">COURSES Subtitle:</label>
                   <div class="col-sm-7">
                     <input type="text" class="form-control" id="" name="subtitle">
                   </div>
                 </div>
                <div class="form-group row custom_form_group">
                  <label class="col-sm-3 col-form-label">COURSES Button:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="" name="button">
                  </div>
                </div>
            
             
                
                <div class="form-group row custom_form_group">
                   <label class="col-sm-3 col-form-label">COURSES Image:</label>
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

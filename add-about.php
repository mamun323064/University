<?php
  require_once('functions/function.php');
  needLogged();
  if($_SESSION['role']==1){
  get_header();
  get_sidebar();
  if(isset($_POST['submit'])){
    $comments=$_POST['comt'];
    $name=$_POST['name'];
    $titles=$_POST['title'];
    $aboutimg=$_FILES['pic'];
    $photoName='';
      if($aboutimg['name']!=''){
    $photoName='user-'.time().'-'.rand(100000,9999999).'.'.pathinfo($aboutimg['name'],PATHINFO_EXTENSION);
      }
    if(!empty($comments)){
      if(!empty($aboutimg)){
        
          $insert="INSERT INTO cs_about(about_details,about_name,about_title,about_img)
          VALUES('$comments','$name','$titles','$photoName')";

          if(mysqli_query($con,$insert)){
            move_uploaded_file($aboutimg['tmp_name'],'uploads/'.$photoName);
            echo "Succesfully upload banner information.";
          }else{
            echo "Opps! teacher uploads failed!";
          }
      
      }else{
        echo "Please upload teacher image!";
      }
    }else{
      echo "Please enter your name!";
    }
  }
?>
    <div class="col-md-12 main_content">
        <form method="post" action="" enctype="multipart/form-data">
          <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                          <h4 class="card_header_title"><i class="fa fa-gg-circle"></i>Add About Information</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <a class="btn btn-sm btn-dark card_top_btn" href="all-about.php"><i class="fa fa-th"></i> All About</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card-body">
               <div class="form-group row custom_form_group">
                  <label class="col-sm-3 col-form-label">Comments:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="" name="comt">
                  </div>
                </div>
                 <div class="form-group row custom_form_group">
                  <label class="col-sm-3 col-form-label">Name:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="" name="name">
                  </div>
                </div>
                <div class="form-group row custom_form_group">
                   <label class="col-sm-3 col-form-label">Title:</label>
                   <div class="col-sm-7">
                     <input type="text" class="form-control" id="" name="title">
                   </div>
                 </div>
               
    
                <div class="form-group row custom_form_group">
                   <label class="col-sm-3 col-form-label">About Image:</label>
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

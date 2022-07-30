<?php
  require_once('functions/function.php');
  needLogged();
  if($_SESSION['role']==1){
  get_header();
  get_sidebar();
  if(isset($_POST['submit'])){
    $title=$_POST['title'];
    $details=$_POST['details'];
    $btn=$_POST['btn'];
    $blogimg=$_FILES['pic'];
    $photoName='';
      if($blogimg['name']!=''){
    $photoName='user-'.time().'-'.rand(100000,9999999).'.'.pathinfo($blogimg['name'],PATHINFO_EXTENSION);
      }
    if(!empty($title)){
      if(!empty($blogimg)){
        
          $insert="INSERT INTO cs_blog(blog_title,blog_details,blog_btn,blog_img)
          VALUES('$title','$details','$btn','$photoName')";

          if(mysqli_query($con,$insert)){
            move_uploaded_file($blogimg['tmp_name'],'uploads/'.$photoName);
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
                          <h4 class="card_header_title"><i class="fa fa-gg-circle"></i>Add Blog Information</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <a class="btn btn-sm btn-dark card_top_btn" href="all-blog.php"><i class="fa fa-th"></i> All Blog</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card-body">
               <div class="form-group row custom_form_group">
                  <label class="col-sm-3 col-form-label">Blog Title:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="" name="title">
                  </div>
                </div>
                 <div class="form-group row custom_form_group">
                  <label class="col-sm-3 col-form-label">Blog Details:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="" name="details">
                  </div>
                </div>
                <div class="form-group row custom_form_group">
                   <label class="col-sm-3 col-form-label">Blog Button:</label>
                   <div class="col-sm-7">
                     <input type="text" class="form-control" id="" name="btn">
                   </div>
                 </div>
               
    
                <div class="form-group row custom_form_group">
                   <label class="col-sm-3 col-form-label">Blog Image:</label>
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

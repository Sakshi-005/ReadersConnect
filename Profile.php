<?php  
session_start();
require_once('Database.php');
if(!(isset($_SESSION['email'])))
{
	header("location:index.php");
}
require_once('Layouts/Master.php');  ?>

<nav class="navbar">
        <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="#"><i class="fa fa-user-plus" style="font-size:30px;" aria-hidden="true"></i> CONNECT</a>
        </div>
        
                
        <div class="collapse navbar-collapse" id="myNavbar">                       
            <ul class="nav navbar-nav navbar-right">
                <form class="navbar-form navbar-left">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search a reader"  name="search" />
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <li><a href="Books.aspx"><span></span> <span class="glyphicon glyphicon-book"></span> BOOKS</a></li>
                <li><a href="#"><span></span><i class="fa fa-info" aria-hidden="true"></i>  ABOUT</a></li>
                <li><a href="logout.php" ><span class="glyphicon glyphicon-log-out"></span> LOGOUT</a></li>
            </ul>
        </div>
        </div>
    </nav>

    <section class="container">
        <div class="row">
            
            <div class="imgInfo col-md-5 col-md-offset-1">
                <h2>Update Profile Picture</h2>
                <hr />
                <form action="Profile.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="fileToUpload" value="" /><br />
                    <input type="submit" name="upload" class="btn btn-danger" value="Upload">
                </form>
            </div>

            <div class="img  col-md-3 col-md-offset-1 ">
            <?php 
            $sql   = "SELECT * FROM Register WHERE email = '".$_SESSION['email']."'";
            $query = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($query);             
            echo "<img  src='". $row['pic']. "'  class='profilePic img-responsive'/>";
           ?>
            </div>
        </div>
    </section>


<?php

$target_dir = "Assets/Images/";


if(isset($_POST["upload"])) {
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>



<?php 
    if(isset($_POST['update'])){
    	$first_name = $_POST['first_name'];
    	$last_name  = $_POST['last_name'];
    	$email      = $_POST['email'];
    	$password   = $_POST['password'];
    	$cp       	= $_POST['cp'];
    	if($password != $cp){
    		echo "<script>alert('Password must matched')</script>";
    	}
    	else{
    		$sql2 = "UPDATE Register SET first_name = '".$first_name."' , last_name = '".$last_name."',email = '".$email."' , password = '".$password."' WHERE email = '" . $_SESSION['email'] ."'";
    		if($query2 = mysqli_query($conn,$sql2)){
    			echo "<script>alert('Changes has been saved successfully!')</script>";
    		}
    		else{
    			echo "<script>alert('Error Occurs')</script>";
    		}

    	}

    }
 ?>

    <section class="container">
        <div class="row">
            <div class="profileInfo col-md-9 col-md-offset-1">
                <form action="Profile.php" class="form-horizontal" method="post"  >
                    <h2 class="text-center">Profile Settings</h2>
                    <hr />
                    <div class="form-group">
                        <Label ID="Label1" class="control-label col-sm-4" >Change your first name</Label>
                        <div class="col-sm-6">
                         <?php  echo"<input name='first_name' class='form-control' value='".$row['first_name']."' />"; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <Label name="label2" class="control-label col-sm-4" >Change your Last name</Label>
                        <div class="col-sm-6">
                        <?php   echo "<input name='last_name' class='form-control' value='".$row['last_name']."' />";?>
                        </div>
                    </div>
                    <div class="form-group">
                        <Label ID="Label1" class="control-label col-sm-4" >Change your email</Label>
                        <div class="col-sm-6">
                            <?php   echo "<input name='email' class='form-control' value='".$row['email']."' />";?>
                        </div>
                    </div>
                    <div class="form-group">
                        <Label ID="Label1" class="control-label col-sm-4" >New Password</Label>
                        <div class="col-sm-6">
                            <input name="password"  class="form-control"  />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <Label ID="Label1" class="control-label col-sm-4" >Confirm Password</Label>
                        <div class="col-sm-6">
                            <input name="cp" class="form-control" />
                        </div>
                    </div>
                    <input type="submit" name="update" class="btn btn-danger" style="float:right" value="Save Changes" / >
                </form>
            </div>
        </div>
    </section>
    <section class="container">
        <div class="row">
            <h2 class="text-center">Favouite Books</h2>
            <div class="col-md-3">
                <div class="thumbnail">
                    <img src="Assets/Images/gg.png" class="img-responsive" alt="Alternate Text"  />
                    <div class="caption">
                        <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
                        <a href="#" class="">Read Now</a>
                    </div>
                </div>
            </div>
           
            <div class="col-md-3">
                <div class="thumbnail">
                    <img src="Assets/Images/gg.png" class="img-responsive" alt="Alternate Text"  />
                    <div class="caption">
                        <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="thumbnail">
                    <img src="Assets/Images/gg.png" class="img-responsive" alt="Alternate Text"  />
                    <div class="caption">
                        <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="thumbnail">
                    <img src="Assets/Images/gg.png" class="img-responsive" alt="Alternate Text"  />
                    <div class="caption">
                        <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br /><br />
     <footer>
        <p class="text-center">Copyright@2019 | All Rights Reserved </p>
    </footer>

    <?php require_once('Layouts/Footer.php')?> 

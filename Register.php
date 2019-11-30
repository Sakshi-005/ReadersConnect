 <?php
    require_once('Database.php');
    
    if(isset($_POST['submit'])){
        $first_name =  $_POST['first_name'];
        $last_name  =  $_POST['last_name'];
        $email      =  $_POST['email'];
        $password   =  $_POST['password'];
        $cp         =  $_POST['cp'];
        $dob        =  $_POST['dob'];
        $gender     =  $_POST['gender'];
        $genre      =  $_POST['genre'];
        if($password != $cp){
            echo "<script>alert('Password must matched')</script> ";
        }
        else{

        $sql = "INSERT INTO Register (first_name, last_name, email,password,dob,gender,genre)VALUES ('$first_name', '$last_name', '$email','$password','$dob','$gender','$genre')";
        if ($conn->query($sql) === TRUE) {

            echo "<script>alert('Reader created successfully')</script> ";

        } else {
            echo "<script>alert('Error')</script> ";
      
    }
    }
    $conn->close();
    }


 ?>


 <?php require_once("Layouts/Master.php") ?>
 <div class="bg-Image" style="background-image:url('Assets/Images/books.jpg')"></div>
    <div class="formBackground">
        <div class="registerForm">            
            <h2  style="font-weight:bold;text-align:center"><span class="glyphicon glyphicon-log-in"></span> REGISTER</h2><br />
            <form  class="form-horizontal" id="login" method="post" >
                <div class="form-group">
                    <Label  class="control-label col-sm-3">First Name</Label>
                    <div class="col-sm-9">
                        <input type="text" name="first_name" class="form-control" placeholder="Please Enter your first name" required/>
                    </div>
                </div>
                <div class="form-group">
                    <Label  class="control-label col-sm-3">Last Name</Label>
                    <div class="col-sm-9">
                        <input type="text" name="last_name" class="form-control" placeholder="Please Enter your last name" required/>
                    </div>
                </div>
                <div class="form-group">
                    <Label  class="control-label col-sm-3">Email</Label>
                    <div class="col-sm-9">
                        <input type="text" name="email" class="form-control" placeholder="Please Enter your email" required/>                    
                    </div>
                </div>
                <div class="form-group">
                    <Label  class="control-label col-sm-3">Password</Label>
                    <div class="col-sm-9">
                        <input type="text" name="password" class="form-control" placeholder="Please Enter your password" required/>                    
                    </div>
                </div>
                <div class="form-group">
                    <Label  class="control-label col-sm-3">Confirm Password</Label>
                    <div class="col-sm-9">
                        <input type="text" name="cp" class="form-control" placeholder="Please Enter your confirm password" required/>                    
                    </div>
                </div>
                <div class="form-group">
                    <Label  class="control-label col-sm-3">Date of Birth:</Label>
                    <div class="col-sm-9">
                        <input type="date" name="dob" class="form-control" required/>                    
                    </div>
               </div>
               <div class="form-group">
                     <Label  class="control-label col-sm-3">Gender:</Label>
                     <label class="radio-inline"><input type="radio" name="gender" checked>Male</label>
                     <label class="radio-inline"><input type="radio" name="gender">Female</label>
               </div>
                <div class="form-group">
                    <label for="sel1" class="control-label col-sm-3">Select list:</label>
                       <div class="col-sm-9"> 
                        <select class="form-control" name="genre">
                            <option>Science Fiction</option>
                            <option>Romance</option>
                            <option>Action</option>
                            <option>Horror</option>
                        </select>
                    </div>
                </div>
                <br />
                <div class="form-group">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-5">  
                        <input type="submit" name="submit" class="btn btn-danger form-control" value="REGISTER">
                    </div>
                    <div class="col-sm-5">
                        <a href="index.php"><button type="button" class="form-control btn btn-danger">LOGIN</button></a>
                    </div>
                </div>  
            </form>
        </div>
    </div>
<?php   
session_start();
require_once('Database.php');

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pwd   = $_POST['password'];

    $sql    = "SELECT * FROM Register WHERE email = '".$email."' AND password = '".$pwd."'";
    $query  = mysqli_query($conn,$sql);
    if(mysqli_num_rows($query) > 0){
        $_SESSION['email'] = $email;
         header("Location:Profile.php");
    }
    else{
        echo "Error";
    }
}


include_once("Layouts/Master.php"); ?>

<div class="bg-Image" style="background-image:url('Assets/Images/books.jpg')"></div>
    <div class="formBackground">
        <div class="loginForm">
            
            <h2  style="font-weight:bold;"><span class="glyphicon glyphicon-book"></span> Readers Connect</h2><br />
            <h4 style="font-weight:bold;text-align:center"> A Platform that connects Book Readers  </h4><br />         
            <form  class="form-horizontal" id="login" method="post" runat="server">
                <div class="form-group">
                    <Label  class="control-label col-sm-2" >Email:</Label>
                    <div class="col-sm-10">
                        <input type="text" name="email" placeholder="Please Enter your email" class="form-control" required/>                        
                    </div>
                </div>
                <br>            
                <div class="form-group">
                    <Label  class="control-label col-sm-2" >Password: </Label>
                    <div class="col-sm-10">
                         <input type="text" name="password" placeholder="Please Enter your password" class="form-control" required/>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="col-sm-2"></div>
                    <div class="signInBtn  col-sm-5">
                        <input type="submit" class="btn btn-danger form-control" name="login" value="SIGN IN" >
                    </div>
                    <div class="col-sm-5">                        
                        <a href="Register.php"><button type="button" class="btn btn-danger form-control">REGISTER</button></a>                   
                    </div>
                </div>  


            
            </form>
        </div>
    </div>


</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
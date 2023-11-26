<?php
//error_reporting(0);
if(isset($_POST['signup'])) {
    $fs_name = $_POST['firstname'];
    $ls_name = $_POST['lastname'];
    $fname = $_POST['fullname'];
    $email = $_POST['emailid'];
    $password = md5($_POST['password']);
    $home_mobile = $_POST['home_mobile'];
    $mobile = $_POST['mobileno'];
    echo "Hi";
    $sql = "INSERT INTO  tblusers(FirstName, LastName, FullName, EmailId, ContactNo, HomePhoneNo, Password) VALUES(:fs_name,:ls_name,:fname,:email,:mobile,:home_mobile,:password)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':fs_name', $fs_name, PDO::PARAM_STR);
    $query->bindParam(':ls_name', $ls_name, PDO::PARAM_STR);
    $query->bindParam(':fname', $fname, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->bindParam(':home_mobile', $home_mobile, PDO::PARAM_STR);
    $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    echo "Hi2";

    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId) {
        echo "<script>alert('Registration successfull. Now you can login');</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again');</script>";
    }
}?>
<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
<script type="text/javascript">
function valid()
{
if(document.signup.password.value!= document.signup.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.signup.confirmpassword.focus();
return false;
}
return true;
}
</script>
<div class="modal fade" id="signupform" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Sign Up</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="signup_wrap">
            <div class="col-md-12 col-sm-6">
              <form  method="post" name="signup" onSubmit="return valid();">
              <div class="form-group">
                  <input type="text" class="form-control" name="firstname" placeholder="First Name" required="required">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="lastname" placeholder="Last Name" required="required">
                </div>                
              <div class="form-group">
                  <input type="text" class="form-control" name="fullname" placeholder="Full Name" required="required">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="emailid" id="emailid" onBlur="checkAvailability()" placeholder="Email Address" required="required">
                   <span id="user-availability-status" style="font-size:12px;"></span> 
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" required="required">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="home_mobile" placeholder="Home Phone Number" maxlength="10" required="required">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="mobileno" placeholder="Mobile Number" maxlength="10" required="required">
                </div>
                <div class="form-group checkbox">
                  <input type="checkbox" id="terms_agree" required="required" checked="">
                  <label for="terms_agree">I Agree with <a href="#">Terms and Conditions</a></label>
                </div>
                <div class="form-group">
                  <input type="submit" value="Sign Up" name="signup" id="submit" class="btn btn-block">
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
        <p>Already got an account? <a href="#loginform" data-toggle="modal" data-dismiss="modal">Login Here</a></p>
      </div>
    </div>
  </div>
</div>
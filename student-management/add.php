<?php

session_start();
if($_SESSION['username'] == true){
}else{
    header('location:login.php');
}

include'init.php'; 

if(isset($_POST['submit'])){
    $roll = $_POST['roll'];
    $username = $_POST['name'];
    $course = $_POST['course'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $qry = "INSERT INTO `student`(`roll`, `name`, `course`, `mobile`, `email`) VALUES ('$roll','$username','$course','$phone','$email')";
    $res = mysqli_query($con,$qry);
    if($res==true){ 
        header('location:show.php');
    }else{
        header('location:add.php');
    }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- CSS FILE LINK HERE -->
    <link rel="stylesheet" href="assets/css/add.css?version=1">
    <title>Add Student</title>
  </head>
  <body class="bg-warning">

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
    <!-- Add Student Form Data -->
    
    <div class="container">
    
        <div class="row">
            <div class="col-md-4 col-lg-4">
                
            </div>
            <div class="col-md-4 col-lg-4 form">
                <h2>Add Student</h2>
                <form action="add.php" method="POST" onclick="return validation()">
                    <div class="form-group my-4">
                        <label for="name">Enter Roll Number</label>
                        <input type="tel" name="roll" id="roll" placeholder="Roll Number" class="form-control" onclick="return valid()" pattern="[0-9]{0,}" title=" Special charcters not allowed.">
                        <span class="text-danger font-weight-bold" id="roll_error"></span>
                    </div>
                    <div class="form-group my-4">
                        <label for="name">Enter Full Name</label>
                        <input type="text" name="name" id="name" placeholder="Full Name" class="form-control" pattern="[a-z A-Z ]{0,}" title="only alphabets are allowed.">
                        <span class="text-danger font-weight-bold" id="name_error"></span>
                    </div>
                    <div class="form-group my-4">
                        <label for="course">Enter Course</label>
                        <input type="text" name="course" id="course" placeholder="Course" class="form-control" pattern="[a-z A-Z.]{0,}" title=" Special charcters not allowed.">
                        <span class="text-danger font-weight-bold" id="course_error"></span>
                    </div>
                    <div class="form-group my-4">
                        <label for="phone">Enter Phone</label>
                        <input type="tel" name="phone" id="phone" placeholder="Phone" class="form-control">
                        <span class="text-danger font-weight-bold" id="phone_error"></span>
                    </div>
                    <div class="form-group my-4">
                        <label for="email">Enter Email</label>
                        <input type="email" name="email" id="email" placeholder="Email" class="form-control">
                        <span class="text-danger font-weight-bold" id="email_error"></span>
                    </div>
                    <button class="btn btn-primary rounded-0" type="submit" name="submit">Submit</button>
                    <p id="error_emp"></p>
                </form>      
            </div>
            <div class="col-md-4 col-lg-4">
                
            </div>
        </div>
    </div>
    <script>

        function validation(){
            var roll = document.getElementById('roll').value;
            var name = document.getElementById('name').value;
            var course = document.getElementById('course').value;
            var phone = document.getElementById('phone').value;
            var email = document.getElementById('email').value;

            // Validation Start From Roll No

            if(roll==""){
                document.getElementById('roll_error').innerHTML = "Please fill roll number";
                return false;
            }

            if(isNaN(roll)){
                document.getElementById('roll_error').innerHTML = "Please fill only digits";
                return false;
            }
            if(roll.length>15){
                document.getElementById('roll_error').innerHTML = "Roll Number length Should 15 charcters";
                return false;
            }

            // Validation Start From Name

            if(name==""){
                document.getElementById('name_error').innerHTML = "Please fill name";
                return false;
            }
            if(name.length<3){
                document.getElementById('name_error').innerHTML = "Name must 3 characters";
                return false;
            }
            if(!isNaN(name)){
                document.getElementById('name_error').innerHTML = "Please fill only alphabets";
                return false;
            }

            // Validation Start From Course

            if(course==""){
                document.getElementById('course_error').innerHTML = "Please fill course";
                return false;
            }
            if(!isNaN(course)){
                document.getElementById('course_error').innerHTML = "Please fill only alphabets";
                return false;
            }

             // Validation Start From Phone

             if(phone==""){
                document.getElementById('phone_error').innerHTML = "Please Fill phone";
                return false;
            }
            if(isNaN(phone)){
                document.getElementById('phone_error').innerHTML = "Please fill only digits";
                return false;
            }
            if(phone.length!=10){
                document.getElementById('phone_error').innerHTML = "Only 10 digits mobile number";
                return false;
            }\

            // Validation For Email Field

            if(email==""){
                document.getElementById('email_error').innerHTML="Please fill email";
                return false;
            }

            if(email.indexOf('@') <= 0){
                document.getElementById('email_error').innerHTML = "invalid email";
                return false;
            }

            if((email.charAt(email.length-4)!='.') && (email.charAt(email.length-3)!='.')){
                document.getElementById('email_error').innerHTML = "invalid email";
                return false;
            }
        }
    </script>
  </body>
</html>
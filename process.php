<?php
    include "conn.php";
    session_start();

    if(isset($_POST["reg"])){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];

            $insertreg =mysqli_query($conn, "INSERT INTO registration VALUES('0','$name','$email','$pass')");

            if($insertreg == true){
                ?>
                <script>
                    alert("Your registration was successful!");
                    window.location.href = "index.html";
                </script>
                <?php


            }else{
                ?>
                <script>
                    alert( "Error registration!\n Try again!");
                    window.location.href = "index.html";
                </script>
                <?php

            }
        

    }
    
    if(isset($_POST["create_profile"])){
    
        $picname = $_FILES['pic']['name'];
        $fileTmpName = $_FILES['pic']['tmp_name'];
        $fname = $_POST["firstname"];
        $mname = $_POST["middlename"];
        $lname = $_POST["lastname"];
        $school_id = $_POST["school_id"];
        $contact = $_POST["contact"];
        $fb = $_POST['facelink'];
        $address = $_POST["address"];
        $dept = $_POST["dept"];
        $course = $_POST["course"];
        $major = $_POST["major"];
        $coordinator = $_POST["coordinator"];
        $c_contact = $_POST["c_contact"];
        $c_email = $_POST["c_email"];
        $efirstname = $_POST["efirstname"];
        $elastname = $_POST["elastname"];
        $company = $_POST["company"];
        $econtact = $_POST["econtact"];
        $e_email = $_POST["e_email"];
        

        $insert_profile = mysqli_query($conn, "INSERT INTO create_profile VALUES ('0', '$picname', '$fname', '$mname', '$lname', '$school_id', '$contact', '$fb', '$address', '$dept', '$course', '$major', '$coordinator', '$c_contact', '$c_email', '$efirstname', '$elastname', '$company', '$econtact', '$e_email')");

        if($insert_profile==true){
            $fileDestination = "../ojt/assets/img/upload/" .$picname;
            move_uploaded_file($fileTmpName, $fileDestination);

            ?>
                <script>
                    alert("Data is inserted.");
                    window.location.href="../ojt/student/users-profile.html";
                </script>
            <?php

        }else{

            ?>
                <script>
                    alert("Data is not inserted.");
                    window.location.href="../ojt/student/create_profile.html";
                </script>
            <?php
        }
        
    }




    if(isset($_POST['login'])){
        
        $email = $_POST['log_email'];
        $pass = $_POST['log_pass'];

        $check_login = mysqli_query($conn, "SELECT * FROM registration WHERE email='$email' AND password='$pass'");

        $n = mysqli_num_rows($check_login);
        
        if($n <=0 ){
        
            ?>
                <script>
                    alert("Wrong Email or Password!");
                    window.location.href="index.html";
                </script>
            <?php
        }else{
            $_SESSION['email']=$email;
            ?>
                <script>
                    alert("Login Successfully!");
                    window.location.href="../ojt/student/index.html";
                </script>
            <?php
        }
    }

    if(isset($_POST['admin_login'])){
        
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $check_login = mysqli_query($conn, "SELECT * FROM `admin_login` WHERE email='$email' AND password = '$pass'");

        $n = mysqli_num_rows($check_login);
        
        if($n <=0 ){
        
            ?>
                <script>
                    alert("Wrong Email or Password!");
                    window.location.href="index.html";
                </script>
            <?php
        }else{
            $_SESSION['email']=$email;
            ?>
                <script>
                    alert("Login Successfully!");
                    window.location.href="../ojt/admins/index.html";
                </script>
            <?php
        }
    }
    

?>
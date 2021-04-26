<!DOCTYPE html>
<html lang="en">
<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script language="javaScript" type="text/javascript">
    //on keyup, start the countdown
        function check_username(e){
            var username = e.target.value
            var req = new XMLHttpRequest();
            req.onreadystatechange = function(){
                // alert("data......", req.responseText);
                if(req.readyState == 4){
                    // alert("data....", req.responseText);
                    document.getElementById("usernameLable").innerHTML = req.responseText;
                }
            }
            // alert("some thing is called");
            req.open("POST","./checks/check_username.php");
            req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            req.send("username="+username);            
        }
        let password;

        function getPassword(e){
            password = e.target.value;
            var req = new XMLHttpRequest();
            req.onreadystatechange = function(){
                if(req.readyState == 4){
                    document.getElementById("passwordLable").innerHTML = req.responseText;
                }
            }

            req.open("POST", "./checks/check_password_format");
            req.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
            req.send("password="+password)
        }

        function check_confirm_password(e){
            let confirmPassword = e.target.value;
            var req = new XMLHttpRequest();
            req.onreadystatechange = function(){
                if(req.readyState == 4){
                    document.getElementById("confirmPasswordLable").innerHTML = req.responseText;
                }
            }

            req.open("POST", "./checks/check_confirm_password");
            req.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
            req.send("password="+password+"&confirmPassword="+confirmPassword)
        }

        function check_email_format(e){
            let email = e.target.value;
            var req = new XMLHttpRequest();
            req.onreadystatechange = function(){
                if(req.readyState == 4){
                    document.getElementById("emailLable").innerHTML = req.responseText;
                }
            }

            req.open("POST", "./checks/check_email_format");
            req.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
            req.send("email="+email)
        }
        
    </script>
    <title><?php echo $page_title; ?></title>
 
    <!-- some custom CSS -->
    <style>
    .left-margin{
        margin:0 .5em 0 0;
    }
 
    .right-button-margin{
        margin: 0 0 1em 0;
        overflow: hidden;
    }
 
    /* some changes in bootstrap modal */
    .modal-body {
        padding: 20px 20px 0px 20px !important;
        text-align: center !important;
    }
 
    .modal-footer{
        text-align: center !important;
    }
    </style>
 
    <!-- Bootstrap CSS -->
    <link href="libs/bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet" media="screen" />
 
</head>
<body>
 
    <!-- container -->
    <div class="container">
 
        <?php
        // show page header
        echo "<div class='page-header'>";
            echo "<h1>{$page_title}</h1>";
        echo "</div>";
        ?>
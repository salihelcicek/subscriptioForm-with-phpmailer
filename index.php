<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUB FORM</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        body {
            background: linear-gradient(to right, #ffcc00, #f5f);
            display: flex;
            height: 100vh;
            align-items: center;
            justify-content: center;
            margin: 0; 
        }
        #outside {
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3); 
            width: 50%;
            background: linear-gradient(to right, pink, lightgray);
            font-size: 50px;
            text-align: center; 
            opacity: 1;
            transition: opacity 1s ease;
        }
        #outside.hidden {
            opacity: 0;
            display: none;
        }
        #top {
            font-size: 10px;
            width: 100%;
            display: flex;
            justify-content: space-between; 
            align-items: center; 
        }
        #buttonx {
            background-color: lightcoral;
            font-size: 25px;
            color: white;
            width: 50%;
            padding: 10px;
            cursor: pointer;
        }
        #error {
            font-size: 20px;
            font-family: monospace;
            color: brown;
        }
        #verify {
            font-size: 20px;
            font-family: monospace;
            transition: 1s ease;
            color: blue;
        }
        #showme {
            cursor: pointer;
            padding: 20px 20px;
            font-family: 'Times New Roman', Times, serif;
            background-color: aquamarine;
            color: white;
            border: none;
            font-size: 40px;
            transition: 1s ease;
        }
        #showme:hover {
            background-color: aqua;
        }
    </style>

<?php

error_reporting(E_ERROR | E_PARSE);

require_once "email.php";
    $error = "";
    $verify = "";
    if (!empty($_POST)) {
        extract($_POST);
        if ($email == "") {
            $error = "Please enter an email!";
        } else {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                $verify = "Successfully send to {$email}!";
            } else {
                $error = "Please enter valid email!";
            }
        }
    }
?>
    <script defer>
        document.addEventListener("DOMContentLoaded", function() {
            let panel = document.getElementById("outside");
            let showButton = document.getElementById("showme");
            function closex() {
                panel.style.opacity = 0;
                setTimeout(() => {
                    panel.style.display = "none";
                    showButton.style.display = "block";
                }, 1000); 
            }
            function showmex() {
                panel.style.display = "block";
                setTimeout(() => {
                    panel.style.opacity = 1;
                }, 10); 
                showButton.style.display = "none";
            }
            document.querySelector(".fa-x").onclick = closex;
            showButton.onclick = showmex;
        });
    </script>

</head>
<body>
    <div id="outside">
        <div id="top">
            <p></p>
            <i class="fa-solid fa-x" style="font-size: 10px; cursor:pointer;"></i>
        </div>

        <i class="fa-solid fa-envelope" style="font-size: 100px;"></i>
        <br>
        <span style="font-family: Impact;">Become a Subscriber</span>
        <br>
        <p style="font-size: 25px;">Subscribe to our blog and get the latest updates straight to your inbox</p>
        
        <form action="" method="post">
            <input type="text" name="email" id="" placeholder="Enter your email..."
            style="border: none; border-radius: 5px; padding: 10px 10px; font-size: 20px; width: 70%;">
            <br><input type="submit" value="Subscribe" id="buttonx" style="border: none;">
        </form>
        
        <p id="error"><?= $error ?></p>
        <p id="verify"><?= $verify ?></p>
    </div>

    <button id="showme" style="display:none;">SHOW THE PANEL</button>
</body>
</html>

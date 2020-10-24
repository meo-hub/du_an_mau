<?php

require_once "lib/db.php";
require_once "lib/common.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <?php include('layout/style.php') ?>
    <style>
        .top_bg {
            background: #242424;
        }

        @media only screen and (max-width: 1280px) {
            .wrap {
                width: 95%;
            }
        }

        @media only screen and (max-width: 1366px) {
            .wrap {
                width: 95%;
            }
        }

        .wrap {
            margin: 0 auto;
            width: 80%;
        }

        main_bg {
            background: #EBE7DF;
        }
        .main {
    padding: 4%;
}
.about {
    display: block;
}
.cont-grid-img {
    margin-right: 3.3333%;
    width: 34.33333%;
    float: left;
}
.cont-grid-img img {
    margin-top: 10px;
}
.cont-grid {
    float: left;
    width: 62.3333%;
}
.cont-grid h4 {
    line-height: 1.5em;
    font-size: 1.5em;
    text-transform: capitalize;
    color: #333333;
    text-shadow: 0 1px 0 #ffffff;
}
cont-grid p, .about-p {
    margin-top: 2%;
}
p.para {
    color: #555555;
    text-shadow: 0 1px 0 #ffffff;
    line-height: 1.5em;
    font-size: 0.8725em;
}
clear {
    clear: both;
}
.read_more {
    margin-top: 2%;
}

.read_more a {
    display: inline-block;
    font-family: 'Maven Pro', sans-serif;
    background: #242424;
    border: 1px solid #242424;
    padding: 10px 20px;
    outline: none;
    color: #ffffff;
    font-size: 1em;
    text-transform: capitalize;
    -webkit-appearance: none;
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
    border-radius: 2px;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    -o-border-radius: 2px;
}
    </style>
</head>

<body>
    <?php include('layout/header.php') ?>
    <div class="top_bg">
        <div class="wrap">
            <div class="main_top">
                <h2 class="style">about us</h2>
            </div>
        </div>
    </div>

    <div class="main_bg">
        <div class="wrap">
            <div class="main">
                <div class="about">
                    <div class="cont-grid-img img_style">
                        <img src="https://www.liberaldictionary.com/wp-content/uploads/2019/01/about-1765.jpg" alt="">
                    </div>
                    <div class="cont-grid">
                        <h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h4>
                        <p class="para">Lorem Ipsum is simply dummy text of the printing and typesetting industry., Lorem Ipsum dummy text ever since dummy text of the printing and usings 1500s,Duis aute irure dolor in reprehenderit in voluptate velit esse when an,Lorem Ipsum has been the industry's standard dummy text ever since dummy text of the printing and usings 1500s, </p>
                        <p class="para">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                    </div>
                    <div class="clear"></div>
                    <div class="about-p">
                        <p class="para">Lorem Ipsum is simply dummy text of the printing and typesetting industry., Lorem Ipsum dummy text ever since dummy text of the printing and usings 1500s,Duis aute irure dolor in reprehenderit in voluptate velit esse when an,Lorem Ipsum has been the industry's standard dummy text ever since dummy text of the printing and usings 1500s, </p>
                        <p class="para">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since dummy text of the printing and usings 1500s,Duis aute irure dolor in reprehenderit in voluptate velit Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since dummy text of the printing and usings 1500s,Duis aute irure dolor in reprehenderit in voluptate velit</p>
                        <p class="para">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                        <div class="read_more">
                            <a class="btn" href="details.html">read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include('layout/footer.php');

    ?>
</body>

</html>
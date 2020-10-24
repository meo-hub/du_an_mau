<?php

require_once "lib/db.php";
require_once "lib/common.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <?php include('layout/style.php') ?>
</head>

<body>
    <?php include('layout/header.php') ?>


    <!-- Map Begin -->
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d781.9294088450324!2d105.28651769469613!3d21.576659592035103!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134bc1f285bffa7%3A0xb49bbc2c4c3d3982!2zQ2hpIFRoaeG6v3QsIFPGoW4gRMawxqFuZyBEaXN0cmljdCwgVHV5w6puIFF1YW5nLCBWaWV0bmFt!5e1!3m2!1sen!2s!4v1601430358450!5m2!1sen!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> </div>
    <!-- Map End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__text">
                        <div class="section-title">
                            <span>Thông tin</span>
                            <h2>Liên hệ chúng tôi</h2>
                            <p>Như bạn có thể mong đợi về một công ty khởi đầu là một nhà cung cấp sản phẩm cao cấp, chúng tôi rất chú ý.</p>
                        </div>
                        <ul>
                            <li>
                                <h4>Việt Nam</h4>
                                <p>Trường cao đẳng FPT Polytechnich</p>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__form">
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Name">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Email">
                                </div>
                                <div class="col-lg-12">
                                    <textarea placeholder="Message"></textarea>
                                    <button type="submit" class="site-btn">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Footer Section Begin -->


    <?php
    include('layout/footer.php');

    ?>
</body>

</html>
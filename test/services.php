<?php
include 'header.php';
?>
<?php

	$service_query="SELECT * FROM `static_page_clientsub` WHERE `customerID` ='$custID'";
	$service_query_run=mysqli_query($conn,$service_query);
	$service_query_data=mysqli_fetch_assoc($service_query_run);

?>
<div id="wrapper-container" class="site-wrapper-container">
    <div class="vk-shortcode-accordion">


<section class="site-content-area">
    	<!-- this code for the Header_image-->

    	<div class="vk-gallery-grid-full-banner">
                <div class="vk-about-banner">
                <!--data-parallax="scroll" data-image-src="images/02_01_about/background.jpg"-->
                <div class="vk-about-banner-destop" style="background-size: cover;background-image: url(https://res.cloudinary.com/dwzhicwir/image/upload/c_fill/reputize/staticpage/header2019_07_19_13_09_54.jpg);">
                    <div class="vk-about-banner-caption">
                        <h2><?php echo $service_query_data['client_h1']; ?></h2>
                        <h3>
                            <a href="#">Page</a>
                            <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                            <a href="#"><?php echo $service_query_data['client_h1']; ?></a>
                        </h3>
                    </div>
                </div>
            </div>
            </div>

<!--- Code for the meeting planner section -->

<div class="vk-about-welcometo">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="vk-about-welcometo-left">
                                <img src="https://res.cloudinary.com/<?php echo $cloud_name; ?>/image/upload/c_fill/reputize/staticpage/<?php echo $service_query_data['header_img']; ?>.jpg" alt="" class="img-responsive" style="border-radius: 5px;">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="vk-about-welcometo-right">
                                <div class="vk-about-right-header">
                                    <h3>Welcome To</h3>
                                    <h2><?php echo $service_query_data['client_h1']; ?></h2>
                                    <div class="clearfix"></div>
                                    <div class="vk-about-border"></div>
                                </div>
                                <div class="vk-about-right-content">
                                    <?php echo $service_query_data['client_h1_cont']; ?>
                                    <div class="vk-about-right-content-border"></div>
                                </div>
                                
                            </div>
                        </div>

                    </div>
                </div>
            </div>

<!-- End-->


<!-- accodance start -->
<div class="vk-shortcode-accordion-body">
                <div class="container"> 


                    <div class="vk-accordion-with-bg">
                        <h4 class="vk-accordion-toggle-default"><?php echo $service_query_data['client_box1']; ?></h4>
                        <div class="vk-accordion-content-default">
                            <p>
                               <?php echo $service_query_data['client_box1_cont']; ?>
                            </p>
                        </div>

                        <h4 class="vk-accordion-toggle-default"><?php echo $service_query_data['client_box2']; ?></h4>
                        <div class="vk-accordion-content-default">
                            <p>
                                <?php echo $service_query_data['client_box2_cont']; ?>
                            </p>
                        </div>

                        <h4 class="vk-accordion-toggle-default"><?php echo $service_query_data['client_box3']; ?></h4>
                        <div class="vk-accordion-content-default">
                            <p>
                                <?php echo $service_query_data['client_box3_cont']; ?>
                            </p>
                        </div>
                        <h4 class="vk-accordion-toggle-default"><?php echo $service_query_data['client_box4']; ?></h4>
                        <div class="vk-accordion-content-default">
                            <p>
                                <?php echo $service_query_data['client_box4_cont']; ?>
                            </p>
                        </div>
                    </div>
</div>
</div>

        </section>


</div>
</div>
<?php 

include 'footer.php';

?>
<?php



    include 'header.php';

?>



        <!--BENGIN CONTENT HEADER-->
        <section class="site-content-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="vk-testimonials-banner">
                        <div class="vk-about-banner">
                            <div class="vk-about-banner-destop">
                                <div class="vk-banner-img"></div>
                                <div class="vk-about-banner-caption">
                                    <h2>Testimonial</h2>
                                    <h3>
                                        <a href="#">Page</a>
                                        <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                        <a href="#">Testimonial</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="vk-testimonials-content">
                        <div class="container">

                            <?php 

                                $query4="SELECT * FROM `testimonials` WHERE `customerID`='$custID';";
                                        $run5=mysqli_query($conn,$query4);

                                         while ($testimonial_data=mysqli_fetch_assoc($run5)) {

                             ?>

                            <div class="vk-testimonials-content-item">
                                <div class="vk-item-image">
                                    <img src="https://res.cloudinary.com/<?php echo $cloud_name;  ?>/image/upload/h_50,w_50,c_fill/reputize/testimonials/<?php  echo $testimonial_data['photo']; ?>.jpg" alt="" class="img-responsive">
                                </div>
                                <div class="vk-item-content">
                                    <div class="vk-item-content-header">
                                        <ul>
                                            <li>
                                                <?php echo $testimonial_data['name'];?> - <a href="#"><?php echo $testimonial_data['detail'];?></a>
                                            </li>
                                            <li>
                                                <p>
                                                    <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                                    <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                                    <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                                    <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                                    <span><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="vk-item-content-body">
                                        <p>
                                            <?php echo $testimonial_data['review']; ?>
                                        </p>
                                    </div>
                                </div>
                            </div> 
                            <?php 
                                    }

                            ?>

                                                        

                            <div class="vk-btn-more">
                                <button type="button" class="btn-more">LOAD MORE <i class="fa fa-long-arrow-down" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--END CONTENT ABOUT-->



 <?php

                          include 'footer.php';

                          ?>
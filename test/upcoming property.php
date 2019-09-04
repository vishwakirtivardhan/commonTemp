<?php

include 'header.php';



                    $query_whyperch="SELECT * FROM `static_page_whyperch` WHERE `customerID`='$custID';";
                    $query_whyperch_run=mysqli_query($conn,$query_whyperch);
                    $data_whyperch=mysqli_fetch_assoc($query_whyperch_run);
                     ?>







<div class="vk-gallery-grid-full-banner">
                        <div class="vk-about-banner">
                            <div class="vk-about-banner">
                            <div class="vk-about-banner-destop" data-parallax="scroll" data-image-src="" style="background-image: url(https://res.cloudinary.com/dwzhicwir/image/upload/c_fill/reputize/staticpage/gallery-header2019_07_19_13_21_21.jpg); background-repeat: no-repeat; background-size: cover;  " >
                                <!--<div class="vk-banner-img"></div>-->
                                <div class="vk-about-banner-caption">
                                    <h2>Our UpComing Properties </h2>
                                    <h3>
                                        <a href="#">Page</a>
                                        <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                        <a href="#">Upcoming Properties</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>



<div class="vk-events-lists-content">
                <div class="container">
                    <div class="card">
                        

                        <!-- Tab panes -->
                        <div class="tab-content">




								<div role="tabpanel" class="tab-pane active" id="upcomming">
                                <div class="vk-events-lists-content-item">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="vk-events-iem-img">
                                                <a href="#"><img src="http://stayondiscount.com/28/images/<?php echo $data_whyperch['imgbox_img1']; ?>" alt="" class="img-responsive"></a>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="vk-events-lists-item-right">
                                                <div class="vk-events-item-right-header">
                                                    <div class="vk-event-item-time">
                                                        <ul class="vk-event-item-time-sub">
                                                            <li>
                                                                <span>1</span>
                                                            </li>
                                                            <li>
                                                                <span></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="vk-event-item-info">
                                                        <h2><a href="#"><?php echo $data_whyperch['imgbox_h1']; ?></a></h2>
                                                        
                                                    </div>
                                                </div>
                                                <div class="vk-events-item-text">
                                                    <p>
                                                        <?php echo $data_whyperch['imgbox_content1']; ?>
                                                    </p>
                                                </div>
                                                
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="vk-events-lists-content-item">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="vk-events-iem-img">
                                                <a href="#"><img src="http://stayondiscount.com/28/images/<?php echo $data_whyperch['imgbox_img2']; ?>" alt="" class="img-responsive"></a>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="vk-events-lists-item-right">
                                                <div class="vk-events-item-right-header">
                                                    <div class="vk-event-item-time">
                                                        <ul class="vk-event-item-time-sub">
                                                            <li>
                                                                <span>2</span>
                                                            </li>
                                                            <li>
                                                                <span></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="vk-event-item-info">
                                                        <h2><a href="#"><?php echo $data_whyperch['imgbox_h2']; ?></a></h2>
                                                        
                                                    </div>
                                                </div>
                                                <div class="vk-events-item-text">
                                                    <p>
                                                        <?php echo $data_whyperch['imgbox_content2']; ?>
                                                    </p>
                                                </div>
                                                
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="vk-events-lists-content-item">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="vk-events-iem-img">
                                                <a href="#"><img src="http://stayondiscount.com/28/images/<?php echo $data_whyperch['imgbox_img3']; ?>" alt="" class="img-responsive"></a>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="vk-events-lists-item-right">
                                                <div class="vk-events-item-right-header">
                                                    <div class="vk-event-item-time">
                                                        <ul class="vk-event-item-time-sub">
                                                            <li>
                                                                <span>3</span>
                                                            </li>
                                                            <li>
                                                                <span></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="vk-event-item-info">
                                                        <h2><a href="#"><?php echo $data_whyperch['imgbox_h3']; ?></a></h2>
                                                                                                            </div>
                                                </div>
                                                <div class="vk-events-item-text">
                                                    <p>
                                                        <?php echo $data_whyperch['imgbox_content3']; ?>
                                                    </p>
                                                </div>
                                                
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>


                                <div class="vk-events-lists-content-item">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="vk-events-iem-img">
                                                <a href="#"><img src="http://stayondiscount.com/28/images/<?php echo $data_whyperch['imgbox_img4']; ?>" alt="" class="img-responsive"></a>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="vk-events-lists-item-right">
                                                <div class="vk-events-item-right-header">
                                                    <div class="vk-event-item-time">
                                                        <ul class="vk-event-item-time-sub">
                                                            <li>
                                                                <span>4</span>
                                                            </li>
                                                            <li>
                                                                <span></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="vk-event-item-info">
                                                        <h2><a href="#"><?php echo $data_whyperch['imgbox_h4']; ?></a></h2>
                                                        
                                                    </div>
                                                </div>
                                                <div class="vk-events-item-text">
                                                    <p>
                                                        <?php echo $data_whyperch['imgbox_content4']; ?>
                                                    </p>
                                                </div>
                                                
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="vk-events-lists-content-item">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="vk-events-iem-img">
                                                <a href="#"><img src="http://stayondiscount.com/28/images/<?php echo $data_whyperch['imgbox_img5']; ?>" alt="" class="img-responsive"></a>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="vk-events-lists-item-right">
                                                <div class="vk-events-item-right-header">
                                                    <div class="vk-event-item-time">
                                                        <ul class="vk-event-item-time-sub">
                                                            <li>
                                                                <span>5</span>
                                                            </li>
                                                            <li>
                                                                <span></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="vk-event-item-info">
                                                        <h2><a href="#"><?php echo $data_whyperch['imgbox_h5']; ?></a></h2>
                                                        
                                                    </div>
                                                </div>
                                                <div class="vk-events-item-text">
                                                    <p>
                                                        <?php echo $data_whyperch['imgbox_content5']; ?>
                                                    </p>
                                                </div>
                                                
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="vk-events-lists-content-item">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="vk-events-iem-img">
                                                <a href="#"><img src="http://stayondiscount.com/28/images/<?php echo $data_whyperch['imgbox_img6']; ?>" alt="" class="img-responsive"></a>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="vk-events-lists-item-right">
                                                <div class="vk-events-item-right-header">
                                                    <div class="vk-event-item-time">
                                                        <ul class="vk-event-item-time-sub">
                                                            <li>
                                                                <span>6</span>
                                                            </li>
                                                            <li>
                                                                <span></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="vk-event-item-info">
                                                        <h2><a href="#"><?php echo $data_whyperch['imgbox_h6']; ?></a></h2>
                                                        
                                                    </div>
                                                </div>
                                                <div class="vk-events-item-text">
                                                    <p>
                                                        <?php echo $data_whyperch['imgbox_content6']; ?>
                                                    </p>
                                                </div>
                                                
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="vk-events-lists-content-item">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="vk-events-iem-img">
                                            	<?php 

                                       
                                            	if ($data_whyperch['imgbox_img7']) {
                                            		
                                            	
                                       					     ?>
                                                <a href="#"><img src="http://stayondiscount.com/28/images/<?php echo $data_img;  ?>" alt="" class="img-responsive">
                                                	
                                                	</a>
                                            	<?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="vk-events-lists-item-right">
                                                <div class="vk-events-item-right-header">
                                                    <div class="vk-event-item-time">
                                                        <ul class="vk-event-item-time-sub">
                                                            <li>
                                                                <span>7</span>
                                                            </li>
                                                            <li>
                                                                <span></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="vk-event-item-info">
                                                        <h2><a href="#"><?php echo $data_whyperch['imgbox_h7']; ?></a></h2>
                                                        
                                                    </div>
                                                </div>
                                                <div class="vk-events-item-text">
                                                    <p>
                                                        <?php echo $data_whyperch['imgbox_content7']; ?>
                                                    </p>
                                                </div>
                                                
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>


</div>
</div>



























    </div>
</div>

<?php
include 'footer.php';
?>
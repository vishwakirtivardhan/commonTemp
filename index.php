<?php

include 'include/common-function.php';
include 'include/customerID.php';
$toOrgUrl = $custID;
$sql = "select * from admin_details where customerID='$toOrgUrl'";
$query = $conn->query($sql);
$no_of_row = $query->num_rows;
$res = $query->fetch_assoc();
$cloud_cdnName = $res['cloud_name'];
$base_url = $res['website'];
//----------------- Fatch Meta tags Keyword--------------------------->
$selmeta = "select * from metaTags where filename='index' and customerID='$toOrgUrl'";
$metaquery = $conn->query($selmeta);
$metadata = $metaquery->fetch_assoc();
$ptitle = $metadata['MetaTitle'];
$desc = $metadata['MetaDisc'];
$kwords = $metadata['MetaKwd'];
$fileName = $metadata['filename'];
$canonicalurl = $base_url;
$othercode = html_entity_decode($metadata['othercode']);
$ampcode = html_entity_decode($metadata['nonamp']);
//--------------------Get Home Page Data---------------------------->
$indexsel = "select * from homeContent where type='home' and customerID='$toOrgUrl'";
$indexquery = $conn->query($indexsel);
$indexdata = $indexquery->fetch_assoc();

?>

<?php Header_data($ptitle, $kwords, $desc, $pageName, $canonicalurl, $ampcode, $othercode, $fileName); 
 ?>

<?php Header_Menu();

 ?>

    <div id="main-content" class="site-main-content">
        <div id="home-main-content" class="site-home-main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="vk-slide">
                        <div id="owl-slide-home" class="owl-carousel owl-theme">
                            <?php
                             $sql1 = "select *from HomeSlider where customerID='$toOrgUrl'";
                             $run2 = $conn->query($sql1);
                                 while($data2=mysqli_fetch_array($run2)) { ?>
                                     <div class="item">
                                 <div class="vk-item-slide">
                                 <div class="vk-item-img" style="background: url(https://res.cloudinary.com/<?php echo $cloud_cdnName; ?>/image/upload/h_480,w_1500,c_fill/reputize/homepage-slider/<?php echo $data2['hsimg'];?>.jpg) no-repeat; background-size: cover; ">
                                         <!--                                            <img src="images/01_06_transparents_2/banner21.jpg" alt="" class="img-responsive">-->
                                     </div>
                                     <div class="clearfix"></div>
                                 <div class="vk-slide-caption">
                                         <div class="container">
                                             <div class="row">
                                                 <div class="col-md-8 vk-transparent-2-left">
                                                     <h3 class="animated fadeInDown slide-delay-1"><?php echo $data2['hshead1']; ?></h3>
                                                     <h2 class="animated fadeInUp slide-delay-2"><?php

                                     echo $indexdata["h1tag"];

                                     ?> </h2>
                                                     <div class="clearfix"></div>
                                                     <div class="vk-slide-cation-btn">
                                                         <ul>
                                                             <li>
                                                                 <a href="#"><?php
                                                                         echo $indexdata["aptgalleryhead"];
                                                                 ?></a>
                                                             </li>
                                                             <li>
                                                                 <a href="#">BOOK NOW <span class="ti-arrow-right"></span></a>
                                                             </li>
                                                         </ul>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                                   <?php 
                                 }

                            ?>

                            <!--
                            <div class="item">
                                <div class="vk-item-slide">
                                    <div class="vk-item-img1">
                                                                                  <img src="images/01_06_transparents_2/banner21.jpg" alt="" class="img-responsive">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="vk-slide-caption">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-8 vk-transparent-2-left">
                                                    <h3 class="animated fadeInDown slide-delay-1">Swimming Pool</h3>
                                                    <h2 class="animated fadeInUp slide-delay-2">Sparta Plaza Hotel</h2>
                                                    <div class="clearfix"></div>
                                                    <div class="vk-slide-cation-btn">
                                                        <ul>
                                                            <li>
                                                                <a href="#">OUR ROOMS</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">BOOK NOW <span class="ti-arrow-right"></span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           </div>
                            <div class="item">
                                <div class="vk-item-slide">
                                    <div class="vk-item-img2">
                                                                                  <img src="images/01_06_transparents_2/banner21.jpg" alt="" class="img-responsive">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="vk-slide-caption">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-8 vk-transparent-2-left">
                                                    <h3>Swimming Pool</h3>
                                                    <h2>Sparta Plaza Hotel</h2>
                                                    <div class="clearfix"></div>
                                                    <div class="vk-slide-cation-btn">
                                                        <ul>
                                                            <li>
                                                                <a href="#">OUR ROOMS</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">BOOK NOW <span class="ti-arrow-right"></span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>

                        <div class="vk-transparents-2-booking-hotel hidden-sm hidden-xs">
                            <div class="container">
                                <div class="vk-booking-transparent-2">
                                    <div class="vk-booking-head" style="padding-top: 10;padding-bottom: 30;">
                                        <h2>Reservation</h2>
                                        <p><?php echo $res['reservationNo']; ?></p>
                                        <div class="vk-booking-border"></div>
                                    </div>
                                    <div class="vk-booking-body">
                                        <form action="http://sparta.vikitheme.com/html/action.php" class="form-horizontal">
                                            <div class="col-md-12 vk-clear-padding">
                                                <div class="booking-item">
                                                    <h4>Check - In</h4>
                                                    <div class="input-group date date-check-in" data-date="12-02-2017" data-date-format="mm-dd-yyyy">
                                                        <input name="date1" class="form-control" type="text" value="12-02-2017">
                                                        <span class="input-group-addon btn"><span class="ti-calendar" id="ti-calendar1"></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 vk-clear-padding">
                                                <div class="booking-item">
                                                    <h4>Check - Out</h4>
                                                    <div class="input-group date date-check-out" data-date="12-02-2017" data-date-format="mm-dd-yyyy">
                                                        <input name="date2" class="form-control" type="text" value="12-02-2017">
                                                        <span class="input-group-addon btn"><span class="ti-calendar" id="ti-calendar2"></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 vk-clear-padding">
                                                <div class="booking-item booking-item-adults">
                                                    <h4>User Name</h4>
                                                    <input type="text" name="" class="form-control" placeholder="Enter">
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-6 vk-clear-padding">
                                                <div class="booking-item">
                                                    <h4>Phone No</h4>
                                                    <input type="" name="" id="night" class="form-control" placeholder="Enter" style="scroll-behavior:; ">
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-6 vk-clear-padding">
                                                <div class="booking-item booking-item-adults">
                                                    <h4>Email</h4>
                                                    <input type="text" name="" class="form-control" placeholder="Enter">
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-6 vk-clear-padding">
                                                <div class="booking-item">
                                                    <h4>Select Property</h4>
                                                    <select class="form-control" style="font-size: x-small; height: 50px;">
                                                    <?php 

                                                    while($data_property =mysqli_fetch_assoc($run3)){
                                                     ?>
                                                    
                                                        <option><?php echo $data_property['propertyName']; ?></option>
                                                    <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                        <!--    <div class="col-md-6 vk-clear-padding">
                                                <div class="booking-item" style="width: 200%;">
                                                    <h4>Email</h4>
                                                    <input type="Email" name="" id="night" class="form-control" placeholder="Email">
                                                    
                                                </div>
                                                
                                            </div><br>
                                            <div class="col-md-6 vk-clear-padding">
                                                <div class="booking-item" >
                                                    <h4>Select Property</h4>
                                                </div>
                                                
                                            </div>-->

                                            <div class="vk-btn-check col-md-12">
                                                <button type="submit" class="btn vk-btn-primary btn-block btn-check">Check  Availability</button>
                                            </div>
                                        </form>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="vk-booking-hotel hidden-md hidden-lg">
                        <div class="container">
                            <form action="http://sparta.vikitheme.com/html/action.php" class="form-horizontal  booking-hotel-all">
                                <ul>
                                    <li>
                                        <h4>Check - In</h4>
                                        <div class="input-group date date-check-in" data-date="12-February-2017" data-date-format="mmmm-dd-yyyy">
                                            <input name="date" class="form-control" type="text" value="12-February-2017">
                                            <span class="input-group-addon btn"><span class="ti-calendar" id="ti-calendar3"></span></span>
                                        </div>
                                    </li>
                                    <li>
                                        <h4>Check - Out</h4>
                                        <div class="input-group date date-check-out" data-date="12-February-2017" data-date-format="mmmm-dd-yyyy">
                                            <input name="date" class="form-control" type="text" value="12-February-2017">
                                            <span class="input-group-addon btn"><span class="ti-calendar" id="ti-calendar4"></span></span>
                                        </div>
                                    </li>
                                    <li>
                                        <h4>User Name</h4>
                                        <div class="wrap-select">
                                            <div id="dd" class="">
                                                
                                            <input type="text" name="" class="form-control" placeholder="Enter">
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <h4>Phone</h4>
                                        <div class="wrap-select">
                                            <div id="dda" class="">
                                                <input type="text" name="" class="form-control" placeholder="Enter">
                                            </div>
                                        </div>
                                    </li>

                                <li style="background-color: white;padding: 15px 20px;margin-right: 14px;float: left;">
                                        <h4>Email</h4>
                                        <div class="wrap-select">
                                            <div id="dda" class="">
                                                <input type="text" name="" class="form-control" placeholder="Enter">
                                            </div>
                                        </div>
                                    </li>
                                    

                                    <li>
                                        <h4>Select Property</h4>
                                        <div class="wrap-select">
                                            <div id="dda" class="wrapper-dropdown-3">
                                                
                                                        <select class="browser-default custom-select">
                                                          <option selected>Select</option>
                                                          <?php
                                                          $query5= "SELECT * FROM `propertyTable` WHERE `customerID` ='$custID';";
                                                          $run5=mysqli_query($conn,$query5);

                                                          while($data5=mysqli_fetch_assoc($run5)){
                                                          ?>
                                                          <option><?php echo $data5['propertyName']; ?></option>
                                                      <?php } ?>
                                                        </select>
                                                                                                                                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="vk-btn-check">
                                            <button type="submit" class="btn vk-btn-primary btn-block btn-check">Check  Availability</button>
                                        </div>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </form>
                            <div class="clearfix"></div>
                        </div>
                    </div>


                    <div class="vk-welcometo-transparents-2">
                        <div class="vk-sparta-about">
                            <div class="container">
                                <div class="vk-sparta-head-title">
                                    <h3>Welcome To</h3>
                                    <h2 value=""><?php

                                    echo $indexdata["h1tag"];

                                    ?></h2>
                                    <div class="vk-sparta-about-border"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="vk-sparta-about-text">
                                            <p>
                                                <?php

                                                echo $indexdata["H1Content"];

                                                ?>
                                                 </p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="vk-sparta-image">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-3 vk-clear-padding">
                                            <div class="vk-sparta-image-item">
                                                <div class="vk-sparta-item-img">
                                                    <a href="#">
                                                        <img src="images/01_01_default/vk-sparta-image/img1.jpg" alt="" class="img-responsive">
                                                    </a>
                                                </div>
                                                <div class="vk-iamge-item-caption">
                                                    <img src="images/01_01_default/vk-sparta-image-icon/spa2.png" alt="">
                                                    <h2><?php
                                                        echo $indexdata['subhead1'];

                                                    ?></h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3  vk-clear-padding">
                                            <div class="vk-sparta-image-item">
                                                <div class="vk-sparta-item-img">
                                                    <a href="#">
                                                        <img src="images/01_01_default/vk-sparta-image/img2.jpg" alt="" class="img-responsive">
                                                    </a>
                                                </div>
                                                <div class="vk-iamge-item-caption">
                                                    <img src="images/01_01_default/vk-sparta-image-icon/food.png" alt="">
                                                    <h2><?php
                                                        echo $indexdata['subhead2'];
                                                    ?></h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 vk-clear-padding">
                                            <div class="vk-sparta-image-item">
                                                <div class="vk-sparta-item-img">
                                                    <a href="#">
                                                        <img src="images/01_01_default/vk-sparta-image/img3.jpg" alt="" class="img-responsive">
                                                    </a>
                                                </div>
                                                <div class="vk-iamge-item-caption">
                                                    <img src="images/01_01_default/vk-sparta-image-icon/gym.png" alt="">
                                                    <h2>
                                                        <?php
                                                        echo $indexdata['subhead3'];
                                                    ?>

                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 vk-clear-padding">
                                            <div class="vk-sparta-image-item">
                                                <div class="vk-sparta-item-img">
                                                    <a href="#">
                                                        <img src="images/01_01_default/vk-sparta-image/img4.jpg" alt="" class="img-responsive">
                                                    </a>
                                                </div>
                                                <div class="vk-iamge-item-caption">
                                                    <img src="images/01_01_default/vk-sparta-image-icon/event.png" alt="">
                                                    <h2>
                                                        <?php
                                                        echo $indexdata['subhead4'];
                                                    ?>

                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="vk-our-rooms-transparents-2">
                        <div class="vk-our-room">
                            <div class="container">
                                <div class="vk-sparta-head-title">
                                    <h3><?php
                                                        
                                                    ?></h3>
                                    <h2><?php

                                    echo $indexdata['aptgalleryhead'];
                                   
                                    ?></h2>
                                    
                                    <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="vk-sparta-about-text">
                                            <p>
                                                <?php
                                                echo $indexdata['aptgalleryheadcontent'];
                                      
                                                ?>
                                                 </p>
                                        </div>
                                     </div>
                                </div>
                                               
                                    <div class="vk-sparta-about-border"></div>
                                </div>
                                <div class="vk-spartar-our-room-destop">
                                    <div class="vk-sparta-our-room">
                                        <div id="vk-owl-our-room" class="vk-owl-three-dots owl-carousel owl-theme">

                                            <?php
                                  $propsel = "select * from propertyTable where status='Y' and customerID='$custID' order by propertyID desc ";
                                $propquery = $conn->query($propsel);
                                while($propdata = $propquery->fetch_assoc()){
                                    $propid = $propdata['propertyID'];

                                    $imagesel = "select * from propertyImages where propertyID='$propid' and imageType='property' and roomID='0'  order by imagesID desc limit 1";
                                    $imagequery = $conn->query($imagesel);
                                    $imagedata = $imagequery->fetch_assoc();

                                              ?>
                                            <div class="item">
                                                <div class="vk-sparta-item-content">
                                                    <div class="vk-item-img">
                                                        <a href="<?php echo $propdata['propertyURL']; ?>.html"><img src="https://res.cloudinary.com/<?php echo $cloud_cdnName; ?>/image/upload/c_fill/reputize/property/<?php echo $imagedata['imageURL']; ?>.jpg" alt="" class="img-responsive"></a>
                                                    </div>
                                                    <div class="vk-item-text">
                                                        <h2><a href="<?php echo $propdata['propertyURL']; ?>.html"><?php echo $propdata['propertyName']; ?></a></h2>
                                                        <ul>
                                                            <li>

                                                            </li>
                                                            <li>

                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div><?php } ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="vk-spartar-our-room-mobile">

                                    <?php
                                    while($propdata = $propquery->fetch_assoc()){
                                    ?>
                                    <div class="item">
                                        <div class="vk-sparta-item-content">
                                            <div class="vk-item-img">
                                                <a href="#"><img src="images/01_01_default/our-room/img.jpg" alt="" class="img-responsive"></a>
                                            </div>
                                            <div class="vk-item-text">
                                                <h2><a href="#">Class Rooms</a></h2>
                                                <ul>
                                                    <li>
                                                        <p>Starting Form : </p>
                                                    </li>
                                                    <li>
                                                        <p>$200/ <span>Night</span></p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>
<!-- This is code for the services -->
<div id="wrapper-container" class="site-wrapper-container">
<div class="vk-spa">

               <div class="vk-spa-our-services">
                    <div class="container">
                        <div class="vk-spa-header">
                            <h3>Our Services</h3>
                            <h2>Choose A Service</h2>
                            <div class="vk-spa-border"></div>
                        </div>

                        <div class="vk-spa-our-service-content">

                            <?php 

                            $services_head=$indexdata['splheadcorporate'];
                            if ($services_head) {
                                # code...
                            

                             ?>
                            <div class="vk-spa-our-service-item">
                                <div class="row">
                                    <div class="col-md-6 col-md-push-6">
                                        <a href="#">
                                        <img src="https://res.cloudinary.com/<?php echo $cloud_name; ?>/image/upload/c_fill/reputize/team_members/splhp-corporate-2018_05_22_12_50_47.jpg" alt="" class="img-responsive">
                                    </a>
                                    </div>
                                    <div class="col-md-6 col-md-pull-6 vk-spa-our-service-info">
                                        <h4>Service One</h4>
                                        <h2><?php echo $services_head;  ?></h2>
                                        <p><?php echo $indexdata['splheadcorporatecontent']; ?>
                                        </p>
                                        <h5><span></span></h5>
                                        <h3><a href="#">VISIT</a></h3>
                                    </div>
                                </div>
                            </div>

                            <?php
                            }
                            $services_head1= $indexdata['splheadjp'];
                            if ($services_head1) {
                                # code...
                        
                            ?>
                            <div class="vk-spa-our-service-item">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="#">
                                        <img src="https://i.ibb.co/wKZcxJz/about-starlit.jpg" alt="" class="img-responsive">
                                    </a>
                                    </div>
                                    <div class="col-md-6 vk-spa-our-service-info">
                                        <h4>Service Two</h4>
                                        <h2><?php echo $services_head1;  ?></h2>
                                        <p>
                                            <?php echo $indexdata['splheadjpcontent']; ?>
                                        </p>
                                        <h5> <span> </span></h5>
                                        <h3><a href="#">VISIT</a></h3>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        $services_head2=$indexdata['splheadgoa'];
                        if ($services_head2) {
                             ?>

                            <div class="vk-spa-our-service-item">
                                <div class="row">
                                    <div class="col-md-6 col-md-push-6">
                                        <a href="#" >
                                        <img src="images/03_02_spa/our-services/img3.jpg" alt="" class="img-responsive">
                                    </a>
                                    </div>
                                    <div class="col-md-6 col-md-pull-6 vk-spa-our-service-info">
                                        <h4>Service Three</h4>
                                        <h2><?php echo $services_head2; ?></h2>
                                        <p>
                                            <?php echo $indexdata['splheadgoacontent']; ?>
                                        </p>
                                        <h5> <span> </span></h5>
                                        <h3><a href="#">VISIT</a></h3>
                                    </div>
                                </div>
                            </div><?php } ?>
                        </div>
                    </div>
                </div>
</div></div>
<!--  services END-->
                    <div class="vk-testimonial-transparents-2">
                        <div class="vk-sparta-testimonial">
                            <div class="container">
                                <div class="vk-sparta-head-title">
                                    <h3>Testimonial</h3>
                                    <h2><?php echo $indexdata['testimonialHead'] ?></h2>
                                    <div class="vk-sparta-about-border"></div>
                                </div>
                                <div class="vk-sparta-testimonial-content">
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div id="vk-owl-testimonial" class="vk-owl-one-item owl-carousel owl-theme">
                                               <?php

                                    $query4="SELECT * FROM `testimonials` WHERE `customerID`='$toOrgUrl';";
                                    $run5=mysqli_query($conn,$query4);

                                    while ($testimonial_data=mysqli_fetch_assoc($run5)) {
                        
                                ?>
                                                <div class="item">
                                                    <div class="vk-sparta-star">
                                                        <p>
                                                            <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                                            <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                                            <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                                            <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                                            <span><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                                        </p>
                                                    </div>
                                                    <div class="vk-sparta-testimonial-text">
                                                        <p><?php echo $testimonial_data['review']; ?>
                                                        </p>
                                                    </div>
                                                    <div class="vk-sparta-testimonial-author">
                                                        <p><?php echo $testimonial_data['name'];?> <span><?php echo $testimonial_data['detail'];?></span></p>
                                                    </div>
                                                </div><?php } ?>                                                                         
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="wrapper-container" class="site-wrapper-container">
<div class="vk-spa">

                    <div class="vk-spa-special-promotion"  data-parallax="scroll" data-image-src="images/03_02_spa/background1.jpg" style="background-image: url('https://i.ibb.co/wKZcxJz/about-starlit.jpg');">
                    <div class="container">
                        <div class="vk-spa-special-promotion-icon">
                            <img src="images/03_02_spa/icon.png" alt="" class="img-responsive">
                        </div>
                        <h4>Visit the Best Places In Your City</h4>
                        <h1>STARLIT SUITES</h1>
                        <p>Find great places , hotels , restourants .</p>
                        <h3><a href="#">BOOK NOW</a></h3>
                    </div>
                </div>
                    </div></div>
                </div>
            </div>
        </div>
    </div>
                      <?php

                    Footer_data();

                      ?>
<?php

include 'include/common-function.php';
$toOrgUrl;
echo $filename;
/*
$abc = $_SERVER['REQUEST_URI'];
$abc_br = explode("/", $abc);
$toBesentUrl = $abc_br[0] . "/";
$url = $abc_br[2];
$filename = mb_substr($url, 0,-4);
//$abc = $_SERVER['PHP_SELF'];
*/
  $sql = "select * from admin_details where customerID='$toOrgUrl'";
$query = $conn->query($sql);
$no_of_row = $query->num_rows;
$res = $query->fetch_assoc();
$cloud_cdnName = $res['cloud_name'];
$base_url = $res['website'];

echo $selmeta = "select * from metaTags where filename='$filename' and customerID='$toOrgUrl'";
$metaquery = $conn->query($selmeta);
$metadata = $metaquery->fetch_assoc();
$ptitle = $metadata['MetaTitle'];
$desc = $metadata['MetaDisc'];
$kwords = $metadata['MetaKwd'];
$servaptsel = "select * from city_url where cityUrl='$filename' && status='Y' and customerID='$toOrgUrl'";
$servaptquery = $conn->query($servaptsel);
$servaptdata = $servaptquery->fetch_assoc();
$cityname = $servaptdata['cityName'];
$cityname2 = $servaptdata['cityName2'];
$typ_nam = $servaptdata['property_type'];
$hotel_typesel = "select * from tbl_property_type where type_name='$typ_nam'";
$hotel_typquer = $conn->query($hotel_typesel);
$hotel_typdat = $hotel_typquer->fetch_assoc();
$hotel_typ_id = $hotel_typdat['type_id'];
?>

<?php Header_data($ptitle, $kwords, $desc, $pageName, $canonicalurl, $ampcode, $othercode, $fileName); ?>

 <?php Header_Menu(); ?>
<div class="vk-about-banner">
                <!--data-parallax="scroll" data-image-src="images/02_01_about/background.jpg"-->
                <div class="vk-about-banner-destop" style="background: url(https://res.cloudinary.com/dwzhicwir/image/upload/reputize/room/2018-07-05_18-24-51.jpg) no-repeat; background-size: cover; height: 100%;">
                    <div class="vk-banner-img"></div>
                    <div class="vk-about-banner-caption">
                        <h2><?php echo $servaptdata['sacontentheading']; ?>  </h2>
                        <h3>
                            <a href="#">Page</a>
                            <span><i class="fa fa-angle-right" aria-hidden="true" ></i></span>
                            <a href="#">Service-Apartments</a>
                            <span><i class="fa fa-angle-right" aria-hidden="true" ></i></span>
                            <a href="#"><?php echo $cityname; ?></a>
                        </h3>
                    </div>
                </div>
            </div>
<!-- 

                THIS CODE FOR THE FIRST Tab
 -->
 <div class="vk-sparta-about">
  <div class="container">
                                    <div class="vk-sparta-head-title" style="margin-top: 10px;">
                                        <h2><?php echo $servaptdata['h2sa']; ?></h2>

                                        <h3>
</h3>
                                        
                                        <div class="vk-sparta-about-border"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            
    <div class="row">
        <!-- Boxes de Acoes -->
        <div class="col-xs-12 col-sm-6 col-lg-4">
            <div class="box">                           
                <div class="icon">
                    <div class="image"><i class="fa fa-map-o"style="
    margin-top: 15px;
"></i></div>
                    <div class="info">
                        <h3 class="title" style="
    margin-top: 55;
"><?php echo $servaptdata['samainhead1']; ?></h3>
                        <p>
                           
                        </p><!-- 
                        <div class="more">
                            <a href="#" title="Title Link">
                                Read More <i class="fa fa-angle-double-right" ></i>
                            </a>
                        </div> -->
                    </div>
                </div>
                <div class="space"></div>
            </div> 
        </div>
            
        <div class="col-xs-12 col-sm-6 col-lg-4">
            <div class="box">                           
                <div class="icon">
                    <div class="image"><i class="fa fa-headphones" style="
    margin-top: 15px;
"></i></div>
                    <div class="info">
                        <h3 class="title" style="
    margin-top: 55;
" ><?php echo $servaptdata['samainhead2']; ?></h3>
                        <p>
                          
                        </p><!-- 
                        <div class="more">
                            <a href="#" title="Title Link">
                                Read More <i class="fa fa-angle-double-right"></i>
                            </a>
                        </div> -->
                    </div>
                </div>
                <div class="space"></div>
            </div> 
        </div>
            
        <div class="col-xs-12 col-sm-6 col-lg-4">
            <div class="box">                           
                <div class="icon">
                    <div class="image"><i class="fa fa-hand-peace-o" style="
    margin-top: 15px;
"></i></div>
                    <div class="info">
                        <h3 class="title" style="
    margin-top: 55;
"><?php echo $servaptdata['samainhead3']; ?></h3>
                        <p>
                            
                        </p><!-- 
                        <div class="more">
                            <a href="#" title="Title Link">
                                Read More <i class="fa fa-angle-double-right"></i>
                            </a>
                        </div> -->
                    </div>
                </div>
                <div class="space"></div>
            </div> 
        </div>          
        <!-- /Boxes de Acoes -->
    </div>
</div>
                                    </div>
                                </div>
                            </div>


<!-- THis code for the room image or list-->
						<div class="vk-room-list-content">
                        <div class="container">
                            <div class="vk-room-list-header">
                                <h3>Our Rooms</h3>
                                <h2>Choose Your Room</h2>
                                <div class="vk-room-list-border"></div>
                            </div>
                            <?php
                            if($cityname=="India" && $filename =='guest-houses')
                            {
                                $propsel = "select * from propertyTable where customerID='$toOrgUrl' and status='Y' and FIND_IN_SET('$hotel_typ_id',tbl_property_type) order by propertyID asc";
                            }
                            else
                            {
                                $propsel = "select * from propertyTable where customerID='$toOrgUrl' and (cityName='$cityname' || cityName2='$cityname') and status='Y' and FIND_IN_SET('$hotel_typ_id',tbl_property_type)  order by propertyID asc";
                            }
                            $propquery = $conn->query($propsel);
                            $ctn = 1;
                            while ($propdata = $propquery->fetch_assoc()) {
                            $propid = $propdata['propertyID'];
                            $propimgsel = "select * from propertyImages where propertyID='$propid' and featureStat = 'Y' and imageType='property' order by imagesID desc limit 1";
                            $propimgquery = $conn->query($propimgsel);
                            $propimgdata = $propimgquery->fetch_assoc();

                            $address = $propdata['address'] ;
                            $rooms = $propdata['roomType'];
                            $amenity = $propdata['roomAmenties'];
                            ?>
							<div class="row">
                                <div class="item">
                                    <div class="col-md-6 vk-dark-our-room-item-left  vk-clear-padding">
                                        <div class="vk-dark-our-room-item-img">
                                            <img src="http://res.cloudinary.com/<?php echo $cloud_cdnName; ?>/image/upload/c_fill/reputize/property/<?php echo $propimgdata['imageURL']; ?>.jpg" alt="<?php echo $propimgdata['imageAlt']; ?>" class="img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-md-6 vk-dark-our-room-item-right vk-clear-padding">
                                        <div class="vk-dark-our-room-item-content">
                                            <h3><a href="<?php echo $propdata['propertyURL']; ?>.html"><?php echo $propdata['propertyName']; ?></a></h3>
                                            <ul>
                                                <li><p> <?php echo html_entity_decode(strip_tags(trim(ucfirst(substr($propdata['propertyInfo'], 0, 100))))); ?></span></p></li>
                                                <li><p>
                                                        <?php
                                                        $amenitybr = explode("^",$amenity);
                                                        foreach($amenitybr as $amenities)
                                                        {
                                                            $iconsel = "select * from roomAmenties where roomAmenties_name='$amenities'";
                                                            $iconquer = $conn->query($iconsel);
                                                            $icondata = $iconquer->fetch_assoc();
                                                            $iconpath = $icondata['htmlCode'];
                                                            if($iconpath != ''){ ?>
                                                                <img src="images/icon/<?php echo $iconpath; ?>" alt="<?php echo $icondata['roomAmenties_name']; ?>" title="<?php echo $icondata['roomAmenties_name']; ?>" />
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </p></li>
                                                <li><p><?php
                                                        $roombr = explode("^",$rooms);
                                                        foreach($roombr as $roomdata){
                                                            if($roomdata != ''){
                                                                echo $roomdata." &nbsp | ";
                                                            }
                                                        }
                                                        ?></p></li>

                                                <li><p><a href="<?php echo $propdata['propertyURL']; ?>.php"><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $address; ?></a></p></li>
                                            </ul>
                                            <div class="vk-dark-our-room-item-book">
                                                <div class="vk-dark-our-room-item-book-left">
                                                    <ul>
                                                        <li>
                                                            <p> </p>
                                                        </li>
                                                        <li>

                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="vk-dark-our-room-item-book-right">
                                                    <a href=" <?php echo $propdata['propertyURL']; ?>.html "> BOOK NOW <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>


                            </div>
                            <?php } ?>
                        </div>
                    </div>

<!-- ENd of the the code of content services apartment-->
   
                        <div class="vk-sparta-dark-about">
                            <div class="col-md-6 vk-clear-padding" style="padding:1px 1px 1px 1px;">
                                <div class="vk-sparta-dark-about-left">
                                   
                                   <div class="vk-sparta-dark-about-right-up">
                                    <div class="col-md-4 col-sm-4 col-lg-6 vk-clear-padding"><img src="https://res.cloudinary.com/<?php echo $cloud_cdnName; ?>/image/upload/c_fill/reputize/awards/<?php echo $servaptdata['saimage1']; ?>.jpg" alt="" class="img-responsive" style="
    width: -webkit-fill-available;
"></div>
                                    <div class="col-md-4 col-sm-4 col-lg-6 vk-clear-padding"><img src="https://res.cloudinary.com/<?php echo $cloud_cdnName; ?>/image/upload/c_fill/reputize/awards/<?php echo $servaptdata['saimage2']; ?>.jpg" alt="" class="img-responsive" style="width: -webkit-fill-available;"></div>
                                    <div class="col-md-4 col-sm-4 col-lg-12 vk-clear-padding" style="
    width:;
"><img src="https://res.cloudinary.com/<?php echo $cloud_cdnName; ?>/image/upload/c_fill/reputize/awards/<?php echo $servaptdata['saimage3']; ?>.jpg" alt="" class="img-responsive" style="
    width: 100%;
"></div>
                                </div>

                                </div>
                            </div>
                            <div class="col-md-6 vk-clear-padding vk-sparta-dark-about-right-bg" style="height: auto; padding-bottom: 23px;">
                                <div class="vk-sparta-dark-about-right" >
                                    <div class="vk-dark-about-right-header">
                                        
                                        <h2><?php echo $servaptdata['h3sa']; ?></h2>
                                        <h3> <?php echo $servaptdata['saawardhead']; ?> </h3>
                                        <div class="clearfix"></div>
                                        <div class="vk-dark-about-border"></div>
                                    </div>
                                    <div class="vk-dark-about-right-content">
                                        <p>
                                            <?php echo $servaptdata['saawardcontent']; ?>
                                            <?php echo $servaptdata['savideocontent']; ?>


                                        </p>
                                    </div>
                                    
                                </div>
                                <!-- <div class="vk-sparta-dark-about-right-down">
                                    <div class="col-md-4 col-sm-4 vk-clear-padding"><img src="images/01_02_dark_background/welcome/1.jpg" alt="" class="img-responsive"></div>
                                    <div class="col-md-4 col-sm-4 vk-clear-padding"><img src="images/01_02_dark_background/welcome/2.jpg" alt="" class="img-responsive"></div>
                                    <div class="col-md-4 col-sm-4 vk-clear-padding"><img src="images/01_02_dark_background/welcome/3.jpg" alt="" class="img-responsive"></div>
                                </div> -->
                            </div>
                            <div class="clearfix"></div>
                        </div>
<!-- This is code for the room -->
                            <div class="vk-sparta-about">
                                <div class="container">
                                    <div class="vk-sparta-head-title">
                                        <h2><?php echo $servaptdata['h1sa']; ?></h2>
                                        
                                        <div class="vk-sparta-about-border"></div>
                                    </div>
                                   
                                </div>

                                <div class="vk-about-count-number">
                                    <div class="vk-paralax-bg parallax-window"  id="slider">
                                        <div class="vk-sparta-image-border">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="vk-sparta-count-item">
                                                            <div class="vk-sparta-count-item-img">

                                                            </div>
                                                            <div class="vk-sparta-count-item-number">
                                                                <span ><?php echo $servaptdata['sasubhead1']; ?></span>
                                                            </div>
                                                            <h3><?php echo $servaptdata['sasubheadcontent1']; ?></h3>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="vk-sparta-count-item">
                                                            <div class="vk-sparta-count-item-img">

                                                            </div>
                                                            <div class="vk-sparta-count-item-number">
                                                                <span ><?php echo $servaptdata['sasubhead2']; ?></span>
                                                            </div>
                                                            <h3><?php echo $servaptdata['sasubheadcontent2']; ?></h3>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="vk-sparta-count-item">
                                                            <div class="vk-sparta-count-item-img">

                                                            </div>
                                                            <div class="vk-sparta-count-item-number">
                                                                <span><?php echo $servaptdata['sasubhead3']; ?></span>
                                                            </div>
                                                            <h3><?php echo $servaptdata['sasubheadcontent3']; ?></h3>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="vk-sparta-count-item">
                                                            <div class="vk-sparta-count-item-img">

                                                            </div>
                                                            <div class="vk-sparta-count-item-number">
                                                                <span ><?php echo $servaptdata['sasubhead4']; ?></span>
                                                            </div>
                                                            <h3><?php echo $servaptdata['sasubheadcontent4']; ?></h3>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

<div class="vk-sparta-about">
                                <div class="container">
                                    <div class="vk-sparta-head-title" style="margin-top: 10px;">
                                        <h2><?php echo html_entity_decode($servaptdata['sacontentheading']); ?></h2>

                                        <h3>
</h3>
                                        
                                        <div class="vk-sparta-about-border"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="vk-sparta-about-text">
                                                <p style="text-align: justify; margin-bottom: 50px;">
                                                    <?php echo html_entity_decode($servaptdata['sacontent']); ?>
                                                    </p>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
<!-- End content service-apartment -->
                        <?php
                        Footer_data();
                            ?>

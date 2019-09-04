<?php
include 'include/common-function.php';
$toOrgUrl;
$filename;
/* $abc = $_SERVER['PHP_SELF'];
$abc_br = explode("/", $abc);
print_r($abc_br);
echo $toBesentUrl = $abc_br[0] . "/";
$url = $abc_br[2];
echo $filename = rtrim($url,".php routing");
die;
*/
$sql = "select * from admin_details where customerID='$toOrgUrl'";
$query = $conn->query($sql);
$no_of_row = $query->num_rows;
$res = $query->fetch_assoc();
$cloud_cdnName = $res['cloud_name'];
$base_url = $res['website'];
$key = 'AIzaSyBWTUjQQpfGQ8vWfn7qc7Qw4q_mbtJh-kY';
//------------------Get Meta Tags--------------------------------->
$selmeta = "select * from metaTags where filename='$filename' and customerID='$toOrgUrl'";
$metaquery = $conn->query($selmeta);
$metadata = $metaquery->fetch_assoc();
$ptitle = $metadata['MetaTitle'];
$desc = $metadata['MetaDisc'];
$kwords = $metadata['MetaKwd'];
$con_sel = "select * from static_page_contactus where customerID='$toOrgUrl'";
$con_query = $conn->query($con_sel);
$contactus = $con_query->fetch_assoc();
//------------------Get Property Data------------------------------->
$propdetsel = "select * from propertyTable where propertyURL='$filename' && status='Y' and customerID='$toOrgUrl'";
$propdetquery = $conn->query($propdetsel);
$propdetdata = $propdetquery->fetch_assoc();
$propid = $propdetdata['propertyID'];
$propnam = $propdetdata['propertyName'];
$currency = $propdetdata['currency'];
$placeID = $propdetdata['placeID'];
$tripAdvisor_visit = $propdetdata['visirTrip_advisor'];
$tripAdvisor_visit_2 = $propdetdata['visirTrip_advisor_2'];
$imgsel = "select * from propertyImages where propertyID='$propid' and featureStat='Y' ";
$imquery = $conn->query($imgsel);
$imdata = $imquery->fetch_assoc();
$featureimg = $imdata['imageURL'];

if (isset($_POST['property_form'])) {
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    $message = $_REQUEST['message'];
    $enqtype = "instantBooking";
    $property_name = $propnam;
    $properid = $propid;
    $ipTrack = get_client_ip_server();
    // $ipcount = CheckIPCount($ipTrack);
    $recvDate = date('Y/m/d');
    $month = date('m');
    $year = date('Y');
    if ($name != null && $email != NULL && $phone != NULL) {
        $insertdet = "insert into inquiry(customerID,propertyID,propertyName,name,email,mobile,inquiryType,ipTrack,recvDate,month,year,message) values('$toOrgUrl','$properid','$property_name','$name','$email','$phone','$enqtype','$ipTrack','$recvDate','$month','$year','$message')";
        $insertdataquery = $conn->query($insertdet);
        //-----------------------------------------Mailing Starts --------------------------------------------------->
        $sele = "select * from mail_templates where customerID='$toOrgUrl' and user='admin' and type='2' and reciever_status='Active' and form1='popup_instant_booking'";
        $quer = $conn->query($sele);
        $imdata = $imquery->fetch_assoc();
        if ($quer == true) {
            $r = $quer->fetch_assoc();
            $to_email = $r['mail_to'];
            $cc_form = $r['mail_cc'];
            $from_email = $r['mail_from'];
            $hotel_name = 'Wall Art';
            $page = $property_name;
            SendEmail($hotel_name, $name, $email, $phone, $property_name, $to_email, $cc_form, $from_email);
            echo '<script type="text/javascript">
                alert("Thank You! Your Request has been successfuly submited");              
            </script>';
        }
//-------------------------------------------------------Mailing Ends -------------------------------------------------------------------------------//
    } else {
        echo 'Not';
    }
}
?>

<?php Header_data($ptitle, $kwords, $desc, $pageName, $canonicalurl, $ampcode, $othercode, $fileName); ?>
<?php Header_Menu(); ?>

<div class="vk-about-banner">
            <!--data-parallax="scroll" data-image-src="images/02_01_about/background.jpg"-->
            <div class="vk-about-banner-destop" style="background: url(https://res.cloudinary.com/dwzhicwir/image/upload/reputize/room/2018-07-05_18-24-51.jpg) no-repeat; background-size: cover; height: 100%;">
                <div class="vk-banner-img"></div>
                <div class="vk-about-banner-caption">
                    <h2>
                        <?php echo $propnam; ?>
                    </h2>
                    <h3>

                        <ul>
                            <li><i class="fa fa-phone"></i><a href="#"><?php echo $propdetdata['propertyPhone']; ?></a></li>
                            <li><i class="fa fa-map-marker"></i><a href="#"><?php echo $propdetdata['address']; ?></a></li>
                            <li><i class="fa fa-envelope-o"></i><a href="#"><?php echo $propdetdata['property_email']; ?></a></li>
                        </ul>
                    </h3>
                </div>
            </div>
        </div>


<!-- THis code for the room image or list-->


<div class="row  vk-rooms-grid-content">
                    <div class="container col-lg-6">
                        <div class="vk-rooms-grid-header" style="
/* margin-bottom: -16px; */
">
                            <h3>Our Rooms</h3>
                            <h2>Choose Your Room</h2>
                            <div class="vk-rooms-grid-border"></div>
                        </div>

                        <div class="row" style="margin-left: 0px !important;">

                            <?php
                            $count = 1;
                            $sliderroom = '';
                            $roomsel = "select * from propertyRoom where propertyID='$propid' and status='Y' and customerID='$toOrgUrl' order by roomPriceINR asc";
                            $roomquery = $conn->query($roomsel);
                            //$rownum = $roomquery->num_rows();
                            while ($roomdata = $roomquery->fetch_assoc()) {
                            $roomid = $roomdata['roomID'];
                            $sliderroom .= $roomid . ",";
                            $org_roomprice = $roomdata['roomPriceINR'];
                            $roomRateType = $roomdata['roomRateType'];
                            if ($filename == "studio-apartments" /* ----|| $filename == "perch-arbor-golf-course" */) {
                                //   $dailyroomdisc = $roomdata['monthlyroomDiscount'];
                            } else {
                                // $dailyroomdisc = $roomdata['dailyroomDiscount'];
                            }
                            $dailyroomdisc = $roomdata['dailyroomDiscount'];
                            $roomdispimgsel = "select * from propertyImages where roomID='$roomid' and propertyID='$propid' and imageType='room' order by imagesID desc limit 1";
                            $roomdispimgquery = $conn->query($roomdispimgsel);
                            $roomdispimgdata = $roomdispimgquery->fetch_assoc();


                            //------------------------ Rate Calculation -------------//

                            $datetoday1 = date('d');
                            $datetoday1++;
                            $datetoday = $datetoday1-1;

                            $monthtoday = date('m');
                            $yeartoday = date('Y');
                            $priceshowsel = "select `$datetoday` from manage_rate where room_id='$roomid' and property_id='$propid' and month='$monthtoday' and year='$yeartoday'";
                            // echo $priceshowsel;
                            // die;
                            $priceshowquery = $conn->query($priceshowsel);
                            $priceshownum = mysql_num_rows($priceshowquery);
                            $priceshownum = $priceshowquery->num_rows;
                            $priceshowdata = $priceshowquery->fetch_assoc();

                            //------------------- Discount Calculation Starts -----------------------------------//
                            $fororgprice = ($dailyroomdisc/100)*$org_roomprice;
                            $fororgfinalprice = $org_roomprice-$fororgprice;

                            $forinventoryprice = ($dailyroomdisc/100)*$priceshowdata[$datetoday];
                            $forinventoryfinalprice = $priceshowdata[$datetoday]-$forinventoryprice;

                            // echo $forinventoryfinalprice;


                            ?>

                            <div class="col-md-4 col-sm-6">
                                <div class="item">
                                    <div class="vk-sparta-item-content">
                                        <div class="vk-item-img">
                                            <a href="#"><img src="https://res.cloudinary.com/<?php echo $cloud_cdnName; ?>/image/upload/reputize/room/<?php echo $roomdispimgdata['imageURL']; ?>.jpg" alt="<?php echo $roomdispimgdata['imageAlt']; ?>" class="img-responsive"></a>
                                        </div>
                                        <div class="vk-item-text">
                                            <h2><a href="#"><?php echo $roomdata['roomType']; ?></a></h2>
                                            <h4>
                                                <?php
                                                $amenity = $roomdata['roomAmenties'];
                                                $amenitybr = explode("^", $amenity);
                                                foreach ($amenitybr as $amenities) {
                                                    $iconsel = "select * from roomAmenties where roomAmenties_name='$amenities'";
                                                    $iconquer = $conn->query($iconsel);
                                                    $icondata = $iconquer->fetch_assoc();
                                                    $iconpath = $icondata['htmlCode'];
                                                    $iconName = $icondata['roomAmenties_name'];
                                                    if ($iconpath == '') {

                                                    } else {
                                                        ?>
                                                        <img src="images/icon/<?php echo $iconpath; ?>" alt="<?php echo $iconName; ?>" title="<?php echo $iconName; ?>"/>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </h4>
                                            <ul>
                                                <li style="height: 120px;"><p ><?php echo html_entity_decode(strip_tags(trim(ucfirst(substr($roomdata['roomOverview'], 0, 100))))); ?>... </p></li>
                                                <li>
                                                    <p><?php if($priceshownum=="0" || $priceshowdata[$datetoday]==null)
                                                        {
                                                            echo '<del><i class="fa fa-inr" aria-hidden="true"></i> '.$org_roomprice.'</del> ';
                                                            echo '<span>Price : </span><i class="fa fa-inr"></i>'.round($fororgfinalprice).'';
                                                        }
                                                        else
                                                        {
                                                            echo '<del><i class="fa fa-inr" aria-hidden="true"></i> '.$priceshowdata[$datetoday].'</del>';
                                                            echo '<span>Price : </span><i class="fa fa-inr"></i>'.round($forinventoryfinalprice);
                                                        }
                                                        ?></p>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <?php } ?>
                        </div>
                    </div>
                    <!-- This code use for the form  -->
                    <div class="col-lg-6 container">
                       
                            <div class="vk-room-select-complete-right">
                                <div class="vk-room-details-content-right">
                                    <h3>Your Reservation</h3>
                                    
                                    
                                    <form action="" class="form-horizontal">
                                        <div class="form-group"> <!-- Date input -->
                                            <div class="col-md-12">
                                                <label class="control-label">CHECK - IN</label>
                                                <div class="input-group date date-check-in" data-date="12-02-2017" data-date-format="mm-dd-yyyy">
                                                    <input name="date1" class="form-control" type="text" value="12-02-2017">
                                                    <span class="input-group-addon btn"><span class="ti-calendar" id="ti-calendar1"></span></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group"> <!-- Date input -->
                                            <div class="col-md-12">
                                                <label class="control-label">CHECK - OUT</label>
                                                <div class="input-group date date-check-out" data-date="12-02-2017" data-date-format="mm-dd-yyyy">
                                                    <input name="date2" class="form-control" type="text" value="12-02-2017">
                                                    <span class="input-group-addon btn"><span class="ti-calendar" id="ti-calendar2"></span></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group"> <!-- Date input -->
                                            <div class="col-md-6">
                                                 <label class="control-label">User Name</label>
                                                <input type="text" name="" class="form-control" placeholder="User Name">
                                            </div>

                                            <div class="col-md-6">
                                                 <label class="control-label">Phone</label>
                                                <input class="form-control" type="Number" name="" placeholder="Phone" >
                                            </div>
                                        </div>

                                        
                                            <div class="col-md-6">
                                                <label class="control-label">Email</label>
                                                <input type="Email" name="" class="form-control" placeholder="Email">
                                            </div>

                                            <div class="col-md-6">
                                                 <label class="control-label">Select property</label>
                                                <select id="children1" class="form-control">
                                                    <option>Select Property</option>
                                                    <option>1</option>
                                                    <option>2</option>

                                                </select>
                                            </div>
                                        

                                        <div class="form-group">
                                            <!-- <h4></h4> -->
                                            <div class="col-md-12 " style="margin-top: 40px; margin-bottom: -26px;">
                                                <button class="btn" name="property_form" style="width: 100%; font-size: 18px; background-color: white;">check availability</button>
                                            </div>

                                            
                                        </div>
                                    </form>
                                </div>
                            </div>

                    </div>
                    <!-- End the form code  -->
</div>
					
<div class="vk-sparta-about">
                            <div class="container">
                                <div class="vk-sparta-head-title">
                                    <h2>Property Overview</h2>

                                    <h3>
</h3>
                                    
                                    <div class="vk-sparta-about-border"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="vk-sparta-about-text">
                                            <p style="text-align: justify;">
                                                <?php echo html_entity_decode($propdetdata['propertyInfo']); ?>
                                            </p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="vk-sparta-image">
                                <div class="container-fluid">
                                  
                                </div>
                            </div>
                        </div>
<!-- End content service-apartment -->

<!-- Property overview -->
<style>
    @media only screen and (min-width: 1600px) {
        .info {
            height: 50%;
        }
    }

</style>
<div class="vk-sparta-about">
<div class="container">
                                <div class="vk-sparta-head-title" style="margin-top: 10px;">
                                    <h2>Amenities</h2>

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
                <div class="image"><i class="fa fa-male"style="margin-top: 15px;"></i></div>
                <div class="info">
                    <h3 class="title" style="margin-top: 55;">Hotel Features</h3>
                    <p>
                        <?php echo html_entity_decode($propdetdata['propertyfeatures']); ?>
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
                <div class="image"><i class="fa fa-hand-peace-o" style="margin-top: 15px;"></i></div>
                <div class="info">
                    <h3 class="title" style="margin-top: 55;" >Services & Amenities</h3>
                    <p>
                        <?php echo html_entity_decode($propdetdata['servicesnamenities']); ?>
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
                <div class="image"><i class="fa fa-trophy" style="margin-top: 15px;"></i></div>
                <div class="info">
                    <h3 class="title" style="margin-top: 55;">Safety & Security</h3>
                    <p>
                        <?php echo html_entity_decode($propdetdata['safetynsecurity']); ?>
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



    <div class="col-xs-12 col-sm-6 col-lg-4">
        <div class="box">                           
            <div class="icon">
                <div class="image"><i class="fa fa-male" style="margin-top: 15px;"></i></div>
                <div class="info">
                    <h3 class="title" style="margin-top: 55;">In-Room Facilities</h3>
                    <p>
                        <?php echo html_entity_decode($propdetdata['inapartmentfacilities']); ?>
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

    <div class="col-xs-12 col-sm-6 col-lg-4">
        <div class="box">                           
            <div class="icon">
                <div class="image"><i class="fa fa-hand-peace-o" style="margin-top: 15px;"></i></div>
                <div class="info">
                    <h3 class="title" style="margin-top: 55;">Kitchen Features</h3>
                    <p>
                        <?php echo html_entity_decode($propdetdata['kitchenfeatures']); ?>
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


    <div class="col-xs-12 col-sm-6 col-lg-4">
        <div class="box">                           
            <div class="icon">
                <div class="image"><i class="fa fa-trophy" style="margin-top: 15px;"></i></div>
                <div class="info">
                    <h3 class="title" style="margin-top: 55;">Entertainment &amp; Leisure</h3>
                    <p>
                        <?php echo html_entity_decode($propdetdata['entertainmentleisure']); ?>
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



    <!-- /Boxes de Acoes -->
</div>
</div>
                                </div>
                            </div>
                        </div>


<!-- End property Overview -->

<!-- this code for the accordion  -->
<div class="vk-shortcode-accordion-body">
            <div class="container">
            	  <h2>Q & A</h2>
                <div class="vk-accordion-with-bg">
                    <?php
                    $qasel = "select * from quesAns where customerID='$toOrgUrl' && propertyID='$propid' && status='Y' order by quesID DESC LIMIT 0,5";
                    $qaquery = $conn->query($qasel);
                    $ctn = 1;
                    while($qarow = $qaquery->fetch_assoc()){
                    ?>
                    <h4 class="vk-accordion-toggle-default"><?php echo html_entity_decode($qarow['question']); ?></h4>
                    <div class="vk-accordion-content-default">
                        <p>
                            <?php echo html_entity_decode($qarow['answer']); ?>
                        </p>
                    </div> <?php
                        $ctn++;
                    } ?>


                </div>
            </div>
        </div>
<!-- end the accordion -->
<!-- This code for the gallery of the page -->
					      <div class="vk-gallery-grid">
					       <section class="site-content-area">
         <div class="container-fluid">
             <div class="row">
                <!-- <div class="vk-gallery-grid-full-banner">
                    <div class="vk-about-banner">
                        <div class="vk-about-banner-destop">
                            <div class="vk-banner-img"></div>
                            <div class="vk-about-banner-caption">
                                <h2>Gallery</h2>
                                <h3>
                                    <a href="#">Page</a>
                                    <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                    <a href="#">Gallery</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
-->

                <div class="container">
                    
                    <div class="row">
                        <div class="vk-main-iso">
                            <div id="lightgallery">
                                <?php
                                $propid = $propdetdata['propertyID'];
                                $imagesel = "select * from propertyImages where propertyID='$propid' and imageType ='property' ";
                                $imagequery = $conn->query($imagesel);
                                while ($imagedata = $imagequery->fetch_assoc()) {
                                ?>
                                <div class="col-md-4 item a c d col-sm-6" data-src="https://res.cloudinary.com/<?php echo $cloud_cdnName; ?>/image/upload/c_fill/reputize/property/<?php echo $imagedata['imageURL']; ?>.jpg">
                                    <div class="vk-item-img" >
                                        <a href="https://res.cloudinary.com/<?php echo $cloud_cdnName; ?>/image/upload/c_fill/reputize/property/<?php echo $imagedata['imageURL']; ?>.jpg"><img src="https://res.cloudinary.com/<?php echo $cloud_cdnName; ?>/image/upload/c_fill/reputize/property/<?php echo $imagedata['imageURL']; ?>.jpg" alt="" class="img-responsive"></a>
                                        <div class="vk-item-caption">
                                            <div class="featured-slider-overlay"></div>

                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <?php } ?>



                            </div>
                        </div>
                    </div>


                    <div class="vk-btn-more">
                        <button type="button" class="btn-more">LOAD MORE <i class="fa fa-long-arrow-down" aria-hidden="true"></i></button>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
<!-- End the galllery code -->

<?php Footer_data(); ?>


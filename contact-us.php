<?php
include 'include/common-function.php';
$toOrgUrl;
$abc = $_SERVER['PHP_SELF'];
$abc_br = explode("/", $abc);
$toBesentUrl = $abc_br[0] . "/";
$url = $abc_br[2];
$filename = rtrim($url,".php routing");

$sql = "select * from admin_details where customerID='$toOrgUrl'";
$query = $conn->query($sql);
$no_of_row = $query->num_rows;
$res = $query->fetch_assoc();
$cloud_cdnName = $res['cloud_name'];
$base_url = $res['website'];
$hotel_name = $res['companyName'];


$selmeta = "select * from metaTags where filename='$filename' and customerID='$toOrgUrl'";
$metaquery = $conn->query($selmeta);
$metadata = $metaquery->fetch_assoc();
$ptitle = $metadata['MetaTitle'];
$desc = $metadata['MetaDisc'];
$kwords = $metadata['MetaKwd'];
$con_sel = "select * from static_page_contactus where customerID='$toOrgUrl'";
$con_query = $conn->query($con_sel);
$contactus = $con_query->fetch_assoc();

if(isset($_REQUEST['contact-us'])){
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    $message = $_REQUEST['message'];
    $enqtype = "contact_us";
    $property_name = $propnam;
    $properid = $propid;
    $ipTrack = get_client_ip_server();
    // $ipcount = CheckIPCount($ipTrack);
    $recvDate = date('Y/m/d');
    $month = date('m');
    $year = date('Y');
    if ($name != null && $email != NULL && $phone != NULL) {
        $insertdet = "insert into inquiry(customerID,propertyID,propertyName,name,email,mobile,inquiryType,ipTrack,recvDate,month,year,message) values('$toOrgUrl','0','','$name','$email','$phone','$enqtype','$ipTrack','$recvDate','$month','$year','$message')";
        $insertdataquery = $conn->query($insertdet);
        //-----------------------------------------Mailing Starts ------------------------------------------>
        $sele = "select * from mail_templates where customerID='$toOrgUrl' and user='admin' and type='2' and reciever_status='Active' and form1='contact_us'";
        $quer = $conn->query($sele);
        if ($quer == true) {
            $r = $quer->fetch_assoc();
            $to_email = $r['mail_to'];
            $cc_form = $r['mail_cc'];
            $from_email = $r['mail_from'];
            $hotel_name = $hotel_name;
            $page = 'Contacts';
            SendEmail($hotel_name, $name, $email, $phone, $property_name, $to_email, $cc_form, $from_email);
            echo '<script type="text/javascript">
                alert("Thank You! Your Request has been successfuly submited");              
            </script>';
        }
//----------------------------------Mailing Ends -------------------------------------------//
    } else {
        echo 'Not';
    }
}
?>


<?php Header_data($ptitle, $kwords, $desc, $pageName, $canonicalurl, $ampcode, $othercode, $fileName); ?>

<?php Header_Menu(); ?>
    <!--BENGIN CONTENT HEADER-->

        <?php 
        $contact_sql ="SELECT * FROM `static_page_contactus` WHERE `customerID`='$toOrgUrl';";
        $contact_run=mysqli_query($conn,$contact_sql);
        $contact_data=mysqli_fetch_assoc($contact_run);
         
         ?>
        <!--END CONTENT ABOUT-->

<section class="site-content-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="vk-gallery-grid-full-banner">

                        <div class="vk-about-banner">
                            <div class="vk-about-banner-destop" data-parallax="scroll" data-image-src="" style="background-size: cover;
    background: url(https://res.cloudinary.com/<?php echo $cloud_name; ?>/image/upload/c_fill/reputize/contactus/<?php echo $contact_data['header_img']; ?>.jpg) no-repeat ;background-size: cover;background-position: center center;
    height: 393px;
    width: 100%;" >
                                <!--<div class="vk-banner-img"></div>-->
                                <div class="vk-about-banner-caption">
                                    <h2>Contact Us</h2>
                                    <h3>
                                        <a href="#">Page</a>
                                        <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                        <a href="#">Contact us</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="vk-contact-us">
                        <div class="col-md-7 vk-clear-padding">
                            <div class="vk-contact-us-map">
                                <div id="map"></div>
                                <iframe class="map" src="<?php echo $contact_data['map_url'] ?>" height="585" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="col-md-5 vk-clear-padding">
                            <div class="vk-contact-us-info">
                                <div class="vk-contact-us-info-header">
                                    <h3><?php echo $contact_data['tab1_formName']; ?></h3>
                                    <h2>Contact Us</h2>
                                    <div class="clearfix"></div>
                                    <div class="vk-contact-border"></div>
                                </div>
                                <div class="vk-contact-us-info-text">
                                    <ul>
                                        <li>
                                            <div class="vk-contact-us-info-text-icon">
                                                <span class="ti-location-pin"></span>
                                            </div>
                                            <div class="vk-contact-us-info-text-right">
                                                <h4><?php echo $contact_data['address1head']; ?></h4>
                                                <p><?php echo $contact_data['address1']; ?></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="vk-contact-us-info-text-icon">
                                                <span class="ti-email"></span>
                                            </div>
                                            <div class="vk-contact-us-info-text-right">
                                                <h4><?php echo $contact_data['emailhead']; ?></h4>
                                                <p><?php echo $contact_data['email']; ?></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="vk-contact-us-info-text-icon">
                                                <span class="ti-mobile"></span>
                                            </div>
                                            <div class="vk-contact-us-info-text-right">
                                                <h4><?php echo $contact_data['phonehead']; ?></h4>
                                                <p><?php echo $contact_data['phone']; ?></p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="vk-contact-form">
                        <div class="container">
                            <div class="vk-contact-form-info-header">
                                <h3><?php echo $contact_data['tab1_heading']; ?></h3>
                                <h2><?php echo $contact_data['tab1_name']; ?></h2>
                                <div class="clearfix"></div>
                                <div class="vk-contact-border"></div>
                            </div>
                            <div class="vk-contact-form-info-body">
                                <div class="row">
                                    <div class="col-md-12" style="margin-bottom: 15px;color: #b0914f;">
                                        <div id="message-contact" ></div>
                                    </div>
                                    <form method="post" action="http://sparta.vikitheme.com/html/mail/contact.php" id="contactform" autocomplete="off">
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <input type="text" id="name_contact" name="name_contact" placeholder="Your name ..." class="form-control" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <input type="email" id="email_contact" name="email_contact" placeholder="Your email ..." class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <input type="text" id="subject" name="subject" placeholder="Subject" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <textarea class="form-control" id="message_contact" name="message_contact" placeholder="Message" rows="5"></textarea>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>

                                        <div class="form-group">
                                            <div class="vk-btn-send">
                                                <button type="submit" name="contact-us" class="btn vk-btn-primary btn-block">SEND <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--END CONTENT ABOUT-->

<?php Footer_data(); ?>
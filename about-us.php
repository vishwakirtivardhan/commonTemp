<?php
include 'include/common-function.php';
$toOrgUrl;
$abc = $_SERVER['REQUEST_URI'];
$abc_br = explode("/", $abc);
$toBesentUrl = $abc_br[0] . "/";
$url = $abc_br[2];
$filename = mb_substr($url, 0,-4);

$sql = "select * from admin_details where customerID='$toOrgUrl'";
$query = $conn->query($sql);
$no_of_row = $query->num_rows;
$res = $query->fetch_assoc();
$cloud_cdnName = $res['cloud_name'];
$base_url = $res['website'];

$selmeta = "select * from metaTags where filename='$filename' and customerID='$toOrgUrl'";
$metaquery = $conn->query($selmeta);
$metadata = $metaquery->fetch_assoc();
$ptitle = $metadata['MetaTitle'];
$desc = $metadata['MetaDisc'];
$kwords = $metadata['MetaKwd'];
$con_sel = "select * from static_page_tbl where customerID='$toOrgUrl'";
$con_query = $conn->query($con_sel);
$about = $con_query->fetch_assoc();
?>

<?php Header_data($ptitle, $kwords, $desc, $pageName, $canonicalurl, $ampcode, $othercode, $fileName); ?>
    <!--BENGIN CONTENT HEADER-->
<?php Header_Menu(); ?>
<?php

    $about_sql="SELECT * FROM `static_page_tbl` WHERE `customerID`='$toOrgUrl';";
    $about_run=mysqli_query($conn,$about_sql);
    $about_data=mysqli_fetch_assoc($about_run);
    ?>
        <section class="site-content-area">
            <div class="vk-about-banner">
                <!--data-parallax="scroll" data-image-src="images/02_01_about/background.jpg"-->
                <div class="vk-about-banner-destop" style="background: url(https://res.cloudinary.com/<?php echo $cloud_name; ?>/image/upload/c_fill/reputize/aboutus/<?php echo $about_data['header_img']; ?>.jpg) no-repeat; background-size: cover;">
                    <div class="vk-banner-img"></div>
                    <div class="vk-about-banner-caption">
                        <h2>About Us</h2>
                        <h3>
                            <a href="#">Page</a>
                            <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                            <a href="#">About Us</a>
                        </h3>
                    </div>
                </div>
            </div>

            <div class="vk-about-welcometo">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="vk-about-welcometo-left">
                                <img src="https://res.cloudinary.com/<?php echo $cloud_cdnName; ?>/image/upload/c_fill/reputize/aboutus/<?php echo $about_data['header_img']; ?>.jpg" alt="" class="img-responsive" style="border-radius: 5px;">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="vk-about-welcometo-right">
                                <div class="vk-about-right-header">
                                    <h3>Welcome To</h3>
                                    <h2><?php echo $about_data['about_h1']; ?></h2>
                                    <div class="clearfix"></div>
                                    <div class="vk-about-border"></div>
                                </div>
                                <div class="vk-about-right-content">
                                    <?php echo $about_data['about_h1_cont']; ?>
                                    <div class="vk-about-right-content-border"></div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="vk-about-welcometo-share">
                                <div class="vk-about-welcometo-share-border-left"></div>
                                <div class="vk-about-welcometo-share-border-right">

                                </div>
                                <p>
                                    <?php 

                                                if($res['fb_link']){

                                                 ?>
                                    <a href="<?php echo $res['fb_link'] ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    
                                    <?php

                                              }



                                                if ($res['google_plus_link']) {
                                                    
                                                  ?>
                                    <a href="<?php echo $res['google_plus_link'];?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                    <?php 
                                                }


                                                    if($res['tw_link']){
                                                     ?>

                                    <a href="<?php echo $res['tw_link'];?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <?php

                                                }

                                                    if($res['insta_link']){
                                                     ?>
                                    <a href="<?php echo $res['insta_link'];?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    <?php
                                                    }
                                                        ?>
                                </p>
                                <hr>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            


<?php

$about_data="SELECT * FROM `static_page_tbl` WHERE `customerID`='$toOrgUrl'";
$about_data_run=mysqli_query($conn,$about_data);
$about_data_result=mysqli_fetch_assoc($about_data_run);

?>

             <div class="vk-about-why-choose-us" style="padding-top: 0px;">
                <div class="container">
                    <div class="vk-about-why-choose-us-header">
                        <h3>Why Choose Us</h3>
                        <h2><?php echo $about_data_result['about_h3']; ?></h2>
                        <div class="vk-about-boder"></div>
                    </div>
                    <div class="vk-about-why-choose-us-content">
                        <div class="row">
                            <?php 

                            $team_member_query="SELECT * FROM `team_members` WHERE `customerID` ='$toOrgUrl';";
                            $team_member_run=mysqli_query($conn,$team_member_query);
                            while($team_member_data=mysqli_fetch_assoc($team_member_run)){
                             ?>
                            
                            <div class="col-md-4" style="height: 500px;">
                                <div class="vk-about-content-item">
                                    <?php
                                    $team_members_img = $team_member_data['pic_url'];
                                    if($team_members_img){
                                    ?>
                                    <div class="vk-about-content-item-left">
                                        <span> <img src="<?php echo $team_members_img;  ?>"></span>
                                    </div>
                                    <?php
                                            }
                                    ?>
                                    <div class="vk-about-content-item-right">
                                        <h2><?php echo $team_member_data['name'];; ?></h2>
                                        <p><?php  echo $team_member_data['about']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php 

                        }

                             ?>
                        </div>
                    </div>
                </div>
            </div>




<!-- This code for the for tabs-->



            <div class="vk-shortcode-tabs-body">
                <div class="container">

<div class="vk-shortcode-tabs-on-left2">

                        <div class="tabbable">
                            <h2> </h2>
                            <div class="vk-tabs-default tabs-left">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab-left2-one" data-toggle="tab"><?php echo $about_data_result['about_collapseh1']; ?></a></li>
                                    <li><a href="#tab-left2-two" data-toggle="tab"><?php echo $about_data_result['about_collapseh2']; ?></a></li>
                                    <li><a href="#tab-left2-twee" data-toggle="tab"><?php echo $about_data_result['about_collapseh3']; ?></a></li>
                                    <li><a href="#tab-left2-three" data-toggle="tab"><?php echo $about_data_result['about_collapseh4']; ?></a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-left2-one">
                                        <p>
                                          <?php echo $about_data_result['about_collapseh1_cont']; ?>
                                        </p>
                                    </div>
                                    <div class="tab-pane" id="tab-left2-two">
                                        <p>
                                            <?php echo $about_data_result['about_collapseh2_cont']; ?></p>
                                    </div>
                                    <div class="tab-pane" id="tab-left2-twee">
                                        <p>
                                            <?php echo $about_data_result['about_collapseh3_cont']; ?>
                                        </p>
                                    </div>
                                    <div class="tab-pane" id="tab-left2-three">
                                        <p>
                                            <?php echo $about_data_result['about_collapseh4_cont']; ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<!---  new code-->




        </section>
        <!--END CONTENT ABOUT-->



<?php
Footer_data();
?>
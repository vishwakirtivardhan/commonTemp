<?php

include 'header.php';

?>

<?php

    $about_sql="SELECT * FROM `static_page_tbl` WHERE `customerID`='$custID';";
    $about_run=mysqli_query($conn,$about_sql);
    $about_data=mysqli_fetch_assoc($about_run);
    ?>

<div class="vk-about-banner">
                <!--data-parallax="scroll" data-image-src="images/02_01_about/background.jpg"-->
                <div class="vk-about-banner-destop" style="background: url(https://res.cloudinary.com/dwzhicwir/image/upload/reputize/room/2018-07-05_18-24-51.jpg) no-repeat; background-size: cover; height: 100%;">
                    <div class="vk-banner-img"></div>
                    <div class="vk-about-banner-caption">
                        <h2>Rent or stay in Serviced Apartments at Bengaluru</h2>
                        <h3>
                            <a href="#">Page</a>
                            <span><i class="fa fa-angle-right" aria-hidden="true" ></i></span>
                            <a href="#">Service-Apartments</a>
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
                                        <h2>MANY OPTIONS FOR SERVICED APARTMENTS IN KOCHI</h2>

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
                    <div class="image"><i class="fa fa-thumbs-o-up"style="
    margin-top: 15px;
"></i></div>
                    <div class="info">
                        <h3 class="title" style="
    margin-top: 55;
">INSTANT BOOKING</h3>
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
                    <div class="image"><i class="fa fa-flag" style="
    margin-top: 15px;
"></i></div>
                    <div class="info">
                        <h3 class="title" style="
    margin-top: 55;
" >24x7 CUSTOMER SERVICE</h3>
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
                    <div class="image"><i class="fa fa-desktop" style="
    margin-top: 15px;
"></i></div>
                    <div class="info">
                        <h3 class="title" style="
    margin-top: 55;
">HOSPITALITY EXPERTS</h3>
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
							<div class="row">
                                <div class="item">
                                    <div class="col-md-6 vk-dark-our-room-item-left  vk-clear-padding">
                                        <div class="vk-dark-our-room-item-img">
                                            <img src="images/04_01_room_list/img/img.jpg" alt="" class="img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-md-6 vk-dark-our-room-item-right vk-clear-padding">
                                        <div class="vk-dark-our-room-item-content">
                                            <h3><a href="#">Class Room</a></h3>
                                            <ul>
                                                <li><p><i class="fa fa-bed" aria-hidden="true"></i> Bed <span> : 1 King Bed</span></p></li>
                                                <li><p><i class="fa fa-binoculars" aria-hidden="true"></i> View <span> : Lake View</span></p></li>
                                                <li><p><i class="fa fa-arrows-alt" aria-hidden="true"></i> Size <span> : 50 m2</span></p></li>
                                                <li><p><i class="fa fa-coffee" aria-hidden="true"></i> Breakfast <span> : Yes</span></p></li>
                                                <li><p><i class="fa fa-users" aria-hidden="true"></i> Max Occupancy: <span> : 2 Adult, 1 Child</span></p></li>
                                            </ul>
                                            <div class="vk-dark-our-room-item-book">
                                                <div class="vk-dark-our-room-item-book-left">
                                                    <ul>
                                                        <li>
                                                            <p>Starting Form : </p>
                                                        </li>
                                                        <li>
                                                            <p>$200/ <span>Night</span></p>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="vk-dark-our-room-item-book-right">
                                                    <a href="#"> BOOK NOW <i class="fa fa-caret-right" aria-hidden="true"></i></a>
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

<!-- ENd of the the code of content services apartment-->
   
                        <div class="vk-sparta-dark-about">
                            <div class="col-md-6 vk-clear-padding">
                                <div class="vk-sparta-dark-about-left">
                                   
                                   <div class="vk-sparta-dark-about-right-up">
                                    <div class="col-md-4 col-sm-4 col-lg-6 vk-clear-padding"><img src="images/01_02_dark_background/welcome/1.jpg" alt="" class="img-responsive" style="
    width: -webkit-fill-available;
"></div>
                                    <div class="col-md-4 col-sm-4 col-lg-6 vk-clear-padding"><img src="images/01_02_dark_background/welcome/2.jpg" alt="" class="img-responsive" style="width: -webkit-fill-available;"></div>
                                    <div class="col-md-4 col-sm-4 col-lg-12 vk-clear-padding" style="
    width:;
"><img src="images/01_02_dark_background/welcome/3.jpg" alt="" class="img-responsive" style="
    width: 100%;
"></div>
                                </div>

                                </div>
                            </div>
                            <div class="col-md-6 vk-clear-padding vk-sparta-dark-about-right-bg" style="height: auto; padding-bottom: 23px;">
                                <div class="vk-sparta-dark-about-right" >
                                    <div class="vk-dark-about-right-header">
                                        
                                        <h2>EXCELLENT SERVICE IS OUR MISSION</h2>
                                        <h3>Inside Tour of our Serviced Apartments at Bengaluru</h3>
                                        <div class="clearfix"></div>
                                        <div class="vk-dark-about-border"></div>
                                    </div>
                                    <div class="vk-dark-about-right-content">
                                        <p>Starlit Suites is a symbol of elegance and tranquillity which offers vigilantly decorated and spacious suites, an assortment of scrumptious cuisine, a high level of personalized services, considering requirements and comfort of our privileged guests. 

For travellers seeking a comfortable and pleasant stay in Kochi, Starlit Suites is the solution. At Starlit Suites, guests’ needs and preferences are given prime importance and ultimate care for maximum comfort. 136 Fully Furnished and equipped Premium Studio and Deluxe One Bedroom Suites on the NH47 Bypass at Kochi.
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
                                        <h2>Serviced Apartments in Kochi - Many Options!</h2>
                                        
                                        <div class="vk-sparta-about-border"></div>
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
                                                        <h2>BUISNESS CENTRE</h2>
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
                                                        <h2>CENTRAL LOCATIONS</h2>
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
                                                        <h2>GREAT AMENITIES</h2>
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
                                                        <h2>Affordable Prices</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

<div class="vk-sparta-about">
                                <div class="container">
                                    <div class="vk-sparta-head-title" style="margin-top: 10px;">
                                        <h2>Rent or stay in Serviced Apartments at Kochi</h2>

                                        <h3>
</h3>
                                        
                                        <div class="vk-sparta-about-border"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="vk-sparta-about-text">
                                                <p style="text-align: justify; margin-bottom: 50px;">
                                                   A city conceived in storm, sustained in contention and built up as doing combating ground for European realms, Kochi known as the Gateway to Kerala is a money related capital of Kerala. The city is a far-fetched mix of medieval Portugal, Holland and an English town joined onto the tropical .Cochin is a noteworthy port city in the Ernakulam region of Kerala. Throughout the years, the city has made extraordinary financial headways thus it is appropriately known as the business capital of Kerala. It is near the urban areas of Kodanad and Chennamangalam. Tourism is a developing industry here which profits by the umpteen Cochin attractions. 

                                                    The excellent perspective of the backwaters and harbors makes the Marine Drive a standout amongst the most looked for after spots in Cochin. Cherai Beach is a vacationer hotspot which has a one of a kind mix of backwaters and ocean. Another well known traveler goal is Bhoothathankettu, which is a dam giving sculling offices. The dam is arranged in the midst of a huge woods and has the Salim Ali Bird Sanctuary in its nearness. It has turned into a celebrated excursion spot among visitors. 

                                                    Memorable noteworthiness of the city is portrayed by Santa Cruz Bascillica which grandstands building artfulness of the Portuguese and is an absolute necessity see for all sightseers amid an excursion to Cochin. Also, the Parikshit Thampuran Museum is home to a wide gathering of nineteenth century depictions, old coins, pre-noteworthy landmarks, sacred writings made of stone and mortar of Paris and duplicates of wall painting artistic creations. Cochin likewise gloats of the biggest archeological historical center of Kerala, which is situated at the Hill Palace and is home to uncommon works of art, etchings, carvings and different examples of epigraphy. 

                                                    Different spots to visit in Cochin incorporate Bolghatty Palace, Chendamangalam, Mattancherry Palace, Historical Museum and Kalady. Moreover, there are a few spots of love in Cochin which incorporate Kallil Temple, Iringole Forest Temple, Chottanikkara Temple, Thrikkakara, Malayattoor Church and Kanjiramattom Mosque. The primary European church in India, St. Francis Church, is exceedingly huge as it denotes the site where Vasco da Gama was covered. Only 2 km from Ernakulam Junction,
                                                    </p>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
<!-- End content service-apartment -->



<?php

include 'footer.php';

?>


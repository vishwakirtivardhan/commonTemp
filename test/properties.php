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
                        <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                        <a href="#">About Us</a>
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

                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <div class="item">
                                    <div class="vk-sparta-item-content">
                                        <div class="vk-item-img">
                                            <a href="#"><img src="images/04_02_room_grid/img.jpg" alt="" class="img-responsive"></a>
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
                            </div>
                             <div class="col-md-4 col-sm-6">
                                <div class="item">
                                    <div class="vk-sparta-item-content">
                                        <div class="vk-item-img">
                                            <a href="#"><img src="images/04_02_room_grid/img-1.jpg" alt="" class="img-responsive"></a>
                                        </div>
                                        <div class="vk-item-text">
                                            <h2><a href="#">Double Room</a></h2>
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
                            </div> 
                             <div class="col-md-4 col-sm-6">
                                <div class="item">
                                    <div class="vk-sparta-item-content">
                                        <div class="vk-item-img">
                                            <a href="#"><img src="images/04_02_room_grid/img-2.jpg" alt="" class="img-responsive"></a>
                                        </div>
                                        <div class="vk-item-text">
                                            <h2><a href="#">Superior Room</a></h2>
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
                            </div>
                            
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
                                                <button class="btn" style="width: 100%; font-size: 18px; background-color: white;">check availability</button>
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
                                                An iconic 9 storied tower strategically Located on NH47 bypass road in Kochi, Kerala with a convenient access to the airport and the railway station as well as the commercial hubs and the scenic spots. A part of a signature mixed use development consisting of a mall/office space and Hotel Apartments. Excellent views from all the Suites with ample open green spaces, swimming pool on the 6th floor terrace with a poolside deck, gymnasium and terraces in the tower with a jogging track on the 10th floor terrace. For travellers seeking a comfortable and pleasant stay in Kochi, Starlit Suites is the solution. At Starlit Suites, guests’ needs and preferences are given prime importance and ultimate care for maximum comfort. 136 Fully Furnished and equipped Premium Studio and Deluxe One Bedroom Suites on the NH47 Bypass at Kochi.
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
                <div class="image"><i class="fa fa-thumbs-o-up"style="margin-top: 15px;"></i></div>
                <div class="info">
                    <h3 class="title" style="margin-top: 55;">INSTANT BOOKING</h3>
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
                <div class="image"><i class="fa fa-flag" style="margin-top: 15px;"></i></div>
                <div class="info">
                    <h3 class="title" style="margin-top: 55;" >24x7 CUSTOMER SERVICE</h3>
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
                <div class="image"><i class="fa fa-desktop" style="margin-top: 15px;"></i></div>
                <div class="info">
                    <h3 class="title" style="margin-top: 55;">HOSPITALITY EXPERTS</h3>
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



    <div class="col-xs-12 col-sm-6 col-lg-4">
        <div class="box">                           
            <div class="icon">
                <div class="image"><i class="fa fa-desktop" style="margin-top: 15px;"></i></div>
                <div class="info">
                    <h3 class="title" style="margin-top: 55;">HOSPITALITY EXPERTS</h3>
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

    <div class="col-xs-12 col-sm-6 col-lg-4">
        <div class="box">                           
            <div class="icon">
                <div class="image"><i class="fa fa-desktop" style="margin-top: 15px;"></i></div>
                <div class="info">
                    <h3 class="title" style="margin-top: 55;">HOSPITALITY EXPERTS</h3>
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


    <div class="col-xs-12 col-sm-6 col-lg-4">
        <div class="box">                           
            <div class="icon">
                <div class="image"><i class="fa fa-desktop" style="margin-top: 15px;"></i></div>
                <div class="info">
                    <h3 class="title" style="margin-top: 55;">HOSPITALITY EXPERTS</h3>
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


    <div class="col-xs-12 col-sm-6 col-lg-4">
        <div class="box">                           
            <div class="icon">
                <div class="image"><i class="fa fa-desktop" style="margin-top: 15px;"></i></div>
                <div class="info">
                    <h3 class="title" style="margin-top: 55;">HOSPITALITY EXPERTS</h3>
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


<!-- End property Overview -->

<!-- this code for the accordion  -->
<div class="vk-shortcode-accordion-body">
            <div class="container">
            	  <h2>Accordion With Background</h2>
                <div class="vk-accordion-with-bg">
                    <h4 class="vk-accordion-toggle-default">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</h4>
                    <div class="vk-accordion-content-default">
                        <p>
                            Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                            Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero
                            sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.
                            Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed,
                            commodo vitae, ornare sit amet, wisi. Aenean fermentum.
                        </p>
                    </div>

                    <h4 class="vk-accordion-toggle-default">Aliquam tincidunt mauris eu risus</h4>
                    <div class="vk-accordion-content-default">
                        <p>
                            Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                            Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero
                            sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.
                            Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed,
                            commodo vitae, ornare sit amet, wisi. Aenean fermentum.
                        </p>
                    </div>

                    <h4 class="vk-accordion-toggle-default">Pellentesque habitant morbi tristique senectus</h4>
                    <div class="vk-accordion-content-default">
                        <p>
                            Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                            Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero
                            sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.
                            Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed,
                            commodo vitae, ornare sit amet, wisi. Aenean fermentum.
                        </p>
                    </div>
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
                                <div class="col-md-4 item a c d col-sm-6" data-src="images/02_03_gallery_grid_full_width/1.jpg">
                                    <div class="vk-item-img" >
                                        <a href="#"><img src="images/02_03_gallery_grid_full_width/1.jpg" alt="" class="img-responsive"></a>
                                        <div class="vk-item-caption">
                                            <div class="featured-slider-overlay"></div>
                                            <div class="vk-item-caption-text">
                                                <h2>Master Chef</h2>
                                                <h4>Restaurant</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-4 item b d e col-sm-6" data-src="images/02_03_gallery_grid_full_width/2.jpg">
                                    <div class="vk-item-img">
                                        <a href="#"><img src="images/02_03_gallery_grid_full_width/2.jpg" alt="" class="img-responsive"></a>
                                        <div class="vk-item-caption">
                                            <div class="featured-slider-overlay"></div>
                                            <div class="vk-item-caption-text">
                                                <h2>Master Chef</h2>
                                                <h4>Restaurant</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-4 item a b e col-sm-6" data-src="images/02_03_gallery_grid_full_width/3.jpg">
                                    <div class="vk-item-img">
                                        <a href="#"><img src="images/02_03_gallery_grid_full_width/3.jpg" alt="" class="img-responsive"></a>
                                        <div class="vk-item-caption">
                                            <div class="featured-slider-overlay"></div>
                                            <div class="vk-item-caption-text">
                                                <h2>Master Chef</h2>
                                                <h4>Restaurant</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-4 item c e a b col-sm-6" data-src="images/02_03_gallery_grid_full_width/4.jpg">
                                    <div class="vk-item-img">
                                        <a href="#"><img src="images/02_03_gallery_grid_full_width/4.jpg" alt="" class="img-responsive"></a>
                                        <div class="vk-item-caption">
                                            <div class="featured-slider-overlay"></div>
                                            <div class="vk-item-caption-text">
                                                <h2>Master Chef</h2>
                                                <h4>Restaurant</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-4 item c b a col-sm-6" data-src="images/02_03_gallery_grid_full_width/5.jpg">
                                    <div class="vk-item-img">
                                        <a href="#"><img src="images/02_03_gallery_grid_full_width/5.jpg" alt="" class="img-responsive"></a>
                                        <div class="vk-item-caption">
                                            <div class="featured-slider-overlay"></div>
                                            <div class="vk-item-caption-text">
                                                <h2>Master Chef</h2>
                                                <h4>Restaurant</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-4 item c e b col-sm-6" data-src="images/02_03_gallery_grid_full_width/6.jpg">
                                    <div class="vk-item-img">
                                        <a href="#"><img src="images/02_03_gallery_grid_full_width/6.jpg" alt="" class="img-responsive"></a>
                                        <div class="vk-item-caption">
                                            <div class="featured-slider-overlay"></div>
                                            <div class="vk-item-caption-text">
                                                <h2>Master Chef</h2>
                                                <h4>Restaurant</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-4 item e d a col-sm-6" data-src="images/02_03_gallery_grid_full_width/7.jpg">
                                    <div class="vk-item-img">
                                        <a href="#"><img src="images/02_03_gallery_grid_full_width/7.jpg" alt="" class="img-responsive"></a>
                                        <div class="vk-item-caption">
                                            <div class="featured-slider-overlay"></div>
                                            <div class="vk-item-caption-text">
                                                <h2>Master Chef</h2>
                                                <h4>Restaurant</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-4 item a c e col-sm-6" data-src="images/02_03_gallery_grid_full_width/8.jpg">
                                    <div class="vk-item-img">
                                        <a href="#"><img src="images/02_03_gallery_grid_full_width/8.jpg" alt="" class="img-responsive"></a>
                                        <div class="vk-item-caption">
                                            <div class="featured-slider-overlay"></div>
                                            <div class="vk-item-caption-text">
                                                <h2>Master Chef</h2>
                                                <h4>Restaurant</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-4 item c b col-sm-6" data-src="images/02_03_gallery_grid_full_width/9.jpg">
                                    <div class="vk-item-img">
                                        <a href="#"><img src="images/02_03_gallery_grid_full_width/9.jpg" alt="" class="img-responsive"></a>
                                        <div class="vk-item-caption">
                                            <div class="featured-slider-overlay"></div>
                                            <div class="vk-item-caption-text">
                                                <h2>Master Chef</h2>
                                                <h4>Restaurant</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
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
<?php

include 'footer.php';

?>


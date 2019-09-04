    <?php 
    
    include 'include/config.php';
    include 'include/customerID.php';// customerID retrive file

    // *** This is used for the connection of content of page
    $query= "SELECT * FROM `homecontent` WHERE `customerID`='$custID';";
    $run=mysqli_query($conn,$query);
    $data=mysqli_fetch_assoc($run);

    // *******This code for connect the table (admin_details),fetch cloud name.
    $query1="SELECT * FROM `admin_details` WHERE `customerID`='$custID';";
    $run1=mysqli_query($conn,$query1);
    $data1=mysqli_fetch_assoc($run1);
    $cloud_name=$data1['cloud_name'];

    //***** retrive the images of slider. 
    $query2="SELECT * FROM `homeslider` WHERE `customerID`='$custID';";
    $run2=mysqli_query($conn,$query2);

    //**** hour hotels images with title.
    $propsel = "select * from propertytable where status='Y' and customerID='$custID' order by propertyID desc ";

    $run3=mysqli_query($conn,$propsel);

    $data3=mysqli_fetch_assoc($run3);
    $propid = $data3['propertyID'];
    // **** This ower rooms images

    $images="select * from propertyimages where propertyID='$propid' and feature stat  order by imagesID desc limit 1";
    $run4=mysqli_query($conn,$images);
    //$data4=mysqli_fetch_assoc($run4);




    ?>
    <html lang="en">

    <!-- Mirrored from sparta.vikitheme.com/html/01_06_transparent_2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Jul 2019 06:40:07 GMT -->
    <head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>01_06_transparent_2</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link href="fonts/raleway/raleway.css" rel="stylesheet">
    <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.css">
    <link href="fonts/playfair-display/playfair-display.css" rel="stylesheet">
    <link rel="stylesheet" href="plugin/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="plugin/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker3.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link href="css/lightgallery.css" rel="stylesheet">
    <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" type="text/css" href="css/semantic.css">
    <link rel="stylesheet" href="css/paraxify.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/custome.css">
    <!-- this is servies css files-->


    </head>
    <body>

    <!--load page-->
    <div class="load-page">
    <div class="spinner">
        <div class="rect1"></div>
        <div class="rect2"></div>
        <div class="rect3"></div>
        <div class="rect4"></div>
        <div class="rect5"></div>
    </div>
    </div>

    <div class="vk-sparta-transparents-2">
    <!-- Mobile nav -->
    <div class="vk-top-header">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="vk-top-header-left">
                        <span>45 Queen's Park Rd, Brighton, BN2 oGJ, UK</span>
                        <span>-</span>
                        <span>Reservation (+233) 123 456789</span>
                    </div>
                </div>
                <div class="col-md-4 vk-top-header-right">
                    <div class="vk-top-header-right">
                        <ul>
                            <li>
                                <!--                                    ENG  <i class="fa fa-angle-down" aria-hidden="true"></i>-->
                                <div class="wrap-select">
                                    <div id="ddc" class="wrapper-dropdown-3">
                                        <span>ENG</span>
                                        <ul class="dropdown">
                                            <li><a href="#">FRA</a></li>
                                            <li><a href="#">VI</a></li>
                                            <li><a href="#">TL</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <!--                                    USD  <i class="fa fa-angle-down" aria-hidden="true"></i>-->
                                <div class="wrap-select">
                                    <div id="dde" class="wrapper-dropdown-3">
                                        <span>USA</span>
                                        <ul class="dropdown">
                                            <li><a href="#">VND</a></li>
                                            <li><a href="#">$</a></li>
                                            <li><a href="#">VNĐ</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li><a href="#"> BOOK NOW </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="visible-sm visible-xs mobile-menu-container mobile-nav vk-menu-mobile-nav">
        <div class="menu-mobile-nav navbar-toggle">
            <span class="icon-bar"><i class="fa fa-bars" aria-hidden="true"></i></span>
            <span class="icon-search"><i class="fa fa-search" aria-hidden="true"></i></span>
        </div>
        <div id="cssmenu" class="animated">
            <div class="uni-icon-close">
                <span class="ti-close"></span>
            </div>

       <ul class="nav navbar-nav">
            <?php 

                $header_menu_sql="SELECT DISTINCT primary_link FROM `manage_header_footer` WHERE `customerID` =28 AND `category`='Header' ORDER BY `primary_sequence` ASC;";
                $header_menu_run=mysqli_query($conn,$header_menu_sql);
                while($header_menu_data=mysqli_fetch_assoc($header_menu_run)){
             ?>
            
                <li class="has-sub"><a href="index.php" target="_blank"><?php $data_subhead= $header_menu_data['primary_link']; 

                                                            echo $data_subhead;
                                            ?></a>
                    <ul class="sub-menu1">
                        <?php 
                                $header_menu_sql1="SELECT DISTINCT `secondary_link` FROM `manage_header_footer` WHERE `customerID`=28 AND `category`='Header' AND `primary_link`='$data_subhead' ORDER BY `secondary_sequence` ASC;";
                                $header_menu_run1=mysqli_query($conn,$header_menu_sql1);
                                                       while($header_menu_data1=mysqli_fetch_assoc($header_menu_run1)){

                                                     ?>
                                                    
                        <li><a href="index.php" target="_blank"><?php echo $header_menu_data1['secondary_link'];  ?></a></li>
                    <?php } ?>
                    </ul>
                </li>
                        <?php } ?>        
         </ul>
            <div class="uni-nav-mobile-bottom">
                <div class="form-search-wrapper-mobile">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <span class="input-group-addon success"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </nav>






        <div id="wrapper-container" class="site-wrapper-container">

        <header class="site-header header-default header-sticky">
            <div class="vk-main-transparents-2-menu vk-main-menu animated uni-sticky">
                <div class="container-fluid">
                    <div class="row">
                        <div class="vk-transparent-2-logo">
                            <div class="wrapper-logo" style="background-image: url(https://res.cloudinary.com/<?php echo $cloud_name;?>/image/upload/c_fill/reputize/logo/<?php echo $data1['logo_img']; ?>.png);">
                                                            </div>
                        </div>

                        <div class="vk-top-header-right">
                            <ul>
                                <li><a href="#"> BOOK NOW </a></li>
                                <li>
                                    <div class="ui grid">
                                        <div class="column">
                                            <div class="ui selection dropdown">
                                                <input type="hidden" name="selection">
                                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                                                <div class="default text">ENG</div>
                                                <div class="menu">
                                                    <div class="item" data-value="male">VN</div>
                                                    <div class="item" data-value="female">USA</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="ui grid">
                                        <div class="column">
                                            <div class="ui selection dropdown">
                                                <input type="hidden" name="selection">
                                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                                                <div class="default text">USD</div>
                                                <div class="menu">
                                                    <div class="item" data-value="male">VND</div>
                                                    <div class="item" data-value="female">$</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="container">
                            <div class="vk-transparent-2-nav-menu">

                                <nav class="main-navigation" style="margin-top: 30px;">
                                    <div class="inner-navigation">
                                        <ul class="nav-bar">
                                            <?php 

                $header_menu_sql="SELECT DISTINCT primary_link FROM `manage_header_footer` WHERE `customerID` ='$custID' AND `category`='Header' ORDER BY `primary_sequence` ASC;";
                $header_menu_run=mysqli_query($conn,$header_menu_sql);
                while($header_menu_data=mysqli_fetch_assoc($header_menu_run)){
             ?>
                                            <li><a href="#"><?php $data_subhead= $header_menu_data['primary_link']; 

                                                            echo $data_subhead;
                                            ?></a>
                                                <ul class="sub-menu1 animated fadeIn">
                                                    <?php 

                                                       $header_menu_sql1="SELECT DISTINCT `secondary_link` FROM `manage_header_footer` WHERE `customerID`=28 AND `category`='Header' AND `primary_link`='$data_subhead' ORDER BY `secondary_sequence` ASC;";
                                                       $header_menu_run1=mysqli_query($conn,$header_menu_sql1);
                                                       while($header_menu_data1=mysqli_fetch_assoc($header_menu_run1)){

                                                     ?>
                                                    <li><a href="index-2.html"><?php echo $header_menu_data1['secondary_link'];  ?></a></li>
                                                    <?php } ?>
                                                    
                                                </ul>
                                            </li>
                                            
                                            
                                                                                    <?php } ?>

                                        </ul>
                                    </div>
                                </nav>
                                
                                <!--search-->
                                <div class="box-search-header collapse in" id="box-search-header">
                                    <div class="vk-input-group">
                                        <div class="input-group stylish-input-group">
                                            <input type="text" class="form-control"  placeholder="Type keywords.." >
                                            <span class="input-group-addon">
                                        <button type="submit">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </button>
                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

//=============================play/ pause slider===============
"use strict";
var myVideo = document.getElementById("video-demo");
function loadvideo(){
    myVideo.play();
}
function loadvideo1(){
    myVideo.play();
}
function loadvideo2(){
    myVideo.play();
}
function loadvideo3(){
    myVideo.play();
}
function playPause() {
    if (myVideo.paused)
        myVideo.play();
    else
        myVideo.pause();
}
function enableMute() {
    myVideo.muted = false;
}

function disableMute() {
    myVideo.muted = true;
}

//======================================================================================================================

jQuery(document).ready(function ($) {
    "use strict";
    /*Jquery validate form contact*/
    $('#contactform').submit(function () {
        

        var action = $(this).attr('action');

        $("#message-contact").slideUp(750, function () {
            $('#message-contact').hide();

            $('#submit-contact')
                .after('<i class="icon-spin4 animate-spin loader"></i>')
                .attr('disabled', 'disabled');

            $.post(action, {
                    name_contact: $('#name_contact').val(),
                    email_contact: $('#email_contact').val(),
                    phone_contact: $('#phone_contact').val(),
                    message_contact: $('#message_contact').val(),
                    subject: $('#subject').val(),
                },
                function (data) {
                    document.getElementById('message-contact').innerHTML = data;
                    $('#message-contact').slideDown('slow');
                    $('#contactform .loader').fadeOut('slow', function () {
                        $(this).remove()
                    });
                    $('#submit-contact').removeAttr('disabled');
                    if (data.match('success') != null) $('#contactform').slideUp('slow');

                }
            );

        });
        return false;
    });
    /*form-newsletter*/
    $('form.form-newsletter').submit(function(e) {

        /*return false so form submits through jQuery rather than reloading page.*/
        if (e.preventDefault) e.preventDefault();
        else e.returnValue = false;

        var thisForm = $(this).closest('form.form-newsletter'),
            submitButton = thisForm.find('button[type="submit"]'),
            error = 0,
            originalError = thisForm.attr('original-error'),
            preparedForm, iFrame, userEmail, userFullName, userFirstName, userLastName, successRedirect, formError, formSuccess;

        /*Mailchimp/Campaign Monitor Mail List Form Scripts*/
        iFrame = $(thisForm).find('iframe.mail-list-form');

        thisForm.find('.form-error, .form-success').remove();
        submitButton.attr('data-text', submitButton.text());
        thisForm.append('<div class="form-error" style="display: none;">' + thisForm.attr('data-error') + '</div>');
        thisForm.append('<div class="form-success" style="display: none;">' + thisForm.attr('data-success') + '</div>');
        formError = thisForm.find('.form-error');
        formSuccess = thisForm.find('.form-success');
        thisForm.addClass('attempted-submit');

        /*Do this if there is an iframe, and it contains usable Mail Chimp / Campaign Monitor iframe embed code*/
        if ((iFrame.length) && (typeof iFrame.attr('srcdoc') !== "undefined") && (iFrame.attr('srcdoc') !== "")) {

            console.log('Mail list form signup detected.');
            if (typeof originalError !== typeof undefined && originalError !== false) {
                formError.html(originalError);
            }
            userEmail = $(thisForm).find('.signup-email-field').val();
            userFullName = $(thisForm).find('.signup-name-field').val();
            if ($(thisForm).find('input.signup-first-name-field').length) {
                userFirstName = $(thisForm).find('input.signup-first-name-field').val();
            } else {
                userFirstName = $(thisForm).find('.signup-name-field').val();
            }
            userLastName = $(thisForm).find('.signup-last-name-field').val();

            /*validateFields returns 1 on error;*/
            if (validateFields(thisForm) !== 1) {
                preparedForm = prepareSignup(iFrame);

                preparedForm.find('#mce-EMAIL, #fieldEmail').val(userEmail);
                preparedForm.find('#mce-LNAME, #fieldLastName').val(userLastName);
                preparedForm.find('#mce-FNAME, #fieldFirstName').val(userFirstName);
                preparedForm.find('#mce-NAME, #fieldName').val(userFullName);
                thisForm.removeClass('attempted-submit');

                /*Hide the error if one was shown*/
                formError.fadeOut(200);
                /*Create a new loading spinner in the submit button.*/
                try{
                    $.ajax({
                        url: preparedForm.attr('action'),
                        crossDomain: true,
                        data: preparedForm.serialize(),
                        method: "GET",
                        cache: false,
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8',
                        success: function(data){
                            /*Request was a success, what was the response?*/
                            if (data.result != "success" && data.Status != 200) {

                                /*Error from Mail Chimp or Campaign Monitor*/

                                /*Keep the current error text in a data attribute on the form*/
                                formError.attr('original-error', formError.text());
                                /*Show the error with the returned error text.*/
                                formError.html(data.msg).fadeIn(1000);
                                formSuccess.fadeOut(1000);
                            } else {

                                /*Got Success from Mail Chimp*/

                                successRedirect = thisForm.attr('success-redirect');
                                /*For some browsers, if empty `successRedirect` is undefined; for others,*/
                                /*`successRedirect` is false.  Check for both.*/
                                if (typeof successRedirect !== typeof undefined && successRedirect !== false && successRedirect !== "") {
                                    window.location = successRedirect;
                                }

                                thisForm.find('input[type="text"]').val("");
                                thisForm.find('textarea').val("");
                                formSuccess.fadeIn(1000);

                                formError.fadeOut(1000);
                                setTimeout(function() {
                                    formSuccess.fadeOut(500);
                                }, 5000);
                            }
                        }
                    });
                }catch(err){
                    /*Keep the current error text in a data attribute on the form*/
                    formError.attr('original-error', formError.text());
                    /*Show the error with the returned error text.*/
                    formError.html(err.message).fadeIn(1000);
                    formSuccess.fadeOut(1000);
                    setTimeout(function() {
                        formError.fadeOut(500);
                    }, 5000);

                }

            } else {
                formError.fadeIn(1000);
                setTimeout(function() {
                    formError.fadeOut(500);
                }, 5000);
            }
        } else {
            /*If no iframe detected then this is treated as an email form instead.*/
            console.log('Send email form detected.');
            if (typeof originalError !== typeof undefined && originalError !== false) {
                formError.text(originalError);
            }

            error = validateFields(thisForm);

            if (error === 1) {
                formError.fadeIn(200);
                setTimeout(function() {
                    formError.fadeOut(500);
                }, 3000);
            } else {

                thisForm.removeClass('attempted-submit');

                /*Hide the error if one was shown*/
                formError.fadeOut(200);

                /*Create a new loading spinner in the submit button.*/

                jQuery.ajax({
                    type: "POST",
                    url: "mail/mail.php",
                    data: thisForm.serialize()+"&url="+window.location.href,
                    success: function(response) {
                        /*Swiftmailer always sends back a number representing numner of emails sent.*/
                        /*If this is numeric (not Swift Mailer error text) AND greater than 0 then show success message.*/

                        if ($.isNumeric(response)) {
                            if (parseInt(response) > 0) {
                                /*For some browsers, if empty 'successRedirect' is undefined; for others,*/
                                /*'successRedirect' is false.  Check for both.*/
                                successRedirect = thisForm.attr('success-redirect');
                                if (typeof successRedirect !== typeof undefined && successRedirect !== false && successRedirect !== "") {
                                    window.location = successRedirect;
                                }


                                thisForm.find('input[type="text"]').val("");
                                thisForm.find('textarea').val("");
                                thisForm.find('.form-success').fadeIn(1000);

                                formError.fadeOut(1000);
                                setTimeout(function() {
                                    formSuccess.fadeOut(500);
                                }, 5000);
                            }
                        }
                        /*If error text was returned, put the text in the .form-error div and show it.*/
                        else {
                            /*Keep the current error text in a data attribute on the form*/
                            formError.attr('original-error', formError.text());
                            /*Show the error with the returned error text.*/
                            formError.text(response).fadeIn(1000);
                            formSuccess.fadeOut(1000);
                        }
                    },
                    error: function(errorObject, errorText, errorHTTP) {
                        /*Keep the current error text in a data attribute on the form*/
                        formError.attr('original-error', formError.text());
                        /*Show the error with the returned error text.*/
                        formError.text(errorHTTP).fadeIn(1000);
                        formSuccess.fadeOut(1000);
                    }
                });
            }
        }
        return false;
    });

    $('.validate-required, .validate-email').on('blur change', function() {
        validateFields($(this).closest('form'));
    });

    $('form').each(function() {
        if ($(this).find('.form-error').length) {
            $(this).attr('original-error', $(this).find('.form-error').text());
        }
    });

    function validateFields(form) {
        var name, error, originalErrorMessage;

        $(form).find('.validate-required[type="checkbox"]').each(function() {
            if (!$('[name="' + $(this).attr('name') + '"]:checked').length) {
                error = 1;
                name = $(this).attr('name').replace('[]', '');
                form.find('.form-error').text('Please tick at least one ' + name + ' box.');
            }
        });

        $(form).find('.validate-required').each(function() {
            if ($(this).val() === '') {
                $(this).addClass('field-error');
                error = 1;
            } else {
                $(this).removeClass('field-error');
            }
        });

        $(form).find('.validate-email').each(function() {
            if (!(/(.+)@(.+){2,}\.(.+){2,}/.test($(this).val()))) {
                $(this).addClass('field-error');
                error = 1;
            } else {
                $(this).removeClass('field-error');
            }
        });

        if (!form.find('.field-error').length) {
            form.find('.form-error').fadeOut(1000);
        }

        return error;
    }

    
    
/*Prepare Signup Form - It is used to retrieve form details from an iframe Mail Chimp or Campaign Monitor form.*/

function prepareSignup(iFrame){
    var form   = jQuery('<form />'),
        div    = jQuery('<div />'),
        action;

    jQuery(div).html(iFrame.attr('srcdoc'));
    action = jQuery(div).find('form').attr('action');

    // Alter action for a Mail Chimp-compatible ajax request url.
    if(/list-manage\.com/.test(action)){
       action = action.replace('/post?', '/post-json?') + "&c=?";
       if(action.substr(0,2) == "//"){
           action = 'http:' + action;
       }
    }

    // Alter action for a Campaign Monitor-compatible ajax request url.
    if(/createsend\.com/.test(action)){
       action = action + '?callback=?';
    }


    // Set action on the form
    form.attr('action', action);

    // Clone form input fields from 
    jQuery(div).find('input, select, textarea').not('input[type="submit"]').each(function(){
        jQuery(this).clone().appendTo(form);

    });

    return form;
        

}

/*End form-newsletter*/

    //==================load page===============
    setTimeout(function() {
        jQuery('.load-page').hide();
    }, 1000);


    //====Light Gallery====
    lightGallery(document.getElementById('lightgallery'));

    //=====COUNTTER UP=====
    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });

    //======================search menu=============================
    $('.uni-search-box').on('click', function (e) {
        if($(e.target).is('.toggle-form, .toggle-form i')){
            $('.form-search-wrapper').slideToggle();
        }
    });

//======================MENU MOBILES===================
    $('.mobile-menu-container .menu-mobile-nav').on('click', function (e) {
        if($(e.target).is('.icon-bar i')){
            $('#cssmenu').slideToggle();
            $('#cssmenu ul ul').hide();
            $('.vk-menu-mobile-nav.mobile-menu-container ul.navbar-nav').show();
        }
        if($(e.target).is('.icon-search i')){
            $('#cssmenu').slideToggle();
            $('.vk-menu-mobile-nav.mobile-menu-container ul.navbar-nav').hide();
            return true;
        }
    });
    $('.mobile-menu-container #cssmenu .uni-icon-close').on('click', function (e) {
        if($(e.target).is('span')){
            $('#cssmenu').hide(500);
        }
    });
    (function($) {

        $.fn.menumaker = function(options) {

            var cssmenu = $(this), settings = $.extend({
                title: "Menu",
                format: "dropdown",
                sticky: false
            }, options);

            return this.each(function() {
                cssmenu.find('li ul').parent().addClass('has-sub');

                var multiTg = function() {
                    cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
                    cssmenu.find('.submenu-button').on('click', function() {
                        $(this).toggleClass('submenu-opened');
                        $(this).toggleClass('active');
                        if ($(this).siblings('ul').hasClass('open')) {
                            $(this).siblings('ul').removeClass('open').hide();
                        }
                        else {
                            $(this).siblings('ul').addClass('open').show();
                        }
                    });
                };

                if (settings.format === 'multitoggle') multiTg();
                else cssmenu.addClass('dropdown');

                if (settings.sticky === true) cssmenu.css('position', 'fixed');

                var resizeFix = function() {
                    if ($( window ).width() > 992) {
                        cssmenu.find('ul').show();
                    }
                };
                resizeFix();
                return $(window).on('resize', resizeFix);

            });
        };
    })(jQuery);

    (function($){
        $(document).ready(function(){

            $(document).ready(function() {
                $("#cssmenu").menumaker({
                    title: "Menu",
                    format: "multitoggle"
                });

                $("#cssmenu").prepend("<div id='menu-line'></div>");

                var foundActive = false, activeElement, linePosition = 0, menuLine = $("#cssmenu #menu-line"), lineWidth, defaultPosition, defaultWidth;

                $("#cssmenu > ul > li").each(function() {
                    if ($(this).hasClass('active')) {
                        activeElement = $(this);
                        foundActive = true;
                    }
                });

                if (foundActive === false) {
                    activeElement = $("#cssmenu > ul > li").first();
                }

                defaultWidth = lineWidth = activeElement.width();

                defaultPosition = linePosition = activeElement.position().left;

                menuLine.css("width", lineWidth);
                menuLine.css("left", linePosition);

                $("#cssmenu > ul > li").on('mouseenter', function () {
                        activeElement = $(this);
                        lineWidth = activeElement.width();
                        linePosition = activeElement.position().left;
                        menuLine.css("width", lineWidth);
                        menuLine.css("left", linePosition);
                    },
                    function() {
                        menuLine.css("left", defaultPosition);
                        menuLine.css("width", defaultWidth);
                    });
            });
        });
    })(jQuery);


    //==============================btn load more=========================
    $(".vk-testimonials-content-item").slice(0, 6).show();
    $(".btn-more").on('click', function (e) {
        e.preventDefault();
        $(".vk-testimonials-content-item:hidden").slice(0, 3).slideDown();
        $('html,body').animate({
            scrollTop: $(this).offset().top -1000
        }, 1000);
    });

    // ==================play and pause==================
    $('button.vk-play').on('click', function (e) {
        if($(e.target).is(this)){
            $('button.vk-pause').show();
            $('button.vk-play').hide();
        }
    });
    $('button.vk-pause').on('click', function (e) {
        if($(e.target).is(this)){
            $('button.vk-play').show();
            $('button.vk-pause').hide();
        }
    });

    //====================mute and sound================
    $('button.vk-enablemute').on('click', function (e) {
        if($(e.target).is(this)){
            $('button.vk-mutesound').show();
            $('button.vk-enablemute').hide();
        }
    });
    $('button.vk-mutesound').on('click', function (e) {
        $(this).hide();
        if($(e.target).is(this)){
            $('button.vk-enablemute').show();
            $('button.vk-mutesound').hide();
        }
    });


    //==========Owl Carosel===========
    if(! $.isFunction('owlCarousel')){
        $('.vk-owl-three-dots').owlCarousel({
            loop:true,
            margin:30,
            nav:false,
            dots:true,
            responsive:{
                0:{
                    items:1
                },
                992:{
                    items:3
                }
            }
        });
        $('.vk-owl-one-item').owlCarousel({
            loop:true,
            nav:true,
            navText:false,
            dots:true,
            responsive:{
                0:{
                    items:1
                }
            }
        });

        $('#owl-slide-home').owlCarousel({
            loop:true,
            autoplayTimeout:6000,
            nav:true,
            navText:true,
            dots:false,
            items:1,
            autoHeight:true,
            autoWidth:false
        });
    }
    
    // ============================ACCORDION===================================

    $('.vk-accordion-default .vk-accordion-toggle-default , .vk-accordion-with-bg .vk-accordion-toggle-default').on('click', function (e) {
        if($(e.target).is('h4.vk-accordion-toggle-default')){
            $(this).next().slideToggle('600');
            $(".vk-accordion-content-default").not($(this).next()).slideUp('600');
            $(this).toggleClass('active').siblings().removeClass('active');
        }
    });

    // ======================================search================================
    $('.box-search-header').hide();
    $('.vk-icon-search').on('click', function (e) {
        if($(e.target).is(this)){
            $('.box-search-header').slideToggle();
        }
        if($(e.target).is('i')){
            $('.box-search-header').slideToggle();
        }
    });

    // ============================short code hover=================================
    $('.hover-short').on({
        mouseenter: function () {
            $('.show-hover-shortcodes').fadeIn();
        },
        mouseleave: function () {
            $('.show-hover-shortcodes').hide();
        }
    });
    $('.show-hover-shortcodes').on({
        mouseenter: function () {
            $(this).show();
        },
        mouseleave: function () {
            $(this).fadeOut();
        }
    });

    //======isotop=======
    $('.vk-main-iso').isotope({
        itemSelector: '.item',
        percentPosition:true,
        layoutMode: 'fitRows',
        masonry:{
            columnWidth:'.item'
        },
        return:true
    });
    $('.grid').isotope({
        itemSelector: '.grid-item',
        percentPosition:true,
        masonry:{
            columnWidth:'.grid-sizer'
        }
    });
    // Isotope click function
    $('.vk-iso-nav ul li').on('click', function (e) {
        if($(e.target).is(this)){
            $('.vk-iso-nav ul li').removeClass('active');
            $(this).addClass('active');

            var selector = $(this).attr('data-filter');
            $('.vk-main-iso').isotope({
                filter: selector
            });
            return false;
        }
    });
    $('.vk-iso-nav ul li').on('click', function (e) {
        if($(e.target).is(this)){
            $('.vk-iso-nav ul li').removeClass('active');
            $(this).addClass('active');
        }
        var selector = $(this).attr('data-filter');
        $('.grid').isotope({
            filter: selector
        });
        return false;
    });

    //=============Calendar=============
    moment.locale('tr');
    var date = new Date();
    var bugun = moment(date).format("DD/MM/YYYY");

    var date_input1=$('input[name="date1"]'); //our date input has the name "date"
    var date_input2=$('input[name="date2"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    var options={
        container: container,
        todayHighlight: true,
        autoclose: true,
        format: 'dd/mm/yyyy',
        language: 'tr'
    };
    date_input1.val(bugun);
    date_input1.datepicker(options).on('focus', function(date_input){
    });
    date_input2.val(bugun);
    date_input2.datepicker(options).on('focus', function(date_input){
    });


    date_input1.change(function () {
        var deger = $(this).val();
    });
    date_input2.change(function () {
        var deger = $(this).val();
    });


    $('.date-check-in').find('#ti-calendar1').on('click', function(){

        if( !date_input1.data('datepicker').picker.is(":visible"))
        {
            date_input1.trigger('focus');
        } else {
        }
    });
    $('.date-check-out').find('#ti-calendar2').on('click', function(){

        if( !date_input2.data('datepicker').picker.is(":visible"))
        {
            date_input2.trigger('focus');
        } else {
        }
    });


    // =========shop loc giá=============
    $( "#slider-range" ).slider({
        range: true,
        min: 0,
        max: 1000,
        values: [ 75, 500 ],
        slide: function( event, ui ) {
            $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
        " - $" + $( "#slider-range" ).slider( "values", 1 ) );


    //=======cout so luong==========
    var $str = $('.vk-shop2-slide1-details-number').text();

    $('.vk-shop2-slide1-details-minus').on('click', function (e) {
        if($(e.target).is(this)){
            $str--;

            if ($str <= 1) {
                $str =1;
            }

            $('.vk-shop2-slide1-details-number').text($str);
        }

    });

    $('.vk-shop2-slide1-details-plus').on('click', function (e) {
        if($(e.target).is(this)){
            $str++;

            $('.vk-shop2-slide1-details-number').text($str);
        }
    });


    //======================select image==================================
    $('#img1').on('click', function (e) {
        if($(e.target).is('img')){
            $('.vk-shop2-slide1-img img:nth-child(1)').fadeIn();
            $('.vk-shop2-slide1-img img:nth-child(2)').hide();
            $('.vk-shop2-slide1-img img:nth-child(3)').hide();
        }
    });
    $('#img2').on('click', function (e) {
        if($(e.target).is('img')){
            $('.vk-shop2-slide1-img img:nth-child(2)').fadeIn();
            $('.vk-shop2-slide1-img img:nth-child(1)').hide();
            $('.vk-shop2-slide1-img img:nth-child(3)').hide();
        }
    });
    $('#img3').on('click', function (e) {
        if($(e.target).is('img')){
            $('.vk-shop2-slide1-img img:nth-child(3)').fadeIn();
            $('.vk-shop2-slide1-img img:nth-child(1)').hide();
            $('.vk-shop2-slide1-img img:nth-child(2)').hide();
        }
    });

    //====================shop cart=================================
    $(".ddd").on("click", function (e) {
        var $button = $(this);
        var oldValue = $button.closest('.sp-quantity').find("input.quntity-input").val();

        if ($button.text() == "+") {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue >= 1) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }

        $button.closest('.sp-quantity').find("input.quntity-input").val(newVal);
        return false;
    });

    //------------------checkout-------------------
    $(".woocommerce-info ").on('click', function (e) {
        if($(e.target).is('.click-here-to-login')){
            $('.vk-form-woo-login').slideToggle();
            return false;
        }
        if($(e.target).is('.click-here-entry-code')){
            $('.vk-check-coupon').slideToggle();
            return false;
        }
    }) ;
    $('.vk-checkout-ship-address').on('click', function (e) {
       if($(e.target).is('.btn-checkbox-ship-address')){
           $('.checkout-ship-address-checkbox').slideToggle();
       }
    });
    $('.vk-checkout-creat-account').on('click', function (e) {
        if($(e.target).is('.checkbox-create-account')){
            $('.checkbox-create-account-form').slideToggle();
        }
    });


    // ===========================Select language====================
    function DropDown(el) {
        this.dd = el;
        this.dda=el;
        this.ddc=el;
        this.dde=el;
        this.placeholder = this.dd.children('span');
        this.opts = this.dd.find('.dropdown a');
        this.val = '';
        this.index = -1;
        this.initEvents();
    }
    DropDown.prototype = {
        initEvents : function() {
            var obj = this;

            obj.dd.on('click', function(event){
                $(this).toggleClass('active');
                return false;
            });

            obj.opts.on('click',function(){
                var opt = $(this);
                obj.val = opt.text();
                obj.index = opt.index();
                obj.placeholder.text(obj.val);
            });
        },
        getValue : function() {
            return this.val;
        },
        getIndex : function() {
            return this.index;
        }
    };

    $(function() {

        var dd = new DropDown( $('#dd') );
        var dda = new DropDown( $('#dda') );
        var ddc = new DropDown( $('#ddc') );
        var dde = new DropDown( $('#dde') );

    });


    //===========================menu scroll====================
    $(".uni-sticky").sticky({topSpacing:0});

    //=======booking hotel=========
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
    $('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
    $('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 1,
        minView: 0,
        maxView: 1,
        forceParse: 0
    });

    //====================
    $('.ui.selection.dropdown').dropdown();
    $('.ui.menu .ui.dropdown').dropdown({
        on: 'hover'
    });

    //==============back to top===========

    $('body').append('<div id="toTop"><div class="btn btn-totop"><i class="fa fa-chevron-up" aria-hidden="true"></i></div></div>');
    $(window).on('scroll', function () {
        if ($(this).scrollTop() != 0) {
            $('#toTop').fadeIn();
        } else {
            $('#toTop').fadeOut();
        }
    });
    $('#toTop').on('click', function (e) {
        if($(e.target).is('.btn-totop')){
            $("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        }
        if($(e.target).is('.btn-totop i')){
            $("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        }
    });
});
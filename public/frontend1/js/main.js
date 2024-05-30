$(document).ready(function() {

    $(".menu-desktop .nav-sub .nav-sub-child").each(function() {
        let length = $(this).find(".nav-sub-item-child").length;
        if (length) {
            $(this).prev("a").append("<i class='fa fa-angle-right pt_icon_right'></i>");
        }
    });
   /* $(".menu-desktop .nav-item .nav-sub").each(function() {
        if ($(this).find(".nav-sub-item").length) {
            $(this).prev("a").append("<i class='fa fa-angle-down' aria-hidden='true'></i>");
        }
    })*/
    $(".menu_fix_mobile .nav-sub").each(function() {
        if ($(this).find(".nav-sub-item").length) {
            $(this).parent(".nav-item").prepend("<i class='fa fa-chevron-down mm1'></i>");
        }
    })
    $(".menu_fix_mobile .nav-sub-child").each(function() {
        if ($(this).find(".nav-sub-item-child").length) {
            $(this).parent(".nav-sub-item").prepend("<i class='fa fa-chevron-down mm2'></i>");
        }
    })
    $(".menu_fix_mobile .megamenu-container .list-megamenu").each(function() {
        if ($(this).find(".megamenu-item").length) {
            $(this).parents(".nav-megamenu").prepend("<i class='fa fa-chevron-down mega-mn1'></i>");
        }
    });


    $(".megamenu-item-sub .submenu-right3").each(function() {
        let length = $(this).find("li").length;
        if (length) {
            $(this).prev("a").append("<div class='openc'></div>");

        }
    })
    $(".megamenu-item-sub .openc").click(function() {
        event.preventDefault();
        $(this).parents(".megamenu-item-sub").find(".submenu-right3").slideToggle();
        $(this).parents(".megamenu-item-sub").toggleClass('active');
    })

    $(".language_selected").click(function() {
        $(this).parent().find(".language_change").toggle();
    });

    $(".language_selected_mb").click(function() {
        $(this).parent().find(".language_change_mb").toggle();
    });

    $(".mega-mn1").click(function() {
        $(this).parents(".nav-megamenu").find(".megamenu-container").slideToggle();
    });

    $('.list-bar').click(function() {
        $('.menu_fix_mobile').toggleClass('main-menu-show');
        $(this).toggleClass('change');
    });

    $('.icon-menu').click(function() {
        $('.menu_fix_mobile').toggleClass('main-menu-show');
        $(this).toggleClass('change');
    });

    $('.close-menu #close-menu-button').click(function() {
        $(this).parent().parent().removeClass('main-menu-show');
        $('.list-bar').removeClass('change');
    });


    $('#quicksearch').click(function() {
        $('.search-tool').show();
    });

    $('.close_search').click(function() {
        $(this).parent().hide();
    });

    $('.menu_fix_mobile .mm1').click(function() {
        $(this).parent().find('.nav-sub').slideToggle();
        $(this).parent().toggleClass('active');
    });
    $('.menu_fix_mobile .mm2').click(function() {
        $(this).parent().find('.nav-sub-child').slideToggle();
        $(this).parent().toggleClass('active');
    });

    $('.show_search a').click(function() {
        event.preventDefault();
        $('#search').slideToggle();
    });
    $('.close-search').click(function() {
        event.preventDefault();
        $('#search').slideToggle();
    })
    $('.search_mobile').click(function() {
        $('#search').slideToggle();
    });

    $(document).on('click','.btn-timtua',function(){
        event.preventDefault();
       // console.log($('.show_search a:eq( index )'));
        $('.show_search a:eq(0)').trigger('click');
    });
    $(document).on('click','.js-btn-show-content',function(){
        event.preventDefault();
        $(this).next('.js-content').toggle();
        $(this).toggleClass('active');
    });

    $(document).on('click','.js-minus',function(){
        let parent= $(this).parents('.js-click-change-input');
        let val =parseInt(parent.find('.js-number').val());
        if(val<=0){
            alert('Số lượng phải lớn hơn hoặc bằng 0');
        }else{
            let newVal=val-1;
            parent.find('.js-number').val(newVal).trigger('change');
        }
    });

    $(document).on('click','.js-plus',function(){
        let parent= $(this).parents('.js-click-change-input');
        let val =parseInt(parent.find('.js-number').val());
        let newVal=val+1;
        parent.find('.js-number').val(newVal).trigger('change');
    });

    /*$(window).scroll(function(event) {
        var pos_body = $('html,body').scrollTop();
        if (pos_body > 205) {
            $('.header').addClass('fixed');
        } else {
            $('.header').removeClass('fixed');
        }
    });*/


    $('.faded').slick({
        dots: false,
        infinite: true,
        speed: 1000,
        autoplay: true,
        autoplaySpeed: 3000,
        fade: true,
        cssEase: 'linear'
    });
	$('.faded2').slick({
        dots: false,
        infinite: true,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 3000,
        fade: true,
        cssEase: 'linear'
    });

    $('.autoplay1').slick({
        dots: true,
        infinite: true,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 4000,
        // fade: true,
        cssEase: 'linear',
        arrows:true,
    });

    $('.slide_bannerhome').slick({
        dots: true,
        arrows:false,
        slidesToShow: 4,
        slidesToScroll: 4,
        autoplay: true,
        autoplaySpeed: 3500,
        responsive: [{
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                }
            }
        ]
    });

    $('.slide_pro_option').slick({
        dots: true,
        arrows:false,
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3500,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 640,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 551,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            }
        ]
    });



});
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

function myFunction2(x) {
    x.classList.toggle("change2");
}

    $(document).ready(function() {
        $('.info').matchHeight();
       
    })

    function footer() {
        let toggle = false;
        var images = document.querySelectorAll('.vote_like');
        images.forEach((element, index) => {
        var li = document.querySelectorAll('.vote_like')
        element.addEventListener('click', () => {
          toggle = !toggle;
          console.log(toggle)
          if (!toggle) {
              li[index].classList.remove('colora');
        }
        else {
              li[index].classList.add('colora');
          }
        })
      })
    }
    footer();
    
    // function fomr() {
    //     let toggle = false;
    //     var images = document.querySelectorAll('.reply');
    //     images.forEach((element, index) => {
    //       var li = document.querySelectorAll('.cmt_all')
    //       element.addEventListener('click', () => {
    //         toggle = !toggle;
    //         console.log(toggle)
    //         if (!toggle) {
    //             li[index].classList.remove('d-flex');
    //         }
    //         else {
    //             li[index].classList.add('d-flex');
    //         }
    //       })
    //     })
    //   }
    //   fomr();

      
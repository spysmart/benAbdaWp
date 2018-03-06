$(document).ready(function () {
    var slider = $('.bxslider').bxSlider({
        pagerCustom: '#bx-pager',
        mode: 'fade',
        auto: true,
        infiniteLoop:true,
        responsive:true,
        speed:2000,
        onSlideNext(){
            slider = new TimelineMax()
                .from('#bx-pager li a',.7 , {autoAlpha:0, ease: Power2.easeInOut,x:-70, scale:.9},0)
                .from('.bx-wrapper ul li img', .5, {autoAlpha:0, ease: Power2.easeInOut, x:240,},0)
        }
    });
    $('#sidebarCollapse').click (function () {
        $('.navmenu').toggleClass('active');
        $('.im-nav').css("display", "none");
    });
    $('#sidebarCollapse-x').on('click', function () {
        $('.navmenu').toggleClass('active');
    });
    function width(){
        var width = $( window ).width();
        var show = $('.show');
    }
    width();
    $(window).resize(function() {
        width();
        if ($(window).width() > 1444){
            $('nav').addClass('sidebar');
            $('nav').removeClass('navbar-fixed-top');
            $('nav').removeClass('navmenu');
        }
        else if($(window).width() <= 1444){
            $('nav').removeClass('sidebar');
            $('nav').addClass('navbar-fixed-top');
            $('nav').addClass('navmenu');
        }
        else if($(window).width() <=1024){
            //Section image  Animation
            for (i = 1; i < 4; i++) {
                var section1Controller = new ScrollMagic.Controller();
                var section_1 = new TimelineMax()
                    .from('#section-'+i+' .img-01',.5, {x:"-=100",autoAlpha:0,ease: Quad.easeOut},0)
                    .from('#section-'+i+' .img-02',.5, {x:"+=100",autoAlpha:0,ease:Quad.easeOut},0)
                    .from('#section-'+i+' .img-03',.5, {y:"+=100",autoAlpha:0},0)
                new ScrollMagic.Scene({
                    triggerElement:"#section-"+i,
                    duration: (($('#section-'+i).height())/3)+50,
                    reverse: true
                })
                    .setTween(section_1)
                    .addTo(section1Controller);
            }
            for (i = 1; i < 4; i++) {
                var TitleController = new ScrollMagic.Controller();
                var titleeffect = new TimelineMax()
                    .from('#section-'+i+' .ligne',.8, {width: 0,ease: Quad.easeOut},0)
                    .from('#section-'+i+' .titre',1, {x:"+=100",autoAlpha:0,ease: Quad.easeOut},0)
                    .from('#section-'+i+' .discription',1, {x:"+=100",autoAlpha:0,ease: Quad.easeOut},0)
                new ScrollMagic.Scene({
                    triggerElement:"#section-"+i,
                    duration: (($('#section-'+i).height())/4),
                    reverse: true
                })
                    .setTween(titleeffect)
                    .addTo(TitleController);
            }
        }
    });
    //navbar Animation
    $('.sidebar #sidebarCollapse').click(function(){
        $('.sidebar').toggleClass('active');
        var tl= new TimelineMax()
            .to(".sidebar.active", .5,{width:'100vw', ease: Power2.easeInOut},0)
            .to(".list-unstyled", .6, {x:'-150%', ease: Power2.easeInOut},.2)
            .staggerFromTo(".list-unstyled li a", .5, {opacity:0}, {opacity:1}, 0.2)
            .to(".im-nav", .6, {right: '0', display:'block', ease: Power2.easeInOut},.5)
    });
    $('.sidebar #sidebarCollapse-x').click(function(){
        tl2= new TimelineMax()
            .to(".im-nav", .3, {right: '-20', display:'none', ease: Power2.easeInOut},0)
            .to(".list-unstyled", .6, {x:'-50%', ease: Power2.easeInOut},.4)
            .staggerFromTo(".list-unstyled li a", 0.01, {opacity:1}, {opacity:0}, 0)
            .to(".sidebar", .5, {width:'90px', onComplete:toggle})
    });
    function toggle(){
        $('.sidebar').toggleClass('active');
    }
    var controller = new ScrollMagic.Controller({
        globalSceneOptions: {
            duration: $('section').height(),
            triggerHook: .025,
            reverse: true
        }
    });
    var scenes = {
        'intro': {
            'intro': 'intro-anchor'
        },
        'scene2': {
            'section-1': 'anchor1'
        },
        'scene3': {
            'section-2': 'anchor2'
        },
        'scene4': {
            'section-3': 'anchor3'
        }
    }
    for(var key in scenes) {
        if (!scenes.hasOwnProperty(key)) continue;
        var obj = scenes[key];
        for (var prop in obj) {
            if(!obj.hasOwnProperty(prop)) continue;
            new ScrollMagic.Scene({ triggerElement: '#' + prop })
                .setClassToggle('#' + obj[prop], 'active')
                .addTo(controller);
        }
    }
    //Animation scroll
    controller.scrollTo(function(target) {
        TweenMax.to(window, 1.7, {
            scrollTo : {
                y : target,
                autoKill : true // Allow scroll position to change outside itself
            },
            ease : Cubic.easeInOut
        });

    });
    //Scroll
    $('.side-menu').click(function(e){
        var target = e.target,
            id     = target.getAttribute('href');
        if(id !== null) {
            if(id.length > 0) {
                e.preventDefault();
                controller.scrollTo(id);
                if(window.history && window.history.pushState) {
                    history.pushState("", document.title, id);
                }
            }
        }
    });
// Mouse move img-deco effect
    $(document).mousemove(function(event){
        var xPos = (event.clientX/$(window).width());
        var yPos = (event.clientY/$(window).height());
        TweenLite.to('.img-deco', 0.6, {x:50*xPos, y:50*yPos, ease:Power1.easeOut});

    });

});
//Hover Box
var $item = $('.item'),
    boxhover;
$(document).ready(function() {
    $item.mouseenter(function() {
        var  bg  =  $(this).find('.bg')
        title =  $(this).find('h2')
        dec =   $(this).find('.dec')
        ligne =   $(this).find('.ligne')
        img =   $(this).find('img');
        boxhover = new TimelineMax()
            .to(bg,0.3, {width:'100%',ease:Power1.easeOut},0)
            .to(dec,0.3, {backgroundColor:"#000000",width:'-=50%',x:0,ease:Power1.easeOut},0)
            .to(ligne,0.3, {width:'-=30%',x:0,ease:Power1.easeOut},0)
            .to(title,0.3, {y:10,ease:Power1.easeOut},0)
            .to(img,0.6, {scale:"-=.01",ease:Power1.easeOut},0)
    }).mouseleave(function() {
        var  bg  =  $(this).find('.bg')
        title =  $(this).find('h2')
        dec =   $(this).find('.dec')
        ligne =   $(this).find('.ligne')
        img =   $(this).find('img');
        aaa = new TimelineMax()
            .to(bg,0.1, {width:'0%',ease:Power1.easeOut},0)
            .to(dec,0.1, {backgroundColor:"#40bf9c",width:'150',x:0,ease:Power1.easeOut},0)
            .to(ligne,0.1, {width:90,x:0,ease:Power1.easeOut},0)
            .to(title,0.1, {y:0,ease:Power1.easeOut},0)
            .to(img,0.3, {scale:"1",ease:Power1.easeOut},0)
    });
    // slider Animation
    slider = new TimelineMax()
        .from('#bx-pager li a',.5 ,{opacity:0 ,ease:Power1.easeOut,x:-70, scale:.7})
        .from('.bx-wrapper ul li img',.5 ,{opacity:0,ease:Power1.easeOut, scale:.9})
});














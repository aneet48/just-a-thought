jQuery(document).ready(function() {

  
  "use strict";

   BackToTop();
   MenuLoad();
   MenuSideLoad(); 
   AppearIteam();
   Sliders();
   PageLoad();
   ContactForm();
   SearchLoad();
   PostClick();
   PostClose();
   PostHover();
  //  initMasonry();

    
    
    
  
});

function initMasonry() {

    var masonryArchive = jQuery( '.archive-masonry' ),
      masonryArchiveOptions = {
        columns: '.archive-col',
        items: 'article'
      };

    jQuery( masonryArchive ).imagesLoaded( function() {
      jQuery( masonryArchive ).colcade( masonryArchiveOptions );
    } );
  }

function PostHover() {
    jQuery('.post-hover').on('mouseover', function() {
        var post_hover = jQuery(this).attr('hover-image');
        jQuery('#hoverImage').css('background-image','url('+ post_hover + ')' );
    });
}



function PostClick() {
  jQuery('.bg-image').on('click', function() {
      var bg_image = jQuery(this).attr('bg-image');
      jQuery('.hover-blog-image').css('background-image','url('+ bg_image + ')' );
      jQuery('html, body').animate({scrollTop : 0},400);
      jQuery('.hover-blog-content .entry-title,.hover-blog-content .entry-meta').fadeOut(0);
      jQuery('.blog-post').fadeOut(100, function() {
          jQuery('#postid').fadeIn();
          jQuery('.entry-share-div').fadeIn();
      });
      return false;  
  });

  jQuery('.post-detail').on('click', function() {
      jQuery('.blog-post').fadeOut(100, function() {
          jQuery('#postid').fadeIn();
      });
     return false;  
  });
}

function PostClose() {
  jQuery('.close-single-blog').on('click', function() {
      
      jQuery('.hover-blog-content .entry-title,.hover-blog-content .entry-meta').fadeIn(200);
      jQuery('.blog-post').fadeIn(100, function() {
          jQuery('#postid').fadeOut();
          jQuery('.entry-share-div').fadeOut(0);
      });
      return false;  
  });
}

function SearchLoad() {
     jQuery('.search-icon').on('click', function() {
      jQuery('.search-section').fadeIn();    
      return false;  
    });
    jQuery('.close-search').on('click', function() {
      jQuery('.search-section').fadeOut();  
      return false;    
    });
}


/*--------------------------------------------------
Function Back To Top
---------------------------------------------------*/
  
  function BackToTop() {
    
    jQuery('.back-top').on('click', function() {
        jQuery('html, body').animate({scrollTop : 0},800);
        return false;
    });
    
    
  
  }//End Back To Top


/*--------------------------------------------------
Function Slider
---------------------------------------------------*/

  function Sliders() {

      jQuery('.slider-5').owlCarousel({
          loop:true,
          margin:0,
          nav:true,
          autoplay:true,  
          autoplayTimeout:9000, 
          dots:false,
          navText:['<img src="images/arrow-left.png" alt="left-arrow" />','<img src="images/arrow.png" alt="right=arrow" />'],
          responsive:{
              320:{
                  items:1
              },
              480:{
                  items:2
              },
              1200:{
                  items:3
              }
          }
      })
    
      jQuery('.slider-1').owlCarousel({
          loop:true,
          margin:0,
          nav:true,
          autoplay:true,  
          autoplayTimeout:9000, 
          dots:false,
          navText:['<img src="images/arrow-left.png" alt="left-arrow" />','<img src="images/arrow.png" alt="right=arrow" />'],
          responsive:{
              0:{
                  items:1
              },
              600:{
                  items:2
              },
              1000:{
                  items:3
              }
          }
      })

      jQuery('.slider-8').owlCarousel({
          animateOut: 'fadeOut',
          loop:true,
          margin:0,
          nav:false,
          autoplay:false,  
          autoplayTimeout:6000, 
          dots:false,
          
          responsive:{
              0:{
                  items:1
              },
              600:{
                  items:1
              },
              1000:{
                  items:1
              }
          }
      })

      jQuery('.slider-7').owlCarousel({
          animateOut: 'fadeOut',
          loop:true,
          margin:0,
          nav:false,
          autoplay:false,  
          autoplayTimeout:6000, 
          dots:true,
          responsive:{
              0:{
                  items:1
              },
              600:{
                  items:1
              },
              1000:{
                  items:1
              }
          }
      })

      jQuery('.slider-4').owlCarousel({
          animateOut: 'fadeOut',
          loop:true,
          margin:0,
          nav:true,
          autoplay:false,  
          autoplayTimeout:6000, 
          dots:true,
          // navText:['<img src="images/left-arrow-t.png" alt="left-arrow" />','<img src="images/right-arrow-t.png" alt="right=arrow" />'],
          responsive:{
              0:{
                  items:1
              },
              600:{
                  items:1
              },
              1000:{
                  items:1
              }
          }
      })

      jQuery('.slider-2').owlCarousel({
          loop:true,
          margin:0,
          nav:true,
          autoplay:true,  
          autoplayTimeout:6000, 
          dots:true,
          navText:['<img src="images/arrow-white-2.png" alt="left-arrow" />','<img src="images/arrow-white.png" alt="right=arrow" />'],
          responsive:{
              0:{
                  items:1
              },
              600:{
                  items:1
              },
              1000:{
                  items:1
              }
          }
      })

       jQuery('.slider-3').owlCarousel({
          loop:true,
          margin:0,
          nav:false,
          autoplay:true,  
          autoplayTimeout:11000, 
          dots:false,
          responsive:{
              0:{
                  items:1
              },
              600:{
                  items:2
              },
              1000:{
                  items:3
              }
          }
      })

      jQuery('.slider-6').owlCarousel({
          loop:true,
          margin:20,
          nav:true,
          autoplay:false, 
          center: true, 
          autoplayTimeout:6000, 
          dots:true,
          navText:['<img src="images/arrow-white-2.png" alt="left-arrow" />','<img src="images/arrow-white.png" alt="right=arrow" />'],
          
          responsive:{
              0:{
                  items:1
              },
              600:{
                  items:1
              },
              1300:{
                  items:2
              }
          },
         //remove class active
         afterAction: function(el){
   //remove class active
   this
   .jQueryowlItems
   .removeClass('active')

   //add class active
   this
   .jQueryowlItems //owl internal jQuery object containing items
   .eq(this.currentItem + 1)
   .addClass('current')    
    } 

      })

      
 
  }


/*--------------------------------------------------
Function Appear Items
---------------------------------------------------*/
function AppearIteam() {    
    
    setTimeout(function(){
      jQuery('.has-animation').each(function() { 
        jQuery(this).appear(function() {       
          jQuery(this).delay(jQuery(this).attr('data-delay')).queue(function(next){
            jQuery(this).addClass('animate-in');
            next();
          });           
        });   
      });
    } , 250 );    
  
  }//End AppearIteam

/*--------------------------------------------------
Function Menu Load
---------------------------------------------------*/ 

function MenuLoad() {
    // mobile menu
    jQuery('.menu-click').unbind('click').bind('click', function() {
        console.log('ss')      
        jQuery(this).toggleClass('open');      
        jQuery('#main-menu').slideToggle();
        return false;
    });

    

    var jQuerymenu = jQuery('#main-menu');
    
    // add classes
    jQuerymenu.find('li').each(function() {
      if(jQuery(this).children('ul').length) {
        jQuery(this).addClass('has-submenu');
        jQuery(this).find('>a').after('<span class="submenu-toggle"></span>');
      }
    });
    
    var jQuerysubmenuTrigger = jQuery('.has-submenu > .submenu-toggle');
    // submenu link click event
    jQuerysubmenuTrigger.on( "click", function() {
      jQuery(this).parent().toggleClass('active');
      jQuery(this).siblings('ul').toggleClass('active');
    });


}

function MenuSideLoad() {
    jQuery('#side-click').on('click', function() {      
        jQuery(this).toggleClass('open');      
        jQuery('.overlay-section').toggleClass('active'); 
        jQuery('.menu-overlay').toggleClass('active'); 
        return false;
    });
}

/*--------------------------------------------------
Function Page Load
---------------------------------------------------*/

  function PageLoad() {
    jQuery(window).load(function() {
          jQuery("body").addClass('loaded');
    });
  }


/*--------------------------------------------------
Function Contact  Form
---------------------------------------------------*/

function ContactForm() {
 
    
  jQuery("body").on("click", 'input[type="submit"]', function() {
        
    jQueryform = jQuery(this).parents('form');
    form_action = jQueryform.attr('target');
    form_class = jQueryform.attr('class');
    id = jQueryform.attr('id');
    
    if (form_class == 'checkform') {
      
      var control = true;
      jQueryform.find('label.req').each(function(index){
                        
        var name = jQuery(this).attr('for');
        defaultvalue = jQuery(this).html();
        value = jQueryform.find('.'+name).val();
        formtype = jQueryform.find('.'+name).attr('type');
        
        
        if (formtype == 'radio' || formtype == 'checkbox') {
          if (jQuery('.'+name+':checked').length == 0) { jQuery(this).siblings('div').find('.checkfalse').fadeIn(200); control = false;  } 
          else { jQuery(this).siblings('div').find('.checkfalse').fadeOut(200); }
        
        } else if(name == 'email') {
          var re = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}jQuery/;
          if (!value.match(re)) { 
              jQueryform.find('.'+name).addClass('false'); jQueryform.find('.'+name).parent('.form-row').addClass('false'); control = false; 
            } else { 
              jQueryform.find('.'+name).removeClass('false'); jQueryform.find('.'+name).parent('.form-row').removeClass('false'); 
            }
        } else {
          if (  value == '' || 
              value == defaultvalue
              ) 
            { 
              jQueryform.find('.'+name).addClass('false'); jQueryform.find('.'+name).parent('.form-row').addClass('false'); control = false; 
  
            } else { 
              jQueryform.find('.'+name).removeClass('false'); jQueryform.find('.'+name).parent('.form-row').removeClass('false');
            }
        }
        
      });
      
      
      if (!control) { 
        jQuery("#form-note").fadeIn(200);
        return false; 
      
      } else {
        jQuery("#form-note").fadeOut(200);
        
        if (form_action && form_action !== '') {
          var str = jQueryform.serialize();
          
             jQuery.ajax({
             type: "POST",
             url: form_action,
             data: str,
             success: function(msg){
                jQuery("#form-note").html(msg);
                jQuery("#form-note").delay(200).fadeIn(200);
             }
        });
        return false;
        } else {
        return true;
        }
        
      } // END else {
    
    }
  });

}
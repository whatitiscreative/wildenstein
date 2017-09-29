// Main Scripts

(function($) {
    
        $(window).load(function() {
            window.setTimeout(function() {
              $('.loading').fadeOut(800);
              $('body').removeClass('overflow-hidden');
            }, 1500);
          });
    
            //  Init filter drawer
    
            $(document).ready(function() {
                $('.trigger-drawer').on('click', function(){
                    $('.filter-drawer').slideToggle(300);
                    $(this).toggleClass('active');
                })
            });
    
            $(document).ready(function() {
                if($('.news-slider')) {
                    $('.news-slider').slick({
                        variableWidth: true,
                        infinite: false,
                        slidesToShow: 1,
                        responsive: [
                            {
                              breakpoint: 991,
                              settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                infinite: true,
                                variableWidth: false,
                                centerMode: true,
                                adaptiveHeight: true
                              }
                            }
                        ]
                        
                    });
                }
            });

            $(document).ready(function() {
                $('.trigger-contact-modal').on('click', function(){
                    $('.contact-modal').addClass('active');
                })

                $('.close').on('click', function(){
                    $('.contact-modal').removeClass('active');
                })
            });
    
    
            $(document).ready(function() {
                $( ".nav-items" ).prepend( $('.logo, .nav-controls') );
                
                $('.nav-controls').on('click', function(){
                    $(this).toggleClass('active');
                    $('.nav-items').toggleClass('active');
                    $('.nav-items li').fadeToggle(400);                    
                })
            });      
            
            $(document).ready(function() {
                $('a[rel="relativeanchor"]').click(function(){
                    $('html, body').animate({
                        scrollTop: $( $.attr(this, 'href') ).offset().top - 110
                    }, 500);
                    return false;
                }); 
            });
    
        
        /*
        * alm_adv_filter()
        * https://connekthq.com/plugins/ajax-load-more/examples/filtering/advanced-filtering/
        *
        */	
     
        var alm_is_animating = false;
        
           function alm_adv_filter(){
           
               if(alm_is_animating){
                   return false; // Exit if filtering is still active 
               }
               
               alm_is_animating = true;
               
               var obj= {}, 
                    count = 0;
               
               // Loop each filter menu
               $('.advanced-filter-menu').each(function(e){
                   var menu = $(this),
                       type = menu.data('type'), // type of filter elements (checkbox/radio/select)
                       parameter = menu.data('parameter'), // category/tag/year
                       value = '',
                       count = 0;
                   
                   // Loop each item in the menu      	
                   if(type === 'checkbox' || type === 'radio'){ // Checkbox or Radio
                       $('input:checked', menu).each(function(){
                           count++;
                           var el = $(this);
                       
                           // Build comma separated string of items
                           if(count > 1){
                               value += ','+el.val();
                           }else{
                               value += el.val();
                           }	
                       });
                   }
               
                   if(type === 'select'){ // Select
                       var select = $(this);
                       value += select.val();
                   }
               
                   obj[parameter] = value; // add value(s) to obj
                   
               });
                              
               var data = obj;
               console.log('Data:', data);
               $.fn.almFilter('fade', '300', data); // Send data to Ajax Load More
           }
    
            // Update Filters everytime there is an update to the inputs    
           $('input').on('change', alm_adv_filter);     
           
            // Update filters when button is cliked    
            //  $('#apply-filters').on('click', alm_adv_filter);
           
           /*
           * almFilterComplete()
           * Callback function sent from core Ajax Load More
           *
           */
           $.fn.almFilterComplete = function(){      
               alm_is_animating = false; // clear animating flag
           };
    
        $(document).on('scroll', function(){
            if
          ($(document).scrollTop() > 10){
              $('nav, .nav-items').addClass('shrink');
            }
            else
            {
                $('nav, .nav-items').removeClass('shrink');
            }
        });
    
        //    $( document ).ready(function() {
        //         $('.masonry-layout').masonry({
        //             itemSelector: '.grid-item',
        //             horizontalOrder: true                
        //           });
        //     });
    
        
    })(jQuery);

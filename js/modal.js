// Main Scripts

(function($) {
    $(document).ready(function() {
        function getPostAjax(postId) {
            $.ajax({
                type: 'POST',
                url: ajaxUrl,
                data: { 
                    'action': 'get_post_ajax',
                    id: postId,
                },
                success: function(response) {
                    // parse json
                    response = JSON.parse(response);

                    // view the whole response if it helps
                    console.log('The Ajax Response:', response);

                    if(response.type == 'success') {
                        // trigger the modal to open here however you want. this is just an example
                        // $('.main-modal').html(response.result);

                        // show modal and remove loader
                        $('.main-modal').show();
                        window.setTimeout(function() {
                            $('.loading').fadeOut(800);
                            $('body').removeClass('overflow-hidden');
                        }, 1500);

                        if(response.post.post_type == 'notableworks') {
                            $('.main-modal.notable-works .notable-works-content').html('<div class="nw-modal-img-wrapper"><img class="nw-modal-img" src="' + response.image + '"></div>' + '<label>' + response.artist_name + '</label>' + ', ' + '<label class="main-label">' + response.title + '</label>'+ '<label>' + ', ' + response.supporting_details + '</label>');
                        }

                        if(response.post.post_type == 'artist') {
                            // add the data to the modal
                            $('.main-modal .artist-bio').html('<h3>' + response.first_name + ' ' + response.last_name + '</h3>'  + '<label>' + response.nationality + ': ' + response.date_of_birth +  '-' + response.date_of_death + '</label>' + '<p class="small">' + response.bio + '</p>');

                            // destroy previous slider if there was one
                            if($('.slick-initialized').length != 0) {
                                console.log('Destroying Slick Slider');
                                $('.main-modal .gallery-slider').slick('unslick');
                                
                                // remove anything currently in the gallery-slider
                                $('.main-modal .gallery-slider').html('');
                            }

                            // loop through gallery and add each image and data as a slide
                            response.artist_gallery.forEach(function(slide) {
                                // console.log('Slide Data:', slide);
                                $('.main-modal .gallery-slider').append('<div><div class="bg-image" style="background-image: url('+ slide.image +')"></div>' + '<label class="main-label">' + slide.title + ', ' + '<span>' + slide.location + '</span>' + '</label></div>');
                            }, this);

                            // reinstantiate the slider
                            $('.main-modal .gallery-slider').slick({
                                dots: true
                            });
                        }
                    
                        if(response.post.post_type == 'publications') {

                        // var output ='';
                        //    output = '<div class="main-modal">';
                        //      output += '<div class="container">';
                        //         output += '<section class="single-publications-content">';
                        //             output += '<div class="row around-xs">';
                        //                 output += '<div class="col-xs-12 col-sm-5">';
                        //                     output += '<div class="publications-img">';
                        //                         output += '<div class="gallery-slider">';
                        //                             output += '<div class="bg-image" style="background-image: url('+ response.publication_image +')"></div>';
                        //                         output += '</div>';
                        //                     output += '</div>';
                        //                 output += '</div>';
                                        
                        //                 output += '<div class="col-xs-12 col-sm-5">';
                        //                     output += '<div class="publications-content">';
                        //                         output += '<label class="pub_date">'+ response.publication_date +'</label>';
                        //                         output += ' <h3>'+response.publication_title +'</h3>';
                        //                         output += '<label class="pub-border">'+response.publication_subtitle+'</label>';
                        //                         output += '<label class="pub-font">'+ response.publication_brief+'</label>';
                        //                         output += '<label class="pub-font"> '+'Published '+' '+ response.publication_date +''+', '+' '+response.no_of_pages+' '+' pages'+' </label>';
                        //                     output += '</div>';
                        //                 output += '</div>';
                        //             output += '</div>';
                        //         output += '</section>';
                        //       output += '</div>'
                        //      output += '<div class="modal-close">CLOSE</div>';
                        //     output += '</div>';
                        
                        
                        //     $('.main-modal.publications').html(output);

                        console.log('Publications Response:', response);
                           
                           //---------Publication Image Slider---------//
                            // add the data to the modal
                            $('.main-modal .publications-content').html('<label class="pub_date">'+ response.publication_date +'</label>' + ' <h3>'+response.publication_title +'</h3>' + '<label class="pub-border">'+response.publication_subtitle+'</label>' + '<p class="pub-font">'+ response.publication_brief+'</p>' + '<label class="pub-font"> '+'Published '+' '+ response.publication_date +''+', '+' '+response.no_of_pages+' '+' pages'+' </label>');
                            // destroy previous slider if there was one
                            if($('.slick-initialized').length != 0) {
                                console.log('Destroying Slick Slider');
                                $('.main-modal .gallery-slider').slick('unslick');
                                
                                // remove anything currently in the gallery-slider
                                $('.main-modal .gallery-slider').html('');
                            }
                            // loop through gallery and add each image and data as a slide
                            response.image_gallery.forEach(function(slide) {
                                // console.log('Slide Data:', slide);
                                $('.main-modal .gallery-slider').append('<div><div class="bg-image" style="background-image: url('+ slide.image +')"></div>' + '<label class="main-label">' + slide.title + ',' + slide.location + '</label></div>');
                            }, this);

                            // reinstantiate the slider
                            $('.main-modal .gallery-slider').slick({
                                dots: true
                            });
                        
                        }

                    } else if(response.type == 'error') {
                        $('.main-modal').html('post not found');
                        console.log('Ajax Error Response:', response.type);
                    }
                },
                error: function(response) {
                    // parse json
                    response = JSON.parse(response);

                    console.log('Ajax Error Response:', response.type);
                },
            });
        }   
    

        $(document).on('click', '.trigger-modal', function() {
            var id = $(this).data('id');
            console.log('Clicked Image With ID:', id);

            // get post data
            getPostAjax(id);

            // show loader
            $('.loading').fadeIn(100);
            $('body').addClass('overflow-hidden');
        });
    });

    $('.modal-close').on('click', function() {
        $('.main-modal').fadeOut(800);
    });
         
})(jQuery);

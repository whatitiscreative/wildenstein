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
                            $('.main-modal .artist-bio').html('<h3>' + response.artist_name + '</h3>' + '<label>' + response.nationality + '</label>' + '<label>' + response.date_of_birth + '</label>' + '<label>' + response.date_of_death + '</label>' + '<p class="small">' + response.bio + '</p>');

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
                                $('.main-modal .gallery-slider').append('<div><div class="bg-image" style="background-image: url('+ slide.image +')"></div>' + '<label class="main-label">' + slide.title + '</label></div>');
                            }, this);

                            // reinstantiate the slider
                            $('.main-modal .gallery-slider').slick({
                                dots: true
                            });
                        }
                    
                        if(response.post.post_type == 'publications') {
                            $('.main-modal .publications .publications-content').html('<div class="publications-modal-img-wrapper"><img src="" class="publications-modal-img" style="background-image: url('+ response.publication_image +')"></div>' + '<h3>' + response.publication_title + '</h3>'+ '<label class="main-label">' + response.publication_subtitle + '</label>' + ', ' + '<label>'  + response.publication_brief + '</label>'+', '+'<label>'  + response.publication_date + '</label>'+ '<label>' + response.no_of_pages +'</label>');
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

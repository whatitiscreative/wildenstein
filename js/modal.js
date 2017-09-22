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
                    
                        // list out your variables from the response
                        console.log('Nationality:', response.nationality);
                        console.log('Bio:', response.bio);
                        console.log('Artist Gallery:', response.artist_gallery);
                        console.log('Artist Name:',response.artist_name);
                        console.log('Page Title',response.page_title);
                        console.log('Overview Text', response.artist_overview_text);
                        console.log('Image', response.image);
                        console.log('lable:', response.title);
                        console.log('Publications Title:',response.publication_title);
                        console.log('Publications subtitle',response.publication_subtitle);
                        console.log('Publications Brief', response.publication_brief);
                        console.log('Publications Date', response.publication_date);
                        console.log('No of Pages', response.no_of_pages);


                        

                        // add the data to the modal (just an example)
                        $('.main-modal .artist-bio').html('<h3>' + response.artist_name + '</h3>' + '<label>' + response.nationality + '</label>' + '<label>' + response.date_of_birth + '</label>' + '<label>' + response.date_of_death + '</label>' + '<p class="small">' + response.bio + '</p>');
                        
                        $('.main-modal.notable-works .notable-works-content').html('<div class="bg-image" style="background-image: url('+ response.image +')"></div>' + '<label>' + response.artist_name + '</label>' + ', ' + '<label class="main-label">' + response.title + '</label>'+ '<label>' + ', ' + response.supporting_details + '</label>');
                        
                        $('.main-modal.publications .publications-content').html('<label class="main-label">' + response.publication_title + '</label>'+ '<p class="small">' + response.publication_subtitle, response.publication_brief + '</p>' + '<label class="main-label">' + response.publication_date , response.no_of_pages + '</label>');
                        

                        response.artist_gallery.forEach(function(slide) {
                            console.log('Slide Data:', slide);
                            $('.main-modal .gallery-slider').append('<div><div class="bg-image" style="background-image: url('+ slide.image +')"></div>' + '<label class="main-label">' + slide.title + '</label></div>');
                        }, this);
                        

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
            getPostAjax(id);

            setTimeout(function () {
                $('.main-modal').fadeIn(300)
            }, 500);
        });
    });

    $('.modal-close').on('click', function() {
        $('.main-modal').fadeOut(300);
    })
         
})(jQuery);

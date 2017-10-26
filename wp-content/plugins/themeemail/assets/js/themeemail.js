/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


jQuery(function ($) {
    var frame,elemento = '';
    $('.bannerimage').on('click', function (event) {
       
        event.preventDefault();
         elemento = $(event.target);
        
        // If the media frame already exists, reopen it.
        if (frame) {
            frame.open();
            return;
        }

        // Create a new media frame
        frame = wp.media({
            title: 'Select or Upload Media Of Your Chosen Persuasion',
            button: {
                text: 'Use this media'
            },
            multiple: false  // Set to true to allow multiple files to be selected
        });


        // When an image is selected in the media frame...
        frame.on('select', function () {

            // Get media attachment details from the frame state
            var attachment = frame.state().get('selection').first().toJSON();

            console.log(attachment);
            console.log(elemento.attr('src'));
            elemento.attr('src',attachment.url);

            // Send the attachment id to our hidden input
            elemento.parent().find('.urlimagem').val( attachment.url );



        });

    });
});
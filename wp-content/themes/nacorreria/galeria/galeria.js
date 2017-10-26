/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(function($){
    
    $('.custom-img-container').on('mouseover','.box-galeria',function(){
        $('.delete-custom-img').hide();
        $(this).find('.delete-custom-img').show();
    });
    
    $('.custom-img-container').on('mouseout','.box-galeria',function(){
        
        $(this).find('.delete-custom-img').hide();
    });

  // Set all variables to be used in scope
  var frame,
      metaBox = $('#upload_meta_galeria.postbox'), // Your meta box id here
      addImgLink = metaBox.find('.upload-custom-img'),
      delImgLink = metaBox.find( '.delete-custom-img'),
      imgContainer = metaBox.find( '.custom-img-container'),
      imgIdInput = metaBox.find( '.custom-img-id' );
  
  // ADD IMAGE LINK
  addImgLink.on( 'click', function( event ){
    
    event.preventDefault();
    
    // If the media frame already exists, reopen it.
    if ( frame ) {
      frame.open();
      return;
    }
    
    // Create a new media frame
    frame = wp.media({
      title: 'Select or Upload Media Of Your Chosen Persuasion',
      button: {
        text: 'Use this media'
      },
      multiple: true  // Set to true to allow multiple files to be selected
    });

    
    // When an image is selected in the media frame...
    frame.on( 'select', function() {
      
      // Get media attachment details from the frame state
      var attachment = frame.state().get('selection').toJSON();
       
     console.log(attachment);
           var i;

           for (i = 0; i < attachment.length; ++i) {
               // Send the attachment URL to our custom image input field.
                var d = $( "<div class='box-galeria'></div>" );               
               d.append( '<img src="'+attachment[i].url+'" alt="" style="max-width:100%;position:relative;"/>' );
               d.append( '<input class="custom-img-id" name="galeria-img-id[]" type="hidden" value="'+attachment[i].id+'" />' );
               d.append( '<a class="delete-custom-img" href="javascript:void(0)">Delete</a>' ).children('.delete-custom-img').click(function() {
                    $(this).parents('.box-galeria').find('.custom-img-id').val('');
                    $(this).parents('.box-galeria').html( '' );
               });
               imgContainer.append(d);
               
           }
                      

     
    });

    // Finally, open the modal on click
    frame.open();
  });
   
   $('.delete-custom-img').click(function() {
                    $(this).parents('.box-galeria').find('.custom-img-id').val('');
                    $(this).parents('.box-galeria').html( '' );
               });

});


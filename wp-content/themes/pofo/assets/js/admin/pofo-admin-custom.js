!function($) {
	"use strict";

    /* For Mega Menu*/
    $( document ).ready(function() {
      
        // show or hide megamenu fields on parent and child list items
        pofo_menu_item_mouseup_event();
        pofo_megamenu_status_update();
        pofo_update_megamenu_field_classes();
        
        /* On mouseup event check megamenu status and add class or remove class */
        function pofo_menu_item_mouseup_event(){
            $( document ).on( 'mouseup', '.menu-item-bar', function( event, ui ) {
                if( ! $( event.target ).is( 'a' )) {
                    setTimeout( pofo_update_megamenu_field_classes, 300 );
                }
            });
        }
          
        /* Check if Mega Menu is enable for parent */
        function pofo_megamenu_status_update(){

            $( document ).on( 'click', '.edit-menu-item-pofo-mega-menu-item-status', function() {
              
                var parent_li_item = $( this ).parents( 'li.menu-item:eq( 0 )' );

                if( $( this ).is( ':checked' ) ) {
                    parent_li_item.addClass( 'pofo-megamenu-active' );
                } else  {
                    parent_li_item.removeClass( 'pofo-megamenu-active' );
                }
                pofo_update_megamenu_field_classes();
            });
        }
        
        /* Check onload which menu is checked and add class "pofo-megamenu-active" */
        function pofo_update_megamenu_field_classes(){
            var pofo_menu_li_items = $( '.menu-item');
            
            pofo_menu_li_items.each( function( i )   {
                var pofo_megamenu_status = $( '.edit-menu-item-pofo-mega-menu-item-status', this );
                
                if( ! $( this ).is( '.menu-item-depth-0' ) ) {
                    var check_item = pofo_menu_li_items.filter( ':eq(' + (i-1) + ')' );

                    if( check_item.is( '.pofo-megamenu-active' ) ) {
                        pofo_megamenu_status.attr( 'checked', 'checked' );
                        $( this ).addClass( 'pofo-megamenu-active' );
                    } else {
                        pofo_megamenu_status.attr( 'checked', '' );
                        $( this ).removeClass( 'pofo-megamenu-active' );
                    }
                } else {
                    if( pofo_megamenu_status.attr( 'checked' ) ) {
                        $( this ).addClass( 'pofo-megamenu-active' );
                    }
                }
            });
        }

        var counter = 1;
        $( "#menu-to-edit .pofo-menu-icons" ).each(function( index ) {
            var MenuIconOptions = $(this).html();
            $(this).parent().find(".menu-icon-item").append( MenuIconOptions );
            $(this).remove();
            counter++;
        });

        function MenuIconCallback( state ) {
            if( !state.id ) {
                return state.text;
            }
            var icontext = state.text;
            if( icontext.indexOf( "fa-" ) >= 0 ) {
                var $state = $( '<span>' + '<i class="'+state.element.value.toLowerCase()+'"></i>' + icontext + '</span>' );
            } else {
                var $state = $( '<span>' + '<i class="'+state.element.value.toLowerCase()+'"></i>' + icontext + '</span>' );
            }
            return $state;
        };

        $( ".menu-icon-item-wrapper" ).select2({
            templateResult: MenuIconCallback,
            templateSelection: MenuIconCallback
        });

        /* Customizer image selector */
        $( ".pofo-image-select img" ).on( "click", function() {
            var current_click = $(this);
            current_click.parent().parent().parent().find('.active').removeClass('active');
            current_click.parent().parent().addClass('active');
        });

        /* jQuery For Instagram Widget */
        $(document).on('change','.instagram-style-type select',function(){
            var Current = $(this);
            var SelectedValue = $(this).val();
            Current.parent().parent().find('.instagram-select-option').hide();
            $('.instagram-'+SelectedValue+'-option').show();
        });

        /* jQuery Enable Click Event For Switch in customizer */
        $('li.pofo-switch-option').on( 'click', function(){
            var currentParent = $(this).parent();
            var currentParents = $(this).parent().parent();
            currentParent.find('.active').removeClass('active');
            $(this).addClass('active');
        });
    });

    $( document ).ajaxComplete(function() {

        var counter = 1;
        $( "#menu-to-edit .pofo-menu-icons" ).each(function( index ) {
            var MenuIconOptions = $(this).html();
            $(this).parent().find(".menu-icon-item").append( MenuIconOptions );
            $(this).remove();
            counter++;
        });

        function MenuIconCallback( state ) {
            if( !state.id ) {
                return state.text;
            }
            var icontext = state.text;
            if( icontext.indexOf( "fa-" ) >= 0 ) {
                var $state = $( '<span>' + '<i class="'+state.element.value.toLowerCase()+'"></i>' + icontext + '</span>' );
            } else {
                var $state = $( '<span>' + '<i class="'+state.element.value.toLowerCase()+'"></i>' + icontext + '</span>' );
            }
            return $state;
        };

        $( ".menu-icon-item-wrapper" ).select2({
            templateResult: MenuIconCallback,
            templateSelection: MenuIconCallback
        });

    });

    $( document ).on( 'click', '.pofo_upload_button_category', function(event) {
            var file_frame;
          var button = $(this);

          var button_parent = $(this).parent();
        var id = button.attr('id').replace('_button_category', '');
          event.preventDefault();
          

          // If the media frame already exists, reopen it.
          if ( file_frame ) {
            file_frame.open();
            return;
          }

          // Create the media frame.
          file_frame = wp.media.frames.file_frame = wp.media({
            title: $( this ).data( 'uploader_title' ),
            button: {
              text: $( this ).data( 'uploader_button_text' ),
            },
            multiple: false  // Set to true to allow multiple files to be selected
          });

          // When an image is selected, run a callback.
          file_frame.on( 'select', function() {
            // We set multiple to false so only get one image from the uploader
            var full_attachment = file_frame.state().get('selection').first().toJSON();

            var attachment = file_frame.state().get('selection').first();

            var thumburl = attachment.attributes.sizes.thumbnail;
            var thumb_hidden = button_parent.find('.upload_field').attr('name');

            if ( thumburl || full_attachment ) {
            button_parent.find("#"+id).val(full_attachment.url);
            button_parent.find("."+thumb_hidden+"_thumb").val(full_attachment.url);
            
            button_parent.find(".upload_image_screenshort").attr("src", full_attachment.url);
            button_parent.find(".upload_image_screenshort").slideDown();
          }
          });

          // Finally, open the modal
          file_frame.open();
      });
      
      // Remove button function to remove attach image and hide screenshort Div.
      $( document ).on( 'click', '.pofo_remove_button_category', function(event) {
        var remove_parent = $(this).parent();
        remove_parent.find('.upload_field').val('');
        remove_parent.find('input[type="hidden"]').val('');
        remove_parent.find('.upload_image_screenshort').slideUp();
      });

      // On page load add all image url to show in screenshort.
      $('.upload_field').each(function(){
        if($(this).val()){
          $(this).parent().find('.upload_image_screenshort').attr("src", $(this).parent().find('input[type="hidden"]').val());
        }else{
          $(this).parent().find('.upload_image_screenshort').hide();
        }
      });

      /* multiple image upload */
      
        $( document ).on( 'click', '.pofo_upload_button_multiple_category', function(event) {
              var file_frame;
            var button = $(this);

            var button_parent = $(this).parent();
          var id = button.attr('id').replace('_button_category', '');
          var app=[];
            event.preventDefault();
            

            // If the media frame already exists, reopen it.
            if ( file_frame ) {
              file_frame.open();
              return;
            }

            // Create the media frame.
            file_frame = wp.media.frames.file_frame = wp.media({
              title: $( this ).data( 'uploader_title' ),
              button: {
                text: $( this ).data( 'uploader_button_text' ),
              },
              multiple: true  // Set to true to allow multiple files to be selected
            });

            // When an image is selected, run a callback.
            file_frame.on( 'select', function() {

              var thumb_hidden = button_parent.find('.upload_field_multiple').attr('name');
             
              var selection = file_frame.state().get('selection');
              var app=[];
                selection.map( function( attachment ) {
                var attachment = attachment.toJSON();
                button_parent.find('.multiple_images').append( '<div id="'+attachment.id+'"><img src="'+attachment.url+'" class="upload_image_screenshort_multiple" alt="" style="width:100px;"/><a href="javascript:void(0)" class="remove">remove</a></div>' );
              });
            });
            // Finally, open the modal
            file_frame.open();
        });

        $(".button-primary").on('click',function(){
          var pr_div;
          $('.multiple_images').each(function(){
            if($(this).children().length > 0){
              var attach_id = [];
              var pr_div = $(this).parent();
              $(this).children('div').each(function(){
                  attach_id.push($(this).attr('id'));            
              });
              
              pr_div.find('.upload_field_multiple').val(attach_id);
            }else{
              $(this).parent().find('.upload_field_multiple').val('');
            }
          });   
        });

        $(".multiple_images").on('click','.remove', function() {
          $(this).parent().slideUp();
          $(this).parent().remove();
        });

        /* Pofo Licence - START CODE */
        $( '.pofo-licence' ).on( 'click', function(e) {
            e.preventDefault();

            if( $( this ).attr( 'disabled' ) ){
                return false;
            }

            var currentVar = $(this);
            currentVar.parent().find( 'img' ).css("display","inline-block");
            var data = {
                action: 'pofo_active_theme_licence',
            };

            var request = $.getJSON({
                url: ajaxurl,
                type: "POST",
                data: data
            });
            request.success(function(response) {
                response && response.status ? window.location = response.url : alert( pofo_licence_messages.response_failed );
            });

            request.fail(function(jqXHR, textStatus) {
                alert( 'Request failed: ' + textStatus );
            });

        });

        /* Pofo Licence - END CODE */

        /* Hide Licence Activation Message Cookie - START CODE */

        var PofoSetCookie = function ( c_name, value, exdays ) {
          var exdate = new Date();
          exdate.setDate( exdate.getDate() + exdays );
          var c_value = encodeURIComponent( value ) + ((null === exdays) ? "" : "; expires=" + exdate.toUTCString());
          document.cookie = c_name + "=" + c_value;
        };
        $( document ).on( 'click', '.pofo-license-activation-message .notice-dismiss', function( event ) {
          event.preventDefault();
          PofoSetCookie( 'pofo_hide_activation_message', 'hide', 30 );
        } );

        /* Hide Licence Activation Message Cookie - END CODE */
    
}(window.jQuery);
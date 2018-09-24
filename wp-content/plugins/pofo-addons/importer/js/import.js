!function($) {
	
    "use strict";
    
    /* Click event for single layout */
    $( '.single-layout-panel' ).on( 'click', function() {

        if( $( this ).attr( 'disabled' ) ){
            return false;
        }
        
        var importSingleParent = $( this ).parents( '.import-content' ).find('.single-layout-wrapper');

        if( importSingleParent.is( ':hidden' ) ) {
            $( '.pofo-import-button' ).attr( 'disabled', true );
            $( this ).attr( 'disabled', false );
            $( this ).addClass( 'active' );
            importSingleParent.slideDown( 'slow' );
        } else {
            importSingleParent.slideUp();
            $( this ).removeClass( 'active' );
            $( '.pofo-import-button' ).attr( 'disabled', false );
        }

    });
   
    /* Click event for contact form */
    $( '.contact-form-single-click-import' ).on( 'click', function() {
        
        if( $( this ).attr( 'disabled' ) ){
            return false;
        }

        var importContactFormParent = $( this ).parent().parent().find('.contact-form-wrapper');
        if( importContactFormParent.is( ":hidden" ) ) {
            $( '.pofo-import-button' ).attr( 'disabled', true );
            $( this ).attr( 'disabled', false );
            $( this ).addClass( 'active' );
            importContactFormParent.slideDown( "slow" );
        } else {
            importContactFormParent.slideUp();
            $( this ).removeClass( 'active' );
            $( '.pofo-import-button' ).attr( 'disabled', false );
        }

    });

    var stop_ajax_request = false;
    var ajax_call_count = 0;
    var import_completed = false;
    var ajax_import_error = false;
    var import_full_single_layout = false;

    // Ajax pofo log function to show messages
    var pofo_import_log = function(msg) {
        $('.import-ajax-message').append(msg);
        $('.import-ajax-message').animate({"scrollTop": $('.import-ajax-message')[0].scrollHeight}, "fast");
    }

    var refresh_ajax_call_to_import_log = function() {
        
        ajax_call_count++;
        
        if (stop_ajax_request) {
            return;
        }
        
        // Stop Ajax clall After 700Sec.
        if (ajax_call_count > 700) {
            pofo_import_log('Import doesn\'t respond.');
            return;
        }
        
        // Ajax For Refresh Log
        $.ajax({
            url: ajaxurl,
            data: {
                action : 'pofo_refresh_import_log'
            },
            success:function(data) {
                
                if (data.search("ERROR") != -1) {
                    ajax_import_error = true;
                }
                
                $('.import-ajax-message').html(data);
                $('.import-ajax-message').animate({"scrollTop": $('.import-ajax-message')[0].scrollHeight}, "fast");
                
                // Add Error Message In Log
                if (ajax_import_error) {
                    stop_ajax_request = true;
                    pofo_import_log('Import error!');
                    return;
                }
                
                // Add Completed Message In Log
                if (import_completed) {
                    stop_ajax_request = true;
                    pofo_import_log('<p>Import Done.</p>');
                    if( import_full_single_layout ) {
                        window.location.href = window.location.href + "&show-message=true";
                    } else {
                        window.location.href = window.location.href;
                    }
                    return;
                }
            },
            error: function(errorThrown) {
                console.log(errorThrown);
            }
        }).done( function() { 
            
           setTimeout( refresh_ajax_call_to_import_log , 1000)

        } );
    }

    $( '.pofo-demo-import' ).on( 'click', function(e) {

        e.preventDefault();

        /* Return false if current element has disable attribute */
        if( $( this ).attr( 'disabled' ) ){
            return false;
        }

        /* Add disable attribute in all element to block import click */
        $( this ).parents( '.import-content' ).find( '.pofo-import-button' ).attr( 'disabled', true ); 

        var setupKey = $( this ).attr( 'data-demo-import' );

        if( setupKey == 'import-single' ) {
            var importSingles = [];

            $( this ).parents( '.single-layout-wrapper' ).find( ':selected' ).each( function() {
                importSingles.push( $(this).val() );
            });
        }

        if( setupKey == 'contact-form' ) {
            var importSingles = [];

            $( this ).parents( '.contact-form-wrapper' ).find( ':selected' ).each( function() {
                importSingles.push( $(this).val() );
            });

        }

        if( setupKey == 'mailchimp-form' ) {
            var importSingles = [];

            $( this ).parents( '.import-content' ).find( '.mailchimp-form-wrapper :selected' ).each( function() {
                importSingles.push( $(this).val() );
            });

        }

        if( ( setupKey == 'import-single' || setupKey == 'contact-form' ) && importSingles.length === 0 ) {

            $( '.import-content' ).find( '.active' ).attr( 'disabled', false );

            alert( pofo_import_messages.no_single_layout );
            return false;
        }

        var import_messages = $( '.import-ajax-message' );

        import_messages.empty();

        var message = '';
        if( setupKey == 'import-single' ) {
            message = confirm( pofo_import_messages.single_import_conformation );
        }

        if( setupKey == 'customizer' ) {
            message = confirm( pofo_import_messages.customizer_import_conformation );
        }

        if( setupKey == 'menu' ) {
            message = confirm( pofo_import_messages.menu_import_conformation );
        }
        if( setupKey == 'widgets' ) {
            message = confirm( pofo_import_messages.widget_import_conformation );
        }
        if( setupKey == 'rev-slider' ) {
            message = confirm( pofo_import_messages.slider_import_conformation );
        }
        if( setupKey == 'contact-form' ) {
            message = confirm( pofo_import_messages.contact_form_import_conformation );
        }

        if( setupKey == 'mailchimp-form' ) {
            message = confirm( pofo_import_messages.mailchimp_import_conformation );
        }
        
        if( setupKey == 'delete-demo-media' ) {
            message = confirm( pofo_import_messages.media_import_conformation );
        }

        if( setupKey == 'full' ) {
            message = confirm( pofo_import_messages.full_import_conformation );
        }

        if( message == true ) {

            $( '.demo-show-message' ).hide();
            import_messages.show();
           
            var data = {
                action: 'pofo_import_sample_data',
                setup_key: setupKey,
                import_options: importSingles
            };

            $( '.pofo-importer-notice' ).hide();

            var request = $.ajax({
              url: ajaxurl,
              type: "POST",
              data: data
            });
            request.success(function(msg) {
                import_completed = true;
                if( setupKey == 'full' || setupKey == 'import-single' || setupKey == 'menu' ) {
                    import_full_single_layout = true;
                }
                $( '.pofo-import-button' ).attr( 'disabled', false );
                $( '.pofo-import-data-popup' ).hide();
               
            });

            request.fail(function(jqXHR, textStatus) {
                alert( 'Request failed: ' + textStatus );
                $( '.pofo-import' ).attr( 'disabled', false );
            });
            
            setTimeout(function(){

                $( 'html, body' ).animate({
                    scrollTop: $( '.import-ajax-message' ).offset().top - 50
                }, 2000);

            }, 1000)
            setTimeout( refresh_ajax_call_to_import_log , 1000);
        } else {
            $( '.pofo-import-button' ).attr( 'disabled', false );
        }
    });    

}(window.jQuery);
! function( $ ) {
    "use strict";

    /* Widget Social bar on header drag and drop Start */

    jQuery(document).on('widget-updated', function(e, widget){
        jQuery(".social-widget-sortable").sortable({
            handle: 'img.widget-move',
            update : function () {
                var arr = [];
                var i = 0;
                jQuery(this).find( "p input:text" ).each(function( index ) {
                    arr.push(jQuery( this ).attr('data-type'));
                    i++;
                });
                jQuery( this ).parent().find( '.social-bar-hidden-val' ).val( arr ).trigger( 'change' );
            }
        });
    });

    /* Widget Social bar on header drag and drop End */

    $( document ).ready(function() {

        jQuery( '.customize-control-textbox' ).on('keyup',function() {
                var arr = [];
                var i = 0;
                jQuery( ".customize-control-textbox" ).each(function( index ) {
                    if(jQuery( this ).val() != '')
                        arr.push(jQuery( this ).val(), jQuery(this).attr("data-value"), jQuery(this).attr("data-label"));
                        i++;
                });
                jQuery( this ).parents( '.customize-control' ).find( '.pofo-footer-social-icon-list' ).val( arr ).trigger( 'change' );
            }
        );
        $( ".pofo-social-icon-list" ).sortable({
            handle: 'img.icon-move',
            cancel: '',
            update : function () {
                var arr = [];
                var i = 0;
                jQuery( ".customize-control-textbox" ).each(function( index ) {
                    if(jQuery( this ).val() != '')
                        arr.push(jQuery( this ).val(), jQuery(this).attr("data-value"), jQuery(this).attr("data-label"));
                        i++;
                });
                jQuery( this ).parents( '.customize-control' ).find( '.pofo-footer-social-icon-list' ).val( arr ).trigger( 'change' );
           }
        });

        /* Widget Social bar on header drag and drop Start */

        jQuery(".social-widget-sortable").sortable({
            handle: 'img.widget-move',
            update : function () {
                var arr = [];
                var i = 0;
                jQuery(this).find( "p input:text" ).each(function( index ) {
                    arr.push(jQuery( this ).attr('data-type'));
                    i++;
                });

                jQuery( this ).parent().find( '.social-bar-hidden-val' ).val( arr ).trigger( 'change' );
            }
        });

        /* Widget Social bar on header drag and drop End */

        /* post social icon list */

        var counter = jQuery(".pofo-post-social-icon-list li").length;
        
        jQuery( '.customize-control-checkbox-social' ).each(function() {
            if($(this).is(':checked')){
                $(this).val(1);
            }
            else{
                $(this).val(0);
            }
        });

        jQuery( '.customize-control-checkbox-social' ).on('change',function() {
            if($(this).is(':checked')){
                $(this).val(1);
            }
            else{
                $(this).val(0);
            }
                var arr1 = [];
                $(this).parents('.pofo-post-social-icon-list').find( ".customize-control-textbox-social" ).each(function( index ) {
                    if(jQuery( this ).attr("data-value") != ''){
                        arr1.push(jQuery( this ).attr("data-value"));
                        arr1.push(jQuery( this ).siblings(".customize-control-checkbox-social").attr("value"));
                        arr1.push(jQuery( this ).attr("data-label"));
                        i++;
                    }
                });
            jQuery( this ).parents( '.customize-control' ).find( '.pofo-post-social-icon-list' ).val( arr1 ).trigger( 'change' );
        });

        $( ".pofo-post-social-icon-list" ).sortable({
            handle: 'img.icon-move',
            cancel: '',
            update : function () {
                var arr = [];
                var i = 0;
                $(this).find( ".customize-control-textbox-social" ).each(function( index ) {
                    if(jQuery( this ).attr("data-value") != ''){
                        arr.push(jQuery( this ).attr("data-value"));
                        arr.push(jQuery( this ).siblings(".customize-control-checkbox-social").attr("value"));
                        arr.push(jQuery( this ).attr("data-label"));
                        i++;
                    }
                });
                jQuery( this ).parents( '.customize-control' ).find( '.pofo-post-social-icon-list' ).val( arr ).trigger( 'change' );
           }
        });


        /* multiple image upload */

        jQuery( document ).on( 'click', '.pofo_upload_button_multiple_customizer', function(event) {          
            var file_frame;
            var button = $(this);

            var button_parent = $(this).parent();
            var id = button.attr('id').replace('_button', '');

            event.preventDefault();
            

            // If the media frame already exists, reopen it.
            if ( file_frame ) {
              file_frame.open();
              return;
            }

            // Create the media frame.
            file_frame = wp.media.frames.file_frame = wp.media({
              title: jQuery( this ).data( 'uploader_title' ),
              button: {
                text: jQuery( this ).data( 'uploader_button_text' ),
              },
              multiple: true  // Set to true to allow multiple files to be selected
            });

            // When an image is selected, run a callback.
            file_frame.on( 'select', function() {

              var thumb_hidden = button_parent.find('.upload_field_multiple_customizer').attr('name');
             
                var selection = file_frame.state().get('selection');

                    selection.map( function( attachment ) {
                    var attachment = attachment.toJSON();
                    button_parent.find('.multiple_images').append( '<div id="'+attachment.id+'"><img src="'+attachment.url+'" class="upload_image_screenshort_multiple" alt="" style="width:100px;"/><a href="javascript:void(0)" class="remove">remove</a></div>' );
                });
                var pr_div;
                var attach_id = [];
                button_parent.find('.multiple_images').each(function(){
                    if(jQuery(this).children().length > 0){
                        var pr_div = jQuery(this).parent();
                        jQuery(this).children('div').each(function(){
                            attach_id.push(jQuery(this).attr('id'));                        
                        });
                    }                        
                });
                button_parent.find('.multiple_images').parent().parent().find( '.upload_field_multiple_customizer' ).val( attach_id ).trigger( 'change' );     
            });
            // Finally, open the modal
            file_frame.open();
        });

        jQuery(".multiple_images").on('click','.remove', function() {
            var button_parent = $(this).parent().parent();
            jQuery(this).parent().slideUp();
            jQuery(this).parent().remove();
            var attach_id = [];
            button_parent.each(function(){
                if(jQuery(this).children().length > 0){
                    var pr_div = jQuery(this).parent();
                    jQuery(this).children('div').each(function(){
                        attach_id.push(jQuery(this).attr('id'));                        
                    });
                }                        
            });
            button_parent.parent().parent().find( '.upload_field_multiple_customizer' ).val( attach_id ).trigger( 'change' );
        });


        /* Add Custom Sidebars */      
        if(jQuery('#pofo_field_add_sidebar').length >0){
            var current_val = jQuery('#pofo_field_add_sidebar').find('input[type=hidden]').val();      
            if(current_val != ''){
                var count = current_val.split(",").length;            
                for(var i=0;i<count;i++){
                    jQuery('.add-custom-text-box').append('<li><input type="text" class="add-text-input" value="'+current_val.split(",")[i]+'"><input type="button" class="remove-text-box" value="remove"></li>');
                }
            }
        }
        jQuery( document ).on( 'click', '.add_more_sidebar', function() {     
            jQuery('.add-custom-text-box').append('<li><input type="text" class="add-text-input"><input type="button" class="remove-text-box" value="'+pofoadmin.remove_button_text+'"></li>');
        });
        
        jQuery('.add-text-input').live('keyup',function(){
            display();
        });

        jQuery('.remove-text-box').live('click',function(){
            jQuery(this).parent().remove();
            display();  
        });
        function display(){
            var array = [];
            if(jQuery('.add-custom-text-box li').length >0){                
                jQuery('.add-text-input').each(function(index){
                    array.push(jQuery(this).val());
                    jQuery(this).parents('#customize-control-pofo_custom_sidebars').find('input[type=hidden]').val(array).trigger("change");
                });
            }
            else{
                wp.customize.value('pofo_custom_sidebars')('');
            }
        }


        /* Pofo Customizer Control For Multiple Checkbox Start */

        jQuery( '.customize-control-checkbox-multiple input[type="checkbox"]' ).on( 'change', function() {

            var checkbox_values = jQuery( this ).parents( '.customize-control' ).find( 'input[type="checkbox"]:checked' ).map( 
                function() {
                    return this.value;
                }
            ).get().join( ',' );

            jQuery( this ).parents( '.customize-control' ).find( 'input[type="hidden"]' ).val( checkbox_values ).trigger( 'change' );
        });

        /* Pofo Customizer Control For Multiple Checkbox End */

    });
}( jQuery );
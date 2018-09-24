!function($) {
	"use strict";
    /* jQuery Enable Click Event For Switch */
    $('.switch-option-enable').on('click',function(){
      if (!$(this).hasClass('selected')) {
          var c = $(this).parent().find('select');
          $(this).parent().find('.selected').removeClass('selected');
          $(this).addClass('selected');
          c.val(1).trigger('change');
        }
    });

    /* jQuery Disable Click Event For Switch */
    $('.switch-option-disable').on('click',function(){
      if (!$(this).hasClass("selected")) {
          var c = $(this).parent().find('select');
          $(this).parent().find('.selected').removeClass("selected");
          $(this).addClass("selected");
          c.val(0).trigger('change');
        }
    });    

    /* jQuery For Preview Slider Image */
    $('.preview-image-hide').hide();
    $('.preview-image-show').show();
    $('.pofo-preview-image-main').parent().parent().find('.wpb_element_label').hide();

    /* jQuery For add selected class for current type */
    $('.pofo_blockquote_style,.pofo_instagram_style,.pofo_down_section_style,.text_slider_style,.pofo_timer_style,.pofo_pricing_style,.pofo_list_style,.pofo_popup_type,.pofo_social_style,.pofo_video_type,.pofo_counter_style,.pofo_portfolio_style,.slider_premade_style,.pofo_portfolio_filter_style,.pofo_block_premade_style,.pofo_feature_type,.pofo_progress_style,.counter_or_chart,.pofo_team_member_style,.pofo_blog_premade_style,.pofo_heading_type,.pofo_button_style,.pofo_accordion_style,.pofo_post_slider_style,.tabs_style,.pofo_tab_content_premade_style,.pofo_image_block_premade_style,.pofo_testimonial_style,.pofo_slider_style,.pofo_team_member_slider_style,.pofo_testimonial_preview_image,.image_gallery_type,.popup_type,.pofo_alert_massage_premade_style').bind('change keyup', function(e) {
      $(this).parent().parent().parent().find('.pofo_preview_image_select option').removeAttr("selected");
      $(this).parent().parent().parent().find('.preview-image-hide').hide();
      var current_selected = $(this).val();
      if(current_selected){
        $(this).parent().parent().parent().find('.pofo-preview-image-main .'+current_selected).show();
        $(this).parent().parent().parent().find('.pofo_preview_image_select option[class="'+current_selected+'"]').attr('selected', 'selected');
      }
    });

    /* Search Icon */
    $( document ).on( 'click', '.search_icon_button', function() {

        var dest = $(".search_icon_text").val();

        $( this ).parents( '.edit_form_line' ).find( '.pofo_icon_preview' ).removeClass( 'hide' );
        if( dest != '' && dest != undefined ) {

          $( this ).parents( '.edit_form_line' ).find( ".pofo_icon_preview i" ).map( function() {

              var selected_icon = $( this ).attr( 'data-name' );
              dest = dest.toLowerCase();
              if( selected_icon.indexOf( dest ) < 0 ) {
                $( this ).parent().addClass( 'hide' );
              }
          });
        }
    });

    /* Clear Search Icon */
    $( document ).on( 'click', '.clear_search_icon_button', function() {

        $( this ).parents( '.edit_form_line' ).find( '.search_icon_text' ).val( '' );
        $( this ).parents( '.edit_form_line' ).find( '.pofo_icon_preview' ).removeClass( 'hide' );
    });

    /* jQuery Click Event For Icon */
    $('.pofo_icon_preview').on('click', function() {
        if( $(this).hasClass('active_icon') ){
          $(this).removeClass('active_icon');
          $(this).parent().parent().find('.pofo_icon_field').val('');
        }else{
          $('.pofo_icon_preview').removeClass('active_icon');
          $(this).addClass('active_icon');
          var selected_icon = $(this).children().attr('data-name');
          $(this).parent().parent().find('.pofo_icon_field').val(selected_icon);
        }
    });

    /* Row parallax hide block */
    $( 'select.parallax' ).bind('change keyup', function(e) {
      var current_selected = $(this).val();
      if( current_selected ) {
        $(this).parents( '.vc_panel-tabs' ).find( '.pofo_bg_image_type' ).parent().parent().hide();
        $(this).parents( '.vc_panel-tabs' ).find( '.pofo_bg_image_type' ).val('');
        $(this).parents( '.vc_panel-tabs' ).find( '.desktop_bg_image_position' ).parent().parent().hide();
        $(this).parents( '.vc_panel-tabs' ).find( '.desktop_bg_image_position' ).val('');
        $(this).parents( '.vc_panel-tabs' ).find( '.vc_background-position' ).hide();
        $(this).parents( '.vc_panel-tabs' ).find( '.vc_background-position select' ).val('');
        $(this).parents( '.vc_panel-tabs' ).find( '.vc_background-position' ).prev().hide();
      } else {
        $(this).parents( '.vc_panel-tabs' ).find( '.pofo_bg_image_type' ).parent().parent().show();
        $(this).parents( '.vc_panel-tabs' ).find( '.desktop_bg_image_position' ).parent().parent().show();
        $(this).parents( '.vc_panel-tabs' ).find( '.vc_background-position' ).show();
        $(this).parents( '.vc_panel-tabs' ).find( '.vc_background-position' ).prev().show();
      }
    });

    /* First list open for param_group type ( accordion list ) */
    $( document ).on( 'click', '.vc_edit-form-tab-control, .wpb-select', function() {
      if( $( '.vc_param_group-list' ).length > 0 ) {
        if( $( '.vc_param_group-list li.vc_param' ).length == 1 || ( $( '.vc_param_group-list li.vc_param' ).length == 2 && !$( '.vc_param_group-list li:eq(1)' ).hasClass( 'vc_param' ) ) ) {
          $( '.vc_param_group-list li.vc_param:first-child' ).removeClass( 'vc_param_group-collapsed' ).children( '.wpb_element_wrapper' ).show();
        }
      }
    });

    /* Social icons sorting */
    $( ".pofo-social-icon-sorting" ).sortable({
        update : function () {
            var arr = [];
            jQuery( '.pofo-social-icon-sorting li' ).each(function( index ) {
                if( jQuery( this ).attr( 'data-key' ) != '' && jQuery( this ).attr( 'data-key' ) != undefined ) {
                    arr.push( jQuery( this ).attr( 'data-key' ) );
                }
            });
            jQuery( this ).parents( '.edit_form_line' ).find( '.pofo-social-icon-sorting-list' ).val( arr ).trigger( 'change' );
       }
    });

}(window.jQuery);
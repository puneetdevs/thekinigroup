<?php
/**
 * Shortcode For Accordian
 *
 * @package Pofo
 */
?>
<?php

/*-----------------------------------------------------------------------------------*/
/* Accordian */
/*-----------------------------------------------------------------------------------*/

$pofo_accordion_unique_id = 1;
$i = 0;
function pofo_accordion_shortcode( $atts, $content = null ) {

    global $pofo_accordion_unique_id, $i;

    extract( shortcode_atts( array(
                'id' => '',
                'class' => '',
                'pofo_accordion_style' => '',
                'pofo_accordion' => '',
                'pofo_number_color' => '',
                'pofo_title_bg_color' => '',
                'pofo_title_font_size' => '',
                'pofo_title_line_height' => '',
                'pofo_title_letter_spacing' => '',
                'pofo_title_font_weight' => '',
                'pofo_title_italic' => '',
                'pofo_title_underline' => '',
                'pofo_title_color' => '',
                'pofo_title_enable_responsive_font' => '',
                'pofo_content_font_size' => '',
                'pofo_content_line_height' => '',
                'pofo_content_letter_spacing' => '',
                'pofo_content_font_weight' => '',
                'pofo_content_color' => '',
                'pofo_content_enable_responsive_font' => '',
            ), $atts ) );
    
    $output = $active = $icon_class = $class = $pofo_title_style_attr = $pofo_content_style_attr = '';
    $pofo_title_style_array = $pofo_content_style_array = array();

    if( !empty( $pofo_accordion ) ) {

        $pofo_accordion = json_decode( urldecode( $pofo_accordion ) );

        $pofo_number_color   = !empty( $pofo_number_color ) ? 'color: '.$pofo_number_color.';' : '';
        $pofo_title_bg_color = !empty( $pofo_title_bg_color ) ? 'background-color: '.$pofo_title_bg_color.';' : '';

        // For Title Style
        !empty( $pofo_title_font_size ) ? $pofo_title_style_array[] = 'font-size: ' . $pofo_title_font_size . ';' : '';
        !empty( $pofo_title_line_height ) ? $pofo_title_style_array[] = 'line-height: ' . $pofo_title_line_height . ';' : '';
        !empty( $pofo_title_letter_spacing ) ? $pofo_title_style_array[] = 'letter-spacing: ' . $pofo_title_letter_spacing . ';' : '';
        !empty( $pofo_title_font_weight ) ? $pofo_title_style_array[] = 'font-weight: ' . $pofo_title_font_weight . ';' : '';
        ( $pofo_title_italic == 1 ) ? $pofo_title_style_array[] = 'font-style: italic;' : '';
        ( $pofo_title_underline == 1 ) ? $pofo_title_style_array[] = 'text-decoration: underline;' : '';
        $pofo_title_color = !empty( $pofo_title_color ) ? $pofo_title_style_array[] = 'color: '.$pofo_title_color.';' : '';

        $pofo_title_dynamic_font_size = $pofo_title_enable_responsive_font == 1 ? ' dynamic-font-size' : '';
        $pofo_title_style_attr   = pofo_get_style_attribute( $pofo_title_style_array, $pofo_title_font_size, $pofo_title_line_height );

        // For Content Style
        !empty( $pofo_content_font_size ) ? $pofo_content_style_array[] = 'font-size: ' . $pofo_content_font_size . ';' : '';
        !empty( $pofo_content_line_height ) ? $pofo_content_style_array[] = 'line-height: ' . $pofo_content_line_height . ';' : '';
        !empty( $pofo_content_letter_spacing ) ? $pofo_content_style_array[] = 'letter-spacing: ' . $pofo_content_letter_spacing . ';' : '';
        !empty( $pofo_content_font_weight ) ? $pofo_content_style_array[] = 'font-weight: ' . $pofo_content_font_weight . ';' : '';
        !empty( $pofo_content_color ) ? $pofo_content_style_array[] = 'color: '.$pofo_content_color.';' : '';

        $pofo_content_dynamic_font_size = $pofo_content_enable_responsive_font == 1 ? ' dynamic-font-size' : '';
        $pofo_content_style_attr   = pofo_get_style_attribute( $pofo_content_style_array, $pofo_content_font_size, $pofo_content_line_height );

        // Check if accordion id and class
        $pofo_accordion_unique_id  = !empty( $pofo_accordion_unique_id ) ? $pofo_accordion_unique_id : 1;
        $pofo_accordion_id         = ( $id ) ? $id : 'accordion';
        $pofo_accordion_id         .= '-' . $pofo_accordion_unique_id;
        $pofo_accordion_unique_id++;

        $id = 'id="'.$pofo_accordion_id.'"';
        $class = !empty( $class ) ? $class . ' ' . $pofo_accordion_style : $pofo_accordion_style;

        $class .= $pofo_accordion_style == 'toggles-style1' ? ' toggles' : '';

        $output .='<div class="panel-group '.$class.'" '.$id.' >';
                
            $number = 0;
            foreach ($pofo_accordion as $accordion) {

                $i++;
                $number++;
                $pofo_accordion_title   = !empty( $accordion->pofo_accordion_title ) ? $accordion->pofo_accordion_title : '';
                $pofo_accordion_active  = !empty( $accordion->pofo_accordion_active ) ? $accordion->pofo_accordion_active : '';
                $pofo_content           = !empty( $accordion->pofo_content ) ? $accordion->pofo_content : '';

                // Replace || to <br /> in title
                $pofo_accordion_title = ( $pofo_accordion_title ) ? str_replace('||', '<br />',$pofo_accordion_title) : '';

                switch ($pofo_accordion_style) {
                    
                    case 'accordion-style1':
                        if($pofo_accordion_active=='1'){
                            $active="active-accordion";
                            $accordion_class="in";
                            $icon_class="ti-minus";
                        }
                        else{
                            $active=$accordion_class='';
                            $icon_class="ti-plus";
                        }

                        $output .= '<div class="panel text-left">
                                        <div class="panel-heading '.$active.'">
                                            <a data-toggle="collapse" data-parent="#'.$pofo_accordion_id.'" href="#accordion-one-link-'.$i.'">
                                                <div class="panel-title font-weight-500 text-extra-dark-gray'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>
                                                    '.$pofo_accordion_title.'<span class="pull-right"><i class="'.$icon_class.'"></i></span>
                                                </div>
                                            </a>
                                        </div>
                                        <div id="accordion-one-link-'.$i.'" class="panel-collapse collapse '.$accordion_class.'">
                                            <div class="panel-body'.$pofo_content_dynamic_font_size.'"'.$pofo_content_style_attr.'>';
                                                if( !empty( $pofo_content ) ):
                                                    $output .= do_shortcode( pofo_remove_wpautop($pofo_content) );
                                                endif;
                                            $output .= '</div>
                                        </div>
                                    </div>';
                    break;

                    case 'accordion-style2':
                         if($pofo_accordion_active=='1'){
                            $active="active-accordion";
                            $class="in";
                            $icon_class="fa-angle-up";
                        }
                        else{
                            $active=$class='';
                            $icon_class="fa-angle-down";
                        }

                        $output .= '<div class="panel panel-default text-left">
                                        <div class="panel-heading '.$active.'" style="'.$pofo_title_bg_color.'">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#'.$pofo_accordion_id.'" href="#accordion-one-link-'.$i.'">
                                                <div class="panel-title">
                                                    <span class="alt-font font-weight-600 text-deep-pink tab-tag dynamic-font-size" style="'.$pofo_number_color.'">'.str_pad($number,2,"0",STR_PAD_LEFT).'</span>
                                                    <span class="text-extra-dark-gray accordion-title '.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>'.$pofo_accordion_title.'</span>
                                                    <i class="fas '.$icon_class.' pull-right text-extra-dark-gray tz-icon-color" style="'.$pofo_title_color.'"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <div id="accordion-one-link-'.$i.'" class="panel-collapse collapse '.$class.'">
                                            <div class="panel-body'.$pofo_content_dynamic_font_size.'"'.$pofo_content_style_attr.'>';
                                                if( !empty( $pofo_content ) ):
                                                    $output .= do_shortcode( pofo_remove_wpautop($pofo_content) );
                                                endif;
                                            $output .= '</div>
                                        </div>
                                    </div>';
                    break;

                    case 'toggles-style1':
                        if($pofo_accordion_active=='1'){
                            $active="active-accordion";
                            $accordion_class="in";
                            $icon_class="ti-minus";
                        }
                        else{
                            $active=$accordion_class='';
                            $icon_class="ti-plus";
                        }

                        $output .= '<div class="panel panel-default">
                                        <div role="tablist" id="toggles-'.$i.'" class="panel-heading">
                                            <a data-toggle="collapse" href="#toggles-'.$i.'Link">
                                                <div class="panel-title font-weight-500 text-extra-dark-gray'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>'.$pofo_accordion_title.'<span class="pull-right"><i class="'.$icon_class.'"></i></span>
                                                </div>
                                            </a>
                                        </div>
                                        <div id="toggles-'.$i.'Link" class="panel-collapse collapse '.$accordion_class.'">
                                            <div class="panel-body last-paragraph-no-margin'.$pofo_content_dynamic_font_size.'"'.$pofo_content_style_attr.'>';
                                                if( !empty( $pofo_content ) ):
                                                    $output .= do_shortcode( pofo_remove_wpautop($pofo_content) );
                                                endif;
                                            $output .= '</div>
                                        </div>
                                    </div>';
                    break;

                }
            }

        $output .='</div>';
    }
    return $output;
}
add_shortcode( 'pofo_accordion', 'pofo_accordion_shortcode' );
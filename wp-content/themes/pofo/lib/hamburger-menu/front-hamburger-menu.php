<?php
/**
 * Pofo Hamburger Menu Options For Front.
 *
 * @package Pofo
 */
?>
<?php
// Exit if accessed directly.
if ( !defined( 'ABSPATH' ) ) { exit; }

/**
 * Navigation Menu API: Pofo_Hamburger_Menu_Walker class
 *
 */

/**
 * Pofo Front Menu Walker Class.
 *
 */

if( !class_exists( 'Pofo_Hamburger_Menu_Walker' ) ) {

    class Pofo_Hamburger_Menu_Walker extends Walker_Nav_Menu {

        /* Defaine plublic variable */
        public $get_first_level_menu_id = '';

        /**
         * Starts the list before the elements are added.
         *
         */
        public function start_lvl( &$output, $depth = 0, $args = array() ) {
            if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
                $t = '';
                $n = '';
            } else {
                $t = "\t";
                $n = "\n";
            }
            $indent = str_repeat( $t, $depth );

            // Default class.
            $classes = array( 'dropdown-menu', 'font-weight-300' );

            /**
             * Filters the CSS class(es) applied to a menu list element.
             *
             */
            $class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
            $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
            
            $output .= "{$n}{$indent}<ul $class_names>{$n}";
        }

        /**
         * Ends the list of after the elements are added.
         *
         */
        public function end_lvl( &$output, $depth = 0, $args = array() ) {
            if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
                $t = '';
                $n = '';
            } else {
                $t = "\t";
                $n = "\n";
            }
            $indent = str_repeat( $t, $depth );
            $output .= "$indent</ul>{$n}";

        }

        /**
         * Starts the element output.
         *
         */
        public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
            if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
                $t = '';
                $n = '';
            } else {
                $t = "\t";
                $n = "\n";
            }
            $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            $classes[] = 'menu-item-' . $item->ID;

            /*
             * Add Simple Menu or Mega Menu Class
             *
             */
            
            $pofo_mega_menu_item_title_status = get_post_meta( $item->ID, '_pofo_mega_menu_item_title_status', true );
            $pofo_get_first_level_status = get_post_meta( $this->get_first_level_menu_id, '_pofo_mega_menu_item_status', true );
            $pofo_mega_menu_single_item_status = get_post_meta( $item->ID, '_pofo_mega_menu_single_item_status', true );
            $pofo_menu_item_icon              = get_post_meta( $item->ID, '_pofo_menu_item_icon', true );

             //Replace old Awesome Font Icons

            $pofo_fontawesome_solid_icon_lists = pofo_fontawesome_icons_solid();
            $pofo_fontawesome_reg_icon_lists = pofo_fontawesome_icons_reg();
            $pofo_fontawesome_brand_icon_lists = pofo_fontawesome_icons_brand();
            $pofo_fontawesome_old_icon_lists = pofo_fontawesome_icons_old();

            if( !empty( $pofo_menu_item_icon ) ) {
                if(array_key_exists($pofo_menu_item_icon, $pofo_fontawesome_old_icon_lists)){
                  $pofo_menu_item_icon = $pofo_fontawesome_old_icon_lists[$pofo_menu_item_icon];
                }else{
                  if(in_array($pofo_menu_item_icon, $pofo_fontawesome_solid_icon_lists)){
                      $pofo_menu_item_icon = 'fas '.$pofo_menu_item_icon;
                  }else if(in_array($pofo_menu_item_icon, $pofo_fontawesome_reg_icon_lists)){
                      $pofo_menu_item_icon = 'far '.$pofo_menu_item_icon;
                  }else if(in_array($pofo_menu_item_icon, $pofo_fontawesome_brand_icon_lists)){
                      $pofo_menu_item_icon = 'fab '.$pofo_menu_item_icon;
                  }
                }
            }

            if( $item->hasChildren && $depth == 0 ) {
                $classes[] = 'dropdown';
            }

            if( ( $depth == 1 || $depth == 2 ) && $pofo_mega_menu_item_title_status == 'enabled' ) {
                $classes[] = 'dropdown-header-wrap';
            }

            /**
             * Filters the arguments for a single nav menu item.
             *
             */
            $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

            /**
             * Filters the CSS class(es) applied to a menu item's list item element.
             *
             */
            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
            $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

            /**
             * Filters the ID applied to a menu item's list item element.
             *
             */
            $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
            $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

            $output .= $indent . '<li' . $id . $class_names .'>';

            $atts = array();
            $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
            $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
            $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
            $atts['href']   = ! empty( $item->url )        ? $item->url        : 'javascript:void(0);';

            if( $pofo_mega_menu_single_item_status == 'enabled' && $depth == 0 ) {
                $atts['class']   = 'inner-link';
            }

            if( ( $depth == 1 || $depth == 2 ) && $pofo_mega_menu_item_title_status == 'enabled' ) {
                $atts['class'] = 'dropdown-header';
            }

            /**
             * Filters the HTML attributes applied to a menu item's anchor element.
             *
             */
            $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

            $attributes = '';
            foreach ( $atts as $attr => $value ) {
                if ( ! empty( $value ) ) {
                    $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }

            /** This filter is documented in wp-includes/post-template.php */
            $title = apply_filters( 'the_title', $item->title, $item->ID );

            /**
             * Filters a menu item's title.
             *
             */
            $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .' itemprop="url">';

            /* Add menu icon */
            if( !empty( $pofo_menu_item_icon ) && $pofo_menu_item_icon != 1 ) {

                // if( strpos( $pofo_menu_item_icon, 'fa-' ) !== false) {
                //     $item_output .= '<i class="'.$pofo_menu_item_icon.'"></i>';
                // } else {
                    $item_output .= '<i class="'.$pofo_menu_item_icon.'"></i>';
                //}
            }

            $item_output .= $args->link_before . $title . $args->link_after;

            $item_output .= '</a>';
            $item_output .= $args->after;

            /**
             * Filters a menu item's starting output.
             *
             */
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

            /* Add mobile icon for parent item */

            if( $item->hasChildren && $depth == 0 ) {
                $output .= '<span data-toggle="dropdown" class="dropdown-toggle"></span>';
            }
        }

        /**
         * Ends the element output, if needed.
         *
         */
        public function end_el( &$output, $item, $depth = 0, $args = array() ) {
            if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
                $t = '';
                $n = '';
            } else {
                $t = "\t";
                $n = "\n";
            }
            $output .= "</li>{$n}";
        }

        function display_element ($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
            // check, whether there are children for the given ID and append it to the element with a (new) ID
            $element->hasChildren = isset($children_elements[$element->ID]) && !empty($children_elements[$element->ID]);
            return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
        }

    } // Walker_Nav_Menu
}
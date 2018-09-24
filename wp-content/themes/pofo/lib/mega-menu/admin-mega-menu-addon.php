<?php
/**
 * Pofo Mega Menu Options For Admin And Front.
 *
 * @package Pofo
 */
?>
<?php
// Exit if accessed directly.
if ( !defined( 'ABSPATH' ) ) { exit; }

/*
 * Saves new field to postmeta for navigation.
 *
 */
add_action('wp_update_nav_menu_item', 'pofo_nav_option_update',10, 3);
if ( ! function_exists( 'pofo_nav_option_update' ) ) :
    function pofo_nav_option_update( $menu_id, $menu_item_db_id, $args ) {
        
        if( !isset( $_REQUEST['menu-item-pofo-mega-menu-single-item-status'][$menu_item_db_id] )) { 
            $_REQUEST['menu-item-pofo-mega-menu-single-item-status'][$menu_item_db_id] = '';
        }
        $pofo_mega_menu_single_item_status = $_REQUEST['menu-item-pofo-mega-menu-single-item-status'][$menu_item_db_id];
        update_post_meta( $menu_item_db_id, '_pofo_mega_menu_single_item_status', $pofo_mega_menu_single_item_status );

        if( !isset( $_REQUEST['menu-item-pofo-mega-menu-item-status'][$menu_item_db_id] )) { 
            $_REQUEST['menu-item-pofo-mega-menu-item-status'][$menu_item_db_id] = '';
        }
        $pofo_mega_menu_item_status = $_REQUEST['menu-item-pofo-mega-menu-item-status'][$menu_item_db_id];
        update_post_meta( $menu_item_db_id, '_pofo_mega_menu_item_status', $pofo_mega_menu_item_status );

        if( !isset( $_REQUEST['menu-item-pofo-submenu-position'][$menu_item_db_id] )) { 
            $_REQUEST['menu-item-pofo-submenu-position'][$menu_item_db_id] = '';
        }
        $pofo_submenu_position = $_REQUEST['menu-item-pofo-submenu-position'][$menu_item_db_id];
        update_post_meta( $menu_item_db_id, '_pofo_submenu_position', $pofo_submenu_position );

        if( !isset( $_REQUEST['menu-item-pofo-mega-menu-item-title-status'][$menu_item_db_id] )) { 
            $_REQUEST['menu-item-pofo-mega-menu-item-title-status'][$menu_item_db_id] = '';
        }
        $pofo_mega_menu_item_title_status = $_REQUEST['menu-item-pofo-mega-menu-item-title-status'][$menu_item_db_id];
        update_post_meta( $menu_item_db_id, '_pofo_mega_menu_item_title_status', $pofo_mega_menu_item_title_status );
        
        if( !isset( $_REQUEST['menu-item-pofo-mega-menu-columns'][$menu_item_db_id] )) { 
            $_REQUEST['menu-item-pofo-mega-menu-columns'][$menu_item_db_id] = '';
        }
        $pofo_mega_menu_columns = $_REQUEST['menu-item-pofo-mega-menu-columns'][$menu_item_db_id];
        update_post_meta( $menu_item_db_id, '_pofo_mega_menu_columns', $pofo_mega_menu_columns );

        if( !isset( $_REQUEST['menu-item-pofo-menu-item-icon'][$menu_item_db_id] )) { 
            $_REQUEST['menu-item-pofo-menu-item-icon'][$menu_item_db_id] = '';
        }
        $pofo_menu_item_icon = $_REQUEST['menu-item-pofo-menu-item-icon'][$menu_item_db_id];
        update_post_meta( $menu_item_db_id, '_pofo_menu_item_icon', $pofo_menu_item_icon );


        if( !isset( $_REQUEST['menu-item-pofo-mega-menu-item-sidebar'][$menu_item_db_id] )) { 
            $_REQUEST['menu-item-pofo-mega-menu-item-sidebar'][$menu_item_db_id] = '';
        }
        $pofo_mega_menu_item_sidebar = $_REQUEST['menu-item-pofo-mega-menu-item-sidebar'][$menu_item_db_id];
        update_post_meta( $menu_item_db_id, '_pofo_mega_menu_item_sidebar', $pofo_mega_menu_item_sidebar );
    }
endif;

/*
 * Adds value of new field to $item object that will be passed to Walker_Nav_Menu_Edit_Custom.
 *
 */
add_filter( 'wp_setup_nav_menu_item','pofo_get_nav_custom_post_meta' );
if ( ! function_exists( 'pofo_get_nav_custom_post_meta' ) ) {
    function pofo_get_nav_custom_post_meta($menu_item) {
        $menu_item->pofo_mega_menu_single_item_status = get_post_meta( $menu_item->ID, '_pofo_mega_menu_single_item_status', true );
        $menu_item->pofo_mega_menu_item_status = get_post_meta( $menu_item->ID, '_pofo_mega_menu_item_status', true );
        $menu_item->pofo_submenu_position = get_post_meta( $menu_item->ID, '_pofo_submenu_position', true );
        $menu_item->pofo_mega_menu_item_title_status = get_post_meta( $menu_item->ID, '_pofo_mega_menu_item_title_status', true );
        $menu_item->pofo_mega_menu_columns = get_post_meta( $menu_item->ID, '_pofo_mega_menu_columns', true );
        $menu_item->pofo_menu_item_icon = get_post_meta( $menu_item->ID, '_pofo_menu_item_icon', true );
        $menu_item->pofo_mega_menu_item_sidebar = get_post_meta( $menu_item->ID, '_pofo_mega_menu_item_sidebar', true );
        return $menu_item;
    }
}
/*
 * Filter For Edit Walker_Nav_Menu_Edit_Custom Walker.
 *
 */
add_filter( 'wp_edit_nav_menu_walker', 'pofo_custom_nav_edit_walker', 10, 2 );
if ( ! function_exists( 'pofo_custom_nav_edit_walker' ) ) :
    function pofo_custom_nav_edit_walker( $walker, $menu_id ) {
        return 'Pofo_Walker_Nav_Menu_Edit_Custom';
    }
endif;

/**
 * Navigation Menu API: Walker_Nav_Menu_Edit class
 *
 */
if( !class_exists( 'Pofo_Walker_Nav_Menu_Edit_Custom' ) ) {
    class Pofo_Walker_Nav_Menu_Edit_Custom extends Walker_Nav_Menu  {

        /**
         * Starts the list before the elements are added.
         *
         */
        public function start_lvl( &$output, $depth = 0, $args = array() ) {}

        /**
         * Ends the list of after the elements are added.
         *
         */
        public function end_lvl( &$output, $depth = 0, $args = array() ) {}

        /**
         * Start the element output.
         *
         */
        public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
            global $_wp_nav_menu_max_depth;
            $_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;

            ob_start();
            $item_id = esc_attr( $item->ID );
            $removed_args = array(
                'action',
                'customlink-tab',
                'edit-menu-item',
                'menu-item',
                'page-tab',
                '_wpnonce',
            );

            $original_title = false;
            if ( 'taxonomy' == $item->type ) {
                $original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
                if ( is_wp_error( $original_title ) ) {
                    $original_title = false;
                }
            } elseif ( 'post_type' == $item->type ) {
                $original_object = get_post( $item->object_id );
                $original_title = get_the_title( $original_object->ID );
            } elseif ( 'post_type_archive' == $item->type ) {
                $original_object = get_post_type_object( $item->object );
                if ( $original_object ) {
                    $original_title = $original_object->labels->archives;
                }
            }

            $classes = array(
                'menu-item menu-item-depth-' . $depth,
                'menu-item-' . esc_attr( $item->object ),
                'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
            );

            $title = $item->title;

            if ( ! empty( $item->_invalid ) ) {
                $classes[] = 'menu-item-invalid';
                /* translators: %s: title of menu item which is invalid */
                $title = esc_html( $item->title ).esc_html( ' (Invalid) ', 'pofo' );
            } elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
                $classes[] = 'pending';
                /* translators: %s: title of menu item in draft status */
                $title = esc_html( $item->title ).esc_html( ' (Pending) ', 'pofo' );
            }

            $title = ( ! isset( $item->label ) || '' == $item->label ) ? $title : $item->label;

            $submenu_text = '';
            if ( 0 == $depth ) {
                $submenu_text = 'style="display: none;"';
            }

            ?>
            <li id="menu-item-<?php echo esc_attr($item_id); ?>" class="<?php echo implode(' ', $classes ); ?>">
                <div class="menu-item-bar">
                    <div class="menu-item-handle">
                        <span class="item-title"><span class="menu-item-title"><?php echo esc_html( $title ); ?></span> <span class="is-submenu" <?php echo esc_html($submenu_text); ?>><?php _e( 'sub item', 'pofo' ); ?></span></span>
                        <span class="item-controls">
                            <span class="item-type"><?php echo esc_html( $item->type_label ); ?></span>
                            <span class="item-order hide-if-js">
                                <a href="<?php
                                    echo wp_nonce_url(
                                        add_query_arg(
                                            array(
                                                'action' => 'move-up-menu-item',
                                                'menu-item' => $item_id,
                                            ),
                                            remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
                                        ),
                                        'move-menu_item'
                                    );
                                ?>" class="item-move-up" aria-label="<?php esc_attr_e( 'Move up', 'pofo' ) ?>">&#8593;</a>
                                |
                                <a href="<?php
                                    echo wp_nonce_url(
                                        add_query_arg(
                                            array(
                                                'action' => 'move-down-menu-item',
                                                'menu-item' => $item_id,
                                            ),
                                            remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
                                        ),
                                        'move-menu_item'
                                    );
                                ?>" class="item-move-down" aria-label="<?php esc_attr_e( 'Move down', 'pofo' ) ?>">&#8595;</a>
                            </span>
                            <a class="item-edit" id="edit-<?php echo esc_attr($item_id); ?>" href="<?php
                                echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) );
                            ?>" aria-label="<?php esc_attr_e( 'Edit menu item', 'pofo' ); ?>"><span class="screen-reader-text"><?php _e( 'Edit', 'pofo' ); ?></span></a>
                        </span>
                    </div>
                </div>

                <div class="menu-item-settings wp-clearfix" id="menu-item-settings-<?php echo esc_attr($item_id); ?>">
                    <?php if ( 'custom' == $item->type ) : ?>
                        <p class="field-url description description-wide">
                            <label for="edit-menu-item-url-<?php echo esc_attr($item_id); ?>">
                                <?php _e( 'URL', 'pofo' ); ?><br />
                                <input type="text" id="edit-menu-item-url-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->url ); ?>" />
                            </label>
                        </p>
                    <?php endif; ?>
                    <p class="description description-wide">
                        <label for="edit-menu-item-title-<?php echo esc_attr($item_id); ?>">
                            <?php _e( 'Navigation Label','pofo' ); ?><br />
                            <input type="text" id="edit-menu-item-title-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->title ); ?>" />
                        </label>
                    </p>
                    <p class="field-title-attribute field-attr-title description description-wide">
                        <label for="edit-menu-item-attr-title-<?php echo esc_attr($item_id); ?>">
                            <?php _e( 'Title Attribute', 'pofo' ); ?><br />
                            <input type="text" id="edit-menu-item-attr-title-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->post_excerpt ); ?>" />
                        </label>
                    </p>
                    <p class="field-link-target description">
                        <label for="edit-menu-item-target-<?php echo esc_attr($item_id); ?>">
                            <input type="checkbox" id="edit-menu-item-target-<?php echo esc_attr($item_id); ?>" value="_blank" name="menu-item-target[<?php echo esc_attr($item_id); ?>]"<?php checked( $item->target, '_blank' ); ?> />
                            <?php _e( 'Open link in a new tab', 'pofo' ); ?>
                        </label>
                    </p>
                    <p class="field-css-classes description description-thin">
                        <label for="edit-menu-item-classes-<?php echo esc_attr($item_id); ?>">
                            <?php _e( 'CSS Classes (optional)', 'pofo' ); ?><br />
                            <input type="text" id="edit-menu-item-classes-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( implode(' ', $item->classes ) ); ?>" />
                        </label>
                    </p>
                    <p class="field-xfn description description-thin">
                        <label for="edit-menu-item-xfn-<?php echo esc_attr($item_id); ?>">
                            <?php _e( 'Link Relationship (XFN)', 'pofo' ); ?><br />
                            <input type="text" id="edit-menu-item-xfn-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->xfn ); ?>" />
                        </label>
                    </p>
                    <p class="field-description description description-wide">
                        <label for="edit-menu-item-description-<?php echo esc_attr($item_id); ?>">
                            <?php _e( 'Description', 'pofo' ); ?><br />
                            <textarea id="edit-menu-item-description-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo esc_attr($item_id); ?>]"><?php echo esc_html( $item->description ); // textarea_escaped ?></textarea>
                            <span class="description"><?php _e('The description will be displayed in the menu if the current theme supports it.', 'pofo'); ?></span>
                        </label>
                    </p>
                    <div class="pofo-admin-mega-menu-init" id="pofo-admin-mega-menu-init">
                        <?php
                            $status_checked = $single_status_checked = $title_status_checked = '';
                        ?>

                        <p class="field-pofo-mega-menu-single-item-status description-wide">
                            <label for="edit-menu-item-pofo-mega-menu-single-item-status-<?php echo esc_attr($item_id); ?>">
                                <?php $single_status_checked = ( $item->pofo_mega_menu_single_item_status == 'enabled' ) ? 'checked="checked"' : '' ; ?>
                                <input type="checkbox" id="edit-menu-item-pofo-mega-menu-single-item-status-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-pofo-mega-menu-single-item-status" name="menu-item-pofo-mega-menu-single-item-status[<?php echo esc_attr($item_id); ?>]" value="enabled" <?php echo esc_html($single_status_checked); ?> />
                                <?php _e( 'Enable Onepage For This Item (only for main parent)', 'pofo' ); ?>
                            </label>
                        </p>
                        <p class="field-pofo-mega-menu-item-status description-wide">
                            <label for="edit-menu-item-pofo-mega-menu-item-status-<?php echo esc_attr($item_id); ?>">
                                <?php $status_checked = ($item->pofo_mega_menu_item_status == 'enabled') ? 'checked="checked"' : '' ; ?>
                                <input type="checkbox" id="edit-menu-item-pofo-mega-menu-item-status-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-pofo-mega-menu-item-status" name="menu-item-pofo-mega-menu-item-status[<?php echo esc_attr($item_id); ?>]" value="enabled" <?php echo esc_attr($status_checked); ?> />
                                <?php _e( 'Enable Mega Menu For This Item (only for main parent)', 'pofo' ); ?>
                            </label>
                        </p>
                        <?php if( $depth == 0 ) { ?>
                        <p class="field-pofo-mega-submenu-position description-wide">
                            <label for="edit-menu-item-pofo-submenu-position-<?php echo esc_attr($item_id); ?>">
                                <?php _e( 'Submenu Position', 'pofo' ); ?>
                                <select id="edit-menu-item-pofo-submenu-position-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-pofo-submenu-position" name="menu-item-pofo-submenu-position[<?php echo esc_attr($item_id); ?>]">
                                    <option <?php if( $item->pofo_submenu_position == 'right' ) { echo 'selected="selected" '; }?> value="right"><?php _e( 'Right', 'pofo' ); ?></option>
                                    <option <?php if( $item->pofo_submenu_position == 'left' ) { echo 'selected="selected" '; }?> value="left"><?php _e( 'Left', 'pofo' ); ?></option>
                                </select>
                            </label>
                        </p>
                        <?php } ?>
                        <p class="field-pofo-mega-menu-item-columns description description-wide">
                            <label for="edit-menu-item-pofo-mega-menu-columns-<?php echo esc_attr($item_id); ?>">
                                <?php _e( 'Select Mega Menu Number of Columns', 'pofo' ); ?>
                                <select id="edit-menu-item-pofo-mega-menu-columns-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-pofo-mega-menu-columns" name="menu-item-pofo-mega-menu-columns[<?php echo esc_attr($item_id); ?>]">
                                    <option <?php if( $item->pofo_mega_menu_columns == '1' ) { echo 'selected="selected" '; }?> value="1">1</option>
                                    <option <?php if( $item->pofo_mega_menu_columns == '2' ) { echo 'selected="selected" '; }?> value="2">2</option>
                                    <option <?php if( $item->pofo_mega_menu_columns == '3' ) { echo 'selected="selected" '; }?> value="3">3</option>
                                    <option <?php if( $item->pofo_mega_menu_columns == '4' ) { echo 'selected="selected" '; }?> value="4">4</option>
                                </select>
                            </label>
                        </p>
                        <?php /* Set Mega Menu Item Icon Start */ ?>
                        <p class="field-pofo-mega-menu-item-icon description description-wide">
                            <label for="edit-pofo-mega-menu-item-icon-<?php echo esc_attr($item_id); ?>">
                                <?php _e( 'Select Menu Item Icon', 'pofo' ); ?>
                                
                                <select id="edit-menu-item-pofo-menu-item-icon-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-pofo-menu-item-icon menu-icon-item-wrapper menu-icon-item form-control" name="menu-item-pofo-menu-item-icon[<?php echo esc_attr($item_id); ?>]"></select>

                                <?php 
                                    $pofo_icons = pofo_icons();
                                    $ti_icon_lists = pofo_get_themify_icon_list();
                                    $fontawesome_solid_icon_lists = pofo_fontawesome_icons_solid();
                                    $fontawesome_reg_icon_lists = pofo_fontawesome_icons_reg();
                                    $fontawesome_brand_icon_lists = pofo_fontawesome_icons_brand();
                                    $fontawesome_old_icon_lists = pofo_fontawesome_icons_old();
                                    $select_id = $item_id;
                                    $value = $item->pofo_menu_item_icon;

                                    // Check and replace old Font Awesome Icons
                                    if(array_key_exists($value, $fontawesome_old_icon_lists)){
                                        $value =$fontawesome_old_icon_lists[$value];
                                    }elseif(in_array($value, $fontawesome_solid_icon_lists)){
                                        $value = 'fas '.$value;
                                    }else if(in_array($value, $fontawesome_reg_icon_lists)){
                                        $value = 'far '.$value;
                                    }else if(in_array($value, $fontawesome_brand_icon_lists)){
                                        $value = 'fab '.$value;
                                    }
                                    

                                    echo '<select class="pofo-menu-icons">';
                                    echo '<option id="'.$select_id.'" value="1">'.esc_html__( 'Select Menu Icon', 'pofo' ).'</option>';
                                    
                                    echo '<optgroup label="Themify Icon">';
                                        foreach ( $ti_icon_lists as $icon => $val ) {
                                            $selected = ( ( $val == $value ) ) ? ' selected="selected"' : '';
                                            echo '<option '.$selected.' data="'.$value.' value, '.$val.' val, id='.$select_id.'" data-icon="'. $val .'" value="'. $val .'">'.htmlspecialchars( $val ).'</option>';
                                        }
                                    echo '</optgroup>';

                                    echo '<optgroup label="Font Awesome Icon">';
                                        foreach ( $fontawesome_solid_icon_lists as $icon => $val ) {
                                            $selected = ( ( 'fas '.$val == $value ) ) ? ' selected="selected"' : '';
                                            echo '<option '.$selected.' data="'.$value.' value,fas '.$val.' val, id='.$select_id.'" data-icon="fas '. $val .'" value="fas '. $val .'">fas '.htmlspecialchars( $val ).'</option>';
                                        }

                                        foreach ( $fontawesome_reg_icon_lists as $icon => $val ) {
                                            $selected = ( ( 'far '.$val == $value ) ) ? ' selected="selected"' : '';
                                            echo '<option '.$selected.' data="'.$value.' value,far '.$val.' val, id='.$select_id.'" data-icon="far '. $val .'" value="far '. $val .'">far '.htmlspecialchars( $val ).'</option>';
                                        }

                                        foreach ( $fontawesome_brand_icon_lists as $icon => $val ) {
                                            $selected = ( ( 'fab '.$val == $value ) ) ? ' selected="selected"' : '';
                                            echo '<option '.$selected.' data="'.$value.' value,fab '.$val.' val, id='.$select_id.'" data-icon="fab '. $val .'" value="fab '. $val .'">fab '.htmlspecialchars( $val ).'</option>';
                                        }
                                    echo '</optgroup>';
                                    
                                    echo '<optgroup label="Pofo Icon">';
                                        foreach ( $pofo_icons as $icon => $val ) {
                                            $selected = ( ( $val == $value ) ) ? ' selected="selected"' : '';
                                            echo '<option '.$selected.' data="'.$value.' value, '.$val.' val, id='.$select_id.'" data-icon="'. $val .'" value="'. $val .'">'.htmlspecialchars( $val ).'</option>';
                                        }
                                    echo '</optgroup>';

                                    echo '</select>';
                                ?>
                            </label>
                        </p>
                        <?php /* Set Mega Menu Item Icon End */ ?>
                        <p class="field-pofo-mega-menu-item-title-status description description-wide">
                            <label for="edit-menu-item-pofo-mega-menu-item-title-status-<?php echo esc_attr($item_id); ?>">
                                <?php $title_status_checked = ( $item->pofo_mega_menu_item_title_status == 'enabled' ) ? 'checked="checked"' : '' ; ?>
                                <input type="checkbox" id="edit-menu-item-pofo-mega-menu-item-title-status-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-pofo-mega-menu-item-title-status" name="menu-item-pofo-mega-menu-item-title-status[<?php echo esc_attr($item_id); ?>]" value="enabled" <?php echo esc_attr($title_status_checked); ?> />
                                <?php _e( 'Enable Pofo Mega Menu Title For This Item.', 'pofo' ); ?>
                            </label>
                        </p>
                        
                        <p class="field-pofo-mega-menu-item-sidebar description description-wide">
                            <label for="edit-pofo-mega-menu-item-sidebar-<?php echo esc_attr($item_id); ?>">
                                <?php _e( 'Select Mega Menu Item Sidebar( If sidebar selected then menu title will remove only shows sidebar on menu).', 'pofo' ); ?>
                                <?php 
                                    echo '<select id="edit-menu-item-pofo-mega-menu-item-sidebar-'.$item_id.'" class="widefat code edit-menu-item-pofo-mega-menu-item-sidebar" name="menu-item-pofo-mega-menu-item-sidebar['.$item_id.']">';
                                        global $wp_registered_sidebars;
                                        if( ! empty( $wp_registered_sidebars ) && is_array( $wp_registered_sidebars ) ){ 
                                            echo '<option value="0">'.esc_html__( 'Select Widget Area', 'pofo' ).'</option>';
                                            foreach( $wp_registered_sidebars as $sidebar ){
                                                $sidebar_value = $item->pofo_mega_menu_item_sidebar;
                                                $selected = ( ( $sidebar_value == $sidebar['id'] ) ) ? ' selected="selected"' : '';
                                                echo '<option '.$selected.' sidebar-id="'. $sidebar['id'] .'" value="'. $sidebar['id'] .'">'.htmlspecialchars( $sidebar['name'] ).'</option>';
                                            }
                                        }
                                    echo '</select>';
                                ?>
                            </label>
                        </p>
                    </div>

                    <fieldset class="field-move hide-if-no-js description description-wide">
                        <span class="field-move-visual-label" aria-hidden="true"><?php _e( 'Move', 'pofo' ); ?></span>
                        <button type="button" class="button-link menus-move menus-move-up" data-dir="up"><?php _e( 'Up one', 'pofo' ); ?></button>
                        <button type="button" class="button-link menus-move menus-move-down" data-dir="down"><?php _e( 'Down one', 'pofo' ); ?></button>
                        <button type="button" class="button-link menus-move menus-move-left" data-dir="left"></button>
                        <button type="button" class="button-link menus-move menus-move-right" data-dir="right"></button>
                        <button type="button" class="button-link menus-move menus-move-top" data-dir="top"><?php _e( 'To the top', 'pofo' ); ?></button>
                    </fieldset>

                    <div class="menu-item-actions description-wide submitbox">
                        <?php if ( 'custom' != $item->type && $original_title !== false ) : ?>
                            <p class="link-to-original">
                                <?php printf( esc_html('Original: %s', 'pofo' ), '<a href="' . esc_attr( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
                            </p>
                        <?php endif; ?>
                        <a class="item-delete submitdelete deletion" id="delete-<?php echo esc_attr($item_id); ?>" href="<?php
                        echo wp_nonce_url(
                            add_query_arg(
                                array(
                                    'action' => 'delete-menu-item',
                                    'menu-item' => $item_id,
                                ),
                                admin_url( 'nav-menus.php' )
                            ),
                            'delete-menu_item_' . $item_id
                        ); ?>"><?php _e( 'Remove', 'pofo' ); ?></a> <span class="meta-sep hide-if-no-js"> | </span> <a class="item-cancel submitcancel hide-if-no-js" id="cancel-<?php echo esc_attr($item_id); ?>" href="<?php echo esc_url( add_query_arg( array( 'edit-menu-item' => $item_id, 'cancel' => time() ), admin_url( 'nav-menus.php' ) ) );
                            ?>#menu-item-settings-<?php echo esc_attr($item_id); ?>"><?php _e('Cancel', 'pofo'); ?></a>
                    </div>

                    <input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr($item_id); ?>" />
                    <input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->object_id ); ?>" />
                    <input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->object ); ?>" />
                    <input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />
                    <input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />
                    <input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->type ); ?>" />
                </div><!-- .menu-item-settings-->
                <ul class="menu-item-transport"></ul>
            <?php
            $output .= ob_get_clean();
        }

    }
}
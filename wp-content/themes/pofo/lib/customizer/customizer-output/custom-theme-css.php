<?php
/**
 * Generate css for theme base color.
 *
 * @package Pofo
 */
?>
<?php

	if ( !defined( 'ABSPATH' ) ) { exit; }

	$pofo_header_mobile_menu_breakpoint = get_theme_mod( 'pofo_header_mobile_menu_breakpoint', '' );
	$pofo_header_mobile_menu_breakpoint = !empty( $pofo_header_mobile_menu_breakpoint ) ? $pofo_header_mobile_menu_breakpoint : '991';
	$pofo_header_mobile_menu_breakpoint = $pofo_header_mobile_menu_breakpoint . 'px';

	$pofo_base_color = get_theme_mod( 'pofo_base_color', '' );
	if( $pofo_base_color ){
	?>
		/* text color */
		a:hover, a:focus,.text-deep-pink,.text-deep-pink-hover:hover,.blog-image blockquote h6:before,a.text-link-white:hover, a.text-link-white:hover i, a.text-link-white:focus, a.text-link-white:focus i,a.text-link-deep-pink, a.text-link-deep-pink i,a.text-deep-pink-hover:hover, a.text-deep-pink-hover:focus,.social-icon-style-6 a:hover,.pofo-post-detail-icon a:hover,.social-icon-style-8 a:hover,.list-style-1 li span:before,.list-style-4.list-style-color li:before,.list-style-5.list-style-color li:before,.btn.btn-deep-pink:hover, .btn.btn-deep-pink:focus,.btn.btn-transparent-deep-pink,.dropdown-style-1 .btn:hover, .custom-dropdown btn:focus,.full-width-pull-menu .menu-wrap ul.hamburger-menu-style1 li a:hover, .full-width-pull-menu .menu-wrap ul.hamburger-menu-style1 li:hover > a, .full-width-pull-menu .menu-wrap ul.hamburger-menu-style1 li.open  > a,.full-width-pull-menu .dropdown ul li a:hover, .dropdown ul li a:focus, .full-width-pull-menu .menu-wrap ul li.current-menu-ancestor > a, .full-width-pull-menu .menu-wrap ul li.current-menu-item > a,.full-width-pull-menu .header-searchbar a:hover,.full-width-pull-menu .header-social-icon ul li a:hover,.full-width-pull-menu .menu-wrap .widget ul li a:hover,.sidebar-nav-style-1 .header-sidebar-wrap ul li a:hover,.sidebar-nav-style-1 .copyright-wrap a:hover,header .sidebar-part2 nav.navbar.bootsnav li.dropdown ul.dropdown-menu > li a:hover, header .sidebar-part2 nav.navbar.bootsnav li.dropdown ul.dropdown-menu > li:hover > a,header .sidebar-part2 nav.navbar.bootsnav li.dropdown ul.dropdown-menu > li.active > a, header .sidebar-part2 nav.navbar.bootsnav li.dropdown ul.dropdown-menu > li.current-menu-item > a, header .sidebar-part2 nav.navbar.bootsnav li.dropdown ul.dropdown-menu > li.current-menu-ancestor > a,header .sidebar-part2 nav.navbar.bootsnav ul li ul li a:hover,header .sidebar-part2 nav.navbar.bootsnav ul.second-level li.active > a, header .sidebar-part2 nav.navbar.bootsnav ul.second-level li.active ul li.active  > a,.sidebar-part2 .header-sidebar-wrap ul li a:hover,.blog-details-text a,#cancel-comment-reply-link, .comment-edit-link,.blog-like-comment a:hover, .blog-like-comment a:hover .fa,.portfolio-navigation-wrapper a:hover,.pofo-blog-full-width .author .name a:hover, .pofo-blog-full-width .author .name a:hover .fa,.feature-box.feature-box-7 .box:hover i,.feature-box-8:hover .icon-round-small,.feature-box-9:hover p,.tab-style1 .nav-tabs li:hover i, .tab-style1 .nav-tabs li.active i, .woocommerce ul.products li.product a:hover .woocommerce-loop-product__title, .woocommerce ul.products li.product .price, .woocommerce ul.products li.product .price ins, .woocommerce-page .sidebar ul.product_list_widget li .amount, .woocommerce-page .sidebar ul.product_list_widget li .amount, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce div.product p.price ins, .woocommerce div.product span.price ins, .woocommerce div.product form.cart .group_table td.price, .woocommerce div.product form.cart .group_table td.price ins, .woocommerce div.product form.cart .reset_variations:hover, .woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a, .woocommerce .cart-collaterals .cart_totals td a:hover, .showcoupon, .woocommerce-info a{ color: <?php echo esc_html( $pofo_base_color ) ?>; }
		@media (max-width: <?php echo esc_html( $pofo_header_mobile_menu_breakpoint ) ?>) {
		nav.navbar.bootsnav.sidebar-nav ul.nav li.dropdown ul.dropdown-menu > li.active > ul > li.active > a, header .sidebar-part2 nav.navbar.bootsnav li.dropdown ul.dropdown-menu > li a:hover { color: <?php echo esc_html( $pofo_base_color ) ?>; }
		}
		/* background color */
		.text-decoration-line-through-deep-pink:before, .bg-deep-pink, .bg-deep-pink-hover:hover, .aside-title:after, .social-icon-style-5 a:hover, .social-icon-style-5-light a:hover, .list-style-2 li:before, .list-style-3 li:before, .btn.btn-deep-pink, .btn.btn-transparent-deep-pink:hover, .btn.btn-transparent-deep-pink:focus, .full-width-pull-menu .menu-wrap ul li.open > a:after, header nav.navbar.full-width-pull-menu .mobile-toggle:hover span, .big-menu-links li a:after, .swiper-bottom-scrollbar-full .swiper-scrollbar-drag, .swiper-auto-width .swiper-scrollbar-drag:before, .swiper-button-prev.swiper-prev-style3,.swiper-button-next.swiper-next-style3, .swiper-button-prev.swiper-prev-style4, .swiper-button-next.swiper-next-style4, .feature-box:before, .feature-box .content:before, .feature-box:after, .feature-box .content:after, .feature-box-10:hover .number, .feature-box-13:before, .feature-box.feature-box-17 .box:hover, .counter-feature-box-1:hover, .skillbar-bar-style3 .skillbar-bar, .instafeed-style1 .insta-counts span.count-number, .instagram-style1 .insta-counts span.count-number, .block-3 strong:before, .text-bold-underline:before { background-color: <?php echo esc_html( $pofo_base_color ) ?>; }
		.skillbar-bar-style3 .skillbar-bar { background: -moz-linear-gradient(left, <?php echo esc_html( $pofo_base_color ) ?> 0%, #ffffff 100%); background: -webkit-linear-gradient(left, <?php echo esc_html( $pofo_base_color ) ?> 0%,#ffffff 100%); background: linear-gradient(to right, <?php echo esc_html( $pofo_base_color ) ?> 0%,#ffffff 100%); filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=<?php echo esc_html( $pofo_base_color ) ?>, endColorstr='#ffffff',GradientType=1 ); }
		/* border color */
		.social-icon-style-6 a:hover, .pofo-post-detail-icon a:hover,.btn.btn-deep-pink, .btn.btn-deep-pink:hover, .btn.btn-deep-pink:focus, .btn.btn-transparent-deep-pink, .btn.btn-transparent-deep-pink:hover, .btn.btn-transparent-deep-pink:focus, .border-color-deep-pink, .counter-feature-box-1:hover, .scroll-top-arrow:hover { border-color: <?php echo esc_html( $pofo_base_color ) ?>; }
		/* border bottom color */
		header .sidebar-part2 nav.navbar.bootsnav li.dropdown ul.dropdown-menu > li a:hover, header .sidebar-part2 nav.navbar.bootsnav li.dropdown ul.dropdown-menu > li:hover > a, .feature-box.feature-box-7 .box:hover .content, .feature-box.feature-box-17 .box:hover .content, .text-middle-line-deep-pink:before { border-bottom-color: <?php echo esc_html( $pofo_base_color ) ?>; }

	<?php } ?>

	/* Mobile menu breakpoint */
	@media only screen and (min-width: 320px) and (max-width: <?php echo esc_html( $pofo_header_mobile_menu_breakpoint ) ?>) {
	    .simple-dropdown .dropdown-menu { position: relative; }
	    nav.navbar.bootsnav .simple-dropdown .dropdown-menu > li.dropdown > ul { left: inherit; position: relative; min-width: 0; }
	}

	/* Mobile menu breakpoint */
	@media (max-width: <?php echo esc_html( $pofo_header_mobile_menu_breakpoint ) ?>) {
	    
	    /* bootsnav css start */
	    nav.navbar.bootsnav .navbar-brand { display: inline-block; float: none !important;  margin: 0 !important; }
	    nav.navbar.bootsnav .navbar-header { float: none;  display: block; text-align: center; padding-left: 30px; padding-right: 30px; }
	    nav.navbar.bootsnav .navbar-toggle { display: inline-block; float: right; margin-right: 0; margin-top: 0px;  }
	    nav.navbar.bootsnav .navbar-collapse { border: none; margin-bottom: 0; }
	    nav.navbar.bootsnav.no-full .navbar-collapse{ max-height: 335px; overflow-y: auto !important; }
	    nav.navbar.bootsnav .navbar-collapse.collapse { display: none !important; }
	    nav.navbar.bootsnav .navbar-collapse.collapse.in { display: block !important; }
	    nav.navbar.bootsnav .navbar-nav { float: none !important; padding-left: 30px; padding-right: 30px; margin: 0px -15px; }
	    nav.navbar.bootsnav.navbar-full .navbar-nav {padding: 0; margin: 0}
	    nav.navbar.bootsnav .navbar-nav > li { float: none; }
	    nav.navbar.bootsnav .navbar-nav > li > a { display: block; width: 100%; border-bottom: solid 1px #e0e0e0; padding: 10px 0; border-top: solid 1px #e0e0e0; margin-bottom: -1px; }
	    nav.navbar.bootsnav .navbar-nav > li:first-child > a { border-top: none; }
	    nav.navbar.bootsnav ul.navbar-nav.navbar-left > li:last-child > ul.dropdown-menu { border-bottom: solid 1px #e0e0e0; }
	    nav.navbar.bootsnav ul.nav li.dropdown li a.dropdown-toggle { float: none !important; position: relative; display: block; width: 100%; }
	    nav.navbar.bootsnav ul.nav li.dropdown ul.dropdown-menu { width: 100%; position: relative !important; background-color: transparent; float: none; border: none; padding: 0 0 0 15px !important; margin: 0 0 -1px 0 !important; border-radius: 0px 0px 0px; }
	    nav.navbar.bootsnav ul.nav li.dropdown ul.dropdown-menu  > li > a { display: block; width: 100%; border-bottom: solid 1px #e0e0e0; padding: 10px 0; color: #6f6f6f; }
	    nav.navbar.bootsnav ul.nav ul.dropdown-menu li a:hover, nav.navbar.bootsnav ul.nav ul.dropdown-menu li a:focus { background-color: transparent; }
	    nav.navbar.bootsnav ul.nav ul.dropdown-menu ul.dropdown-menu { float: none !important; left: 0; padding: 0 0 0 15px; position: relative; background: transparent; width: 100%; }
	    nav.navbar.bootsnav ul.nav ul.dropdown-menu li.dropdown.on > ul.dropdown-menu { display: inline-block; margin-top: -10px; }
	    nav.navbar.bootsnav li.dropdown ul.dropdown-menu li.dropdown > a.dropdown-toggle:after { display: none; }
	    nav.navbar.bootsnav .dropdown .megamenu-content .col-menu .title { padding: 10px 15px 10px 0; line-height: 24px; text-transform: none; font-weight: 400; letter-spacing: 0px; margin-bottom: 0; cursor: pointer; border-bottom: solid 1px #e0e0e0; color: #6f6f6f; }
	    nav.navbar.bootsnav .dropdown .megamenu-content .col-menu ul > li > a { display: block; width: 100%; border-bottom: solid 1px #e0e0e0; padding: 8px 0; }
	    nav.navbar.bootsnav .dropdown .megamenu-content .col-menu .title:before { font-family: 'FontAwesome'; content: "\f105"; float: right; font-size: 16px; margin-left: 10px; position: relative; right: -15px; }
	    nav.navbar.bootsnav .dropdown .megamenu-content .col-menu:last-child .title { border-bottom: none; }
	    nav.navbar.bootsnav .dropdown .megamenu-content .col-menu.on:last-child .title { border-bottom: solid 1px #e0e0e0; }
	    nav.navbar.bootsnav .dropdown .megamenu-content .col-menu:last-child ul.menu-col li:last-child a { border-bottom: none; }
	    nav.navbar.bootsnav .dropdown .megamenu-content .col-menu.on .title:before { content: "\f107"; }
	    nav.navbar.bootsnav .dropdown .megamenu-content .col-menu .content { padding: 0 0 0 15px; }
	    nav.bootsnav.brand-center .navbar-collapse { display: block; }
	    nav.bootsnav.brand-center ul.nav { margin-bottom: 0px !important; }
	    nav.bootsnav.brand-center .navbar-collapse .col-half { width: 100%; float: none; display: block; }
	    nav.bootsnav.brand-center .navbar-collapse .col-half.left { margin-bottom: 0; }
	    nav.bootsnav .megamenu-content { padding: 0; }
	    nav.bootsnav .megamenu-content .col-menu { padding-bottom: 0; }
	    nav.bootsnav .megamenu-content .title { cursor: pointer; display: block; padding: 10px 15px; margin-bottom: 0; font-weight: normal; }
	    nav.bootsnav .megamenu-content .content { display: none; }
	    .attr-nav { position: absolute; right: 60px; }
	    .attr-nav > ul { padding: 0; margin: 0 -15px -7px 0; }
	    .attr-nav > ul > li > a { padding: 16px 15px 15px; }
	    .attr-nav > ul > li.dropdown > a.dropdown-toggle:before { display: none; }
	    .attr-nav > ul > li.dropdown ul.dropdown-menu { margin-top: 2px; margin-left: 55px; width: 250px; left: -250px; border-top: solid 5px; }
	    .top-search .container { padding: 0 45px; }
	    nav.navbar.bootsnav li.dropdown .mega-menu-full .sm-display-none.pofo-menu-sidebar { display: none;}
	    nav.menu-center .accordion-menu { padding-right: 0 !important;}
	    .header-searchbar {padding-left: 15px;}
	    .header-social-icon {padding-left: 5px; margin-left: 15px;}
	    header .widget_shopping_cart {padding-left: 14px; margin-left: 14px;}
	    
	    /* ===================================
	        Navbar full responsive
	    =================================*/   
	    
	    nav.bootsnav.navbar-full ul.nav { margin-left: 0; }
	    nav.bootsnav.navbar-full ul.nav > li > a { border: none; }
	    nav.bootsnav.navbar-full .navbar-brand { float: left !important; padding-left: 0; }
	    nav.bootsnav.navbar-full .navbar-toggle { display: inline-block; float: right; margin-right: 0; margin-top: 10px; }
	    nav.bootsnav.navbar-full .navbar-header { padding-left: 15px; padding-right: 15px; }
	    
	    /* ===================================
	        Navbar sidebar
	    =================================*/ 
	    
	    nav.navbar.bootsnav.navbar-sidebar .share { padding: 30px 15px; margin-bottom: 0; }
	    
	    /* ===================================
	        Tabs
	    =================================*/ 
	    nav.navbar.bootsnav .megamenu-content.tabbed { padding-left: 0 !important; }
	    nav.navbar.bootsnav .tabbed > li { padding: 25px 0; margin-left: -15px !important; }
	    
	    /* ===================================
	        Mobile navigation
	    =================================*/
	    
	    body > .wrapper { -webkit-transition: all 0.3s ease-in-out; -moz-transition: all 0.3s ease-in-out; -o-transition: all 0.3s ease-in-out; -ms-transition: all 0.3s ease-in-out; transition: all 0.3s ease-in-out; }
	    body.side-right > .wrapper { margin-left: 280px; margin-right: -280px !important; }
	    nav.navbar.bootsnav.navbar-mobile .navbar-collapse { position: fixed; overflow-y: auto !important; overflow-x: hidden !important; display: block; background: #fff; z-index: 99; width: 280px; height: 100% !important; left: -280px; top: 0; padding: 0;  -webkit-transition: all 0.3s ease-in-out;   -moz-transition: all 0.3s ease-in-out; -o-transition: all 0.3s ease-in-out; -ms-transition: all 0.3s ease-in-out; transition: all 0.3s ease-in-out; }
	    nav.navbar.bootsnav.navbar-mobile .navbar-collapse.in { left: 0; }
	    nav.navbar.bootsnav.navbar-mobile ul.nav { width: 293px; padding-right: 0; padding-left: 15px; }
	    nav.navbar.bootsnav.navbar-mobile ul.nav > li > a { padding: 15px 15px; }
	    nav.navbar.bootsnav.navbar-mobile ul.nav ul.dropdown-menu > li > a {  padding-right: 15px !important; padding-top: 15px !important; padding-bottom: 15px !important; }
	    nav.navbar.bootsnav.navbar-mobile ul.nav ul.dropdown-menu .col-menu .title { padding-right: 30px !important; padding-top: 13px !important; padding-bottom: 13px !important; }
	    nav.navbar.bootsnav.navbar-mobile ul.nav ul.dropdown-menu .col-menu ul.menu-col li a { padding-top: 13px !important; padding-bottom: 13px !important; }
	    nav.navbar.bootsnav.navbar-mobile .navbar-collapse [class*=' col-'] { width: 100%; }
	    nav.navbar.bootsnav.navbar-fixed .logo-scrolled { display: block !important; }
	    nav.navbar.bootsnav.navbar-fixed .logo-display { display: none !important; }
	    nav.navbar.bootsnav.navbar-mobile .tab-menu,
	    nav.navbar.bootsnav.navbar-mobile .tab-content { width: 100%; display: block; }
	    nav.navbar.bootsnav.navbar-brand-top .navbar-collapse.collapse.display-inline-block { display: none !important; }
	    nav.navbar.bootsnav.navbar-brand-top .navbar-collapse.collapse.in.display-inline-block { display: block !important; }
	    /* bootsnav css end */

	    /* mini header */
	    .header-with-topbar.sticky-mini-header.sticky nav.navbar.sidebar-nav.sidebar-nav-style-1 .sidenav-header {top: 32px;}
	    .header-with-topbar.sticky-mini-header.sticky .left-nav, .header-with-topbar.sticky-mini-header.sticky .sidebar-part1 {top: 32px;}

	    /* header style */
	    nav.navbar.bootsnav li.dropdown .mega-menu-full > ul li a.dropdown-header {padding: 1px 0;}
	    .dropdown-menu {box-shadow: none; border: none; border-top: 1px solid rgba(255, 255, 255, 0.06);}
	    .navbar-collapse {left: 0; padding:0; position: absolute; top: 100%; width: 100%;}
	    nav.navbar.bootsnav ul.nav > li.dropdown > ul.dropdown-menu, nav.navbar.bootsnav ul.nav li.dropdown ul.dropdown-menu.mega-menu {padding: 5px 15px 0 !important; margin: 0; float: left; top: 0 !important;}
	    nav.navbar.bootsnav .navbar-nav {margin: 0 !important; padding: 0; background-color: rgba(23, 23, 23, 0.95);}
	    nav.navbar.bootsnav li.dropdown .mega-menu-full > ul > li {border-bottom: none; border-right: 0; margin-bottom: 16px; width: 100%; height: auto !important;}
	    nav.navbar.bootsnav li.dropdown .mega-menu-full > ul > li:last-child {margin-bottom: 0}
	    nav.navbar.bootsnav .navbar-nav li, nav.navbar.bootsnav li.dropdown ul.mega-menu-full li.dropdown-header {display: block; clear: both; border-bottom: 1px solid rgba(255, 255, 255, 0.06); border-top: 0;}
	    nav.navbar.navbar-default ul.nav > li > a, nav.navbar-brand-top.navbar.navbar-default ul.nav > li > a, header .navbar-nav li > a, nav.navbar.bootsnav li.dropdown ul.mega-menu-full li > a,header.sticky nav.navbar.navbar-default.navbar-fixed-top ul.nav > li > a, header.sticky nav.navbar.navbar-default.navbar-top ul.nav > li > a, nav.navbar.bootsnav li.dropdown ul.mega-menu-full li.dropdown-header{ margin: 0; padding: 9px 15px 8px; display: block; line-height: normal;}
	    nav.navbar.navbar-default ul.nav > li > a, header .navbar-nav li > a, header.sticky nav.navbar.navbar-default.navbar-fixed-top ul.nav > li > a {color: #fff;}
	    nav.navbar.bootsnav ul.nav > li.dropdown > ul.dropdown-menu  li a, nav.navbar.bootsnav ul.nav li.dropdown ul.dropdown-menu.mega-menu li a, nav.navbar.bootsnav li.dropdown ul.mega-menu-full li.dropdown-header {padding-left: 0; padding-right: 0;}
	    .simple-dropdown.open > ul > li {border: 0 !important}
	    nav.navbar.bootsnav li.dropdown ul.mega-menu-full li.dropdown-header {color: #fff;}
	    nav.navbar.bootsnav li.dropdown .mega-menu-full > ul > li > ul {margin-top: 2px !important; border-top: 1px solid rgba(255, 255, 255, 0.06);}
	    nav.navbar.bootsnav ul.nav li.dropdown ul.dropdown-menu  > li > a {color: #939393; border-bottom: 1px solid rgba(255, 255, 255, 0.06);}
	    nav.navbar.bootsnav ul.nav li.dropdown.simple-dropdown ul.dropdown-menu > li.active > a{background-color: transparent; color: #fff;}
	    nav.navbar.bootsnav ul.nav li.dropdown ul.dropdown-menu  > li:hover > a {color: #fff;}
	    nav.navbar.bootsnav li.dropdown ul.mega-menu-full li ul {margin-top: 0}
	    .navbar-nav > li.simple-dropdown ul.dropdown-menu {top: 0; min-width: 0;}
	    nav.navbar.bootsnav ul.nav li.dropdown.simple-dropdown > .dropdown-menu {background-color: #232323;}
	    nav.navbar.bootsnav .navbar-toggle {top: 4px;}
	    .navbar-nav > li.dropdown > i {display: block; position: absolute; right: 0px; top: 0; color: #fff; font-size: 16px; cursor: pointer; padding: 9px 15px 8px}
	    nav.navbar.bootsnav .navbar-nav > li.dropdown.open > ul, nav.navbar.bootsnav .navbar-nav > li.dropdown.on > ul {display: block !important; opacity: 1 !important}
	    nav.navbar.bootsnav ul.nav li.dropdown ul.dropdown-menu > li > a{ border: 0; padding: 10px 0}       
	    nav.navbar.bootsnav ul.nav li.dropdown.simple-dropdown ul.dropdown-menu > li.active > a, nav.navbar.bootsnav ul.nav li.dropdown.simple-dropdown ul.dropdown-menu > li.current-menu-ancestor > a, nav.navbar.bootsnav ul.nav li.dropdown.simple-dropdown ul.dropdown-menu > li.current-menu-item > a {color: #fff}
	    header nav.navbar .navbar-nav > li.active > a, nav.navbar.bootsnav ul.nav > li.active > a, header nav.navbar .navbar-nav > li.current-menu-ancestor > a, nav.navbar.bootsnav ul.nav > li.current-menu-ancestor > a {color: rgba(255,255,255,0.6)}
	    .navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:focus, .navbar-default .navbar-nav > .open > a:hover {color: rgba(255,255,255,0.6)}
	    nav.navbar.bootsnav ul.nav li.dropdown.simple-dropdown ul.dropdown-menu > li > a{padding: 7px 0; left: 0}
	    nav.navbar.bootsnav ul.nav li.dropdown.simple-dropdown > ul > li > a {color: #fff;}
	    .dropdown.simple-dropdown.open .dropdown-menu .dropdown .dropdown-menu {display: block !important; opacity: 1 !important;}
	    nav.navbar.bootsnav ul.nav li.dropdown.simple-dropdown.open ul.dropdown-menu li > a.dropdown-toggle {border-bottom: 1px solid rgba(255, 255, 255, 0.06); color: #fff;}
	    nav.navbar.bootsnav ul.nav .simple-dropdown ul.dropdown-menu li.dropdown ul.dropdown-menu {padding-left: 0 !important; margin: 2px 0 12px !important; border-top: 1px solid rgba(255, 255, 255, 0.06); padding: 0;}
	    .simple-dropdown .dropdown-menu > li > a.dropdown-toggle i {display:none}
	    nav .accordion-menu {padding: 26px 15px 26px 15px;}
	    .sticky nav .accordion-menu {padding: 26px 15px 26px 15px;}
	    nav.navbar.bootsnav.menu-center ul.nav.navbar-center {width:100%;}
	    .center-logo {left: 15px; transform: translateX(0px); -moz-transform: translateX(0px); -webkit-transform: translateX(0px); -o-transform: translateX(0px); max-width:100%;}
	    .navbar-right { float: left !important; }
	    .navbar-nav li {position: relative}
	    nav.navbar.bootsnav li.dropdown ul.mega-menu-full > li {padding: 0; border: 0;}
	    nav.navbar.bootsnav .simple-dropdown .dropdown-menu > li {padding-left: 0; padding-right: 0;}
	    nav.navbar.bootsnav ul.navbar-nav.navbar-left > li:last-child > ul.dropdown-menu {border: 0;}
	    header nav.navbar.bootsnav ul.nav > li.current-menu-item > a, header nav.navbar.bootsnav ul.nav > li.current-menu-ancestor > a, header nav.navbar.bootsnav ul.nav > li > a:hover, header nav.navbar .header-menu-button a:hover, header #lang_sel a.lang_sel_sel:hover, header nav.navbar.bootsnav ul.nav > li.dropdown.on > a {color: rgba(255,255,255,0.6)}
	    header.sticky nav.navbar.white-link .navbar-nav > li > a:hover, header.sticky nav.navbar.bootsnav.white-link ul.nav > li > a:hover, header.sticky nav.navbar.white-link .navbar-nav > li > a.active, header.sticky nav.navbar.bootsnav.white-link ul.nav > li > a.active {color: rgba(255,255,255,0.6);}
	    nav.navbar.bootsnav li.dropdown .mega-menu-full > ul li.dropdown-header {width: 100%; padding-top: 8px; padding-bottom: 8px; border-bottom: 1px solid rgba(255, 255, 255, 0.06);}
	    nav.navbar.navbar-default ul li.dropdown .dropdown-menu li > a:hover, nav.navbar.navbar-default ul li.dropdown .dropdown-menu li:hover > a {left: 0;}
	    .dropdown-menu { display: none !important; position: inherit; width: 100%;}
	    .dropdown.open > div {display: block !important; opacity: 1 !important;}
	    nav.menu-logo-center .accordion-menu {padding: 26px 15px;}
	    .sticky nav.menu-logo-center .accordion-menu {padding: 26px 15px;}
	    nav.navbar.sidebar-nav.bootsnav .navbar-left-sidebar li a:hover, nav.navbar.sidebar-nav.bootsnav .navbar-left-sidebar li.active > a {color: #000;}
	    header .sidebar-part2 nav.navbar.bootsnav ul > li > a:hover, header .sidebar-part2 nav.navbar.bootsnav ul > li.active > a {color: rgba(0, 0, 0, 0.6);}
	    nav.navbar .container-fluid {padding-left: 24px; padding-right: 24px;}
	    .top-header-area .container-fluid {padding-left: 24px; padding-right: 24px;}
	    #search-header {width: 75%}
	    nav.navbar.bootsnav li.dropdown .mega-menu-full > ul > li:last-child img {padding-left: 0;}
	    nav.navbar.bootsnav li.dropdown .mega-menu-full > ul > li > .widget_media_image {width: 48%; float: left; margin-bottom: 0}
	    nav.navbar.bootsnav li.dropdown .mega-menu-full > ul > li > .widget_media_image:last-child {float: right;}
	    .navbar-nav > li > a > i, .navbar-nav > li ul > li > a > i, .navbar-nav > li .mega-menu-full ul > li > a > i {top: 0; margin-bottom: 0;}
	    .navbar-nav > li.simple-dropdown ul > li > ul > li > a > i {top: 1px;}
	    .navbar-nav > li.simple-dropdown ul > li > a > i {top: -1px;}
	    .navbar-nav > li.simple-dropdown ul li .fa-angle-right {display: none;}
	    .navbar-nav > li > a > i, .navbar-nav > li ul > li > a > i {min-width: 20px;}
	    nav.navbar.bootsnav li a {padding-top: 1px; padding-bottom: 1px;}
	    .hamburger-wp-menu .header-searchbar {margin-left: 10px;}
	    header .sidebar-part2 nav.navbar.bootsnav ul > li.menu-item-has-children > a {padding-right: 20px;}
	    .navbar-nav > li.dropdown.open > .dropdown-toggle.fa-angle-down:before{content:"\f106"}
	    .search-form .search-button {font-size: 15px;}
	    .menu-center .header-right-col { width: auto;}
            .menu-new a:after { margin-top: 0; }

	    /* top logo */
	    .navbar.navbar-brand-top.bootsnav .navbar-toggle {float: left !important; top: 5px;}
	    .navbar-brand-top .brand-top-menu-right {float: right; padding-left: 30px;}
	    .navbar-brand-top .accordion-menu { width: auto; padding: 26px 15px 26px 15px;}
	    header nav.navbar-brand-top .row>div:first-child { flex: 1 1 auto !important; width: auto; }
	    .navbar-brand-top .nav-header-container { text-align: left !important; }
	    .navbar-brand-top .nav-header-container .row { align-items: center !important; display: -ms-flex !important; display: -webkit-flex !important; display: flex !important; height: auto; padding: 0 !important; }
	    .navbar-brand-top .accordion-menu { width: auto !important;}
	    .navbar-brand-top .navbar-brand { width: auto !important;}

	    /* sidebar nav style 1 */
	    nav.navbar.bootsnav.sidebar-nav .navbar-nav, .sidebar-part2 nav.navbar.bootsnav .navbar-nav {background-color: transparent; padding:0 0px 0 0}
	    nav.navbar.bootsnav.sidebar-nav .navbar-nav {padding:0; margin-right: 50px}
	    nav.navbar.bootsnav.sidebar-nav.sidemenu-open .navbar-nav {margin-right: 0}
	    nav.navbar.bootsnav.sidebar-nav .nav.navbar-left-sidebar .dropdown .second-level, .sidebar-part2 nav.navbar.bootsnav .nav.navbar-left-sidebar .dropdown .second-level {display: none !important}
	    nav.navbar.bootsnav.sidebar-nav .navbar-left-sidebar > li > a, .sidebar-part2 nav.navbar.bootsnav .navbar-left-sidebar > li > a {margin: 0; padding: 14px 15px 14px 0}
	    nav.navbar.bootsnav.sidebar-nav .nav.navbar-left-sidebar li a, .sidebar-part2 nav.navbar.bootsnav .nav.navbar-left-sidebar li a, nav.navbar.bootsnav.sidebar-nav ul.nav li.dropdown.open ul.dropdown-menu > li > ul.third-level > li, .sidebar-nav-style-1 .nav.navbar-left-sidebar li ul.sub-menu li, nav.navbar.bootsnav.sidebar-nav-style-1 ul.nav li.dropdown.open {border-bottom: 0;}
	    nav.navbar.bootsnav.sidebar-nav .nav.navbar-left-sidebar .dropdown.open .second-level,nav.navbar.bootsnav.sidebar-nav .nav.navbar-left-sidebar .dropdown.open .second-level .dropdown .third-level, .sidebar-part2 nav.navbar.bootsnav .nav.navbar-left-sidebar .dropdown.open .second-level, .sidebar-part2 nav.navbar.bootsnav .nav.navbar-left-sidebar .dropdown.open .second-level .dropdown .third-level {display:block !important; left: 0; width: 100%; height: auto; visibility: visible; opacity: 1 !important; background: transparent; padding: 0 0 0 8px !important}
	    header .sidebar-part2 nav.navbar.bootsnav li.dropdown ul.dropdown-menu > li a:hover {border: 0; color: #ff214f}
	    nav.navbar.bootsnav.sidebar-nav-style-1 ul.nav li.dropdown.open > ul {margin-top: -10px !important;}
	    .sidebar-part1 {position: inherit; width: 50px; float: left;}
	    .sidebar-part3 {position: absolute; right: 0; bottom: inherit; top: 0;}
	    .left-nav {height: 50px; width: 100%;}
	    header .sidebar-part2 nav.navbar.bootsnav li.dropdown ul.dropdown-menu > li a:hover, header .sidebar-part2 nav.navbar.bootsnav li.dropdown ul.dropdown-menu > li:hover > a, header .sidebar-part2 nav.navbar.bootsnav li.dropdown ul.dropdown-menu > li.active > a, header .sidebar-part2 nav.navbar.bootsnav li.dropdown ul.dropdown-menu > li.current-menu-item > a, header .sidebar-part2 nav.navbar.bootsnav li.dropdown ul.dropdown-menu > li.current-menu-ancestor > a {border: 0;}
	    .header-with-topbar .left-nav, .header-with-topbar .sidebar-part1 {top: 32px;}
	    .sticky.header-with-topbar .left-nav, .sticky.header-with-topbar .sidebar-part1 {top: 0;}
	    .sidebar-wrapper {padding-left: 0;}
	    nav.navbar.sidebar-nav {transition-duration: 0.3s; -webkit-transition-duration: 0.3s; -moz-transition-duration: 0.3s; -ms-transition-duration: 0.3s; -o-transition-duration: 0.3s; transition-property: display; -webkit-transition-property: display; -moz-transition-property: display; -ms-transition-property: display; -o-transition-property: display; left:-280px; width: 280px; z-index: 10005; padding: 60px 15px 15px; display:inline-block;}
	    nav.navbar.sidebar-nav.sidebar-nav-style-1 .sidenav-header {position: fixed; top: 0; left: 0; background: #fff; z-index: 1;}
	    nav.navbar.sidebar-nav.sidebar-nav-style-1 .mobile-toggle span:last-child {margin-bottom: 3px;}
	    nav.navbar.sidebar-nav.sidemenu-open {left:0;}
	    nav.navbar.sidebar-nav .navbar-toggle .icon-bar {background: #232323;}
	    nav.navbar.bootsnav.sidebar-nav .navbar-collapse.collapse, .sidebar-part2 nav.navbar.bootsnav .navbar-collapse.collapse {display:block !important; max-height: 100%; position: relative; top: 0;}
	    nav.navbar.bootsnav.sidebar-nav .mobile-scroll {display: block; max-height: 80%; overflow-y: auto; position: absolute}
	    .sidebar-nav .logo-holder, .sidebar-nav .footer-holder {padding: 0; text-align: left; display: inline-block;}
	    .sidebar-nav .logo-holder {min-height: 0; padding: 15px 0}
	    .sidebar-nav.sidemenu-open .footer-holder {width: 100%; padding: 0; margin-right: 0;}
	    .sidebar-nav .footer-holder {margin-right: 15px;}
	    .sidebar-nav .footer-holder .navbar-form {margin: 0 auto;}
	    nav.navbar.bootsnav.sidebar-nav .navbar-toggle {margin-bottom: 0; position: absolute; top: auto; vertical-align: middle; height: 100%; right: 15px;}
	    nav.navbar.bootsnav.sidebar-nav .nav.navbar-left-sidebar .dropdown li:first-child {margin-top: 0}
	    nav.navbar.bootsnav.sidebar-nav ul.nav li.dropdown ul.dropdown-menu li {opacity: 1; visibility: visible}
	    nav.navbar.bootsnav.sidebar-nav ul.nav li.dropdown ul.dropdown-menu > li > a {margin: 0 0 12px 0; border-bottom: 1px solid #ededed !important;}
	    nav.navbar.bootsnav.sidebar-nav ul.nav li.dropdown ul.dropdown-menu > li.active > ul > li.active > a {color: #ff214f;}
	    nav.navbar.bootsnav.sidebar-nav ul.nav li.dropdown ul.dropdown-menu > li > a i{display: none}
	    nav.navbar.bootsnav.sidebar-nav ul.nav li.dropdown.open ul.dropdown-menu  > li > ul.third-level > li > a {border-bottom: 0 !important; font-size: 11px; padding: 0 !important;}
	    nav.navbar.bootsnav.sidebar-nav ul.nav li.dropdown.open ul.dropdown-menu  > li > ul.third-level > li:first-child > a {padding-top: 10px;}
	    nav.navbar.bootsnav.sidebar-nav ul.nav li.dropdown.open ul.dropdown-menu  > li:last-child > ul.third-level > li:last-child > a {margin-bottom: 15px}
	    nav.navbar.bootsnav.sidebar-nav ul.nav li.dropdown.open ul.dropdown-menu  > li > ul.fourth-level > li > a {border-bottom: 0 !important; font-size: 11px; padding: 0 !important;}
	    nav.navbar.bootsnav.sidebar-nav ul.nav li.dropdown.open ul.dropdown-menu  > li > ul.fourth-level > li:first-child > a {padding-top: 10px;}
	    nav.navbar.bootsnav.sidebar-nav ul.nav li.dropdown.open ul.dropdown-menu  > li:last-child > ul.fourth-level > li:last-child > a {margin-bottom: 15px}
	    nav.navbar.bootsnav.sidebar-nav ul.nav li.dropdown.open ul.dropdown-menu  li {margin-bottom: 10px;}
	    .left-nav-sidebar header.site-header > .header-mini-cart {position: fixed; left: inherit; top: 3px; z-index: 99999; right: 41px;}
    	.left-nav-sidebar header.site-header > .header-mini-cart .widget_shopping_cart_content {right: 0; left: inherit; top: 45px;}
    	.admin-bar nav.navbar.sidebar-nav.sidebar-nav-style-1 { padding-top: 100px}
    	.admin-bar .sticky nav.navbar.sidebar-nav.sidebar-nav-style-1 { padding-top: 60px}

	    /* sidebar nav style 2 */
	    .sidebar-part2 .sidebar-middle {padding: 30px 0 110px; display: block;}
	    .sidebar-part2 .sidebar-middle-menu {display: block; max-height: 100%;}
	    .sidebar-part1 img {max-height: 50px !important; width:  auto;}
	    .sidebar-part1 {width: 50px}
	    .sidebar-part2 nav.navbar.bootsnav .navbar-nav {background: transparent; padding: 0}
	    .sidebar-part2 ul > li {width: 100%; padding: 5px 30px 5px 0;}
	    header .sidebar-part2 nav.navbar.bootsnav ul > li > a > i.fa-angle-right {right: -25px; top: 0px; font-size: 22px; text-align: center;}
	    .bottom-menu-icon a,.nav-icon span {width: 20px}
	    .bottom-menu-icon a {margin-top: 2px;}
	    .bottom-menu-icon {width:50px; padding: 13px 10px 11px;}
	    .sidebar-part2:before {bottom: 55px; display: none;}
	    .sidebar-part2 {background-color: #fff; border-right: 0 solid #dfdfdf; height: 100%; left: -300px; padding: 50px 20px 0; position: fixed; top: 0; text-align: center; width:300px; z-index: -1; transition: ease-in-out 0.5s}
	    .sidebar-part2 .right-bg {display: none; position: absolute; right: 0; top: 0; transform: translateY(0); -moz-transform: translateY(0px); -webkit-transform: translateY(0px); -o-transform: translateY(0px); left: 0; -ms-transform: rotate(90deg); -webkit-transform: rotate(90deg); transform: rotate(90deg);}
	    .sidebar-part2 nav.navbar.bootsnav li.dropdown ul.dropdown-menu:before {display: none;}
	    .sidebar-part2 nav.navbar.bootsnav li.dropdown.open ul.dropdown-menu {display: block !important; opacity: 1 !important}
	    .sidebar-part2 nav.navbar.bootsnav li.dropdown ul.dropdown-menu,.sidebar-part2 nav.navbar.bootsnav li.dropdown ul.dropdown-menu .third-level {top: 0; transform: translateY(0); -moz-transform: translateY(0px); -webkit-transform: translateY(0px); -o-transform: translateY(0px); left: 0; background-color: transparent !important; padding-left: 10px !important;}
	    header .sidebar-part2 nav.navbar.bootsnav ul li ul li {padding: 0 0 1px 0;}
	    .sidebar-part2 nav.navbar.bootsnav ul.nav li.dropdown ul.dropdown-menu > li > a {color: #232323; padding: 0; margin-bottom: 2px; font-weight: 400;}
	    header .sidebar-part2 nav.navbar.bootsnav li.dropdown ul.dropdown-menu > li.active > a, header .sidebar-part2 nav.navbar.bootsnav li.dropdown ul.dropdown-menu > li.current-menu-item > a, header .sidebar-part2 nav.navbar.bootsnav li.dropdown ul.dropdown-menu > li.current-menu-ancestor > a {color: #ff214f;}
	    .sidebar-part2 nav.navbar.bootsnav ul.nav li.dropdown ul.dropdown-menu > li > a > i{display: none}
	    header .sidebar-part2 nav.navbar.bootsnav ul > li > a {font-size: 20px; line-height: 24px; border: 0}
	    .sidebar-part2 nav.navbar.bootsnav li.dropdown.open ul.dropdown-menu .third-level {display: inherit;}

	    .sidebar-part2 nav.navbar {text-align: left;}
	    header .sidebar-part2 nav.navbar.bootsnav ul li.dropdown .dropdown-menu.second-level > li > a {font-weight: 500; margin-top: 8px; margin-bottom: 0}
	    header .sidebar-part2 nav.navbar.bootsnav ul li.dropdown .dropdown-menu.second-level > li:last-child {margin-bottom: 8px}
	    header .sidebar-part2 nav.navbar.bootsnav ul li.dropdown .dropdown-menu.second-level > li > .dropdown-menu.third-level > li:first-child > a {margin-top: 8px}
	    .sidebar-part2 .widget ul {position: relative; bottom: -22px;}
	    .sidebar-part2 .widget ul li {padding: 0 10px;}
	    header .sidebar-part2 nav.navbar.bootsnav .navbar-nav li, header .sidebar-part2 nav.navbar.bootsnav .navbar-nav li a, header .sidebar-part2 nav.navbar.bootsnav li.dropdown.open ul.dropdown-menu > li > a {border: 0;}
	    .left-nav-sidebar { padding-left: 0; }
	    header.site-header > .header-mini-cart {right: 40px; top: 5px; left: inherit; z-index: 99990;}
    	header.site-header > .header-mini-cart .widget_shopping_cart_content {top: 49px; left: inherit; right: 0;}
	    
	    /* mega menu */
	    nav.navbar.bootsnav li.dropdown .menu-back-div > ul {width: 100%; display: inline-block;}
	    nav.navbar.bootsnav li.dropdown .mega-menu-full {padding: 5px 15px 0 15px}
	    nav.navbar.bootsnav li.dropdown .mega-menu-full > ul li a {padding: 8px 0; margin: 0;}
	    header nav.navbar .navbar-nav > li.active > a, nav.navbar.bootsnav ul.nav > li.active > a, .dropdown-menu,  header nav.navbar .navbar-nav > li.active > a, nav.navbar.bootsnav ul.nav > li.active > a   {color:rgba(255,255,255,0.6);}
	    nav.navbar.bootsnav li.dropdown .mega-menu-full {position: relative;}
	    nav.navbar.bootsnav li.dropdown ul li ul li:last-child{border-bottom: none;}
	    nav.navbar.bootsnav li.dropdown ul li ul li { width: 100%; }

	    /* default menu */
	    .navbar-nav > li.page_item ul.children, .navbar-nav > li.page_item > ul li > ul.children {display: block; min-width: 100%; padding: 0 0 15px; position: inherit;}
	    .navbar-nav > li.page_item > ul li > ul.children > li:last-child, .navbar-nav > li.page_item ul.children > li:last-child {border-bottom: 0;}
	    .navbar-nav > li.page_item > ul li > ul.children {left: 0; top: 0;}
	    .navbar-nav > li.page_item ul.children > li {padding-left: 15px;}
	    .navbar-nav > li.dropdown > .fa-angle-down { display: block; }

	    nav.mobile-menu ul.nav > li > a, nav.mobile-menu ul.nav > li i.dropdown-toggle {color: #ffffff !important}
	    nav.mobile-menu ul > li > ul > li > a, nav.mobile-menu ul > li.simple-dropdown > ul > li > ul > li > a {color: rgba(255, 255, 255, 0.6) !important}
	    nav.mobile-menu.navbar.bootsnav li.dropdown .mega-menu-full > ul li a.dropdown-header, nav.navbar.bootsnav.mobile-menu ul.nav li.dropdown.simple-dropdown > ul > li > a  {color: #ffffff !important}
	    header nav.navbar.bootsnav.mobile-menu ul.nav > li.current-menu-ancestor > a, nav.navbar.bootsnav ul.nav li.dropdown.simple-dropdown ul.dropdown-menu > li.current-menu-item > a {color: rgba(255, 255, 255, 0.6) !important}
	    nav.navbar.bootsnav.mobile-menu li.dropdown .mega-menu-full > ul li.current-menu-item > a, nav.mobile-menu.navbar.bootsnav li.dropdown .mega-menu-full > ul li.current-menu-ancestor a.dropdown-header, nav.mobile-menu.navbar.bootsnav li.dropdown .mega-menu-full > ul li.current-menu-ancestor a.dropdown-header, nav.mobile-menu.navbar.bootsnav li.dropdown .mega-menu-full > ul li.active a.dropdown-header, header nav.navbar.mobile-menu .navbar-nav > li > a.active, nav.navbar.bootsnav.mobile-menu ul.nav > li > a.active {color: #fff !important}
	    nav.navbar.bootsnav.mobile-menu ul.nav li.dropdown.simple-dropdown ul.dropdown-menu > li.current-menu-ancestor > a, nav.navbar.bootsnav.mobile-menu ul.nav li.dropdown.simple-dropdown ul.dropdown-menu > li.current-menu-item > a, nav.navbar.bootsnav.mobile-menu ul.nav li.dropdown.simple-dropdown ul.dropdown-menu > li.active > a {color: #fff !important;}
	    nav.mobile-menu.navbar.bootsnav .navbar-nav li, nav.mobile-menu.navbar.bootsnav.menu-logo-center .navbar-nav.navbar-left > li:last-child {border-bottom: 1px solid rgba(255, 255, 255, 0.06) !important}    
	    nav.mobile-menu.navbar.bootsnav li.dropdown .mega-menu-full > ul > li > ul, nav.mobile-menu.navbar.bootsnav ul.nav .simple-dropdown ul.dropdown-menu li.dropdown ul.dropdown-menu {border-top: 1px solid rgba(255, 255, 255, 0.06) !important}
	    nav.mobile-menu.navbar.bootsnav .navbar-nav {background-color: rgba(23, 23, 23, 0.95) !important;}
	    nav.mobile-menu.navbar.bootsnav li.dropdown .mega-menu-full, nav.navbar.bootsnav.mobile-menu ul.nav li.dropdown.simple-dropdown > .dropdown-menu {background: #232323 !important;}
	    nav.mobile-menu.navbar.bootsnav li.dropdown .mega-menu-full > ul > li:last-child {border: 0 none !important;}
	    nav.mobile-menu.navbar.bootsnav li.dropdown .mega-menu-full > ul > li:last-child, nav.mobile-menu.navbar.bootsnav .navbar-nav li:last-child {border-bottom: 0 none !important;}
	    nav.mobile-menu.navbar.bootsnav .navbar-nav li ul > li.menu-item-has-children {border-bottom: 0 none !important;}

	    .sidebar-nav-style-1 .nav.navbar-left-sidebar li {padding: 0 0 0 0;}
	    .sidemenu-open .mobile-toggle span:first-child{transform: rotate(45deg) translate(7px); -webkit-transform: rotate(45deg) translate(7px); -mox-transform: rotate(45deg) translate(7px); -o-transform: rotate(45deg) translate(7px); -ms-transform: rotate(45deg) translate(7px);}
	    .sidemenu-open .mobile-toggle span:nth-child(2){transform: scale(0); -webkit-transform: scale(0); -mox-transform: scale(0); -o-transform: scale(0); -ms-transform: scale(0);}
	    .sidemenu-open .mobile-toggle span:last-child{transform: rotate(-45deg) translate(7px); -webkit-transform: rotate(-45deg) translate(7px); -moz-transform: rotate(-45deg) translate(7px); -o-transform: rotate(-45deg) translate(7px); -ms-transform: rotate(-45deg) translate(7px);}
	    nav.navbar.bootsnav.sidebar-nav.sidebar-nav-style-1 .dropdown.open > a > i, .sidebar-part2 nav.navbar.bootsnav li.dropdown.open > a > i {transform: rotate(90deg); -webkit-transform: rotate(90deg); -mox-transform: rotate(90deg); -o-transform: rotate(90deg); -ms-transform: rotate(90deg);}
	    .sidebar-nav-style-1 .navbar-collapse {box-shadow: none;}
	    nav.sidebar-nav-style-1.navbar.bootsnav ul.nav > li:last-child {border-bottom: 1px solid #e5e5e5;}
	    .sidebar-nav .footer-holder .navbar-form {box-shadow: none;}
	    .header-with-topbar nav.navbar.sidebar-nav.sidebar-nav-style-1 .sidenav-header {top: 32px;}
	    .sticky.header-with-topbar nav.navbar.sidebar-nav.sidebar-nav-style-1 .sidenav-header {top: 0;}
	    .hamburger-menu-logo-center .container-fluid .menu-left-part {padding-left: 0;}
	    .hamburger-menu-logo-center .container-fluid .menu-right-part {padding-right: 3px;}

	    /* brand center */ 
	    .brand-center .accordion-menu {float: right;}
	    .brand-center .center-logo {max-width: 100%;}

	    /* bootstrap css */
	    nav.navbar.bootsnav .navbar-toggle { background-color: transparent !important; border: none; padding: 0; font-size: 18px; position: relative; top: 3px; display: inline-block !important; margin-right: 0; margin-top: 0px; }
	    nav.navbar.bootsnav .navbar-collapse.collapse { display: none !important; }
	    nav.navbar.bootsnav .navbar-collapse.collapse.in { display: block !important; overflow-y: auto !important; }
	    nav.navbar.bootsnav.no-full .navbar-collapse { max-height: 335px; overflow-y: hidden !important; }
	    nav.navbar.bootsnav .navbar-collapse { border: none; margin-bottom: 0; }
	    .navbar-collapse.in { overflow-y: visible; overflow-y: auto; }
	    .collapse.in { display: block; }
	    nav.navbar.bootsnav .navbar-nav { float: none !important; padding-left: 0; padding-right: 0; margin: 0px -15px; width: 100%; text-align: left; }
	    nav.navbar.bootsnav .navbar-nav > li { float: none !important; }
	    nav.navbar.bootsnav .navbar-nav > li > a { display: block; width: 100%; border-bottom: solid 1px #e0e0e0; padding: 10px 0; border-top: solid 1px #e0e0e0; margin-bottom: -1px; }
	    .navbar-nav > li { position: inherit; }
	    .nav > li { position: relative; display: block; }
	    nav.navbar.bootsnav .navbar-nav > li:first-child > a { border-top: none; }
	    .navbar-nav > li > a { padding-top: 15px; padding-bottom: 15px; }
	    
	    /* hamburger menu */
	    .full-width-pull-menu .menu-wrap div.full-screen { width: 100%; }
	    .full-width-pull-menu .hidden-xs { display: none; }

	    /* new css */
	    .header-menu-button { display: none !important; }
	    .menu-center .header-right-col > div:first-child { border-left: 1px solid rgba(255,255,255,0.15); }
	    .navbar-nav .open .dropdown-menu { position: static !important; }
	    .nav.navbar-left-sidebar li a { padding: 14px 15px 14px 0!important; }
	    
	    /* left nav */
	    .sidebar-part1, .bottom-menu-icon {width: 50px}
	    .bottom-menu-icon {padding: 8px 15px;}
	    
	    .sidebar-part3 {top: 6px;}
	    .sidebar-part2 .sidebar-middle { padding: 15px 0 100px; }
	    .sidebar-part2 .widget ul {bottom: -12px;}
	    
	    /* left sidebar style 2 */
	    .sidebar-part2 {width: 280px; left: -280px;}
	    .sidebar-part2 .right-bg {right: 15px;}

	    /* admin bar menu */
	    .admin-bar .sticky .left-nav, .admin-bar .sticky nav.navbar.sidebar-nav.sidebar-nav-style-1 .sidenav-header { top: 0 !important; margin-top: 0 !important; }
	    .admin-bar .left-nav {  top: 32px !important}
	    .admin-bar .sidebar-part1 { top: 32px; }
	    .admin-bar .header-with-topbar .left-nav, .admin-bar .header-with-topbar .sidebar-part1, .admin-bar .header-with-topbar nav.navbar.sidebar-nav {top: 62px !important;}
	     .admin-bar .header-with-topbar.sticky .left-nav, .admin-bar .header-with-topbar.sticky .sidebar-part1, .admin-bar .header-with-topbar.sticky nav.navbar.sidebar-nav {top: 32px !important;}
	     .admin-bar .header-with-topbar.sticky-mini-header.sticky .left-nav, .admin-bar  .header-with-topbar.sticky-mini-header.sticky .sidebar-part1 {top: 62px !important;}
		.admin-bar .header-with-topbar.sticky-mini-header.sticky > .header-mini-cart { top: 66px !important;}
		.admin-bar .sticky.header-with-topbar nav.navbar.sidebar-nav.sidebar-nav-style-1 .sidenav-header {top: 30px  !important;}
		.admin-bar nav.navbar.sidebar-nav.sidebar-nav-style-1 .sidenav-header { top: 32px; }
		.admin-bar .sticky .sidebar-part1 { top: 0;}

	    /* mini cart */
	    .admin-bar header.site-header > .header-mini-cart { top: 53px; }
		.admin-bar header.site-header.sticky > .header-mini-cart { top: 5px; }
		.admin-bar.left-nav-sidebar header.site-header > .header-mini-cart, .admin-bar header.site-header > .header-mini-cart { top: 37px; }
		.admin-bar .header-with-topbar nav.navbar.sidebar-nav.sidebar-nav-style-1 .sidenav-header { top: 62px !important; }
		.admin-bar.left-nav-sidebar header.site-header.sticky > .header-mini-cart, .admin-bar header.site-header.sticky > .header-mini-cart { top: 5px; }
		.admin-bar header.site-header.sticky-mini-header > .header-mini-cart, .admin-bar header.site-header.sticky.sticky-mini-header > .header-mini-cart, .admin-bar header.site-header.header-with-topbar > .header-mini-cart { top: 66px; }
		.admin-bar header.site-header.header-with-topbar.sticky > .header-mini-cart { top:36px;}
		.admin-bar .header-with-topbar.sticky nav.navbar.sidebar-nav.left-nav { top: 32px !important; }
		.admin-bar .header-with-topbar.sticky-mini-header.sticky .top-header-area, .admin-bar .header-with-topbar.sticky-mini-header .top-header-area {top: 32px;}
		.admin-bar .header-with-topbar.sticky-mini-header.sticky nav.navbar.sidebar-nav.sidebar-nav-style-1 .sidenav-header  { top: 62px  !important;}
		.admin-bar .sticky nav.menu-center { margin-top: 28px;}

	} 

@media screen and (max-width: 600px){
	.admin-bar .header-with-topbar.sticky-mini-header.sticky .left-nav, .admin-bar .header-with-topbar.sticky-mini-header.sticky .sidebar-part1 { top: 30px !important; }
	.admin-bar .header-with-topbar.sticky-mini-header.sticky .top-header-area { top: 0}
	.admin-bar .header-with-topbar.sticky .left-nav, .admin-bar .header-with-topbar.sticky .sidebar-part1, .admin-bar .header-with-topbar.sticky nav.navbar.sidebar-nav { top: 0 !important}
	.admin-bar header.site-header.header-with-topbar.sticky > .header-mini-cart { top: 5px;}
    .admin-bar .header-with-topbar.sticky-mini-header.sticky > .header-mini-cart { top: 35px !important; }
    .admin-bar .sticky.header-with-topbar nav.navbar.sidebar-nav.sidebar-nav-style-1 .sidenav-header { top: 0 !important; }
    .admin-bar .header-with-topbar.sticky-mini-header.sticky nav.navbar.sidebar-nav.sidebar-nav-style-1 .sidenav-header { top: 30px !important; }
    .admin-bar .sticky nav.menu-center { margin-top: 0;}
}
"use strict";

function bindEvent(el, eventName, eventHandler) {
    if (el.addEventListener) {
        el.addEventListener(eventName, eventHandler, false);
    } else if (el.attachEvent) {
        el.attachEvent('on' + eventName, eventHandler);
    }
}

/* For remove conflict */
( function( $ ) {

    var bodyEl = document.body,
            //content = document.querySelector( '.content-wrap' ),
            openleftbtn = document.getElementsByClassName('right-menu-button')[0],
            opensidemenubtn = document.getElementById('mobileToggleSidenav'),
            openbtn = document.getElementById('open-button'),
            closebtn = document.getElementById('close-button'),
            isOpen = false;

    function init() {
        initEvents();
    }

    function initEvents() {
        if (openbtn) {
            bindEvent(openbtn, 'click', toggleMenu);

        }
        //openbtn.addEventListener( 'click', toggleMenu );
        if (closebtn) {

            bindEvent(closebtn, 'click', toggleMenu);
            //closebtn.addEventListener( 'click', toggleMenu );
        }

        if( openleftbtn ){
            bindEvent(openleftbtn, 'click', toggleMenu);
        }

        if( opensidemenubtn ){
            bindEvent(opensidemenubtn, 'click', toggleMenu);
        }

        // close the menu element if the target itÂ´s not the menu element or one of its descendants..

    }

    function toggleMenu() {

        if (isOpen) {
            classie.remove(bodyEl, 'show-menu');
            classie.remove(bodyEl, 'left-nav-on');
            $("#mobileToggleSidenav").closest('nav').removeClass('sidemenu-open');
             if ( $( ".full-width-pull-menu" ).length ) {
                 classie.remove(bodyEl, 'overflow-hidden');
            }
        }
        else {
            classie.add(bodyEl, 'show-menu');
            classie.add(bodyEl, 'left-nav-on');
            $("#mobileToggleSidenav").closest('nav').addClass('sidemenu-open');
            if ( $( ".full-width-pull-menu" ).length ) {
                classie.add(bodyEl, 'overflow-hidden');
            }
           
        }
        isOpen = !isOpen;
    }

    init();

})( jQuery );
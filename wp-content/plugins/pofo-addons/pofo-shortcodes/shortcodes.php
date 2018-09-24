<?php
class Pofo_Require_Shortcode_Files {
    /*
     * Includes all (require_once) php file(s) inside selected folder using class.
     */
    public function __construct()
    {
        $this->Theme_Require_Shortcode_File( POFO_SHORTCODE_ADDONS_SHORTCODE_URI, array( 'row', 'inner-row', 'column', 'text-block', 'counter', 'feature-box', 'testimonial', 'testimonial-slider', 'team-member', 'team-member-slider', 'progressbar', 'blog','post-slider', 'accordian', 'separator', 'portfolio-filter', 'portfolio', 'portfolio-slider', 'text-slider', 'section-heading', 'client-image-slider', 'image-slider', 'button', 'timer', 'alert-message', 'lists', 'pricing-table', 'content-block', 'popup', 'social', 'video-sound', 'image-gallery', 'tab', 'instagram', 'blockquote' ) );
    }
    public function Theme_Require_Shortcode_File($path, $fileName)
    {

        if(is_array($fileName))
        {
            foreach($fileName as $name)
            {
                require_once($path.'/pofo-shortcode-'.$name.'.php');
            }
        }
        else
        {
            throw new Exception('File is not found in folder as you given');
        }
    }

}
$Pofo_Require_Shortcode_Files = new Pofo_Require_Shortcode_Files();
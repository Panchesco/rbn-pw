<?php

class UASpecCollBrandingPlugin extends Omeka_Plugin_AbstractPlugin
{
    protected $_hooks = array('public_head', 'public_header', 'public_footer');

    public function hookPublicHead($view)
    {
        queue_js_file('ua-speccoll-branding');
    }

    public function hookPublicHeader($view)
    {
        echo $view['view']->partial('_header_branding.php');
    }

    public function hookPublicFooter($view)
    {
        echo $view['view']->partial('_footer_branding.php');
    }

}

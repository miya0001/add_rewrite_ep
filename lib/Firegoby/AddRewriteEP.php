<?php

if (!class_exists('Firegoby_AddRewriteEP')) :

class Firegoby_AddRewriteEP {

private $ep;
private $mask;

function __construct($ep, $callback, $mask = EP_ROOT)
{
    $this->ep = urlencode($ep);
    $this->callback = $callback;
    $this->mask = $mask;
}

public function register()
{
    add_action('init', array(&$this, 'init'));
    add_action('query_vars', array(&$this, 'query_vars'));
    add_action('template_redirect', array(&$this, 'template_redirect'));
    add_action('ep_action_'.$this->ep, $this->callback);
}

public function init()
{
    add_rewrite_endpoint($this->ep, $this->mask);
}

public function query_vars($vars)
{
    $vars[] = $this->ep;
    return $vars;
}

public function template_redirect()
{
    global $wp_query;
    if (isset($wp_query->query[$this->ep])) {
        do_action('ep_action_'.$this->ep, get_query_var($this->ep));
    }
}

} // end ADD_EP_ROOT
endif;

// EOF

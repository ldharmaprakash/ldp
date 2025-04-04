<?php

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

/**
 * Check Can display default Credentials
 *
 * @return Boolean
 */
if (!function_exists('isSecure')) {
    function isSecure()
    {
        return request()->isSecure();
    }
}

/**
 * Set Flash Message function
 *
 * @param  string $state     Type of the state ['danger','success','warning','info']
 * @param  string $message   message to be displayed
 */
if(!function_exists('flashMessage')) {
    function flashMessage($state, $title, $message)
    {
        Session::flash('state', $state);
        Session::flash('title', $title);
        Session::flash('message', $message);
    }
}

<?php

class Globals
{
    function __construct()
    {
        $this->api = 'http://localhost:5000/api/Parts';
       // $this->api = 'http://77289763.ngrok.io/api/Parts';
        
        $this->options = array(
            CURLOPT_RETURNTRANSFER => true,   // return web page
            CURLOPT_HEADER => false,  // don't return headers
            CURLOPT_FOLLOWLOCATION => true,   // follow redirects
            CURLOPT_MAXREDIRS => 10,     // stop after 10 redirects
            CURLOPT_ENCODING => "",     // handle compressed
            CURLOPT_USERAGENT => "test", // name of client
            CURLOPT_AUTOREFERER => true,   // set referrer on redirect
            CURLOPT_CONNECTTIMEOUT => 120,    // time-out on connect
            CURLOPT_TIMEOUT => 120,    // time-out on response
        );
    }
}

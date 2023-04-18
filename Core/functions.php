<?php


function base_path($path)
{
    return  $path;
}

function abort($code = 404)
{
    http_response_code($code);
    var_dump('NOT FOUND');
}
<?php

if (extension_loaded('zlib')) {
    ob_start('ob_gzhandler');
}
header('content-type: text/css; charset: UTF-8');
header('cache-control: must-revalidate');
$offset = 60 * 60;
$expire = 'expires: ' . gmdate('D, d M Y H:i:s', time() + $offset) . ' GMT';
header($expire);
ob_start('compress');

function compress($buffer) {
// remove comments
    $buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
    return $buffer;
}

// list CSS files to be included
$files = scandir(__DIR__);
foreach ($files as $file) {
    if ($file != '.' && $file != '..' && $file != 'css.php') {        
        echo $file . '<br />';
        //include($file);
    }
}
if (extension_loaded('zlib')) {
    ob_end_flush();
}
?>
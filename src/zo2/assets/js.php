<?php

if (extension_loaded('zlib')) {
    ob_start('ob_gzhandler');
}
header('content-type: text/javascript; charset: UTF-8');
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

if (isset($_GET['files'])) {
    /* Get base64 encode file name */
    $files = $_GET['files'];
    /* Explode file to array */
    $fileList = explode(';', $files);
    foreach ($fileList as $_file) {
        /* Decode filename */
        if (!empty($_file) && ($fileName = base64_decode(trim($_file))) !== false) {
            /* Check extension */
            if (strtolower(substr($fileName, strlen($fileName) - 3, 3)) == ".js") {
                include $fileName;
            }
        }
    }
}

if (extension_loaded('zlib')) {
    ob_end_flush();
}
?>
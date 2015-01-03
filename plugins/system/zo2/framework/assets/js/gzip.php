<?php

if (extension_loaded('zlib'))
{
    ob_start('ob_gzhandler');
}
header("Content-type: text/javascript; charset: UTF-8");
header("Cache-Control: must-revalidate");
$offset = 60 * 60;
$ExpStr = "Expires: " .
        gmdate("D, d M Y H:i:s", time() + $offset) . " GMT";
header($ExpStr);
$jsFile = $_REQUEST['jsFile'];
if (strpos($jsFile, '..') !== false)
{
    // Don't translate
    throw new Exception(' Use of relative paths not permitted', 20);
} else
{
    $cacheDir = realpath(__DIR__ . '/../../../../../../cache/zo2');
    echo file_get_contents($cacheDir . '/' . $jsFile);
}
?>
<?php

if (extension_loaded('zlib'))
{
    ob_end_flush();
}
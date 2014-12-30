<?php

/**
 * Class exists checking
 */
if (!class_exists('Zo2HelperFile')) {

    /**
     *
     */
    class Zo2HelperFile {

        public static function respondDownload($sourceFile, $downloadName) {
            if (file_exists($sourceFile)) {
                header("Cache-Control: public"); // needed for i.e.
                header("Content-Type: application/force-download");
                header("Content-Transfer-Encoding: Binary");
                header("Content-Length:" . filesize($sourceFile));
                header("Content-Disposition: attachment; filename='.$downloadName.'");
                readfile($sourceFile);
                die();
            } else {
                die('ZO2_ERROR_FILE_NOT_FOUND');
            }
        }

    }

}
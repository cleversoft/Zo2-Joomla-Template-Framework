<?php

/**
 * Class exists checking
 */
if (!class_exists('Zo2HelperFolder')) {

    /**
     *
     */
    class Zo2HelperFolder {

        public static function zipDirectory($sourceDir, $outputPath) {
            $zip = new ZipArchive();

            if ($zip->open($outputPath, ZIPARCHIVE::CREATE) !== TRUE) {
                return false;
            }

            $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($sourceDir));

            /* Resursive files in directory */
            foreach ($iterator as $key => $value) {
                $key = str_replace('\\', '/', $key);
                if (!is_dir($key)) {
                    if (!$zip->addFile(realpath($key), substr($key, strlen($sourceDir) - strlen(basename($sourceDir))))) {
                        return false;
                    }
                }
            }
            return true;
        }

    }

}
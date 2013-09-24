<?php
class CssMinifier {
    public static function minify($content) {
        $content = preg_replace( '#\s+#', ' ', $content );
        $content = preg_replace( '#/\*.*?\*/#s', '', $content );
        $content = str_replace( '; ', ';', $content );
        $content = str_replace( ': ', ':', $content );
        $content = str_replace( ' {', '{', $content );
        $content = str_replace( '{ ', '{', $content );
        $content = str_replace( ', ', ',', $content );
        $content = str_replace( '} ', '}', $content );
        $content = str_replace( ';}', '}', $content );

        return trim( $content );
    }
}
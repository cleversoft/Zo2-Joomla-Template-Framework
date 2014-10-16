<?php
class CssMinifier {
    /**
     * Remove comment, space, remove quotation and double quotation
     *
     * @param $content
     * @return string
     */
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
        $pattern = '#url\([\'"]?([^\'"]+)[\'"]?\)#';
        $content = preg_replace($pattern, 'url($1)', $content);

        return trim( $content );
    }
}
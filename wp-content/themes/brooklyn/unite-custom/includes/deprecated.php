<?php

/*
 * Old JavaScript Minifier
 *
 * will be removed with Brooklyn 5
 * @todo remove with Brooklyn 5
 */

if ( !function_exists( 'ut_compress_java' ) ) {

    function ut_compress_java($buffer) {

        /* remove comments */
        $buffer = preg_replace("/((?:\/\*(?:[^*]|(?:\*+[^*\/]))*\*+\/)|(?:\/\/.*))/", "", $buffer);
        /* remove tabs, spaces, newlines, etc. */
        $buffer = str_replace(array("\r\n","\r","\t","\n",'  ','    ','     '), '', $buffer);
        /* remove other spaces before/after ) */
        $buffer = preg_replace(array('(( )+\))','(\)( )+)'), ')', $buffer);

        return $buffer;

    }

}
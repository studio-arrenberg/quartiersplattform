<?php

/**
 * 
 *  Main Setup
 * 
 *  2. Menu 
 *  3. Pages (Pages, Forms)
 *  4. Link Pages with Templates (Pages & Post types)
 * 
 */


/**
 *  --------------------------------------------------------
 *  1. Menu
 *  --------------------------------------------------------
 */



// reset rewrite rules
// used to show poll post 
// flush_rewrite_rules( false );
add_action( 'after_switch_theme', 'flush_rewrite_rules' );
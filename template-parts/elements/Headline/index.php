<?php 
/** 
 * Headline element
 * 
 */

 if(!function_exists('create_headline')) {
   function create_headline($text, $classes = '', $tag = 'h3'){
     echo "<{$tag} class='headline-element {$classes}'>{$text}</{$tag}>";
   }
 }
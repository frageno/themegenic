<?php 
/** 
 * Headline element
 * 
 */

function create_headline($text, $classes = '', $tag = 'h3'){
  echo "<{$tag} class='headline-element {$classes}'>{$text}</{$tag}>";
}
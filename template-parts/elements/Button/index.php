<?php

/**
 * 
 * Button
 * 
 */
if(!function_exists('create_button')) {
    function create_button($button, $tag = 'a', $classes = '') {
        if($tag == 'button'){
            ?>
            <button>
                <?php echo $button['title']; ?>
            </button>
            <?php
            return;
        }
        if($tag == 'a'){
            ?>
            <a target="<?php echo $button['target']; ?>" href="<?php echo $button['url']; ?>" class="<?php echo $classes; ?>">
                <?php echo $button['title']; ?>
            </a>
            <?php
            return;
        }
     }
}
 
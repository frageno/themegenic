<?php

/**
 * Options
 */

// require locate_template('/inc/options/options.php');

/**
 * Helpers
 */

require locate_template('/inc/helpers/helpers.php');
require locate_template('/inc/helpers/load-modules.php');
require locate_template('/inc/helpers/save-json.php');

/**
 * ACF Register blocks
 */

require locate_template('/inc/acf-blocks/register-blocks.php');

/**
 * Post Types
 */

require locate_template('/inc/post-types/portfolio-post-type.php');

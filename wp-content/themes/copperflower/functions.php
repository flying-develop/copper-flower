<?php

$THEME = wp_get_theme();
define( 'THEME_VERSION', $THEME->get( 'Version' ) );

include_once "include/actions.inc.php";
include_once "include/theme.inc.php";
include_once "include/form.inc.php";
include_once "include/settings.inc.php";
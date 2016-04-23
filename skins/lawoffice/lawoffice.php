<?php
/**
 * Law Office skin file for theme.
 */

//------------------------------------------------------------------------------
// Skin's fonts
//------------------------------------------------------------------------------

// Add skin fonts in the used fonts list
add_filter('theme_skin_use_fonts', 'theme_skin_use_fonts_lawoffice');
function theme_skin_use_fonts_lawoffice($theme_fonts) {
	$theme_fonts['Rufina'] = 1;
	$theme_fonts['Sintony'] = 1;
	return $theme_fonts;
}

// Add skin fonts (from Google fonts) in the main fonts list (if not present). To use custom font-face you not need add it into list in this function
// How to install custom @font-face fonts into the theme?
// All @font-face fonts are located in "theme_name/css/font-face/" folder in the separate subfolders for the each font. Subfolder name is a font-family name!
// Place full set of the font files (for each font style and weight) and css-file named stylesheet.css in the each subfolder.
// Create your @font-face kit by using Fontsquirrel @font-face Generator (http://www.fontsquirrel.com/fontface/generator)
// and then extract the font kit (with folder in the kit) into the "theme_name/css/font-face" folder to install
add_filter('theme_skin_list_fonts', 'theme_skin_list_fonts_lawoffice');
function theme_skin_list_fonts_lawoffice($list) {
	//$list['Advent Pro'] = array(
	//		'family'=>'sans-serif',																						// (required) font family
	//		'link'=>'Advent+Pro:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic',	// (optional) if you use Google font repository
	//		'css'=>themerex_get_file_url('/css/font-face/Advent-Pro/stylesheet.css')									// (optional) if you use custom font-face
	//		);
//	if (!isset($list['Rufina']))	$list['Rufina'] = array('family'=>'serif');
//	if (!isset($list['Sintony']))	$list['Sintony'] = array('family'=>'sans-serif');
	return $list;
}


//------------------------------------------------------------------------------
// Skin's stylesheets
//------------------------------------------------------------------------------

// Add skin stylesheets
add_action('theme_skin_add_stylesheets', 'theme_skin_add_stylesheets_lawoffice');
function theme_skin_add_stylesheets_lawoffice() {
	themerex_enqueue_style( 'theme-skin', themerex_get_file_url('/skins/lawoffice/lawoffice.css'), array('main-style'), null );
}

// Add skin inline styles
add_filter('theme_skin_add_styles_inline', 'theme_skin_add_styles_inline_lawoffice');
function theme_skin_add_styles_inline_lawoffice($custom_style) {
	return $custom_style;	
}

// Add skin responsive styles
add_action('theme_skin_add_responsive', 'theme_skin_add_responsive_lawoffice');
function theme_skin_add_responsive_lawoffice() {
	if (file_exists(themerex_get_file_dir('/skins/lawoffice/lawoffice-responsive.css')))
		themerex_enqueue_style( 'theme-skin-responsive', themerex_get_file_url('/skins/lawoffice/lawoffice-responsive.css'), array('theme-skin'), null );
}

// Add skin responsive inline styles
add_filter('theme_skin_add_responsive_inline', 'theme_skin_add_responsive_inline_lawoffice');
function theme_skin_add_responsive_inline_lawoffice($custom_style) {
	return $custom_style;	
}


//------------------------------------------------------------------------------
// Skin's scripts
//------------------------------------------------------------------------------

// Add skin scripts
add_action('theme_skin_add_scripts', 'theme_skin_add_scripts_lawoffice');
function theme_skin_add_scripts_lawoffice() {
	if (file_exists(themerex_get_file_dir('/skins/lawoffice/lawoffice.js')))
		themerex_enqueue_script( 'theme-skin-script', themerex_get_file_url('/skins/lawoffice/lawoffice.js'), array('main-style'), null );
}

// Add skin scripts inline
add_action('theme_skin_add_scripts_inline', 'theme_skin_add_scripts_inline_lawoffice');
function theme_skin_add_scripts_inline_lawoffice() {
	?>

	<?php	
}


//------------------------------------------------------------------------------
// Get/Set skin's main (accent) theme color
//------------------------------------------------------------------------------


// Return main theme color (if not set in the theme options)
add_filter('theme_skin_get_theme_color', 'theme_skin_get_theme_color_lawoffice', 10, 1);
function theme_skin_get_theme_color_lawoffice($clr) {
	return empty($clr) ? '#f55e45' : $clr;
}

// Return main theme bg color
add_filter('theme_skin_get_theme_bgcolor', 'theme_skin_get_theme_bgcolor_lawoffice', 10, 1);
function theme_skin_get_theme_bgcolor_lawoffice($clr) {
	return '#ffffff';
}

// Add skin's specific theme colors in the custom styles
add_filter('theme_skin_set_theme_color', 'theme_skin_set_theme_color_lawoffice', 10, 2);
function theme_skin_set_theme_color_lawoffice($custom_style, $clr) {
	$custom_style .= '';
	return $custom_style;
}


//------------------------------------------------------------------------------
// Get/Set skin's main menu (top panel) color
//------------------------------------------------------------------------------

// Return skin's main menu (top panel) background color (if not set in the theme options)
add_filter('theme_skin_get_menu_bgcolor', 'theme_skin_get_menu_bgcolor_lawoffice', 10, 1);
function theme_skin_get_menu_bgcolor_lawoffice($clr) {
	return empty($clr) ? '#f2f2e2' : $clr;
}

// Add skin's main menu (top panel) background color in the custom styles
add_filter('theme_skin_set_menu_bgcolor', 'theme_skin_set_menu_bgcolor_lawoffice', 10, 2);
function theme_skin_set_menu_bgcolor_lawoffice($custom_style, $clr) {
	$rgb = hex2rgb($clr);
	$custom_style .= '';
	return $custom_style;
}

// Add skin's main menu (top panel) fore colors in custom styles
add_filter('theme_skin_set_menu_color', 'theme_skin_set_menu_color_lawoffice', 10, 2);
function theme_skin_set_menu_color_lawoffice($custom_style, $clr) {
	$custom_style .= '';
	return $custom_style;
}


//------------------------------------------------------------------------------
// Get/Set skin's user menu (user panel) color
//------------------------------------------------------------------------------

// Return skin's user menu color (if not set in the theme options)
add_filter('theme_skin_get_user_menu_bgcolor', 'theme_skin_get_user_menu_bgcolor_lawoffice', 10, 1);
function theme_skin_get_user_menu_bgcolor_lawoffice($clr) {
	return empty($clr) ? '#b9b9aa' : $clr;
}

// Add skin's user menu (user panel) background color in the custom styles
add_filter('theme_skin_set_user_menu_bgcolor', 'theme_skin_set_user_menu_bgcolor_lawoffice', 10, 2);
function theme_skin_set_user_menu_bgcolor_lawoffice($custom_style, $clr) {
	return $custom_style;
}

// Add skin's user menu (user panel) fore colors in custom styles
add_filter('theme_skin_set_user_menu_color', 'theme_skin_set_user_menu_color_lawoffice', 10, 2);
function theme_skin_set_user_menu_color_lawoffice($custom_style, $clr) {
	return $custom_style;
}
?>
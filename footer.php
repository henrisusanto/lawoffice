<?php
/**
 * The template for displaying the footer.
 */
global $logo_footer, $logo_text;
					if (get_custom_option('show_top_page') == 'yes' && get_custom_option('show_sidebar_top') == 'yes') {

						stopWrapper(); //<!-- </aside#tabBlog> -->

						global $THEMEREX_CURRENT_SIDEBAR;
						$THEMEREX_CURRENT_SIDEBAR = 'top';
						do_action( 'before_sidebar' );
						if ( ! dynamic_sidebar( get_custom_option('sidebar_top') ) ) {
							// Put here html if user no set widgets in sidebar
						}
					}
					
					stopWrapper(); //<!-- </div.content> -->

					// Show main sidebar
					get_sidebar();
					
					if (get_custom_option('body_style')!='fullscreen' && (!is_singular() || get_custom_option('single_style')!='single-portfolio-fullscreen')) {
						stopWrapper();	//<!-- </div.main> -->
					}
				?>
				</div> <!-- /.mainWrap -->

			<?php if (get_custom_option('show_sidebar_top') == 'yes') { ?>
			</div>	<!-- /.widgetTabs -->
			<?php } ?>

			<?php
			$show_user_footer = get_custom_option('show_user_footer');
			if (!empty($show_user_footer) && $show_user_footer != 'none') {
				$user_footer = themerex_strclear(get_custom_option('user_footer_content'), 'p');
				if (!empty($user_footer)) {
					$user_footer = substituteAll($user_footer);
					?>
					<div class="userFooterSection <?php echo esc_attr($show_user_footer); ?>">
						<?php
						echo balanceTags($user_footer);
						?>
					</div>
					<?php
				}
			}
			?>

			<?php 
			// ---------------- Footer Twitter stream ----------------
			if (get_custom_option('show_twitter_in_footer') == 'yes'  ) { 
				$twitter = do_shortcode('[trx_twitter class="main"]');
				if ($twitter) {
					?>
					<div class="twitBlockWrap"><?php echo balanceTags($twitter); ?></div>
					<?php
				}
			}
			?>

			<div class="footerContentWrap">
				<?php
				// ---------------- Footer contacts ----------------------
				if (($contact_style = get_custom_option('show_contacts_in_footer')) != 'no'  ) { 
					$address_1 = get_theme_option('contact_address_1');
					$address_2 = get_theme_option('contact_address_2');
					$phone = get_theme_option('contact_phone');
					$fax = get_theme_option('contact_fax');
					if ($contact_style=='yes') $contact_style = 'dark';
				?>
				<footer class="footerWrap footerStyle<?php echo themerex_strtoproper($contact_style); ?> contactFooterWrap">
					<div class="main contactFooter">
						<section>
							<div class="logo">
								<a href="<?php echo home_url(); ?>"><?php echo balanceTags($logo_footer) ? '<img src="'.$logo_footer.'" alt="">' : ''; ?><?php echo esc_html($logo_text) ? '<span class="logo_text">'.apply_filters('theme_logo_text', $logo_text, 'footer').'</span>' : ''; ?></a>
							</div>
							<div class="contactAddress">
								<address class="addressRight">
									<?php echo __('Phone:', 'themerex') . ' ' . esc_html($phone); ?><br>
									<?php echo __('Fax:', 'themerex') . ' ' . esc_html($fax); ?>
								</address>
								<address class="addressLeft">
									<?php echo esc_html($address_2); ?><br>
									<?php echo esc_html($address_1); ?>
								</address>
							</div>
							<div class="contactShare">
								<ul>
									<?php
										$socials = get_theme_option('social_icons');
										foreach ($socials as $s) {
											if (empty($s['url'])) continue;
											$name = basename($s['icon']);
											?>
											<li><a class="social_icons <?php echo esc_attr($name); ?>" target="_blank" href="<?php echo esc_url($s['url']); ?>"></a></li>
										<?php
										}
									?>
								</ul>
							</div>
						</section>
					</div>
				</footer>
				<?php } ?>

				<?php 
				// ----------------- Google map -----------------------
				if ( get_custom_option('googlemap_show')=='yes' ) { 
					$map_address = get_custom_option('googlemap_address');
					$map_latlng = get_custom_option('googlemap_latlng');
					$map_zoom = get_custom_option('googlemap_zoom');
					$map_style = get_custom_option('googlemap_style');
					$map_height = get_custom_option('googlemap_height');
					if (!empty($map_address) || !empty($map_latlng)) {
						echo do_shortcode('[trx_googlemap'
							. (!empty($map_address) ? ' address="'.$map_address.'"' : '')
							. (!empty($map_latlng) ? ' latlng="'.$map_latlng.'"' : '')
							. (!empty($map_style) ? ' style="'.$map_style.'"' : '')
							. (!empty($map_zoom) ? ' zoom="'.$map_zoom.'"' : '')
							. (!empty($map_height) ? ' height="'.$map_height.'"' : '')
							. ']');
					}
				} 
				?>

				<?php 
				// ---------------- Footer sidebar ----------------------
				if (get_custom_option('show_sidebar_footer') == 'yes'  ) { 
					global $THEMEREX_CURRENT_SIDEBAR;
					$THEMEREX_CURRENT_SIDEBAR = 'footer';
					$style = get_custom_option('sidebar_footer_style');
				?>
				<footer class="footerWrap footerStyle<?php echo themerex_strtoproper($style); ?>">
					<div class="main footerWidget widget_area">
						<?php
						do_action( 'before_sidebar' );
						if ( ! dynamic_sidebar( get_custom_option('sidebar_footer') ) ) {
							// Put here html if user no set widgets in sidebar
						}
						?>
					</div>
				</footer><!-- ./blackStyle -->
				<?php } ?>

				<?php if (get_custom_option('show_copyright_area_in_footer')=='yes') { ?> 
				<div class="copyWrap">
					<div class="copy main">
						<div class="copyright"><?php echo get_theme_option('footer_copyright'); ?> 
						<?php 
						$terms_link = get_theme_option('footer_terms_link');
						$terms_text = get_theme_option('footer_terms_text');
						if ($terms_link) {
							?>
							<a href="<?php echo esc_url($terms_link); ?>"><?php echo esc_html($terms_text); ?></a>
							<?php
						}
						$policy_link = get_theme_option('footer_policy_link');
						$policy_text = get_theme_option('footer_policy_text');
						if ($terms_link && $policy_link) {
							_e('and', 'themerex');
						}
						if ($policy_link) {
							?>
							<a href="<?php echo esc_url($policy_link); ?>"><?php echo esc_html($policy_text); ?></a>
							<?php
						}
						?>
						</div>
						<div class="copy_socials socPage">
							<ul>
							<?php
							$socials = get_theme_option('social_icons');
							foreach ($socials as $s) {
								if (empty($s['url'])) continue;
								$sn = basename($s['icon']);
								?>
								<li><a class="social_icons <?php echo esc_attr($sn); ?>" target="_blank" href="<?php echo esc_url($s['url']); ?>"></a></li>
								<?php
							}
							?>
							</ul>
						</div>
					</div>
				</div>
				<?php } ?>
			
			</div><!-- /.footerContentWrap -->

			<?php
			if (get_custom_option('show_video_bg')=='yes' && (get_custom_option('video_bg_youtube_code')!='' || get_custom_option('video_bg_url')!='')) {
				?>
				</div><!-- /.videoBackgroundOverlay -->
				<?php
			}
			?>

		</div><!-- ./boxedWrap -->

	</div><!-- ./main_content -->

<?php
get_template_part('templates/page-part-login');

get_template_part('templates/page-part-js-messages');

if (get_custom_option('show_right_panel')=='yes') {
	get_template_part('templates/page-part-customizer'); 
}
?>

<div class="upToScroll">
	<?php if (get_custom_option('show_right_panel')=='yes') { ?>
	<a href="#" class="addBookmark icon-star-empty" title="<?php _e('Add the current page into bookmarks', 'themerex'); ?>"></a>
	<?php } ?>
	<a href="#" class="scrollToTop icon-up-open-big" title="<?php _e('Back to top', 'themerex'); ?>"></a>
</div>

<div class="customHtmlSection">
<?php echo get_custom_option('custom_code'); ?>
</div>


<?php
if (($img = get_custom_option('fixed_banner_image')) != '') {
	echo '<div class="fixed_banner">';
	if (($link = get_custom_option('fixed_banner_link')) != '') {
		echo '<a href="' . $link . '" target="_blank"><img src="' . $img . '" alt="" /></a>';
	} else {
		echo '<img src="' . $img . '" alt="" />';
	}
	echo '</div>';
}
?>


<?php echo get_custom_option('gtm_code2'); ?>

<?php wp_footer(); ?>

</body>
</html>
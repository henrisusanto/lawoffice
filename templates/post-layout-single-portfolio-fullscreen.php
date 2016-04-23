<?php
$post_data['post_views']++;

$avg_author = 0;
$avg_users  = 0;
if (!$post_data['post_protected'] && $opt['reviews'] && get_custom_option('show_reviews')=='yes') {
	$avg_author = $post_data['post_reviews_author'];
	$avg_users  = $post_data['post_reviews_users'];
}

$show_title = get_custom_option('show_post_title')=='yes' && (get_custom_option('show_post_title_on_quotes')=='yes' || !in_array($post_data['post_format'], array('aside', 'chat', 'status', 'link', 'quote')));
?>

<div class="itemscope itemPageFullWrapper" itemscope itemtype="http://schema.org/<?php echo ($avg_author > 0 || $avg_users > 0 ? 'Review' : 'Article'); ?>">

	<?php if (!empty($opt['dedicated']) || $post_data['post_thumb']) { ?>
		<section class="itemPageFull post_format_<?php echo esc_attr($post_data['post_format']); ?>">
	
			<?php require(themerex_get_file_dir('/templates/page-part-prev-next-posts.php')); ?>
			
			<div class="itemDescriptionWrap">
				<div class="main">
					<a href="#" class="toggleButton"></a>
					<a href="#" class="backClose"></a>
	
					<?php if ($show_title) { ?>
					<h1 itemprop="<?php echo ($avg_author > 0 || $avg_users > 0 ? 'itemReviewed' : 'name'); ?>" class="post_title entry-title"><?php echo esc_html($post_data['post_title']); ?></h1>
					<?php } ?>
	
					<div class="post_text_area toggleDescription">
						<?php
						// Post excerpt
						echo balanceTags($post_data['post_excerpt']);
						?>
					</div>
				</div>
			</div>
	
		</section><!-- .itemPageFull -->
	<?php } ?>

	<?php
	if (!$post_data['post_protected']) {
		startWrapper('<div class="main">');
		?>
        <div class="withMargin"></div>
        <?php
		if (!$post_data['post_protected'] && !empty($post_data['post_content'])) { 
			require(themerex_get_file_dir('/templates/page-part-reviews-block.php'));
			startWrapper('<div class="post_text_area hrShadow withMargin" itemprop="'.($avg_author > 0 || $avg_users > 0 ? 'reviewBody' : 'articleBody').'">');
			// Post content
			echo sc_gap_wrapper($post_data['post_content']); 
			wp_link_pages( array( 
				'before' => '<div class="nav_pages_parts"><span class="pages">' . __( 'Pages:', 'themerex' ) . '</span>', 
				'after' => '</div>',
				'link_before' => '<span class="page_num">',
				'link_after' => '</span>'
			) ); 
			if ( get_custom_option('show_post_info')=='yes') {
				?>
				<div class="itemInfo">
					<?php if ( get_custom_option('show_post_counters')=='yes') { ?>
						<div class="postSharing">
							<?php
							$postinfo_buttons = array('comments', 'views', 'likes', 'share', 'rating');
							require(themerex_get_file_dir('/templates/page-part-postinfo.php'));
							?>
						</div>
					<?php } ?>
					<div class="post_info infoPost">
						<?php _e('Posted ', 'themerex'); ?><a href="<?php echo esc_url($post_data['post_link']); ?>" class="post_date date updated" itemprop="datePublished" content="<?php echo get_the_date('Y-m-d'); ?>"><?php echo esc_html($post_data['post_date']); ?></a>
						<?php if ($post_data['post_categories_links']!='') { ?>
							<span class="separator">|</span>
							<span class="post_cats"><?php echo ($post_data['post_categories_links']); ?></span>
						<?php } ?>
					</div>
				</div>
				<?php
			}
			stopWrapper();
		}
		require(themerex_get_file_dir('/templates/page-part-author-info.php'));
		require(themerex_get_file_dir('/templates/page-part-related-posts.php'));
		get_template_part('templates/page-part-comments');
		stopWrapper();
	}
	?>
	
</div><!-- .itemscope -->

<?php require(themerex_get_file_dir('/templates/page-part-views-counter.php')); ?>

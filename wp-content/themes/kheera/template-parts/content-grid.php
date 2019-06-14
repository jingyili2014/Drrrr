<?php
/**
 * Template part for displaying post grid layout 
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kheera
 */
 
 
	if(kheera_get_grid_layout_cols() ==2): ?>
		<article <?php post_class('col2-grid-post-container col-md-6 col-sm-6');?> itemprop="itemListElement" itemscope itemtype="https://schema.org/BlogPosting">
	<?php else: ?>
		<article <?php post_class('col3-grid-post-container col-md-4 col-sm-4');?> itemprop="itemListElement" itemscope itemtype="https://schema.org/BlogPosting">
	<?php endif; ?>
	
		<h2 class="main-post-title"><a itemprop="name url headline" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			
		<?php get_template_part( 'template-parts/content-single', 'none' ); ?>
			
		
		<div class="top-post-meta-container"> <!-- before post meta -->
			<div class="post-date-cat-meta col-md-12">
				
				<?php print esc_html(__(' Posted On ','kheera')); ?>
				<time class="post-meta-date" datetime="<?php echo esc_html(get_the_date('Y-m-d',$post->ID)); ?>" itemprop="datePublished">
					<?php echo esc_html(get_the_date(get_option( 'date_format' ),$post->ID)); ?>
				</time>
				
				<?php print esc_html(__(' in ','kheera')); ?>
				<a href="<?php echo esc_url_raw(get_category_link(get_cat_ID(kheera_get_post_display_category($post->ID)))); ?>">
					<span class="post-meta-category"><?php print esc_html( kheera_get_post_display_category($post->ID) ); ?></span>
				</a>
			</div>
		</div>
		
		
		<div class="main-post-content-container" itemprop="description">
			<?php the_excerpt(); ?>
					
			<a itemprop="url" href="<?php the_permalink(); ?>" class="read-more-button btn-primary">
				<?php esc_html_e('Continue Reading','kheera'); ?>
			</a>

		</div>	
		
			
		
		<div class="bottom-post-meta-container"> 
			<div class="post-author-meta col-md-6 col-sm-6 col-xs-12" itemprop="author" itemscope itemtype="https://schema.org/Person">
				<?php echo get_avatar(get_the_author_meta('ID'), 95 ,'',get_the_author_meta( 'display_name' ),array('extra_attr' => 'itemprop="image"','class' => 'img-responsive img-circle')); ?>
				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" itemprop="url name">
					<?php echo esc_html(the_author_meta('display_name')); ?>
				</a>		
			</div>
			
			<div class="post-comments-meta col-md-6 col-sm-6 col-xs-12" itemprop="commentCount">
				<i class="fas fa-comment-alt"></i>
				<?php 
					/* translators: %s: comments count  */ 	
					printf( esc_html(__(' %s Comments','kheera')),esc_attr(get_comments_number())); ?> 
			</div>
		</div>
		
	</article>
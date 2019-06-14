<?php
/**
 * Template part for displaying post full-width layout 
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kheera
 */
 
 ?>
 
	<article <?php post_class('full-width-post-container');?> itemprop="itemListElement" itemscope itemtype="https://schema.org/BlogPosting">
	
		<h2 class="main-post-title"><a itemprop="name url headline" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			
		<?php get_template_part( 'template-parts/content-single', 'none' ); ?>
			
		
		<?php if(!get_theme_mod( 'kheera_full_text_posts_setting')): ?>
			<div class="main-post-content-container" itemprop="description">
				<?php the_excerpt(); ?>
					
				<a itemprop="url" href="<?php the_permalink(); ?>" class="read-more-button btn-primary">
					<?php esc_html_e('Continue Reading','kheera'); ?>
				</a>

			</div>	
		<?php else: ?>
			<div class="main-post-content-container" itemprop="articleBody">
				<?php the_content(); ?>
			</div>
		<?php endif; ?>	
			
		
		<div class="bottom-post-meta-container"> 
				
			<div class="post-author-meta col-md-3 col-sm-3 col-xs-4" itemprop="author" itemscope itemtype="https://schema.org/Person">
				<?php echo get_avatar(get_the_author_meta('ID'), 95 ,'',get_the_author_meta( 'display_name' ),array('extra_attr' => 'itemprop="image"','class' => 'img-responsive img-circle')); ?>
				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" itemprop="url name">
					<?php echo esc_html(the_author_meta('display_name')); ?>
				</a>		
			</div>
			
			
			<div class="post-date-cat-meta col-md-6 col-sm-6 col-xs-5">
				<?php print esc_html(__(' Posted On ','kheera')); ?>
				
				<time class="post-meta-date" datetime="<?php echo esc_html(get_the_date('Y-m-d',$post->ID)); ?>" itemprop="datePublished">
					<?php echo esc_html(get_the_date(get_option( 'date_format' ),$post->ID)); ?>
				</time>

				<?php print esc_html(__(' in ','kheera')); ?>
				<a href="<?php echo esc_url_raw(get_category_link(get_cat_ID(kheera_get_post_display_category($post->ID)))); ?>">
					<span class="post-meta-category"><?php print esc_html( kheera_get_post_display_category($post->ID) ); ?></span>
				</a>
			</div>
			<div class="post-comments-meta col-md-3 col-sm-3 col-xs-3" itemprop="commentCount">
				<i class="fas fa-comment-alt"></i>
				<?php 
					/* translators: %s: comments count  */ 	
					printf( esc_html(__(' %s Comments','kheera')),esc_attr(get_comments_number())); ?> 
			</div>
		</div>
		
	</article>
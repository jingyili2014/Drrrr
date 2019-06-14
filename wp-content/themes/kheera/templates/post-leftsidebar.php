<?php
	/**
	* Template Name: Post - Left Sidebar
	* Template Post Type: post
	*
	* This is the template that displays single post with the main sidebar on the left.
	*
	* @package Kheera
	*/

	get_header(); ?>
	
	<main id="primary" class="content-container container">
		
		<?php get_sidebar(); ?>			
			
		<article <?php post_class('main-col-container col-md-8 col-sm-12 col-xs-12');?> itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">
			
			<div class="content-widget-area col-md-12">
				<?php dynamic_sidebar( 'kheera_before_content' ); ?>	
			</div>

			<?php
			while ( have_posts() ) : the_post(); ?>

					
				<h1 class="main-post-title" itemprop="name headline"><?php the_title(); ?></h1>
						
				<?php get_template_part( 'template-parts/content-single', 'none' ); ?>
						
				<div class="top-post-meta-container"> 
						
					<div class="post-author-meta col-md-3 col-sm-3 col-xs-4" itemprop="author" itemscope itemtype="https://schema.org/Person">
						<?php echo get_avatar(get_the_author_meta('ID'), 95 ,'',get_the_author_meta( 'display_name' ),array('extra_attr' => 'itemprop="image"','class' => 'img-responsive img-circle')); ?>
						<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" itemprop="url name">
							<?php echo esc_html(the_author_meta('display_name')); ?>
						</a>		
					</div>
						
					<div class="post-date-cat-meta col-md-6 col-sm-6 col-xs-5">
							
						<?php print esc_html(__(' Posted On ','kheera')); ?>
							
						<time class="post-meta-date" datetime="<?php echo esc_html(get_the_date('Y-M-D',$post->ID)); ?>" itemprop="datePublished">
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
						
						
				<div class="main-post-content-container" itemprop="articleBody">
					<?php the_content(); ?>
				</div>
				
				<?php 
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kheera' ),
						'after'  => '</div>',
					) );				
				?>	
						
				<div class="bottom-post-meta-container"> 
					<div class="post-tags-meta col-md-12 col-sm-12 col-xs-12" itemprop="keywords">
						<?php	esc_html_e('TAGS: ','kheera'); 
							echo get_the_tag_list(); ?>
					</div>
				</div>
						
				<?php	if(get_theme_mod( 'kheera_display_author_setting', true )): ?>
					<div class="post-author-container" itemprop="author" itemscope itemtype="https://schema.org/Person"> 
						<div class="post-author-img-container">
							<?php echo get_avatar(get_the_author_meta('ID'), 95 ,'',get_the_author_meta( 'display_name' ),array('extra_attr' => 'itemprop="image"','class' => 'img-responsive img-circle')); ?>
						</div>
						<h4 itemprop="name"><?php echo esc_html(the_author_meta('display_name')); ?></h4>	
						<p><?php echo esc_html(the_author_meta('description')); ?></p>
					</div>
				<?php endif; ?>
						
						
				<div class="single-post-navigation-container">
					<div class="prev-post-nav-container col-md-6 col-sm-6 col-xs-12">
						<?php previous_post_link( '%link', __( '<i class="fa  fa-angle-double-left" aria-hidden="true"></i> Previous Post','kheera' ).'<h5 class="nav-post-title">%title</h5>', true ); ?>
					</div>	
					<div class="next-post-nav-container col-md-6 col-sm-6 col-xs-12">
						<?php next_post_link( '%link', __( 'Next Post <i class="fa fa-angle-double-right" aria-hidden="true"></i>','kheera' ).'<h5 class="nav-post-title">%title</h5>', true ); ?>
					</div>
				</div>	
						
				<?php	if(get_theme_mod( 'kheera_display_related_posts_setting', true )){
							kheera_related_posts();
						}	?>
		
				<?php 
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.	?>
				
			<div class="content-widget-area col-md-12">
				<?php dynamic_sidebar( 'kheera_after_content' ); ?>	
			</div>

		</article>
	</main>
	
	<?php
	
	get_footer();
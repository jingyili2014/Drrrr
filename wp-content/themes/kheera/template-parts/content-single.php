<?php
/**
 * Template part for displaying single post standard format (Image)
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kheera
 */
 
 
	if(has_post_thumbnail()): ?>
		<figure class="main-post-img-container"> 
			<a itemprop="url" href="<?php the_permalink(); ?>">
			<?php  the_post_thumbnail('kheera_normal', array('class' => 'img-responsive', 
															 'itemprop' => 'image')); ?>
			</a>
		</figure>
	<?php endif; ?>	
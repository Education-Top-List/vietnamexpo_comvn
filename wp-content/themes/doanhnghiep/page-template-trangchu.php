
<?php 
/*
Template Name: page-template-trangchu
*/
get_header(); 
?>	

<div class="page-wrapper">

	<div class="g_content">
		
		<?php
		if ( have_posts() ) : while ( have_posts() ) : the_post();
			the_content();
		endwhile; else: ?>
		<p>Sorry, no posts matched your criteria.</p>
	<?php endif; ?>
	<div class="events_area">
		<div class="container">
			<?php 
			$arg_cmt_post_q = array(
				'posts_per_page' => 6,
				'cat' =>  28,
				'orderby' => 'date',
				'order' => 'DESC',
				'post_type' => 'post',
				'post_status' => 'publish'
			);
			$cmt_post_q = new WP_Query();
			$cmt_post_q->query($arg_cmt_post_q);
			?>
			<?php if(have_posts()) : ?>
				<?php if(get_locale() == 'en_US'){?> <h2>Events</h2>
			<?php }  else if(get_locale() == 'vi'){ ?><h2>Các sự kiện chính</h2> <?php } ?>
				<ul class="row">
					<?php
					while ($cmt_post_q->have_posts()) : $cmt_post_q->the_post(); ?>
						<li class="col-sm-4">
							<div class="post_cmt_wrapper">
								<div class="wrap_thumb">
									<?php  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );  ?>
									<figure class="thumbnail" style="background:url('<?php echo $image[0]; ?>');"> 
										<a href="<?php the_permalink();?>"></a>
									</figure>	
								</div>

								<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a> </h3>
							</div>
						</li>
					<?php endwhile; ?>
				<?php endif; ?> 
			</div>

		</div>
		<div class="list_post_index">
			<div class="container">
				<?php if(get_locale() == 'en_US'){?> <h2 class="title_tg_top">News</h2>
			<?php }  else if(get_locale() == 'vi'){ ?><h2 class="title_tg_top">Tin tức</h2> <?php } ?>
			<div class="row">
				<?php 
				$arg_cmt_post_q = array(
					'posts_per_page' => 6,
					'orderby' => 'date',
					'order' => 'DESC',
					'post_type' => 'post',
					'post_status' => 'publish',
					'category_name' => 'tin-tuc'
				);
				$cmt_post_q = new WP_Query();
				$cmt_post_q->query($arg_cmt_post_q);
				?>
				<?php if(have_posts()) : ?>
					<ul>
						<?php
						while ($cmt_post_q->have_posts()) : $cmt_post_q->the_post(); ?>
							<li class="col-sm-4">
								<div class="post_cmt_wrapper pw">
									<div class="wrap_thumb">
										<?php  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );  ?>
										<figure class="thumbnail" style="background:url('<?php echo $image[0]; ?>');"> 
											<a href="<?php the_permalink();?>"></a>
										</figure>	
									</div>
									<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a> </h3>
									<div class="excerpt">
										<p><?php echo excerpt(30); ?></p>
									</div>
								</div>

							</li>
						<?php endwhile; ?>
					<?php endif; ?> 
				</ul>
			</div>
		</div>
	</div>


</div>


<?php get_footer(); ?>





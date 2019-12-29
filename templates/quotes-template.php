<?php
/**
 * Template Name: Quotes Template
 */
    get_header();

?>

<section class="blog-post style-five pad-75">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center page-title mb75"><h2>Quotes</h2></div>
			</div>
			<div class="row">

			<?php $loop = new WP_Query( array( 'post_type' => 'quotes', 'posts_per_page' => 6 ) ); ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post();?>
					<div class="col-lg-4">
						<article class="top-align has-animation" data-delay="0">
							<div class="entry-meta-content">
								<h2 class="entry-title"><a href="#"><?php the_content(); ?></a></h2>
								<span class="entry-meta">Tags: <?php the_terms($loop->ID , 'quotes_category');?></span>
								<div class="entry-content-bottom">
								<a class="entry-read-more" href="<?php the_permalink(); ?>">Read More</a>
									<ul class="social-share list-inline">
										<li class="list-inline-item"><a href="#"><i class="fa fa-facebook-square"></i></a></li>
										<li class="list-inline-item"><a href="#"><i class="fa fa-heart"></i></a></li>
										<li class="list-inline-item"><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
										<li class="list-inline-item"><a href="#"><i class="fa fa-twitter-square"></i></a></li>
									</ul>
								</div>
							</div>
							<!-- <div class="entry-media"><img src="<?php echo get_the_post_thumbnail_url();?>" alt="post-image"></div> -->
						</article>
					</div>
					
			<?php endwhile; wp_reset_query(); ?>
		
					

			</div>
			<!-- load more -->
			<div class="row">
				<div class="d-flex justify-content-center col-sm-12 pad-top-50">
					<div class="button-4">
					    <div class="eff-4"></div>
					    <a href="#"> Load More</a>
					</div>
				</div>
			</div>
			<!-- load more -->
		</div>
	</section>


<?php
    get_footer();

?>
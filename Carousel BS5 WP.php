<!-- Bootstrap 5 Carousel with WordPress Loop -->
<?php
$args = array(
	'post_type' => 'post',
);
$the_query = new WP_Query ( $args ); 
?>


<div id="carouselWP" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
	<div class="carousel-indicators">
		<!-- Start WP Loop -->
		<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<button type="button" data-bs-target="#carouselWP" data-bs-slide-to="<?php echo $the_query->current_post; ?>" aria-label="Slide <?php echo $the_query->current_post; ?>" class="<?php if ( $the_query->current_post == 0 ) : ?>active<?php endif; ?>"></button>
		<?php endwhile; endif; ?>
    </div>
	<?php rewind_posts(); ?>
    <div class="carousel-inner"> 
	    <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();?>
	    <div class="carousel-item <?php if ( $the_query->current_post == 0 ) : ?>active<?php endif; ?>">
		    <?php if ( has_post_thumbnail() ) : ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(),'full')); ?>" class="" style="height: 600px; width: 100%; display: block;">
			</a>
		    <?php endif; ?>
	    	<div class="container">
	    		<div class="carousel-caption d-none d-md-block">
	    			<h1 class="text-shadow"><?php the_title(); ?></h1>
	    			<p class="text-shadow d-none d-sm-block"><?php the_excerpt(); ?></p>
	    		</div>
	    	</div>
        </div>
	<?php endwhile;	endif; ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselWP" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselWP" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
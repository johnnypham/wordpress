<?php get_header(); ?>
 <div id="home_page">
<div id="img_background_home">
    <ul class="rslides">
		<?php
		// The Query
		query_posts( array ( 'post_type' => 'slider') );

		// The Loop
		while ( have_posts() ) : the_post();
 			$pid = get_the_ID();
			if( has_post_thumbnail()){
			$meta = get_post_meta($pid, 'youtube', true);
				if($meta){ ?>
				<li class="video-home">
				<div class="video-home-wrapper">
				<a href="#"  data-toggle="modal" data-target="#videoModal" data-theVideo="<?php echo $meta?>">
				  <?php the_post_thumbnail( 'full' ); ?>
				    <div class="img_caption">
				    	<div class="mask"></div>
		                <div class="caption-content">
		                	<h1 class="cap_01 text-uppercase"><?php the_title(); ?></h1>
		                	<span class="cap_02 text-uppercase"><?php the_content(); ?></span>
		                </div>
		            </div>
				</a>
				</div>
				</li>
				<?php }else {
				?>
				<li>
		              <?php the_post_thumbnail( 'full' ); ?>
		            <div class="img_caption">
		            	<div class="mask"></div>
		            	<div class="caption-content">
			                <h1 class="cap_01 text-uppercase"><?php the_title(); ?></h1>
			                <span class="cap_02 text-uppercase"><?php the_content(); ?></span>
		            	</div>
		            </div>
		        </li>
				
		<?php }}

				
		
		 endwhile;

		// Reset Query
		wp_reset_query();
		?>
    </ul>
</div>
<section id="content_2" class="container row">
<?php
// The Query
query_posts( array ( 'post_type' => 'page', 'p' => 25) );

// The Loop
while ( have_posts() ) : the_post();
	
	the_content();

endwhile;

// Reset Query
wp_reset_query();
?>

<div id="line"></div>
<div>
<div class=" title_cnt_2 text-uppercase">
<p class="text-uppercase">nachrichten</p>

</div>
<?php
// The Query
query_posts( array ( 'post_type' => 'post', 'cat' => 7) );
$i =0;
// The Loop
while ( have_posts() ) : the_post(); $i++ ;
$post_thumbnail_id = get_post_thumbnail_id();
$url = wp_get_attachment_url( $post_thumbnail_id );
?>

<div id="cnt_<?php echo $i ;?>" class="col-xs-12 col-sm-4 col-md-4 ">
<div class="img_sec" style="background-image:url('<?php //echo $url ?>')"><a href="<?php the_permalink(); ?>"><?php 
the_post_thumbnail('full');

?>

</a></div>
<div class="content_box">
	<div class="title_col">
		<a href="<?php the_permalink(); ?>" class="title_sec text-uppercase"><?php the_title();?></a>

	</div>	
	<div class="cnt_col">
		<p class="cnt_sec"><?php echo excerpt(18); ?></p>
	</div>
	<div class="read_more"><a href="<?php the_permalink(); ?>">
	<span class="right_arrow">
	<img src="<?php echo get_template_directory_uri(); ?>/images/right_arrow.png" alt="" />
	</span><span class="text-uppercase name_arrow">weiterlesen</span>
	</a></div>
</div>
</div>


<?php endwhile;

// Reset Query
wp_reset_query();
?>
</section>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>
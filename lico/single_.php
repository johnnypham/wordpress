<?php get_header(); ?>


	<section id="content" role="main">


</section>
<?php
global $post;
$categories = get_the_category($post->ID);
$car_ID = $categories[0]->cat_ID;

?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php if($car_ID != 7): ?>
	  <div style="margin-top:10px" class="">
<div class='container'>

<!-- <ul style=""  class="pgwSlideshow"> -->
	<?php 
		for($i=1;$i<=21;$i++){
		$images='images-'.$i;
	if($image = get_post_meta($post->ID, $images, true)){
	?>
		 <!-- <li><img src="<?php the_field($images) ;?>" alt=""></li> -->

	<?php }
	else{
		// echo 'No Images Slider';
		}}?>
<!-- </ul> -->
<ul  class="pgwSlideshow">
    <li><img src="http://lico-realestate.de/wp-content/uploads/2015/01/1.jpg" alt="San Francisco, USA" data-description="Golden Gate Bridge"></li>
    <li><img src="http://lico-realestate.de/wp-content/uploads/2015/01/2.jpg" alt="Rio de Janeiro, Brazil"></li>
    <li><img src="http://lico-realestate.de/wp-content/uploads/2015/01/3.jpg" alt=""></li>
    <li><img src="http://lico-realestate.de/wp-content/uploads/2015/01/4.jpg" alt=""></li>
    <li><img src="http://lico-realestate.de/wp-content/uploads/2015/01/5.jpg" alt=""></li>
    <li><img src="http://lico-realestate.de/wp-content/uploads/2015/01/6.jpg" alt=""></li>
    <li><img src="http://lico-realestate.de/wp-content/uploads/2015/01/7.jpg" alt=""></li>
    <li><img src="http://lico-realestate.de/wp-content/uploads/2015/01/8.jpg" alt=""></li>
    <li><img src="http://lico-realestate.de/wp-content/uploads/2015/01/9.jpg" alt=""></li>
    <li><img src="http://lico-realestate.de/wp-content/uploads/2015/01/10.jpg" alt=""></li>
    <li><img src="http://lico-realestate.de/wp-content/uploads/2015/01/11.jpg" alt=""></li>
    <li><img src="http://lico-realestate.de/wp-content/uploads/2015/01/12.jpg" alt=""></li>
     <li><img src="http://lico-realestate.de/wp-content/uploads/2015/01/1.jpg" alt=""></li>
</ul>
 </div>
    </div>
<div id='single-page'>
<div class="container">
<!-- Nav tabs -->
<ul class="nav nav-tabs">

	<li class="active"><a href="#beschreibung" data-toggle="tab"><i class="fa fa-user"></i> Beschreibung</a></li>
	<li ><a href="#details" data-toggle="tab">Details</a></li>
	<li><a href="#anfrage" data-toggle="tab"><i class="fa fa-envelope"></i> Anfrage</a></li>
</ul>
<!-- Tab panes -->
<div class="tab-content">

	<div id="beschreibung" class="tab-pane fade active in">
		<?php the_content();?>
	</div>
	<div id="details" class="tab-pane fade">
		<div class="table-responsive">          
		<table class="table">
			<thead>
			<tr>
				<td>Wohnfläche </td>
				<td><?php echo get_post_meta($post->ID, 'Wohnfläche', true)?> m²</td>
				<td>Preis</td>
				<td><?php echo get_post_meta($post->ID, 'Preis', true)?> EUR</td>
			</tr>
			</thead>
		<tbody>
			<tr>
				<td>Grundstücksfläche</td>
				<td><?php echo get_post_meta($post->ID, 'Grundstücksfläche', true)?> m²</td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>Zimmer </td>
				<td><?php echo get_post_meta($post->ID, 'Zimmer', true)?></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>Schlafzimmer</td>
				<td><?php echo get_post_meta($post->ID, 'Schlafzimmer', true)?></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>Badezimmer</td>
				<td><?php echo get_post_meta($post->ID, 'Badezimmer', true)?></td>
				<td></td>
				<td></td>
			</tr>
			</tbody>
		</table>
		</div>
	</div>

	<div id="anfrage" class="tab-pane fade">
		<div class="content">
		<h3>Anfrage</h3>
		
		<?php
			echo do_shortcode( '[contact-form-7 id="89" title="KONTAKT"]' ); ?>
		</div>
	</div>
</div>
</div>
<div>
<?php else : ?>
<div id="img_background">
<img class="img-responsive" src="http://lico-realestate.de/wp-content/themes/lico/images/img_background_vermieter.png" alt=""><div class="img_caption container"><span class="cnt_caption"><span class="text-uppercase"><?php the_title(); ?></span></span>
</div>
<div class="container">

<div class="col-md-12">
<br>
<?php the_content(); ?>
</div>
</div>
<?php endif; endwhile; endif; ?>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
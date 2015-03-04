<?php get_header(); ?>
<div id="img_background"><img class='img-responsive'src="http://lico-realestate.de//wp-content/themes/lico/images/img_background_licoservice.jpg" alt=""><p></p>
<div class="img_caption container">
 <span class="cnt_caption">
	 <span class="text-uppercase"><?php single_cat_title(); ?></span>
	
 </span>
 </div>
</div>
<section id="content" class="container" role="main">
<div  id="form-search-cate">
	<div class="row">
		<div class="col-md-4 col-xs-12">
			<label>Location :</label>
			<input type="text" name="title" id="search_title">
		</div>
		<div class='col-md-3 col-xs-12'>
			<label>Zimmer :</label>
			<div class="css_select">
				<select id='zimmer' class="form-control">
					<option value='1'>1</option>
					<option value='2'>2</option>
					<option value='3'>3</option>
					<option value='4'>4</option>
					<option value='5'>5</option>
				</select>
			</div>
		</div>
		<div class='col-md-3 col-xs-12'>
			<label>Schlafzimmer :</label>
			<div class="css_select">
				<select id='schlafzi' class="form-control">
					<option value='1'>1</option>
					<option value='2'>2</option>
					<option value='3'>3</option>
					<option value='4'>4</option>
					<option value='5'>5</option>
				</select>
			</div>
		</div>
		<div class='col-md-2 col-xs-12'>
			<input id='search_cate'type="submit" value="Search">
		</div>
	</div>
	<div class="row">
		<div class='col-md-10 col-xs-12'>
			<span>Preis : </span><label id="price_min">100</label> - EUR To <label id="price_max">200</label> - EUR
			<div clas="col-md-5" id="slider-range"></div>
		</div>
	</div>
</div>
<header class="header">

<?php $i = 0 ;// if ( '' != category_description() ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . category_description() . '</div>' ); ?>
</header>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $i++; ?>
<div id="table_<?php echo $i ?>" class="media row search_table">
<div  class="col-md-12" style="border-bottom: 1px solid #e4e4e4;">
  <a class="media-left col-md-3 col-sm-12 col-xs-12" href="<?php the_permalink(); ?>">
	<?php the_post_thumbnail( 'full' ,array( 'class' => 'img-responsive' ) );     ?>
  </a>
  <div class="media-body col-md-9 col-sm-12 col-xs-12" >
    <h4 class="media-heading"><?php the_title();?></h4>
    <div class="table-responsive">          
		<table class="table search_custom">
			<thead>
			<tr>
				<td>Wohnfläche </td>
				<td  class='wohnf'><?php echo get_post_meta($post->ID, 'Wohnfläche', true)?> m²</td>
				<td>Preis</td>
				<td  class='price'><?php echo get_post_meta($post->ID, 'Preis', true)?> EUR</td>
			</tr>
			</thead>
		<tbody>
			<tr>
				<td>Grundstücksfläche</td>
				<td  class='grunds'><?php echo get_post_meta($post->ID, 'Grundstücksfläche', true)?> m²</td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>Zimmer </td>
				<td class='zimmer'><?php echo get_post_meta($post->ID, 'Zimmer', true)?></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>Schlafzimmer</td>
				<td class='schlafzi'><?php echo get_post_meta($post->ID, 'Schlafzimmer', true)?></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>Badezimmer</td>
				<td  class='badezim'><?php echo get_post_meta($post->ID, 'Badezimmer', true)?></td>
				<td></td>
				<td></td>
			</tr>
			</tbody>
		</table>
		</div>
	<div style ="text-align: right;" class="read_more"> 
	<a target="_blank" href="<?php the_permalink(); ?>"></span>
	<span style="color:#8e2324" class="text-uppercase name_arrow">weiterlesen</span>
	</a>
	</div>
  </div>
 </div>
</div>
<?php endwhile; endif; ?>
<?php get_template_part( 'nav', 'below' ); ?>
</section>
<script type="text/javascript">
	// jQuery('#search_cate').on('click',function(){

	// 		var string='';
	// 		var input_search = jQuery('#search_title').val().toLowerCase();
	// 		jQuery('.search_table').hide();
	// 		jQuery('.search_table').each(function(index){
	// 			var target = jQuery(this).find('.test').text();
	// 			string +=	target.toLowerCase().replace(/\s/g, '');
	// 			if(string.indexOf(input_search) != -1){
	// 				console.log('here');
	// 				jQuery(this).show();
	// 			}
	// 		})
	// })
	jQuery('#search_cate').on('click',function(){

			var search_title= jQuery('#search_title').val().toLowerCase();
			var search_zimmer= jQuery('#zimmer').val()
			var search_schlafz= jQuery('#schlafzi').val().toLowerCase();
			var search_price_max = jQuery('#price_max').text();
			var search_price_min = jQuery('#price_min').text();
			console.log(search_title)
			console.log(search_zimmer)
			console.log(search_schlafz)
			console.log(search_price_max)
			console.log(search_price_min)

			jQuery('.search_table').hide();
			var search_result = new Array();
			

			jQuery('.search_table').each(function(index){
					var string_title = jQuery(this).find('h4').text().toLowerCase().replace(/\s/g, '');
					var string_price = jQuery(this).find('.price').text().toLowerCase().replace(/\s/g, '').replace('eur', '');
					var string_zimmer = jQuery(this).find('.zimmer').text().toLowerCase().replace(/\s/g, '');
					var string_schlafz = jQuery(this).find('.schlafzi').text().toLowerCase().replace(/\s/g, '');
					console.log(string_title);
					console.log(string_price);
					console.log(string_zimmer);
					console.log(string_schlafz);
				if(string_title.indexOf(search_title) != -1){
						console.log('title');
					   search_result.push(jQuery(this).attr('id'))
				}
				if(string_price >= search_price_min && string_price <  search_price_max){
					console.log('price');
					   search_result.push(jQuery(this).attr('id'))
				}
				if(string_zimmer.indexOf(search_zimmer) != -1){
						console.log('zimmer');
					   search_result.push(jQuery(this).attr('id'))
				}
				if(string_schlafz.indexOf(search_schlafz) != -1){
						console.log('zimmer');
					   search_result.push(jQuery(this).attr('id'))
				}
				console.log(search_result);
				search_result.forEach(function(table){
					jQuery('#' + table).show();
				})
			})

	})

</script>
<?php // get_sidebar(); ?>
<?php get_footer(); ?>
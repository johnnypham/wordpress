<?php get_header(); ?>

<div class="sd" id="search">

                <div id="img_background">
                    <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/img_background_vermieter.jpg" alt="">
                    <div class="img_caption container">
                        <span class="cnt_caption">
                            <span class="text-uppercase">Suchergebnis</span>
                            <span class="text-uppercase"></span>
                        </span>
                    </div>
                </div>
                <?php if ( have_posts() ) : 
				if (is_page()) break;
                ?>
                	 
                <section id="content_page" class="container row">
                    <div class="title_content" >
                        <h3 class="text-uppercase title_main">Suche in der Website</h3>
                    </div>
                    <div class="content">
                        <div class="search">
                        <?php get_search_form(); ?>
                            
                        </div>

                        <p><?php printf( __( 'Über: %s', 'blankslate' ), get_search_query() ); ?></p>
                    </div>
                    <div class="result_search width_75">

					<?php while ( have_posts() ) : the_post(); ?>
					 <div class="title_result" >
                            <span class=" text-uppercase"><?php the_title(); ?> </span>
                    </div>
                    <div class="cnt_result">
                        <span>
							<?php the_excerpt(); ?>
                        </span>
                    </div>
					<?php endwhile; ?>
					<?php get_template_part( 'nav', 'below' ); ?>
					<?php else : ?>
					<section id="content_page" class="container row">
					<div class="result_search width_75">
                        <?php get_search_form(); ?>
					<header class="header">
					<h2 class="entry-title"><?php _e( 'Entschuldigung!', 'blankslate' ); ?></h2>
					</header>
					<section class="entry-content">
					<p><?php _e( 'Ihre Suche brachte keine Dokumente gefunden.', 'blankslate' ); ?></p>
					</section>
					</div>
					
					<?php endif; ?>



     
                    </div>
     
            </div>

<?php get_footer(); ?>
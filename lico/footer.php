        <footer id="footer">
            <div class="footer_1  container row">

                <?php if ( is_active_sidebar( 'footer-col-1' ) ) : ?>
                <?php dynamic_sidebar( 'footer-col-1' ); 
                dynamic_sidebar( 'footer-col-3' );
                dynamic_sidebar( 'footer-col-4' );
                ?>
                <?php endif; ?>
            </div>
            <div class="footer_mobile container row">
                <?php dynamic_sidebar( 'footer-col-2' ); ?>

            </div>
            <div class="footer_2">
                <div class="img_footer"><img src="<?php echo get_template_directory_uri(); ?>/images/background_footer.png"></div>
                <div class="copy_right">
                    <span>&#169; 2014</span>
                    <span> - </span>
                    <span class="word_red">LICO</span>
                    <span>Immobilien</span>
                </div>
            </div>
        </footer><!--footer-->
	</div>
</div><!--wrapper-->
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <div>
          <iframe width="100%" height="350" src=""></iframe>
        </div>
      </div>
    </div>
  </div>
</div>
<?php wp_footer(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/responsiveslides.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.fitvids.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/pgwslideshow.js"></script>
<script>
    jQuery(function() {
      var clicks = 2;
      jQuery('#phone_btn-mobile').on('click',function(){
        console.log(clicks);
        if(clicks % 2 == 0 ){
           jQuery(this).addClass('mobile-call')
           jQuery('#header_page .col-md-3 .phone_number .number').addClass('number-call')
      }
        else{
           jQuery(this).removeClass('mobile-call')
          jQuery('#header_page .col-md-3 .phone_number .number').removeClass('number-call')

        }
       clicks = clicks+1 ;
      })
        jQuery(".rslides").responsiveSlides({
            auto: true,
            pager: true,
            nav: true,
            speed: 500,
            timeout: 4000,
            namespace: "transparent-btns"
        });
        jQuery('.pgwSlideshow').pgwSlideshow();
        jQuery('.video-home-wrapper').fitVids()
      autoPlayYouTubeModal();	
		function autoPlayYouTubeModal(){
		  var trigger = jQuery("body").find('[data-toggle="modal"]');
		  trigger.click(function() {
			var theModal = $(this).data( "target" ),
			videoSRC = jQuery(this).attr( "data-theVideo" ), 
			videoSRCauto = videoSRC+"?autoplay=1" ;
			$(theModal+' iframe').attr('src', videoSRCauto);
			$(theModal+' button.close').click(function () {
				jQuery(theModal+' iframe').attr('src', videoSRC);
			});   
		  });
		}
    jQuery( "#slider-range" ).slider({
            range: true,
            min: 0,
            max: 1000,
            values: [ 100, 200 ],
            slide: function( event, ui ) {
              jQuery('#price_min').text(jQuery( "#slider-range" ).slider( "values", 0 ))
              jQuery('#price_max').text(jQuery( "#slider-range" ).slider( "values", 1 ))
            }
          });
      });

</script>

</body>
</html>
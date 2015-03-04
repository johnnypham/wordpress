<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( ' | ', true, 'right' ); ?></title>

<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/responsiveslides.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/pgwslideshow.css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
        <div id="wrapper">
           
                <header id="header_menu">
                    <div class="header_full">
                        <div id="header_page" class="container">
                            <div class="social_icons col-md-9">
                                <a href="https://www.facebook.com/pages/LICO-Immobilien/999028400122547?sk=timeline" target="_blank" >
                                    <span class="border_left icon_fb">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/icon_facebook.png">
                                    </span>
                                </a>
                                <a href="https://twitter.com/LICOImmobilien" target="_blank">
                                    <span class="border_left icon_tw">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/icon_tiwtter.png">
                                    </span>
                                </a>
                                <a href="#" target="_blank">
                                    <span class="border_left icon_be">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/icon_behance.png">
                                    </span>
                                </a>
                                <span class="border_left icon_se">
									<div id="search">
										<?php get_search_form(); ?>
									</div>
                                </span>
                            </div>
                            <div class="col-md-3 visible-xs" id="phone_btn-mobile">
                                <div class="phone_number">
                                    <span class="icon_phone">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/icon_phone.png">
                                    </span>
                                    <span class="number">+49 89 57 951 708</span>
                                </div>
                            </div>
                            <div class="col-md-3 hidden-xs" id="phone_btn">
                                <div class="phone_number">
                                    <span class="icon_phone">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/icon_phone.png">
                                    </span>
                                    <span class="number">+49 89 57 951 708</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu_page" class="container row">
                        <nav class="navbar navbar-default menu_main">
                          <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header container">
                                <div class="row">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <div class="logo_home col-md-2">
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/logo_header.png">
                                        </a>
                                    </div>
                                    <div class="collapse navbar-collapse col-md-10" id="bs-example-navbar-collapse-1">
                                      <ul class="nav navbar-nav">
                                        <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container_class' => false,) ); ?>
                                      </ul>
                                    </div><!-- /.navbar-collapse -->
                                </div>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            
                          </div><!-- /.container-fluid -->
                        </nav>
                    </div>
                </header><!--header-->

			<?php if(is_home()) ?>


<div id="container">
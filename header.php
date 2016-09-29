<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Kenneth Muturi">
	<title><?php echo esc_attr( get_bloginfo( 'name', 'display' ) );?> </title>

    <!--Fav and touch icons-->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/icons/16x16.png">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/icons/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/icons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/icons/apple-touch-icon-114x114.png">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	<?php wp_head(); ?>
</head>
<body>
	<!-- Pre Loader -->
	<div class="pre-loader">
		<div class="spinner"></div>
	</div>

   <!-- header start -->
   	<header id="header" class="navbar-fixed-top">
	    <!-- Sticky Navigation Start -->
        <div id="header-top" class="header-top">
	   	   <nav class="navbar navbar-default" role="navigation">
		       	<div class="container">
		       		<div class="row">
			       		<div class="col-sm-12">
			       			<div class="nav-block">
			       				<div class="row">
			       					<div class="col-sm-3 logo-block">
					       			    <!-- Brand and toggle get grouped for better mobile display -->
						              <div class="navbar-header">
						                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=
	                                    "#bs-example-navbar-collapse-1">
						                  <span class="sr-only">Toggle navigation</span>
						                  <span class="icon-bar"></span>
						                  <span class="icon-bar"></span>
						                  <span class="icon-bar"></span>
						                </button>
					       				<div class="logo">
					       					<h1><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png"> <span>SIDRA</span></a></h1>
					       				</div>
					       				<!-- /.logo end -->
						              </div>
						       		</div>
						       		<div class="col-sm-9 navigation-bar">
						       			<!-- Collect the nav toggling -->
						                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						                	<?php wp_nav_menu( array( 'menu' => 'Main Menu', 'container' => '', 'menu_class' => 'nav navbar-nav',  'menu_id' => 'main-menu') ); ?>
						                </div><!-- /.navbar-collapse -->
						       		</div>
			       				</div>
			       			</div><!-- /.nav-block -->
			       		</div>
		       		</div>
		       	</div>
	       </nav> <!-- nav end -->
	   </div><!-- /.header-top -->
        <!-- Sticky Navigation End -->
   </header>
   <!-- header end -->
    <?php if( ! is_front_page() ) : ?>
    <!-- Next Upcoming event start -->
    <section id="event" class="event norm-bg">
       <div class="color-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div id="next-event-content-block-left" class="content-block-left">
                            <h3 class="head-pro"><?php echo strtoupper( get_the_title()); ?></h3>
                            <p>Be apart of it and help us</p>
                        </div><!-- /.content-block-left -->
                    </div>
                    <div class="col-sm-8 text-right">
                        <div id="next-event-content-block-right" class="content-block-right">
                            <h4><?php echo bloginfo('description'); ?></h4>
                        </div><!-- /.content-block-right -->
                    </div>
                </div>
           </div>
       </div><!-- /.color-overlay -->
    </section>
    <?php endif; ?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
		window.config = window.config || {};
		window.config.baseUrl = "<?php echo get_bloginfo('url'); ?>";
	</script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="header">
        <div class="header__content">
            <a class="header__home" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
            <nav class="header__nav nav-primary">
                <?php
                if (has_nav_menu('primary_navigation')) :
                    wp_nav_menu(
                        [
                            'theme_location' => 'primary_navigation',
                            'menu_class'     => 'nav',
                        ]
                    );
                endif;
                ?>
            </nav>
        </div>
    </header>

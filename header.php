<?php
/**
 * @package WordPress
 * @subpackage Tersus
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <title><?php wp_title('&mdash;', true, 'right'); ?><?php bloginfo('name'); ?></title>
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
        
        <?php
            global $options;
            foreach ($options as $value) {
                if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
            }
        ?>
        <?php switch ($tersus_style_sheet) {
            case "Default": ?>
                <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style/css/layout.css" media="screen" />
            <?php break; ?>
            <?php case "Super Ginormous":?>
                <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style/css/layout-superginormous.css" media="screen" />
            <?php break; ?>
            <?php case "Advanced":?>
                <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style/css/layout-advanced.css" media="screen" />
            <?php break; ?>
        <?php } ?>
        
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        
        <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
        <?php wp_head(); ?>
        <!--[if IE]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <!-- Add our TypeKit -->
        <script type="text/javascript" src="http://use.typekit.com/las4ity.js"></script>
        <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
    </head>

    <body>
        <?php
            // Removed body_class() call from body element
            // We may want to revisit this at a later date
            // and provide a custom function which allows
            // page-level ids or classes instead
        ?>
        <?php if ($tersus_announcement_display == "1"): ?>
            <section id="announcement">
                <?php echo (stripslashes($tersus_announcement)); ?>
            </section>
        <?php endif; ?>
        <header class="line">
            <a class="cf" href="<?php echo get_option('home'); ?>/" title="This will take you home"><img src="<?php bloginfo('template_directory'); ?>/images/ca.logo.png" width="102" height=102" alt="Calgary Aikikai Logo" /></a>
            <h1><a href="<?php echo get_option('home'); ?>/" title="This will take you home"><?php bloginfo('name'); ?></a></h1>
            <p><?php bloginfo('description'); ?></p>
        </header>
        
        <div class="navbar">
            <nav class="navbar-inner">
                <ul class="nav">
                    <li class="active divider-vertical"><a href="<?php echo get_settings('home'); ?>">Home</a>
                    <?php wp_list_pages('title_li=&depth=1&exclude=18,48,54,70,67'); ?>
                </ul>
            </nav>
        </div>

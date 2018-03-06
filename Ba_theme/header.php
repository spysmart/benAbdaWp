<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <title><?php bloginfo('name'); ?></title>
    <!-- Bootstrap core CSS -->
    <!-- Custom styles for this template -->
    <?php wp_head(); ?>
</head>

<body>
<div class="im-nav">
    <img src="<?php echo get_template_directory_uri() .'/img/im-nav.png' ?>" alt="image">
</div>
<nav class="sidebar">
    <div class="sidebar-header">
        <?php the_custom_logo(); ?>
    </div>
    <div id="sidebarCollapse" class="btn-menu">
        <svg version="1.0" id="Rectangle"
             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 30 13"
             style="enable-background:new 0 0 30 13;" xml:space="preserve">
                <style type="text/css">
                    .st0 {
                        fill: #6C6C6C;
                    }
                </style>
            <rect y="6" class="st0  st1" width="30" height="1"/>
            <rect class="st0" width="20" height="1"/>
            <rect y="12" class="st0" width="20" height="1"/>
            </svg>
    </div>
    <div id="sidebarCollapse-x" class="btn-exit">
        <img src="<?php echo get_template_directory_uri() .'/img/xx.svg' ?>" alt="image">
    </div>
    <?php wp_nav_menu(
        array(
            'theme-loation' =>'primary',
            'menu_class' => 'list-unstyled',

        ));?>
</nav>
<div class="side-menu">
    <a href="#intro" id="intro-anchor" class="anchor ">Intro</a>
    <a href="#section-1" id="anchor1" class="anchor  ">Section 1</a>
    <a href="#section-2" id="anchor2" class="anchor ">Section 2</a>
    <a href="#section-3" id="anchor3" class="anchor ">Section 3</a>
    <img src="<?php echo get_template_directory_uri() .'/img/line.png' ?>" alt="">
</div>
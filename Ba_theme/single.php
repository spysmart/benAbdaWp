<?php get_header(); ?>
<?php
if (in_category('Collection interieur')){ ?>
    <header id="head">
        <?php 
        if(have_posts()):
            while( have_posts()):the_post();?>
        <div class="container prod-head">
            <div class="imag">
            <?php the_post_thumbnail('full',['class' => 'img-responsive']); ?>
            </div>
            <div class="title"><?php the_title(); ?></div>
            <div class="desc">
                <?php echo '<p class="para">'.get_the_excerpt(). '</p>'; ?>
            </div>
            <div class="baground">
                <img src="<?php echo get_template_directory_uri() .'/img/prod-back.png' ?>" class="img-responsive center-block" alt="image">
            </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
    </header>
    <section class="collection">
        <div class="container">
            <?php 
                $arg = array('category_name' => 'sec-1', 'posts_per_page'=> 1);
                $sec1 = new WP_Query( $arg );
                if($sec1->have_posts()):
                    while( $sec1->have_posts()): $sec1->the_post();?>
                <div class="header">
                        <h1 class="titre"><?php the_title();?></h1>
                        <?php echo '<p class="discription">' .get_the_content().'</p>'; ?>
                </div>
                    <?php endwhile; ?>   
                    <?php wp_reset_postdata(); ?>
                <?php endif; 
            ?> 
            <div class="row">
                <?php 
                    $arg = array(
                        'post_type' => 'items',
                        'category_name' => 'Collection interieur',
                        'order' => 'ASC',
                        'posts_per_page'=> 9);
                    $item1 = new WP_Query( $arg );
                    if($item1->have_posts()):
                        while( $item1->have_posts()): $item1->the_post();?>
                    <div class="col-md-4 col-sm-6">
                        <?php if(is_null($i) or $i>2){ $i=1;} ?>
                        <?php if(is_null($j) or $j>3){ $j=1;} ?>
                        <div class="items i-<?php echo $i.' '; if($j==2){ echo 'one';}elseif($j==3){echo 'two';} ?>">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('full',['class' => 'img-responsive center-block']); ?>
                                <h2><?php the_title(); ?></h2>
                            </a>
                            <?php echo '<p>'.get_the_content().'</p>'; ?>
                        </div>
                    </div>
                        <?php $i++; ?>
                        <?php $j++; ?>
                        <?php endwhile; ?>   
                        <?php wp_reset_postdata(); ?>
                    <?php endif;
                ?> 
            </div>
        </div>
    </section>
    <?php
}
if (in_category('Collection exclusive')){ ?>
    <header id="head">
        <?php 
        if(have_posts()):
            while( have_posts()):the_post();?>
        <div class="container prod-head">
            <div class="imag">
            <?php the_post_thumbnail('full',['class' => 'img-responsive']); ?>
            </div>
            <div class="title"><?php the_title(); ?></div>
            <div class="desc">
                <?php echo '<p class="para">'.get_the_excerpt(). '</p>'; ?>
            </div>
            <div class="baground">
                <img src="<?php echo get_template_directory_uri() .'/img/prod-back.png' ?>" class="img-responsive center-block" alt="image">
            </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
    </header>
    <section class="collection">
        <div class="container">
            <?php 
                $arg = array('category_name' => 'sec-2', 'posts_per_page'=> 1);
                $sec2 = new WP_Query( $arg );
                if($sec2->have_posts()):
                    while( $sec2->have_posts()): $sec2->the_post();?>
                <div class="header">
                        <h1 class="titre"><?php the_title();?></h1>
                        <?php echo '<p class="discription">' .get_the_content().'</p>'; ?>
                </div>
                    <?php endwhile; ?>   
                    <?php wp_reset_postdata(); ?>
            <?php endif; ?> 
            <div class="row">
                <?php 
                    $arg = array(
                        'post_type' => 'items',
                        'category_name' => 'Collection exclusive',
                        'order' => 'ASC',
                        'posts_per_page'=> 9);
                    $item1 = new WP_Query( $arg );
                    if($item1->have_posts()):
                        while( $item1->have_posts()): $item1->the_post();?>
                    <div class="col-md-4 col-sm-6">
                        <?php if(is_null($i) or $i>2){ $i=1;} ?>
                        <?php if(is_null($j) or $j>3){ $j=1;} ?>
                        <div class="items i-<?php echo $i.' '; if($j==2){ echo 'one';}elseif($j==3){echo 'two';} ?>">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('full',['class' => 'img-responsive center-block']); ?>
                                <h2><?php the_title(); ?></h2>
                            </a>
                            <?php echo '<p>' .get_the_content().'</p>'; ?>
                        </div>
                    </div>
                        <?php $i++; ?>
                        <?php $j++; ?>
                        <?php endwhile; ?>   
                        <?php wp_reset_postdata(); ?>
                    <?php endif;
                ?> 
            </div>
        </div>
    </section>

<?php   
}
if (in_category('Installation')){ ?>
    <header id="head">
        <?php 
        if(have_posts()):
            while( have_posts()):the_post();?>
        <div class="container prod-head">
            <div class="imag">
            <?php the_post_thumbnail('full',['class' => 'img-responsive']); ?>
            </div>
            <div class="title"><?php the_title(); ?></div>
            <div class="desc">
                <?php echo '<p class="para">'.get_the_excerpt(). '</p>'; ?>
            </div>
            <div class="baground">
                <img src="<?php echo get_template_directory_uri() .'/img/prod-back.png' ?>" class="img-responsive center-block" alt="image">
            </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
    </header>
    <section class="collection">
        <div class="container">
            <?php 
                $arg = array('category_name' => 'sec-3', 'posts_per_page'=> 1);
                $sec3 = new WP_Query( $arg );
                if($sec3->have_posts()):
                    while( $sec3->have_posts()): $sec3->the_post();?>
                <div class="header">
                        <h1 class="titre"><?php the_title();?></h1>
                        <?php echo '<p class="discription">' .get_the_content().'</p>'; ?>
                </div>
                    <?php endwhile; ?>   
                    <?php wp_reset_postdata(); ?>
            <?php endif; ?> 
            <div class="row">
                <?php 
                    $arg = array(
                        'post_type' => 'items',
                        'category_name' => 'Installation',
                        'order' => 'ASC',
                        'posts_per_page'=> 9);
                    $item1 = new WP_Query( $arg );
                    if($item1->have_posts()):
                        while( $item1->have_posts()): $item1->the_post();?>
                    <div class="col-md-4 col-sm-6">
                        <?php if(is_null($i) or $i>2){ $i=1;} ?>
                        <?php if(is_null($j) or $j>3){ $j=1;} ?>
                        <div class="items i-<?php echo $i.' '; if($j==2){ echo 'one';}elseif($j==3){echo 'two';} ?>">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('full',['class' => 'img-responsive center-block']); ?>
                                <h2><?php the_title(); ?></h2>
                            </a>
                            <?php echo '<p>' .get_the_content().'</p>'; ?>
                        </div>
                    </div>
                        <?php $i++; ?>
                        <?php $j++; ?>
                        <?php endwhile; ?>   
                        <?php wp_reset_postdata(); ?>
                    <?php endif;
                ?> 
            </div>
        </div>
    </section>
<?php    
}
?>
<?php get_footer(); ?> 
<?php get_header(); ?>
<header id="head">
    <div class="container single-head">
        <div class="row">
            <?php if(have_posts()): while(have_posts()):the_post(); ?>
                <div class="col-md-6">
                    <div class="single-img">
                        <?php the_post_thumbnail('full',['class' => 'img-responsive center-block']); ?>
                    </div>                   
                </div>
                <div class="col-md-6"> 
                    <div class="sing-desc">
                        <h2><?php the_title(); ?></h2>
                        <h5><?php the_content(); ?></h5>
                        <span>Code: <?php echo get_post_meta( $post->ID, '_code_value_key', true ); ?></span>
                        <ul>
                            <li>Nom de la collection: <?php echo get_post_meta( $post->ID, '_collection_value_key', true ); ?></li>
                            <li> Couleur: <?php echo get_post_meta( $post->ID, '_colleur_value_key', true ); ?></li>
                            <li>Numéro de motif: <?php echo get_post_meta( $post->ID, '_motif_value_key', true ); ?></li>
                            <li>Largeur: <?php echo get_post_meta( $post->ID, '_largeur_value_key', true ); ?></li>
                            <li>Largeur: <?php echo get_post_meta( $post->ID, '_longeur_value_key', true ); ?></li>
                            <li>Entretien: <?php echo get_post_meta( $post->ID, '_entretien_value_key', true ); ?></li>
                            <li>Utilisation: <?php echo get_post_meta( $post->ID, '_utilisation_value_key', true ); ?> </li>
                            <li>Essai de frottement (Martindale):<?php echo get_post_meta( $post->ID, '_frottement_value_key', true ); ?></li>
                            <li>Poids (gsm): <?php echo get_post_meta( $post->ID, '_poid_value_key', true ); ?></li>
                        </ul>
                        <p class="descrip">
                            <?php echo get_post_meta( $post->ID, '_desc_value_key', true ); ?>
                        </p>
                        <p class="notice">
                            <?php echo get_post_meta( $post->ID, '_reamrque_value_key', true ); ?>
                        </p>
                        <div class="sing-img">
                            <img src="<?php echo get_template_directory_uri() .'/img/sing-back.png'; ?>"  class="img-responsive" alt="image"> 
                        </div>
                    </div>               
                </div>
            <?php endwhile; wp_reset_postdata(); endif; ?>  
        </div>
    </div>
</header>
<?php if (in_category('Collection interieur')){ ?>
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
                        'posts_per_page'=> 3);
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
if (in_category('Collection exclusive')){ ?>
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
                        'posts_per_page'=> 3);
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
                        'posts_per_page'=> 3);
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

<?php get_header(); ?>
<section class="slider" id="intro">
        <div class="slid_bg"></div> 
        <div class="container-fluid">
            <?php
                $arg = array(
                    'category_name' => 'Slider',
                    'posts_per_page'=> 3
                );
            $Slider = new WP_Query( $arg );
                if($Slider->have_posts()): 
                ?>
                    <div class="row">
                        <div class="col-sm-3">
                                <div id="bx-pager">                               
                                        <ul>
                                            <li>
                                                <?php 
                                                    while( $Slider->have_posts()): $Slider->the_post(); ?>
                                                        <?php if(is_null($i)){ $i=0;} ?>
                                                            <a data-slide-index="<?php echo $i; ?>" href="<?php the_permalink(); ?>">
                                                            <?php the_content(); ?>   
                                                            </a>
                                                        <?php $i++; ?>
                                                    <?php endwhile; ?>                                                
                                            </li>
                                        </ul>
                                </div>
                        </div>
                        <div class="col-sm-9">
                            <ul class="bxslider">
                                    <?php
                                    while( $Slider->have_posts()): $Slider->the_post(); ?>
                                <li>
                                     <?php the_post_thumbnail('full',['class' => 'img-responsive center-block']); ?>
                                </li>
                                     <?php endwhile; ?>   
                                    <?php wp_reset_postdata(); ?>
                            </ul>
                        </div>
                        <div class="slide-bg">
                         <img src="<?php echo get_template_directory_uri() .'/img/Scissors.png';?>" class="img-responsive center-block" >
                        </div>
                    </div> 
            <?php endif; ?> 
        </div>
        <div class="inter_sec_bg">
            <div class="elipse_bg"></div>
            <div class="rec_bg"></div>
        </div>   
</section>
<!-- section one -->
<section class="section_one" id="section-1">
        <div class="container">
            <div class="header">
                <?php 
                $arg = array('category_name' => 'sec-1', 'posts_per_page'=> 1);
                $sec1 = new WP_Query( $arg );
                if($sec1->have_posts()):
                    while( $sec1->have_posts()): $sec1->the_post();?>
                        <span class="ligne"></span>
                        <h1 class="titre"><?php the_title();?></h1>
                        <?php echo '<p class="discription">' .get_the_content().'</p>'; ?>
                    <?php endwhile; ?>   
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?> 
            </div>
            <div class="row">
                <?php   $arg = array(
                        'category_name' => 'Collection interieur',
                        'posts_per_page'=> 3,
                        'order' => 'ASC',
                    );
                    $Section_one = new WP_Query( $arg );
                        if($Section_one->have_posts()): ?>
                        <?php while( $Section_one->have_posts()): $Section_one->the_post(); ?>
                            <div class="col-md-6">
                                <a href="<?php the_permalink(); ?>">
                                <?php if(is_null($j)){ $j=1;} ?>
                                    <div class="item img-0<?php echo $j; ?>">
                                        <div class="bg"></div>
                                            <?php the_post_thumbnail('full',['class' => 'img-responsive center-block']); ?>
                                            <div class="item-title">
                                                <h2><?php the_content(); ?></h2>
                                                <div class="dec"><span>Découvrir</span></div>
                                                <div class="ligne">
                                            </div>
                                        </div>
                                    </div> 
                                </a>
                            </div>
                            <?php if($j==2){
                                echo '<div class="clearfix"></div>';
                            } ?>
                            <?php $j++; ?>
                        <?php endwhile; ?>   
                        <?php wp_reset_postdata(); ?>
                        <?php endif; ?>   
                            <div class="col-md-6">
                                <div class="item  img-deco">
                                    <img src="<?php echo get_template_directory_uri() .'/img/deco.png'; ?>" class="img-responsive" alt="image">
                                </div>
                            </div>
            </div>
        </div>
</section>
<!-- section two -->
<section class="section_two" id="section-2">
        <div class="container">
            <div class="header">
                <?php 
                $args = array('category_name' => 'sec-2', 'posts_per_page'=> 1);
                $sec2 = new WP_Query( $args );
                if($sec2->have_posts()):
                    while( $sec2->have_posts()): $sec2->the_post();?>
                        <span class="ligne"></span>
                        <h1 class="titre"><?php the_title();?></h1>                      
                        <?php echo '<p class="discription">' .get_the_excerpt().'</p>'; ?> 
                    <?php endwhile; ?> 
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?> 
            </div>
            <div class="row">
                <?php   $arg = array(
                        'category_name' => 'Collection exclusive',
                        'posts_per_page'=> 4,
                        'order' => 'ASC',
                    );
                    $Section_two = new WP_Query( $arg );
                        if($Section_two->have_posts()): ?>
                        <?php while( $Section_two->have_posts()): $Section_two->the_post(); ?>
                <div class="col-md-6">
                        <a href="<?php the_permalink(); ?>">
                        <?php if(is_null($a)){ $a=1;} ?>
                    <div class="item img-0<?php echo $a; ?>">
                            <div class="bg"></div>
                            <?php the_post_thumbnail('full',['class' => 'img-responsive center-block']); ?>
                        <div class="item-title">
                                <h2><?php the_content(); ?></h2>
                                <div class="dec"><span>Découvrir</span></div>
                                <div class="ligne"></div>
                         </div>
                    </div>
                        </a>
                </div>
                <?php if($a==2){ echo '<div class="clearfix"></div>';} ?>
                <?php 
                if($a==3){
                    echo '<div class="col-md-6">
                    <div class="item img-03">';
                    echo '<img src="'.get_template_directory_uri() .'/img/Spool of Ribbon.png" class="img-responsive" alt="image"></div></div>';

                } ?>
                <?php if($a==4){
                                echo '<div class="col-md-6">
                                <div class="item img-deco">
                                    <img src="'.get_template_directory_uri() .'/img/Spool of Ribbon-1.png" class="img-responsive" alt="image">
                                </div>                               
                            </div>';
                            echo '<div class="clearfix"></div>';
                            } ?>
                            <?php $a++; ?>
                        <?php endwhile; ?>   
                        <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
            </div>
        </div>
    </section>
<!-- section three -->
<section class="section_three" id="section-3">
        <div class="container">
            <div class="header">
                <?php 
                $args = array('category_name' => 'sec-3', 'posts_per_page'=> 1);
                $sec3 = new WP_Query( $args );
                if($sec3->have_posts()):
                    while( $sec3->have_posts()): $sec3->the_post();?>
                        <span class="ligne"></span>
                        <h1 class="titre"><?php the_title();?></h1>                      
                        <?php echo '<p class="discription">' .get_the_excerpt().'</p>'; ?> 
                    <?php endwhile; ?> 
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?> 
            </div>
            <div class="row">
                    <?php $arg = array(
                        'category_name' => 'Installation',
                        'posts_per_page'=> 3,
                        'order' => 'ASC',
                    );
                    $Section_three = new WP_Query( $arg );
                        if($Section_three->have_posts()): ?>
                        <?php while( $Section_three->have_posts()): $Section_three->the_post(); ?>
                            <div class="col-md-6">
                                    <a href="<?php the_permalink(); ?>">
                                    <?php if(is_null($b)){ $b=1;} ?>
                                <div class="item img-0<?php echo $b; ?>">
                                        <div class="bg"></div>
                                        <?php the_post_thumbnail('full',['class' => 'img-responsive center-block']); ?>
                                    <div class="item-title">
                                            <h2><?php the_content(); ?></h2>
                                            <div class="dec"><span>Découvrir</span></div>
                                            <div class="ligne"></div>
                                    </div>
                                </div>
                                    </a>
                            </div>
                            <?php if($b==2){ echo '<div class="clearfix"></div>';} ?>
                            <?php $b++; ?>
                        <?php endwhile; ?>   
                        <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                <div class="col-md-6">
                    <div class="item img-deco">
                        <img src="<?php echo get_template_directory_uri() .'/img/instalation-4.png' ?>" class="img-responsive" alt="image">
                    </div>
                </div>
            </div>

        </div>
        <div class="elipse_bg_2"></div>
    </section>

<?php get_footer(); ?> 
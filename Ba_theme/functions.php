<?php
function scripts(){
    //css
    wp_enqueue_style('bootstrapCss', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
    wp_enqueue_style('css', get_template_directory_uri() .'/css/main.css');
    //js
    wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'bootstrapJs', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'tweenMax', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'scrollmagic', '//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.js', array(), '1.0.0', true );
    wp_enqueue_script( 'scrollmagicDebug', '//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'Gsap', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.js', array(), '1.0.0', true );
    wp_enqueue_script( 'bxslider', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'scroll', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.17.0/plugins/ScrollToPlugin.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'js', get_template_directory_uri() .'/js/main.js', array(), '1.0.0', true );

}
add_action( 'wp_enqueue_scripts', 'scripts' );

function theme_setup(){
    add_theme_support( 'post-thumbnails' );
    //Custom Menu
    add_theme_support('menus');
    register_nav_menu('primary', 'Primary Header Navigation');
    add_theme_support( 'custom-logo', array(
        'height'      => 90,
        'width'       => 60,
        'flex-height' => true,
    ) );
}
add_action('init', 'theme_setup');
add_filter('show_admin_bar', '__return_false');

/*
______________________________________________________________________
            Items CPT
______________________________________________________________________
*/
function theme_custom_post_type(){
    $labels = array(
            'name' => 'Items',
            'singular_name' => 'Item',
            'add_new' => 'Add Item',
            'all_items' => 'All Items',
            'add_new_item' => 'Add Item',
            'edit_item' => 'Edit Item',
            'new_item' => 'New Item',
            'view_item' => 'View Item',
            'search_item' => 'search Item',
            'not_found' => 'No items found',
            'not_found_in_trash'=> 'No items found in trash',
            'parent_item_colon' => 'Parent Item'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => true,
        'query_var'=> true,
        'rewrite'=> true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'supports'=> array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'revisions',
        ),
        'taxonomies' => array('category', 'post_tag'),
        'menu_position' => 5,
        'exclude_from-search' => false
    );
    register_post_type( 'items', $args );
}
add_action( 'init', 'theme_custom_post_type' );

/*
______________________________________________________________________
            Items META BOXES
______________________________________________________________________
*/

function theme_add_meta_box(){
    add_meta_box( 'code', 'Product information', 'theme_product_info_callback', 'items');

}
function theme_product_info_callback($post){
    wp_nonce_field( 'theme_save_code_data', 'theme_meta_box_nonce');
    $value1 = get_post_meta( $post->ID, '_code_value_key', true );
    $value2 = get_post_meta( $post->ID, '_collection_value_key', true );
    $value3 = get_post_meta( $post->ID, '_colleur_value_key', true );
    $value4 = get_post_meta( $post->ID, '_motif_value_key', true );
    $value5 = get_post_meta( $post->ID, '_largeur_value_key', true );
    $value6 = get_post_meta( $post->ID, '_longeur_value_key', true );
    $value7 = get_post_meta( $post->ID, '_entretien_value_key', true );
    $value8 = get_post_meta( $post->ID, '_utilisation_value_key', true );
    $value9 = get_post_meta( $post->ID, '_frottement_value_key', true );
    $value10 = get_post_meta( $post->ID, '_poid_value_key', true );
    $value11 = get_post_meta( $post->ID, '_desc_value_key', true );
    $value12 = get_post_meta( $post->ID, '_reamrque_value_key', true );

    //code
    echo '<label for="theme_code_field">Code: </label>';
    echo '<input type="text" id="theme_code_field" name="theme_code_field" value="'. esc_attr($value1) .'" size= "25" /><br>';
    //Nom de la collection
    echo '<label for="theme_collection_field">Nom de la collection: </label>';
    echo '<input type="text" id="theme_collection_field" name="theme_collection_field" value="'. esc_attr($value2) .'" size= "25" /><br>';
    //Couleur
    echo '<label for="theme_couleur_field">Couleur: </label>';
    echo '<input type="text" id="theme_couleur_field" name="theme_couleur_field" value="'. esc_attr($value3) .'" size= "25" /><br>';
    //Numéro de motif
    echo '<label for="theme_motif_field">Numéro de motif: </label>';
    echo '<input type="text" id="theme_motif_field" name="theme_motif_field" value="'. esc_attr($value4) .'" size= "25" /><br>';
    //Largeur
    echo '<label for="theme_largeur_field">Largeur: </label>';
    echo '<input type="text" id="theme_largeur_field" name="theme_largeur_field" value="'. esc_attr($value5) .'" size= "25" /><br>';
    //Longeur
    echo '<label for="theme_longeur_field">Longeur: </label>';
    echo '<input type="text" id="theme_longeur_field" name="theme_longeur_field" value="'. esc_attr($value6) .'" size= "25" /><br>';
    //Entretien
    echo '<label for="theme_entretien_field">Entretien: </label>';
    echo '<input type="text" id="theme_entretien_field" name="theme_entretien_field" value="'. esc_attr($value7) .'" size= "25" /><br>';
    //Utilisation
    echo '<label for="theme_utilisation_field">Utilisation: </label>';
    echo '<input type="text" id="theme_utilisation_field" name="theme_utilisation_field" value="'. esc_attr($value8) .'" size= "50" /><br>';
    //Essai de frottement (Martindale)
    echo '<label for="theme_frottement_field">Essai de frottement (Martindale): </label>';
    echo '<input type="text" id="theme_frottement_field" name="theme_frottement_field" value="'. esc_attr($value9) .'" size= "50" /><br>';
    //Poids (gsm)
    echo '<label for="theme_poid_field">Poids (gsm): </label>';
    echo '<input type="text" id="theme_poid_field" name="theme_poid_field" value="'. esc_attr($value10) .'" size= "25" /><br>';
    //desc
    echo '<label for="theme_desc_field">Discription: </label>';
    echo '<input type="text" id="theme_desc_field" name="theme_desc_field" value="'. esc_attr($value11) .'" size= "200" /><br>';
    //remarque
    echo '<label for="theme_reamrque_field">Remarque: </label>';
    echo '<input type="text" id="theme_reamrque_field" name="theme_reamrque_field" value="'. esc_attr($value12) .'" size= "150" />';
}
function theme_save_code_data($post_id){
    if (! isset($_POST['theme_meta_box_nonce'])){
        return;
    }
    if (! wp_verify_nonce( $_POST['theme_meta_box_nonce'], 'theme_save_code_data' )){
        return;
    }
    if( defined( 'DOING_AUTOSAVE')&& DOING_AUTOSAVE){
        return;
    }
    if (! current_user_can( 'edit_post', $post_id )){
        return;
    }
    if(! isset($_POST['theme_code_field'])){
        return;
    }
    if(! isset($_POST['theme_collection_field'])){
        return;
    }
    if(! isset($_POST['theme_couleur_field'])){
        return;
    }
    if(! isset($_POST['theme_motif_field'])){
        return;
    }
    if(! isset($_POST['theme_largeur_field'])){
        return;
    }
    if(! isset($_POST['theme_longeur_field'])){
        return;
    }
    if(! isset($_POST['theme_entretien_field'])){
        return;
    }
    if(! isset($_POST['theme_utilisation_field'])){
        return;
    }
    if(! isset($_POST['theme_frottement_field'])){
        return;
    }
    if(! isset($_POST['theme_poid_field'])){
        return;
    }
    if(! isset($_POST['theme_desc_field'])){
        return;
    }
    if(! isset($_POST['theme_reamrque_field'])){
        return;
    }
    update_post_meta( $post_id, '_code_value_key', sanitize_text_field($_POST['theme_code_field']) );
    update_post_meta( $post_id, '_collection_value_key', sanitize_text_field($_POST['theme_collection_field']) );
    update_post_meta( $post_id, '_colleur_value_key', sanitize_text_field($_POST['theme_couleur_field']) );
    update_post_meta( $post_id, '_motif_value_key', sanitize_text_field($_POST['theme_motif_field']) );
    update_post_meta( $post_id, '_largeur_value_key', sanitize_text_field($_POST['theme_largeur_field']) );
    update_post_meta( $post_id, '_longeur_value_key', sanitize_text_field($_POST['theme_longeur_field']) );
    update_post_meta( $post_id, '_entretien_value_key', sanitize_text_field($_POST['theme_entretien_field']) );
    update_post_meta( $post_id, '_utilisation_value_key', sanitize_text_field($_POST['theme_utilisation_field']) );
    update_post_meta( $post_id, '_frottement_value_key', sanitize_text_field($_POST['theme_frottement_field']) );
    update_post_meta( $post_id, '_poid_value_key', sanitize_text_field($_POST['theme_poid_field']) );
    update_post_meta( $post_id, '_desc_value_key', sanitize_text_field($_POST['theme_desc_field']) );
    update_post_meta( $post_id, '_reamrque_value_key', sanitize_text_field($_POST['theme_reamrque_field']) );
}
add_action( 'add_meta_boxes', 'theme_add_meta_box' );
add_action( 'save_post', 'theme_save_code_data' );




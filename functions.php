<?php 
function pw_assets(){
    // registros de estilos
    wp_register_style("google-fonts", 'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"', array(), false, 'all'); // los enlaces CDN se registran y luego se agregan al array() de abajo
    wp_register_style("aos-css", get_template_directory_uri()."/assets/vendor/aos/aos.css");
    wp_register_style("bootstrap-css", get_template_directory_uri()."/assets/vendor/bootstrap/css/bootstrap.min.css");
    wp_register_style("bootstrap-icons-css", get_template_directory_uri()."/assets/vendor/bootstrap-icons/bootstrap-icons.css");
    wp_register_style("boxicons-css", get_template_directory_uri()."/assets/vendor/boxicons/css/boxicons.min.css");
    wp_register_style("glightbox-css", get_template_directory_uri().'/assets/vendor/glightbox/css/glightbox.min.css"');
    wp_register_style("swiper-css", get_template_directory_uri().'/assets/vendor/swiper/swiper-bundle.min.css"');
    
    // registros de scripts
    wp_register_script("vanilla-js", get_template_directory_uri()."/assets/vendor/purecounter/purecounter_vanilla.js");
    wp_register_script("aos-js", get_template_directory_uri()."/assets/vendor/aos/aos.js");
    wp_register_script("bootstrap-js", get_template_directory_uri()."/assets/vendor/bootstrap/js/bootstrap.bundle.min.js");
    wp_register_script("glightbox-js", get_template_directory_uri()."/assets/vendor/glightbox/js/glightbox.min.js");
    wp_register_script("isotope-layout-js", get_template_directory_uri()."/assets/vendor/isotope-layout/isotope.pkgd.min.js");
    wp_register_script("swiper-js", get_template_directory_uri()."/assets/vendor/swiper/swiper-bundle.min.js");
    wp_register_script("typed-js", get_template_directory_uri()."/assets/vendor/typed.js/typed.min.js");
    wp_register_script("waypoints-js", get_template_directory_uri()."/assets/vendor/waypoints/noframework.waypoints.js");
    wp_register_script("php-email-form-js", get_template_directory_uri()."/assets/vendor/php-email-form/validate.js");

    // agregar los estilos en cola del ciclo de vida de Wordpress
    wp_enqueue_style("estilos-pw", get_template_directory_uri()."/assets/css/style.css", array(
        "google-fonts",
        "aos-css",
        "bootstrap-css",
        "bootstrap-icons-css",
        "boxicons-css",
        "glightbox-css",
        "swiper-css"
    ));

    // agregar los scripts en cola del ciclo de vida de Wordpress
    wp_enqueue_script("scripts-pw", get_template_directory_uri()."/assets/js/main.js", array(
        "vanilla-js",
        "aos-js",
        "bootstrap-js",
        "glightbox-js",
        "isotope-layout-js",
        "swiper-js",
        "typed-js",
        "waypoints-js",
        "php-email-form-js" 
    ));
}
// pw_assets(); // no debería ejecutar la función directamente, sino cuando lo necesite (utilizar el hook de abajo en su lugar)
add_action("wp_enqueue_scripts", "pw_assets"); //wp-enqueue-scripts es el hook que determina cuándo ejecutar la función pw_assets()

// function pw_analytics(){
    
// }
// add_action("wp_body_open", "pw_analytics");

function pw_theme_supports(){
    add_theme_support('title-tag');
    add_theme_support( 'post-thumbnails' );
    add_theme_support('custom-logo', //agrega la opción de subir logo al Personalizar la Identidad del sitio
        array(
            'width'               => 600,
            'height'                => 600,
            'flex-width'          => true,
            'flex-height'           => true
        ) 
    );
    // add_theme_support( 'custom-background' ); //imagen de fondo de toda la página (Apariencia/Background)
}
add_action("after_setup_theme", "pw_theme_supports");

function pw_logo_class( $html ) { // agrega clases al img del custom-logo
    $html = str_replace( 'custom-logo', 'custom-logo img-fluid rounded-circle', $html );
    return $html;
}
add_filter( 'get_custom_logo', 'pw_logo_class' );

function pw_add_menus(){
    register_nav_menus( // agrega las opciones de menú en Apariencias/Menús
        array(
            'menu-principal' => "Menú principal",
            'menu-responsive' => "Menú responsive",
            'menu-proyectos' => "Menú proyectos"
        )
    );
}
add_action("after_setup_theme", "pw_add_menus");

function pw_class_to_menu_anchors($atts) { // agrega clases a los anchors del menú
    if ( has_nav_menu( 'menu-principal' ) ) { // aplicar solo al menu-principal
        $atts['class'] = 'nav-link scrollto';
    }
	
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'pw_class_to_menu_anchors', 10, 3 );

function pw_add_sidebar(){
    register_sidebar(array(
        'name' => 'Copyright',
        'id' => 'copyright',
        'before_widget'  => '<div class="copyright %2$s">',
		'after_widget'   => "</div>\n",
    ));
    register_sidebar(array(
        'name' => 'Créditos',
        'id' => 'credits',
        'before_widget'  => '<div class="credits %2$s">',
		'after_widget'   => "</div>\n",
    ));
    register_sidebar(array(
        'name' => 'Redes Sociales',
        'id' => 'social-links',
        'before_widget'  => '<div class="social-links mt-3 text-center %2$s">',
		'after_widget'   => "</div>\n",
    ));
}
add_action('widgets_init', 'pw_add_sidebar');

function pw_add_custom_post_type(){
    // Proyectos
    $labels = array(
        'name'              => 'Portafolio',
        'singular_name'     => 'Proyecto',
        'all_items'         => 'Todos',
        'add_new'           => 'Agregar nuevo'
    );  

    $args = array(
        'labels'            => $labels,
        'description'       => 'Mi portafolio',
        'public'            => true,
        'publicly_queryable'=> true,
        'show_in_menu'      => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'portafolio' ),
        'capability_type'   => 'post',
        'has_archive'       => true,
        'hierarchical'      => false,
        'menu_position'     => 20,
        'supports'          => array( 'title', 'editor', 'author', 'thumbnail' ),
        'taxonomies'        => array( 'category'),
        'show_in_rest'      => true,
        'menu_icon'         => 'dashicons-portfolio'
    );
    register_post_type('proyecto', $args);

    // Mi perfil
    $labels = array(
        'name'              => 'Mi perfil',
        'singular_name'     => 'Mi perfil',
        'all_items'         => 'Todos',
        'add_new'           => 'Agregar nuevo'
    );  

    $args = array(
        'labels'            => $labels,
        'description'       => 'Mi perfil profesional',
        'public'            => true,
        'publicly_queryable'=> true,
        'show_in_menu'      => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'perfil' ),
        'capability_type'   => 'post',
        'has_archive'       => true,
        'hierarchical'      => false,
        'menu_position'     => 20,
        'supports'          => array( 'title', 'editor', 'author', 'thumbnail' ),
        'show_in_rest'      => true,
        'menu_icon'         => 'dashicons-businessman'
    );
    register_post_type('perfil', $args);
}
add_action('init', 'pw_add_custom_post_type');
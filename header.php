<!DOCTYPE html>
<html <?php language_attributes();?>>

<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url');?>">

    <?php wp_head();?>
</head>

<body <?php body_class('bg-white text-gray-900 antialiased font-verdana');?>>

    <?php do_action('Rabbit_site_before');?>

    <div id="page" class="min-h-screen flex flex-col">

        <?php do_action('Rabbit_header');?>

        <header class="z-50">
            <div class="h-4 w-full bg-gradient-to-r from-rabbit1 to-rabbit2"></div>
            <div class="h-14 w-full bg-white">
                <div class="w-full h-14 bg-white flex justify-end items-center">
                    <div class="w-80 h-8 mr-10 rounded-full bg-rabbit2 flex justify-between items-center">
                        <div class="flex justify-start items-center rounded-full w-52 h-8 bg-rabbit1 relative">
                            <input type="text" class="w-52 h-8 bg-transparent px-4 text-white border-none rounded-full">
                            <div
                                class="h-6 w-6 bg-orange-400 rounded-full flex justify-center items-center absolute right-1">
                                <img src="<?php echo get_template_directory_uri(); ?>/resources/images/4.png"
                                    alt="Polubione" class="h-4 w-4">
                            </div>

                        </div>

                        <div class="w-28 px-4 flex justify-between items-center invert">
                            <a href="/moje-konto">
                                <img src="<?php echo get_template_directory_uri(); ?>/resources/images/2.png"
                                    alt="Użytkownik" class="h-4">
                            </a>
                            <a href="/ulubione">
                                <img src="<?php echo get_template_directory_uri(); ?>/resources/images/1.png"
                                    alt="Polubione" class="h-4">
                            </a>
                            <a href="/koszyk">
                                <img src="<?php echo get_template_directory_uri(); ?>/resources/images/3.png"
                                    alt="Koszyk" class="h-4">
                            </a>
                        </div>

                    </div>
                </div>
                <div
                    class="inline-flex -mt-14 h-32 bg-white w-44 rounded-r-logo justify-center items-center shadow-lg [&_img]:h-24 [&_img]:w-24">

                    <div>
                        <?php if (has_custom_logo()) {?>
                        <?php the_custom_logo();?>
                        <?php } else {?>
                        <a href="<?php echo get_bloginfo('url'); ?>" class="font-extrabold text-lg uppercase">
                            <?php echo get_bloginfo('name'); ?>
                        </a>

                        <p class="text-sm font-light text-gray-600">
                            <?php echo get_bloginfo('description'); ?>
                        </p>

                        <?php }?>
                    </div>
                </div>

            </div>
            <div class="w-full h-10 bg-rabbit1 pl-44 flex justify-center items-center lg:text-white">
                <div class="flex justify-between items-center py-6">
                    <div class="flex justify-between items-center">
                        <div class="lg:hidden">
                            <a href="#" aria-label="Toggle navigation" id="primary-menu-toggle">
                                <svg viewBox="0 0 20 20" class="inline-block w-6 h-6" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g stroke="none" stroke-width="1" fill="currentColor" fill-rule="evenodd">
                                        <g id="icon-shape">
                                            <path
                                                d="M0,3 L20,3 L20,5 L0,5 L0,3 Z M0,9 L20,9 L20,11 L0,11 L0,9 Z M0,15 L20,15 L20,17 L0,17 L0,15 Z"
                                                id="Combined-Shape"></path>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <?php

wp_nav_menu(
    array(
        'container_id' => 'primary-menu',
        'container_class' => 'mt-4 p-4 h-10 w-full lg:mt-0 lg:p-0 lg:bg-transparent flex justify-center items-center',
        'menu_class' => 'flex justify-center items-center group',
        'li_class' => '
        rounded-sm px-3 py-1
        flex justify-start items-center
        hover:bg-gray-800
        relative
        w-full [&.menu-depth-0]:w-max
        [&>a]:w-full
        [&>ul]:w-full [&>ul]:min-w-[10rem]
        [&>span>svg]:hover:-rotate-90 [&.menu-depth-0>span>svg]:hover:-rotate-180
        [&>ul]:transform [&>ul]:scale-0 [&>ul]:hover:scale-100
        transition duration-150 ease-in-out
        [&>ul]:transition [&>ul]:duration-150 [&>ul]:ease-in-out
        origin-top
        [&>ul]:bg-gray-400
        [&>ul]:absolute
        [&>ul]:top-0 [&>ul]:left-full [&.menu-depth-0>ul]:top-8 [&.menu-depth-0>ul]:left-0
        ',
        'theme_location' => 'primary',
        'fallback_cb' => false,
        'walker' => new My_Nav_Menu_Walker(),
    )
); //[&>ul]:hover:block

// wp_nav_menu(
//     array(
//         'container_id' => 'primary-menu',
//         'container_class' => 'hidden bg-gray-100 mt-4 p-4 lg:mt-0 lg:p-0 lg:bg-transparent lg:block',
//         'menu_class' => 'lg:flex lg:-mx-4',
//         'theme_location' => 'primary',
//         'li_class' => 'lg:mx-4',
//         'fallback_cb' => false,
//     )
// );
?>

                    <!-- </div> -->
                </div>


            </div>





        </header>
        <a href="#">
            <div id="btn-chat"
                class="opacity-100 opacity-0 invisible bg-rabbit1 rounded-full fixed bottom-[12%] right-4 h-20 w-20 flex justify-center items-center z-50 shadow-md transition duration-500 ease-in-out hover:bg-rabbit2 hover:shadow-lg focus:bg-rabbit1 focus:shadow-lg focus:outline-none focus:ring-0">
                <img src="<?php echo get_template_directory_uri(); ?>/resources/images/talk2.png" alt="Wiadomości"
                    class="w-12 h-12 mt-2">
            </div>
        </a>

        <div id="content" class="site-content flex-grow">

            <?php do_action('Rabbit_content_start');?>

            <main>
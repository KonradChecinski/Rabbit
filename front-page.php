<?php get_header();?>

<!-- Slajder -->
<div class="w-full lg:h-[600px] h-[100px] bg-gradient-to-r from-orange-500 to-yellow-500">

    <div class="swiper mySwiper w-full h-full ml-auto mr-auto"
        data-time="<?php echo get_option("slider-settings-time") ?>"
        data-arrow="<?php echo get_option("slider-settings-arrow") ?>"
        data-pagination="<?php echo get_option("slider-settings-pagination") ?>">
        <div class="swiper-wrapper">
            <?php
$slider = new WP_Query(array(
    "post_type" => "slider",
    "post_status" => "publish",
    "posts_per_page" => -1,
    'orderby' => "title",
    "order" => "ASC",
    "ignore_custom_sort" => true,
));

if ($slider->have_posts()):
    while ($slider->have_posts()):
        $slider->the_post();
        // print_r($slider);
        ?>
            <div
                class="swiper-slide text-center bg-white flex justify-center items-center [&_img]:block [&_img]:w-full [&_img]:h-full [&_img]:object-cover">
                <?php
        if (has_post_thumbnail()) {
            the_post_thumbnail('full');
        } else {
        }
        ?>
            </div>
            <?php
    endwhile;
endif;
?>
        </div>
        <?php if (get_option("slider-settings-arrow") == 1): ?>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <?php endif;?>
        <?php if (get_option("slider-settings-pagination") == 1): ?>
        <div class="swiper-pagination"></div>
        <?php endif;?>

    </div>

</div>


<!-- Koniec Slajder -->



<div class="w-full h-32 bg-gradient-to-r from-rabbit1 to-rabbit2 flex justify-center items-center">
    <div class="container flex justify-around items-center">
        <div class="flex flex-col justify-center items-center">
            <img src="<?php echo get_template_directory_uri(); ?>/resources/images/incognito.png" alt="Dyskrecja"
                class="h-16 invert mb-2">
            <p class="text-white font-bold">Dyskrecja</p>
        </div>
        <div class="flex flex-col justify-center items-center">
            <img src="<?php echo get_template_directory_uri(); ?>/resources/images/check-mark.png" alt="Gwarancja"
                class="h-16 invert mb-2">
            <p class="text-white font-bold">Gwarancja</p>
        </div>
        <div class="flex flex-col justify-center items-center">
            <img src="<?php echo get_template_directory_uri(); ?>/resources/images/padlock.png"
                alt="Bezpieczne Płatności" class="h-16 invert mb-2">
            <p class="text-white font-bold">Bezpieczne Płatności</p>
        </div>
        <div class="flex flex-col justify-center items-center">
            <img src="<?php echo get_template_directory_uri(); ?>/resources/images/package.png" alt="Zwrot"
                class="h-16 invert mb-2">
            <p class="text-white font-bold">Zwrot</p>
        </div>
    </div>
</div>

<div class="my-8 flex flex-col justify-center items-center">
    <div class="my-8">
        <div class="container">
            <h2 class="text-2xl text-rabbit4 font-bold text-center mb-24 mt-12">Produkty popularne u naszych klientów
            </h2>
        </div>
        <div class="container">
            <?php echo do_shortcode('[products limit="4" columns="4" best_selling="true" ]'); ?>
        </div>
    </div>

    <div class="">
        <div class="container my-8">
            <h2 class="text-xl text-rabbit1 font-bold text-center">Nasze</h2>
            <h2 class="text-2xl text-rabbit1 font-bold text-center">Kolekcje</h2>
        </div>
        <div
            class="container grid grid-cols-[2fr_repeat(2,_1fr)] grid-rows-2 gap-5 first:[&_a]:row-span-2 last:[&_a]:col-span-2 max-h-[50rem]">
            <?php
$collections = get_terms([
    'taxonomy' => 'collection',
    'hide_empty' => false,
]);
$collections = array_slice($collections, 0, 4);
foreach ($collections as $term) {
    $upload_image = get_term_meta($term->term_id, 'term_image', true);
    ?>
            <a href="<?php echo get_term_link($term->term_id) ?>"
                class="hover:scale-105 hover:shadow-lg shadow-sm transition duration-200 ease-in-out">
                <img src="<?php echo $upload_image ?>" class="h-full w-full">
            </a>

            <?php
}

?>


        </div>
        <!-- <div class="container flex gap-2">
            <div class="flex gap-2">
                <div class="h-[20.75] w-60 bg-gradient-to-r from-rabbit1 to-rabbit2"></div>
            </div>
            <div class="flex max-w-[17rem] gap-3 flex-wrap spa">
                <div class="h-40 w-32 bg-gradient-to-r from-rabbit1 to-rabbit2"></div>
                <div class="h-40 w-32 bg-gradient-to-r from-rabbit1 to-rabbit2"></div>
                <div class="h-40 w-[16.75rem] bg-gradient-to-r from-rabbit1 to-rabbit2"></div>
            </div>

        </div> -->
    </div>

    <div class="my-16">
        <div class="container">
            <button class="w-96 bg-gradient-to-r from-rabbit2 to-rabbit1 p-4">
                <h2 class="text-xl text-white font-bold text-center">Masz pytanie? Wątpliwości?</h2>
                <h2 class="text-2xl text-white font-bold text-center">Zapytaj!</h2>
            </button>

        </div>
    </div>

    <div class="mt-16 mb-4">
        <h2 class="text-xl font-extrabold">Dla Początkujących</h2>
    </div>
    <div
        class=" w-full min-h-[50rem] py-8 bg-gradient-to-r from-orange-500 to-yellow-500 flex justify-center items-center flex-col">
        <div class="container flex flex-wrap justify-center items-center">
            <!-- <div class="w-52 h-64 bg-white"></div>
            <div class="w-52 h-64 bg-white"></div> -->
            <div class="[&_li]:bg-white  [&_li]:h-full [&_li]:flex ">
            </div>
            <?php echo do_shortcode('[products limit="6" columns="3" category="bez-kategorii"
            class="
            &#91;&_li&#93;:bg-white
            &#91;&_li&#93;:h-full


            "

            ]'); ?>
        </div>

        <div class="container flex justify-center items-center mt-16 gap-6">
            <button class="w-96 bg-gradient-to-r from-rabbit2 to-rabbit1 p-4">
                <h2 class="text-xl text-white font-bold text-center">Więcej</h2>
            </button>
        </div>
    </div>

    <div class="mt-16 mb-16">
        <h2 class="text-3xl font-extrabold">Co Myślą O Nas Inni?</h2>
    </div>
    <div class="w-full bg-gradient-to-r from-rabbit2 to-rabbit1 flex justify-center items-center flex-col p-6">
        <div class="container flex justify-center items-center gap-6">
            <?php
$rating = new WP_Query(array(
    "post_type" => "rating",
    "post_status" => "publish",
    "posts_per_page" => 3,
    'orderby' => "title",
    "order" => "ASC",
    "ignore_custom_sort" => true,
));

if ($rating->have_posts()):
    while ($rating->have_posts()):
        $rating->the_post();
        // print_r($rating);
        ?>
            <div class="w-72 h-56 bg-white flex justify-between items-center flex-col">
                <div class="mt-5 px-4 text-center text-sm">
                    <?php the_excerpt();?>
                </div>
                <div class="mb-5 flex justify-center items-center gap-2">
                    <?php
        $ratingStar = get_post_meta(get_the_ID(), '_rating', true);
        for ($i = 0; $i < $ratingStar; $i++) {
            ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/resources/images/star2.png" alt="Gwiazdka"
                        class="h-6">
                    <?php
        }

        for ($i = $ratingStar; $i < 5; $i++) {
            ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/resources/images/star1.png" alt="Gwiazdka"
                        class="h-6">
                    <?php
        }

        ?>

                </div>
            </div>

            <?php
    endwhile;
endif;
?>

        </div>
    </div>

    <div
        class="mt-[6rem] w-full min-h-[20rem] bg-gradient-to-r from-rabbit2 to-rabbit1 flex justify-center items-center flex-col text-white">
        <div class="container flex justify-around items-stretch">
            <div class="w-64 flex flex-col justify-start items-center text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/resources/images/incognito.png" alt="Dyskrecja"
                    class="h-24 invert">
                <p class="text-2xl mb-4">Dyskrecja</p>
                <p>Bezpieczne i dyskretne pakowanie paczek i oraz bezpiecznych nazw na rachunkach ???? ???? ???? </p>
            </div>
            <div class="w-64 flex flex-col justify-start items-center text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/resources/images/check-mark.png" alt="Gwarancja"
                    class="h-24 invert">
                <p class="text-2xl mb-4">Gwarancja</p>
                <p>Bez obaw, zajmiemy się każdym uszkodzonym produktem albo brakującym elementem</p>
            </div>
            <div class="w-64 flex flex-col justify-start items-center text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/resources/images/padlock.png"
                    alt="Bezpieczne Płatności" class="h-24 invert">
                <p class="text-2xl mb-4">Bezpieczne Płatności</p>
                <p>Strona i płatności zabezpieczone SSL</p>
            </div>
            <div class="w-64 flex flex-col justify-start items-center text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/resources/images/package.png" alt="Zwrot"
                    class="h-24 invert">
                <p class="text-2xl mb-4">Zwrot</p>
                <p>Strona i płatności zabezpieczone SSL</p>
            </div>
        </div>
    </div>
    <div class="mt-8 w-full flex justify-center items-center flex-col">
        <div class="container mt-8 mb-8 flex justify-center items-center flex-col">
            <h2 class="w-48 text-2xl font-extrabold text-center">Masz pytania?</h2>
            <p class="w-60 font-bold text-center">Fast Rabbit to wiodący lider na rynku zabawek erotycznych i
                akcesoriów.</p>
            <div class="mt-4 flex gap-12">
                <button class="w-96 bg-gradient-to-r from-rabbit2 to-rabbit1 p-4">
                    <h2 class="text-xl text-white font-bold text-center">Często zadawane pytania</h2>
                </button>
                <button class="w-96 bg-gradient-to-r from-rabbit2 to-rabbit1 p-4">
                    <h2 class="text-xl text-white font-bold text-center">Zapytaj nas!</h2>
                </button>
            </div>
        </div>
    </div>

    <div class="mt-8 w-full flex justify-center items-center flex-col">
        <div class="container mt-8 mb-8 flex justify-center items-center flex-col [&>a>img]:h-36 [&>a>img]:w-36">
            <?php the_custom_logo();?>
            <div class="mt-4 flex gap-12">
                <button class="w-20 h-20 rounded-full bg-gradient-to-r from-rabbit2 to-rabbit1 p-4">
                    <img src="<?php echo get_template_directory_uri(); ?>/resources/images/phone.png" alt="Telefon"
                        class="invert">
                </button>
                <button class="w-20 h-20 rounded-full bg-gradient-to-r from-rabbit2 to-rabbit1 p-4">
                    <img src="<?php echo get_template_directory_uri(); ?>/resources/images/mail.png" alt="Mail"
                        class="invert">
                </button>
                <button class="w-20 h-20 rounded-full bg-gradient-to-r from-rabbit2 to-rabbit1 p-4">
                    <img src="<?php echo get_template_directory_uri(); ?>/resources/images/Twitter.png" alt="Twitter"
                        class="">
                </button>
                <button class="w-20 h-20 rounded-full bg-gradient-to-r from-rabbit2 to-rabbit1 p-4">
                    <img src="<?php echo get_template_directory_uri(); ?>/resources/images/instagram.png"
                        alt="Instagram" class="invert">
                </button>
            </div>
        </div>
    </div>

    <div
        class="mt-8 w-full h-[20rem] flex justify-center items-center flex-col bg-gradient-to-b from-white to-slate-200">
        <div class="container mt-8 mb-8 flex justify-center items-center flex-col">


        </div>
    </div>

    <div class="mt-8 w-full flex justify-center items-center flex-col">
        <div class="container mt-8 mb-8 flex justify-center items-center flex-col">
            <p class=" font-bold text-xl">Bezpiecznie, dyskretnie, szybko!</p>
            <img src="" alt="platnosci">
            <hr class="mt-4 w-full">
            <div class="w-full flex gap-4">
                <a href="">Regulamin</a>
                <a href="">Prywatność</a>
                <a href="">Polityka cookies</a>
            </div>

        </div>

    </div>



</div>





<div class="container mx-auto my-8">

    <?php if (have_posts()): ?>
    <?php
while (have_posts()):
    the_post();
    ?>

    <?php // get_template_part('template-parts/content', get_post_format());?>

    <?php endwhile;?>

    <?php endif;?>

</div>

<?php
get_footer();

// if (have_posts()):
//     while (have_posts()):
//         the_post();

//         the_content();

//     endwhile;

// endif;
?>
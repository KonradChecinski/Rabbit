// import Swiper JS
import Swiper from "swiper";
import { Autoplay, Navigation, Pagination } from "swiper/modules";
// import Swiper styles
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";
import { Ripple, initTE } from "tw-elements";

initTE({ Ripple });

// Navigation toggle
window.addEventListener("load", function () {
    let main_navigation = document.querySelector("#primary-menu");
    document
        .querySelector("#primary-menu-toggle")
        .addEventListener("click", function (e) {
            e.preventDefault();
            main_navigation.classList.toggle("hidden");
        });

    // When the user scrolls down 20px from the top of the document, show the button
    const mybutton = document.getElementById("btn-chat");
    let mybuttonTimeout;
    const scrollmybuttonFunction = () => {
        if (
            document.body.scrollTop > 150 ||
            document.documentElement.scrollTop > 150
        ) {
            mybutton.classList.remove("opacity-0");
            mybutton.classList.remove("invisible");
            this.clearTimeout(mybuttonTimeout);
        } else {
            mybutton.classList.add("opacity-0");
            this.clearTimeout(mybuttonTimeout);
            mybuttonTimeout = this.setTimeout(() => {
                mybutton.classList.add("invisible");
            }, 500);
        }
    };
    window.addEventListener("scroll", scrollmybuttonFunction);

    const headerMenu = document.getElementById("header-menu");
    const logoMenu = document.getElementById("logo-menu");
    const scrollheaderMenuFunction = () => {
        if (
            document.body.scrollTop > 20 ||
            document.documentElement.scrollTop > 20
        ) {
            headerMenu.classList.add("!top-0");
            logoMenu.classList.add("fixedMenu");
        } else {
            headerMenu.classList.remove("!top-0");
            logoMenu.classList.remove("fixedMenu");
        }
    };
    window.addEventListener("scroll", scrollheaderMenuFunction);

    //     init Swiper:
    let swiperElement = document.querySelector(".swiper");
    const swiper = new Swiper(".swiper", {
        // configure Swiper to use modules
        modules: [Autoplay, Navigation, Pagination],
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        autoplay: {
            delay: swiperElement.dataset.time,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
            dynamicBullets: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
});

window.axios = require('axios');
window.fuse = require('fuse.js').default;
import { createApp } from 'vue'

// Lazyload
import LazyLoad from "vanilla-lazyload";

const lazyLoadInstance = new LazyLoad({
    elements_selector: ".lazy"
});

import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { Observer } from "gsap/Observer";
import { ScrollToPlugin } from "gsap/ScrollToPlugin";
import { TextPlugin } from "gsap/TextPlugin";
gsap.registerPlugin(ScrollTrigger,Observer,ScrollToPlugin,TextPlugin);


// Base Vue Components
import Search from './components/Search.vue';

// Global Vue Components
import HeaderSection from "./components/HeaderSection.vue";
import FooterSection from "./components/FooterSection.vue";
import SignupModal from "./components/SignupModal.vue";
import LoginModal from "./components/LoginModal.vue";
import MainSiteWrapperScreen from "./components/MainSiteWrapperScreen.vue";

//homepage
import HomeHero from "./components/homepage/HomeHero.vue";
import OurLogos from "./components/homepage/OurLogos.vue";
import HomePricing from "./components/homepage/HomePricing.vue";
import OurCompetition from "./components/homepage/OurCompetition.vue";
import CenteredTextCta from "./components/homepage/CenteredTextCta.vue";
import HowItWorks from "./components/homepage/HowItWorks.vue";
import StartNowCta from "./components/homepage/StartNowCta.vue";


// Forms
import ContactSupportForm from "./components/homepage/ContactSupportForm.vue";
import FrequentlyAskedQuestions from "./components/homepage/FrequentlyAskedQuestions.vue";




/* vue create app */
createApp({
    components: {
        Search,

        // Global Components
        HeaderSection,
        FooterSection,
        MainSiteWrapperScreen,

        //homepage
        HomeHero,
        OurLogos,
        HomePricing,
        OurCompetition,
        FrequentlyAskedQuestions,
        CenteredTextCta,
        HowItWorks,
        StartNowCta,

        // forms
        ContactSupportForm,

        // Global
        SignupModal,
        LoginModal,

    },

    mounted() {

    },

    created() {

    },



}).mount('#app')


// To utilize the dialog opening function you must add 'dialog-button' to the container of
// a button. Then add 'data-dialog' as an attribute to the button tag. The
// value of the data-dialog must match the dialogs id.

if (document.querySelector('.scroll-list')) {
    document.querySelectorAll('.scroll-list').forEach(scrollList => {
        const textItems = scrollList.getElementsByClassName('scroll-item');
        const numLogos = textItems.length;
        const numClones = Math.ceil(scrollList.offsetWidth / (textItems[0].offsetWidth + 20));
        const totalLogos = numLogos * numClones;

        // Clone texts and append to text list up to the maximum number of clones
        for (let i = 0; i < totalLogos; i++) {
            const clone = textItems[i % numLogos].cloneNode(true);
            scrollList.appendChild(clone);
        }

        // Continuous scrolling effect using CSS translateX property
        let translateValue = 0;

        function animateScroll() {
            translateValue = translateValue - 1.2;
            if (translateValue <= -textItems[0].offsetWidth) {
                translateValue = 0;
                scrollList.appendChild(scrollList.firstElementChild);
            }
            scrollList.style.transform = `translateX(${translateValue}px)`;
            requestAnimationFrame(animateScroll);
        }

        animateScroll();
    });

}
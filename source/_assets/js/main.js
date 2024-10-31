window.axios = require('axios');
window.fuse = require('fuse.js').default;
import { createApp } from 'vue'

// Lazyload
import LazyLoad from "vanilla-lazyload";

const lazyLoadInstance = new LazyLoad({
    elements_selector: ".lazy"
});


// Base Vue Components
import Search from './components/Search.vue';

// Global Vue Components
import HeaderSection from "./components/HeaderSection.vue";
import FooterSection from "./components/FooterSection.vue";
import SignupModal from "./components/SignupModal.vue";

//homepage
import HomeHero from "./components/homepage/HomeHero.vue";
import OurLogos from "./components/homepage/OurLogos.vue";
import HomePricing from "./components/homepage/HomePricing.vue";
import OurCompetition from "./components/homepage/OurCompetition.vue";

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

        //homepage
        HomeHero,
        OurLogos,
        HomePricing,
        OurCompetition,
        FrequentlyAskedQuestions,

        // forms
        ContactSupportForm,

        // Global
        SignupModal,

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
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

// built Vue Components
import SiteHeader from "./components/SiteHeader.vue";

//homepage
import HomeHero from "./components/homepage/HomeHero.vue";
import OurLogos from "./components/homepage/OurLogos.vue";

/* vue create app */
createApp({
    components: {
        Search,

        // Built VUE Components CYBORG LOGO
        SiteHeader,

        //homepage
        HomeHero,
        OurLogos,


    },
}).mount('#app')


// To utilize the dialog opening function you must add 'dialog-button' to the container of
// a button. Then add 'data-dialog' as an attribute to the button tag. The
// value of the data-dialog must match the dialogs id.
document.querySelectorAll('.dialog-button button').forEach(button => {
    button.addEventListener('click', e => {
        e.stopPropagation();
        document.querySelector('#' + e.target.dataset.dialog).classList.toggle('show-dialog');
    })
})


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
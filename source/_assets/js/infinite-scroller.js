
const logoList = document.querySelector('.scroll-list');
const logoItems = logoList.getElementsByClassName('scroll-item');
const numLogos = logoItems.length;
const numClones = Math.ceil(logoList.offsetWidth / (logoItems[0].offsetWidth + 20));
const totalLogos = numLogos * numClones;

// Clone logos and append to logo list up to the maximum number of clones
for (let i = 0; i < totalLogos; i++) {
    const clone = logoItems[i % numLogos].cloneNode(true);
    logoList.appendChild(clone);
}

// Continuous scrolling effect using CSS translateX property
let translateValue = 0;
function animateScroll() {
    translateValue--;
    if (translateValue <= -logoItems[0].offsetWidth) {
        translateValue = 0;
        logoList.appendChild(logoList.firstElementChild);
    }
    logoList.style.transform = `translateX(${translateValue}px)`;
    requestAnimationFrame(animateScroll);
}
animateScroll();

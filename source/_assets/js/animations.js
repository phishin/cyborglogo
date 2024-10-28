// Simple animations to add to components to reveal on scroll. Add "js-scroll" as a class name
// then followed with your choice of the animation. Ex: "js-scroll js-scroll-fade-right"
// If element is in the initial view check _animations.scss for regular animations

const scrollElements = document.querySelectorAll(".js-scroll");

const elementInView = (el, dividend = 1) => {
    const elementTop = el.getBoundingClientRect().top;

    return (
        elementTop <=
        (window.innerHeight || document.documentElement.clientHeight) / dividend
    );
};

const elementOutofView = (el) => {
    const elementTop = el.getBoundingClientRect().top;

    return (
        elementTop > (window.innerHeight || document.documentElement.clientHeight)
    );
};

const displayScrollElement = (element) => {
    element.classList.add("scrolled");
};

const hideScrollElement = (element) => {
    element.classList.remove("scrolled");
};

const handleScrollAnimation = () => {
    const scrollElements = document.querySelectorAll(".js-scroll:not(.scrolled)");
    scrollElements.forEach((el) => {
        if (elementInView(el, 1.25)) {
            displayScrollElement(el);
        } else if (elementOutofView(el)) {
            hideScrollElement(el)
        }
    })
}

  window.addEventListener("scroll", () => {
    handleScrollAnimation();
  });

  window.addEventListener("load", () => {
    handleScrollAnimation();
  });
scrollElements.forEach((el) => {
    if (elementInView(el, 1.25)) {
        displayScrollElement(el);
    } else if (elementOutofView(el)) {
        hideScrollElement(el)
    }
})

window.addEventListener("scroll", () => {
    handleScrollAnimation();
});
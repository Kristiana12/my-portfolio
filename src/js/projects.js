(function () {
  function animating() {
    getEl('.projects__gallery--card', 'showCard');
  }

  function getEl(domEl, className) {
    const domElements = document.querySelectorAll(domEl);
    domElements.forEach((item) => {
      let distanceInViewport =
        item.getBoundingClientRect().top - window.innerHeight + 20;

      if (distanceInViewport < 0) {
        item.classList.add(className);
      } else {
        item.classList.remove(className);
      }
    });
  }

  animating();

  window.addEventListener('scroll', animating);
})();

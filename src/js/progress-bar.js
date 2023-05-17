(function () {
  function animateProgressBars() {
    const circleFills = document.querySelectorAll('.circle .fill');
    const circleMasks = document.querySelectorAll('.mask.full');
    const triggerPointEl = document.querySelector('.circle-container');

    let distanceInViewport =
      triggerPointEl.getBoundingClientRect().top - window.innerHeight - 10;

    if (distanceInViewport < 0) {
      circleFills.forEach((item) => item.classList.add('animate'));
      circleMasks.forEach((item) => item.classList.add('animate'));
    }
  }

  animateProgressBars();

  window.addEventListener('scroll', animateProgressBars);
})();

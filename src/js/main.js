(function () {
  // entferne die Klasse "no-js" aus dem Element <html>
  // und füge die Klasse "js" ein  => Prüfung ob JS geladen wurde
  document.documentElement.className =
    document.documentElement.className.replace('no-js', 'js');

  //Tilt EFFECT
  VanillaTilt.init(document.querySelectorAll('.text-wrapper'), {
    max: 5,
  });

  // NAVIGATION
  const hamburgerIcon = document.querySelector('.hamburger-menu');
  const navigationList = document.querySelector('.main__nav--list');

  hamburgerIcon.addEventListener('click', () => {
    navigationList.classList.toggle('show');
    hamburgerIcon.classList.toggle('active');
  });

  // CURSOR
  const cursor = document.querySelector('.cursors');
  const circle = cursor.querySelector('div');
  const elementsWitoutCursor = document.querySelectorAll('.hide-cursor');

  //Animate cursor
  let aimX = 0;
  let aimY = 0;

  let currentX = 0;
  let currentY = 0;
  let speed = 0.2;
  const animate = () => {
    currentX += (aimX - currentX) * speed;
    currentY += (aimY - currentY) * speed;
    circle.style.left = currentX + 'px';
    circle.style.top = currentY + 'px';
    requestAnimationFrame(animate);
  };

  animate();

  document.addEventListener('mousemove', (event) => {
    aimX = event.pageX;
    aimY = event.pageY;
  });

  elementsWitoutCursor.forEach((element) => {
    element.addEventListener('mouseover', () => {
      circle.classList.add('invisible');
    });
    element.addEventListener('mouseout', () => {
      circle.classList.remove('invisible');
    });
  });

  //Blend In the To top Buttton
  const mainNavigation = document.getElementById('main__nav');
  const pageMain = document.querySelector('body');

  function showToTopBtn() {
    const triggerPoint = mainNavigation.getBoundingClientRect().bottom + 100;

    if (triggerPoint < 0) {
      pageMain.classList.add('show');
    } else {
      pageMain.classList.remove('show');
    }
  }

  window.addEventListener('scroll', showToTopBtn);
})();

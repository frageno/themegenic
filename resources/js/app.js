import Header from "./header";
import ScrollAnimation from "./scrollAnmation";

// Navigation toggle
window.addEventListener('load', function () {
      Header();
      ScrollAnimation();
      let main_navigation = document.querySelector('#primary-menu');
      document.querySelector('#primary-menu-toggle').addEventListener('click', function (e) {
            e.preventDefault();
            main_navigation.classList.toggle('hidden');
      });
});

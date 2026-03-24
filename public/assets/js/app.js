// JS global: menu burger
(function () {
  function toggleMenu() {
    const menu = document.getElementById("mobileMenu");
    if (!menu) return;
    menu.classList.toggle("open");
  }

  window.toggleMenu = toggleMenu;

  document.addEventListener("DOMContentLoaded", function () {
    const menu = document.getElementById("mobileMenu");
    if (!menu) return;
    menu.addEventListener("click", function (event) {
      if (event.target && event.target.tagName === "A") {
        toggleMenu();
      }
    });
  });
})();

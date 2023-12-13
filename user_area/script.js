const header_hamburger = document.querySelector(".header_hamburger");
const header_navMenu = document.querySelector(".header_nav-menu");

header_hamburger.addEventListener("click", () => {
    header_hamburger.classList.toggle("active");
    header_navMenu.classList.toggle("active");
}); // Add a semicolon here

const hamburger = document.querySelector(".hamburger");
const navUl = document.querySelector("nav.bar ul");

hamburger.addEventListener("click", () => {
navUl.classList.toggle("show");

});
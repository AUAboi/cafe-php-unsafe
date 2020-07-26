function showNav() {
  const nav = document.querySelector(".nav-links");
  const orderBtn = document.querySelector(".order-button");
  nav.classList.toggle("active");
  orderBtn.classList.toggle("active");
}

//Admin  Page
function showLogout() {
  const trigger = document.querySelector(".trigger");
  const lgButton = document.querySelector(".log-out");
  lgButton.classList.toggle("hidden");
}

function slideIn() {
  const nav = document.querySelector(".nav-bar");
  nav.classList.toggle("-translate-x-full");
  nav.classList.toggle("sm:translate-x-0");
  nav.classList.toggle("sm:-translate-x-full");
}

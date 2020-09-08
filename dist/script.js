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

function showModal(id) {
  const modal = document.querySelector(".modalBox");
  const link = document.querySelector(".del-link");
  link.innerHTML = `
    <a href="?id=${id}?>&type=delete" class="del-link text-green-500">Confirm</a>
  `;
  modal.classList.toggle("hidden");
}
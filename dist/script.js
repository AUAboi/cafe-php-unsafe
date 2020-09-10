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


function overlay() {
  const overlay = document.querySelector(".wrapper-full");
  overlay.classList.toggle("overlay");

}


function loadDishes(catId) {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'http://localhost/cafe/dist/admin/ajax/dishnames.php?category-id=' + catId, true);

  xhr.onload = function () {
    if (this.status == 200) {
      var dishes = JSON.parse(this.responseText);
      var output = '';
      var last = Object.keys(dishes)[Object.keys(dishes).length - 1];
      for (var i in dishes) {
        if (last == 0) {
          output += dishes[i].dish
        } else if (i < last) {
          output += dishes[i].dish + ', ';
        } else {
          output += ' and ' + dishes[i].dish;
        }
      }
      if (output == '') {
        output = 'No dishes found';
      }
      var dishNames = document.querySelector('.dishes');
      dishNames.innerHTML = `<p>It will delete following dishes: ${output}</p>`

    }
  }
  xhr.send();
}



function clearModal() {
  overlay();
  const modal = document.querySelector(".modalBox");
  modal.classList.toggle("hidden");
  const msg = document.querySelector(".msg");
  msg.innerHTML = "";
}

function showModal(id, name, category) {
  overlay();
  const modal = document.querySelector(".modalBox");
  const link = document.querySelector(".del-link");
  const msg = document.querySelector(".msg");
  modal.classList.toggle("hidden");
  msg.innerHTML = `
    <p class="msg">
      Do you really want to delete ${name} 
    </p>
  `
  link.innerHTML = `
    <a href="?id=${id}?>&type=delete">Confirm</a>
  `;
  if (category) {
    loadDishes(id);
  }
}
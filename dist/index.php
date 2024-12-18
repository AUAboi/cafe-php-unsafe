<?php 
  include "layout/header.php"
?>
    <main class="relative bg-orange">
      <div class="absolute ml-3 top-0 mt-16 sm:mt-40 md:mt-32 lg:mt-64">
        <h1 class="text-white text-2xl sm:text-5xl md:text-6xl font-bold">
          A Bowl Full of Happiness
        </h1>
        <div class="mt-6 sm:ml-3">
          <button
            class="bg-yellow-400 hover:bg-yellow-600 text-black text-sm sm:text-lg sm:py-2 sm:px-4 font-bold mr-3 py-1 px-2 rounded-full"
          >
            Browse Categories
          </button>
          <button
            class="border border-yellow-600 hover:bg-yellow-600 text-white text-sm sm:text-lg sm:py-2 sm:px-4 font-bold py-1 px-2 rounded-full"
          >
            Menu
          </button>
          <!-- <p class="text-white underline text-sm sm:text-lg opacity-50 mt-5">
            <a href="#">....Proceed as Guest</a>
          </p> -->
        </div>
      </div>
      <img src="assets/bg-showcase.jpg" />
      <div class="font-bold sm:text-3xl text-2xl md:text-5xl fancy-font">
          <h1 class="text-center">HOT DEALS RIGHT NOW!!!</h1>
      </div>
      <section class="deals-section text-center p-2">
        <article class="deal-card m-3 bg-white shadow-lg hover:shadow-2xl rounded-t-lg ">
          <img class="inline deal-img rounded-t-lg" src="media/dish/download.jpg">
          <div class="disc">
            <h2 class="text-sm">Deal Name</h2>
            <p class="p-2">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
            </p>
        </article>
        <article class="deal-card m-3 bg-white shadow-lg hover:shadow-2xl rounded-t-lg ">
          <img class="inline deal-img rounded-t-lg" src="media/dish/myimg.jpg">
          <div class="disc">
            <h2 class="text-sm">Deal Name</h2>
            <p class="p-2">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
            </p>
          </div>
        </article>
        <article class="deal-card m-3 bg-white shadow-lg hover:shadow-2xl rounded-t-lg">
          <img class="inline deal-img w-full rounded-t-lg" src="media/dish/download.jpg">
          <div class="disc">
            <h2 class="text-sm">Deal Name</h2>
            <p class="p-2">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
            </p>
          </div>
        </article>
        <article class="deal-card m-3 bg-white shadow-lg hover:shadow-2xl rounded-t-lg ">
          <img class="inline deal-img rounded-t-lg" src="media/dish/download.jpg">
          <div class="disc">
            <h2 class="text-sm">Deal Name</h2>
            <p class="p-2">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
            </p>
        </article>
        <article class="deal-card m-3 bg-white shadow-lg hover:shadow-2xl rounded-t-lg ">
          <img class="inline deal-img rounded-t-lg" src="media/dish/myimg.jpg">
          <div class="disc">
            <h2 class="text-sm">Deal Name</h2>
            <p class="p-2">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
            </p>
          </div>
        </article>
        <article class="deal-card m-3 bg-white shadow-lg hover:shadow-2xl rounded-t-lg">
          <img class="inline deal-img w-full rounded-t-lg" src="media/dish/download.jpg">
          <div class="disc">
            <h2 class="text-sm">Deal Name</h2>
            <p class="p-2">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
            </p>
          </div>
        </article>
      </section>  
    </main>
<?php
  include "layout/footer.php";
?>
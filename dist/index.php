<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/css2?family=MuseoModerno&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts.css">
    <link rel="stylesheet" href="custom.css" />
    <link rel="stylesheet" href="global_css/global.css">
    <script
      src="https://kit.fontawesome.com/294f177ac8.js"
      crossorigin="anonymous"
    ></script>
    <title>Cafe Payala</title>
  </head>
  <body>
    <header class="text-gray-700 body-font bg-orange">
      <div
        class="container mx-auto flex flex-wrap sm:p-5 flex-col md:flex-row items-center"
      >
        <nav class="flex lg:w-2/5 flex-wrap mb-2 sm:mb-0 items-center text-base md:ml-auto nav-links ">
          <a class="mx-5 cursor-pointer md:text-lg hover:text-gray-900">Home</a>
          <a class="mx-5 cursor-pointer md:text-lg hover:text-gray-900">About</a>
          <a class="mx-5 cursor-pointer md:text-lg hover:text-gray-900">Contact</a>
          
        </nav>
        <div onclick="showNav()" class="burger sm:hidden cursor-pointer">
          <div class="line1 line bg-white"></div>
          <div class="line2 line bg-white"></div>
          <div class="line3 line bg-white"></div>
        </div>
        <a
          class="flex order-first lg:order-none lg:w-1/5 title-font font-medium items-center text-gray-900 lg:items-center lg:justify-center mb-2 md:mb-0"
        >
          <span class="ml-3 text-2xl md:text-4xl title mt-2">Cafe Payala</span>
        </a>
        <div class="lg:w-2/5 inline-flex lg:justify-end ml-5 lg:ml-0 mb-2 sm:mb-0">
          <button
            class="inline-flex font-sans items-center bg-yellow-200 border-0 py-1 px-2 focus:outline-none hover:bg-yellow-300 rounded text-base md:mt-0"
          >
            Order Now
            <svg
              fill="none"
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              class="w-4 h-4 ml-1"
              viewBox="0 0 24 24"
            >
              <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
          </button>
        </div>
      </div>
    </header>
    <main class="relative">
      <div class="absolute ml-3 top-0 mt-16 sm:mt-40 md:mt-32 lg:mt-64">
        <h1 class="text-white text-2xl sm:text-5xl md:text-6xl font-bold">
          A Bowl Full of Happiness
        </h1>
        <div class="mt-6 sm:ml-3">
          <button
            class="bg-yellow-400 hover:bg-yellow-600 text-black text-sm sm:text-lg sm:py-2 sm:px-4 font-bold mr-3 py-1 px-2 rounded-full"
          >
            Sign Up
          </button>
          <button
            class="border border-yellow-600 hover:bg-yellow-600 text-white text-sm sm:text-lg sm:py-2 sm:px-4 font-bold py-1 px-2 rounded-full"
          >
            Sign In
          </button>
          <p class="text-white underline text-sm sm:text-lg opacity-50 mt-5">
            <a href="#">....Proceed as Guest</a>
          </p>
        </div>
      </div>
      <img src="assets/bg-showcase.jpg" />
    </main>
    <footer class="w-full h-full bg-black text-white font-semibold">
      <div class="flex flex-col md:flex-row">
        <div class="mx-auto mt-6">
          <p class="md:text-lg text-center bg-gray-800 mb-5">About Us</p>
          <a class="underline" href="#">Learn More About Us</a>
        </div>
        <div class="mx-auto mt-6 align-middle text-center">
          <p class="md:text-lg bg-gray-800">Our Social Media</p>
          <ul class="flex text-center mt-5">
            <li class="mx-auto text-center">
              <a class="md:text-4xl" href="#">
                <i class="fab fa-facebook text-center"></i>
              </a>
            </li>
            <li class="mx-auto text-center">
              <a class="md:text-4xl" href="#">
                <i class="fab fa-instagram text-center"></i>
              </a>
            </li>
            <li class="mx-auto text-center">
              <a class="md:text-4xl" href="#">
                <i class="fab fa-twitter text-center"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="mx-auto mt-6 text-center">
          <p class="md:text-lg bg-gray-800">Contact Us</p>
          <ul>
            <li class="flex flex-col">
              <a class="md:text-4xl" href="#">
                <i class="fas fa-envelope"></i>
              </a>
              <a class="md:text-lg" href="#">
                sample@sample.com
              </a>
            </li>
            <li class="text-center flex flex-col">
              <a class="md:text-4xl" href="#">
                <i class="fas fa-phone 3x"></i>
              </a>
              <a class="md:text-lg" href="#">
                123456789
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="text-center md:text-xl p-3">
        <p>&copy 2020 Cafe Payala, Pakistan</p>
      </div>
    </footer>
    <script src="script.js"></script>
  </body>
</html>

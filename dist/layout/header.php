<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/css2?family=MuseoModerno&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="global_css/global.css">
    <link rel="stylesheet" href="custom.css" />
    <script
      src="https://kit.fontawesome.com/294f177ac8.js"
      crossorigin="anonymous"
    ></script>
    <title>Cafe Payala</title>
  </head>
<body class="front-page-body">
    <header class="text-gray-700 body-font bg-orange fancy-font">
      <div
        class="container mx-auto flex flex-wrap sm:p-5 flex-col md:flex-row items-center"
      >
        <nav class="flex text-black lg:w-2/5 flex-wrap mb-2 sm:mb-0 items-center text-base md:ml-auto nav-links ">
          <a class="sm:ml-5 md:mr-5 lg:mx-3 px-1 cursor-pointer md:text-lg nav-elements">Home</a>
          <a class="sm:ml-5 md:mr-5 lg:mx-3 px-1 cursor-pointer md:text-lg nav-elements">Menu</a>
          <a class="sm:ml-5 md:mr-5 lg:mx-3 px-1 cursor-pointer md:text-lg nav-elements">Categories</a>
          <a class="sm:ml-5 md:mr-5 lg:mx-3 px-1 cursor-pointer md:text-lg nav-elements">Contact</a>
          
        </nav>
        <div onclick="showNav()" class="burger sm:hidden cursor-pointer">
          <div class="line1 line bg-white"></div>
          <div class="line2 line bg-white"></div>
          <div class="line3 line bg-white"></div>
        </div>
        <a
          class="flex order-first lg:order-none lg:w-1/5 title-font font-medium items-center text-gray-900 lg:items-center lg:justify-center mb-2 md:mb-0"
        >
          <span class="ml-3 text-2xl md:text-3xl title mt-2">Cafe Payala</span>
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
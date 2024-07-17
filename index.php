<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="styleguide.css" />
    <link rel="stylesheet" href="css files/style.css" />
    <link rel="stylesheet" href="css files/fonts.css" />
    <link rel="stylesheet" href="css files/commonStyle.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Rozha+One&display=swap" rel="stylesheet">

</head>
  <body>
    <?php
      include("navigation.php")
    ?>

    <div class ="welcomeScreen">
        <img src="images/HomePageImage.jpg">
        <div class="textBox">
            <div class="title poppins-medium "> Welcome to DivineDew</div>
            <div class="description"> <p class="poppins-light"> Immense yourself in a world of exquisite scents with our captivating
                fragrances. Elevate your senses with the timeless elegance of DivineDew.</p></div>
            <a class="button roboto-regular" href="listingPage.php">Discover our collections</a>
        </div>
    </div>

    <div class="learnMoreScreen">
        <div class ="details">
            <div class ="poppins-medium" id="learnMoreTitle">Luxury fragrance</div>
            <div class ="description poppins-regular"> Elevate your everyday with our captivating scents.</div>
            <div class="featureList">
                <div class ="featureContainer">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 width="32" style="padding:10px" >
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                  </svg>
                  <p>
                    <span class ="featureHeading poppins-medium">Long-lasting:</span>
                    <span class ="featureDetails poppins-regular">Formulated to provide enduring scent
                    experience, ensuring freshness throughout the day.</span>
                </p>
                </div>
                <div class ="featureContainer">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 width="32" style="padding:10px" >
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                  </svg>
                  <p>
                    <span class ="featureHeading poppins-medium">Long-lasting:</span>
                    <span class ="featureDetails poppins-regular">100% natural, human friendly ingredients used in the fragrance to prevent allergies.</span>
                </p>
                </div>
                
                <div class ="featureContainer">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 width="32" style="padding:10px" >
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                  </svg>
                  <p>
                    <span class ="featureHeading poppins-medium">Signature blends:</span>
                    <span class ="featureDetails poppins-regular">Unique combinations of natural and synthetic essences, curated for a olfactory journey.</span>
                </p>
                </div>
                <div class ="featureContainer">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 width="32" style="padding:10px" >
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                  </svg>
                  <p>
                    <span class ="featureHeading poppins-medium">Versatile appeal:</span>
                    <span class ="featureDetails poppins-regular">Suitable for various occasions and daily use, from casual outings to formal events.</span>
                </p>
                </div>
            </div>
            <a class="button roboto-regular" href="listingPage.php">Learn more</a>
            
        </div>
        <img class ="detailsImage" src="images/FeatureImage.jpg">
    </div>

</body>
  <?php
    include("footer.php");
  ?>
</html>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css files/aboutUsStyle.css" />
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
  <section>
    <img src="images/background.PNG" id="bg">
    <img src="images/layer1.PNG" id="layer1">
    <img src="images/layer2.PNG" id="layer2">
    <img src="images/layer3.PNG" id="layer3">
    <h1 id="text" class="rozha-one-regular">About Us</h1>
    
  </section>

  <div class="aboutUsScreen">
    <div class = "wrapper">
      <div id ="aboutUsTitle" class="poppins-medium">At Divinedew, we believe in the transformative power of fragrance. </div>
      <img src="images/aboutUsPic.jpg" id="aboutUsImage">
      <div id="aboutUsText" class ="poppins-regular">
        Inspired by nature's essence and guided by a commitment to quality, we curate a collection 
        of luxurious scents that elevate every moment. 
        </div>
      <div id="aboutUsText" class ="poppins-regular">Each fragrance is meticulously crafted to evoke 
        emotions, memories, and aspirations, inviting you to experience life in its fullest spectrum 
        of aromas. Our mission is to infuse your world with the magic of scent, allowing you to indulge 
        in the beauty of self-expression and create unforgettable moments that linger long after the 
        fragrance fades.</div>

      <div id="aboutUsText" class ="poppins-regular"> Celebrating the artistry of perfumery, Divinedew 
        embarks on a journey of olfactory exploration, where each fragrance tells a unique story. 
        With a dedication to excellence, we source the finest ingredients from around the globe, 
        ensuring that every bottle encapsulates unparalleled sophistication and charm.</div>

      <div id="aboutUsText" class ="poppins-regular"> Our passion for fragrance extends beyond mere scent; it's about fostering connections and 
        awakening the senses. Whether you seek the invigorating zest of citrus, the delicate allure 
        of floral notes, or the warmth of woody accords, our diverse range of fragrances caters to 
        every personality and occasion.</div>

      <div id="aboutUsText" class ="poppins-regular"> At Divinedew, we pride ourselves on not just selling fragrances, but on curating 
        experiences. Our commitment to sustainability drives us to embrace eco-friendly practices,
        from responsible sourcing to eco-conscious packaging. With each purchase, you not only 
        enrich your olfactory journey but also contribute to a greener, more harmonious planet.</div>

      <div id="aboutUsText2" class ="poppins-regular"> Join us in our aromatic odyssey as we invite you to explore, indulge, and rediscover 
        the essence of yourself through the exquisite fragrances of Divinedew. Welcome to a 
        world where every scent is a divine revelation, waiting to be experienced.</div>
      
    </div>

  </div>

       
  

  <script>
    let bg = document.getElementById("bg");
    let layer1 = document.getElementById("layer1");
    let layer2 = document.getElementById("layer2");
    let layer3 = document.getElementById("layer3");
    let text = document.getElementById("text");

    window.addEventListener('scroll', function(){
      var value = window.scrollY;
      bg.style.top = value * 0.20 + 'px';
      layer1.style.top = -value * 0.10 + 100 + 'px';
      // layer2.style.top = -value * 0.30 + 'px';
      text.style.top = value * 1 -240 + 'px';
      layer3.style.transform = "translateX(" + value * 0.40 + "px)";
    })
  </script>

</body>
<?php
  include("footer.php");
?>
</html>

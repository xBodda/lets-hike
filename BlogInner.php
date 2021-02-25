<?php
  include('includes/head.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <!-- Product Sans Font -->
  <link rel="stylesheet" href="layout/css/productsans.css">
  <!-- Main CSS File -->
  <link rel="stylesheet" href="layout/css/master.css">
  <!-- Favicon  -->
  <link href="layout/svg/logo-mark.svg" rel="shortcut icon" type="image/png">
  <!-- Link To Icons File -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <title>Hikingify | Blog</title>
</head>

<body id="review">
  <!-- Header START -->
  <?php include('includes/header.php'); ?>
  <!-- Header END -->

  <!-- Top Banner START -->
  <div class="top-banner small">
      <div class="overlay"></div>
      <div class="content">
        <h1>Blog</h1>
      </div>
    </div>
  <!-- Top Banner END -->

  <!-- Cart Body START -->
  <div class="blogger-inner-body">
    <div class="flex-container">

          <!-- Card 1 END-->





      </div>

    <!-- Cart Details START -->
    <div class="left">
      <div class="blogger-inner-container ">
        <div class="blog-inner-image "> <img class="image-inner-blog-inner"  src="hike2.jpg"> </div>
        <h3>15 Top-Rated Tourist Attractions in Tanzania</h3>
        <div id="blog-text-container">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, dolore expedita rerum iure assumenda architecto quos asperiores. Totam, rem quas consequuntur autem, velit, eum voluptate cum modi voluptates a eaque.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, dolore expedita rerum iure assumenda architecto quos asperiores. Totam, rem quas consequuntur autem, velit, eum voluptate cum modi voluptates a eaque.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, dolore expedita rerum iure assumenda architecto quos asperiores. Totam, rem quas consequuntur autem, velit, eum voluptate cum modi voluptates a eaque.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, dolore expedita rerum iure assumenda architecto quos asperiores. Totam, rem quas consequuntur autem, velit, eum voluptate cum modi voluptates a eaque.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, dolore expedita rerum iure assumenda architecto quos asperiores. Totam, rem quas consequuntur autem, velit, eum voluptate cum modi voluptates a eaque.</p>
        </div>

        <!--You May also like -->
        <div id="blog-teka-id">
        <h3>You May Also Like</h3>
        </div> 
        
    <div id="blogPageContainer" style="justify-content:center; padding:0px 0px">
        <div id="blog-flex1">
        <div  class="Blog-Container">
        <div class="blog-image"><img class="blog-image-inner" src="hikemountain.jpg"> <h2 style="">Blog Title</h2></div>
        <div class="Blog-Containerp">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
          </div>        
          <div>
            <button type="button" class="blogbutton" >READ MORE</button>
        </div>
        <div class="blog-details">
          <ul class="fa-ul" style="margin-top: 8px; margin-left: 0px;">
          <li><span class="fa-li" style="position: static;" ><i class="fas fa-user-tag"></i></span>Ahmed Ashraf</li>
            <li>Last Updated:</li>
             <li><span class="fa-li"style="position: static;"><i class="fas fa-calendar-alt"></i></span>02-24-2021</li>
          </ul>
          </div>

    </div>

    <div  class="Blog-Container">
    <div class="blog-image"> <img class="blog-image-inner" src="hikemountain.jpg"><h2 style="">Blog Title</h2> </div>
    <div class="Blog-Containerp">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
          </div>            <div>
            <button type="button" class="blogbutton" >READ MORE</button>
        </div>
        <div class="blog-details">
          <ul class="fa-ul" style="margin-top: 8px; margin-left: 0px;">
          <li><span class="fa-li" style="position: static;" ><i class="fas fa-user-tag"></i></span>Ahmed Ashraf</li>
            <li>Last Updated:</li>
             <li><span class="fa-li"style="position: static;"><i class="fas fa-calendar-alt"></i></span>02-24-2021</li>
          </ul>
          </div>
    </div>

    <div  class="Blog-Container">
    <div class="blog-image"> <img class="blog-image-inner" src="hikemountain.jpg"> <h2 style="">Blog Title</h2></div>
    <div class="Blog-Containerp">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
          </div>            <div >
            <button type="button" class="blogbutton" >READ MORE</button>
        </div>
        <div class="blog-details">
          <ul class="fa-ul" style="margin-top: 8px; margin-left: 0px;">
          <li><span class="fa-li" style="position: static;" ><i class="fas fa-user-tag"></i></span>Ahmed Ashraf</li>
            <li>Last Updated:</li>
             <li><span class="fa-li"style="position: static;"><i class="fas fa-calendar-alt"></i></span>02-24-2021</li>
          </ul>
          </div>
    </div>
  </div>
</div>
</div>
</div>
</div>

<!-- Cart Details END -->


<!-- Cart Body END -->


    <!-- Footer START -->
    <?php include('includes/footer.php'); ?>
    <!-- Footer END -->


</body>

</html>

<!-- #blogInnerPageContainer{
  display: flex;
  flex-wrap: wrap;
  margin:25px;
  padding:20px;
  flex-direction:column;
}

#blogInnerPageContainer #blog-flex1{
  width:100%;
  display: flex;
  flex-direction:row;
}

.Blog-Inner-Container{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
  width: 100%;
  margin:10px;
  padding:0 20px;
  height:400px;
  box-shadow: 0 5px 5px 0 #0000002c !important;

}

h3{
  text-align: center;
  font-size: 40px;
  margin-bottom: 20px;
}


.blog-inner-image img{
  width:100%;
  height:25%;
  object-fit: cover;
  object-position: 50% 50%;
  padding:50px;
  justify-content: center;
  margin:0;
}

#blog-text-container{
  width: auto;
  text-align: center;
  object-position: 50% 50%;
}
#blog-teka-id{
  margin:20px;
} -->
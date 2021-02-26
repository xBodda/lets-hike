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
  <title>Hikingify | Review Hike</title>
</head>

<body id="review">
  <!-- Header START -->
  <?php include('includes/header.php'); ?>
  <!-- Header END -->

  <!-- Top Banner START -->

  <!-- Top Banner END -->

  <!-- Cart Body START -->
  <div class="survey-body">
    <div class="flex-container">

          <!-- Card 1 END-->





      </div>

    <!-- Cart Details START -->
    <div class="left">
      <div class=" survey-container ">
        <h1 style="text-align: center;margin-bottom: 50px">Survey</h1>

        <br>

        <div class="survey-question-buttons-container">
        <button type="button" class="survey-button" >Question 1</button>
        <button type="button" class="survey-button" >Question 2</button>
        <button type="button" class="survey-button" >Question 3</button>
        <button type="button" class="survey-button" >Question 4</button>
        </div>
        <div class="survey-question-container">
            <p class="question-numbering-grey-shaded" style="font-size:15px;">
              Question 1 &nbsp &nbsp &nbsp
            </p>
            
            <p class="question-itself-survey" style="font-size:30px;">
                What is your best place to hike?
            </p>
            <div class="answers-of-the-survey-questions">
            <div class="answers">
            <input type="radio" class="Answer-radio" name="Answer" value="Answer">
            <label for="Answer"  style="font-size:20px;">Answer 1</label>
            </div>
            <div class="answers">
            <input type="radio" class="Answer-radio" name="Answer" value="Answer">
            <label for="Answer"  style="font-size:20px;">Answer 2</label>
            </div>
            <div class="answers">
            <input type="radio" class="Answer-radio" name="Answer" value="Answer">
            <label for="Answer"  style="font-size:20px;">Answer 3</label>
            </div>
            <div class="answers">
            <input type="radio" class="Answer-radio" name="Answer" value="Answer" >
            <label for="Answer"  style="font-size:20px;">Answer 4</label>
            </div>

            </div>
        </div>
        
</div>
</div>
<!-- Cart Body END -->


    <!-- Footer START -->
    <?php include('includes/footer.php'); ?>
    <!-- Footer END -->


</body>

</html>

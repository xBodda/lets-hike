<?php include('includes/head.php'); ?>

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
    <!-- Link To JQuery  -->
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script>
    $(document).ready(function() {

        $('.faq_question').click(function() 
        {
            if ($(this).parent().is('.open'))
            {
                $(this).children('.iconn').addClass('fa-plus-circle');
                $(this).children('.iconn').removeClass('fa-minus-circle');
                $(this).closest('.faq').find('.faq_answer_container').animate({'height':'0'},500);
                $(this).closest('.faq').removeClass('open');
            }
            else
            {
                var newHeight =$(this).closest('.faq').find('.faq_answer').height() +'px';
                $(this).closest('.faq').find('.faq_answer_container').animate({'height':newHeight},500);
                $(this).closest('.faq').addClass('open');
                $(this).children('.iconn').addClass('fa-minus-circle');
                $(this).children('.iconn').removeClass('fa-plus-circle');
            }
        });

    });
    </script>
  </head>
  <body id="faq">
    <!-- Header START -->
    <?php include('includes/header.php'); ?>
    <!-- Header END -->

    <!-- Top Banner START -->
    <div class="top-banner"> 
      <div class="overlay"></div>
      <div class="content">
        <h1>FAQ</h1> 
      </div>
    </div>
    <!-- Top Banner END -->

    <div class="def-container">
    <div class="faq-container">
                <?php
                $all_faqs = DB::query('SELECT * FROM faq');
                foreach($all_faqs as $af)
                {
                ?>
                <div class="faq mb-30">

                    <div class="faq_question"><?php echo $af['question']; ?>&nbsp; <i id="icon" class="fas fa-plus-circle iconn"></i>
                    <div class="faq_answer_container">
                    <div class="faq_answer"><?php echo $af['answer']; ?></div>
                    </div>
                    </div>
                    
                </div>
                <?php } ?>
            </div>
    </div>


    <!-- Footer START -->
    <?php include('includes/footer.php'); ?>
    <!-- Footer END -->
  </body>
</html>

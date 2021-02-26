<?php
include('includes/head.php');
if (!isset($_GET['id'])) {
  include('404.php');
  exit;
}
$survey_taken = false;

$survey_id = $_GET['id'];


$survey_info = DB::query('SELECT s.name,s.description FROM survey s WHERE s.id=:id ', array(':id' => $survey_id));


if (!$survey_info) {
  include('404.php');
  exit;
}

if (DB::query('SELECT 1 FROM survey_answers WHERE survey_id=:survey_id AND user_id=:id', array(':id' => Login::isLoggedIn(), ':survey_id' => $survey_id))) {
  $survey_taken = true;
}

DB::query(
  'INSERT INTO survey_dismiss VALUES(\'\', :survey_id, :user_id)',
  array(
    ':survey_id' => $survey_id,
    ':user_id' => Login::isLoggedIn(),
  )
);
if(!$survey_taken){
  $survey_questions = DB::query('SELECT q.* FROM survey_questions q  WHERE q.survey_id=:id ', array(':id' => $survey_id));
  if(!empty($_POST)){
    foreach($_POST as $key => $answer){
      $question_id = str_replace('answer-', '', $key);
      DB::query('INSERT INTO survey_answers VALUES(\'\', :survey_id, :question_id, :option_id, :user_id, :date)',
      array(
        ':survey_id'=>$survey_id,
        ':question_id' => $question_id,
        ':option_id' => $answer,
        ':user_id'=>Login::isLoggedIn(),
        ':date'=>date('Y-m-d H:i:s')
      ));
      $survey_taken = true;
    }
  }
}
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
  <title>Hikingify | Survey</title>
</head>
<body id="review">
  <!-- Header START -->
  <?php include('includes/header.php'); ?>
  <!-- Header END -->
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
        <form method="POST">
        <div class="survey-question-container">
          <?php
          $i = 1;
          if($survey_taken)
            echo "<h1>Thank you for your time</h1>";
          else{
          foreach ($survey_questions as $question) {
          ?>
            <p class="question-numbering-grey-shaded" style="font-size:15px;">
              Question <?php echo $i++; ?>
            </p>
            <p class="question-itself-survey" style="font-size:30px;">
              <?php echo $question['name']; ?>
            </p>
            <div class="answers-of-the-survey-questions">
              <?php
              $options = DB::query('SELECT * FROM survey_options WHERE question_id=:question_id', array(':question_id' => $question['id']));
              foreach ($options as $option) {
              ?>
                <div class="answers">
                  <input type="radio" class="Answer-radio" required name="answer-<?php echo $question['id']; ?>" value="<?php echo $option['id']; ?>">
                  <label for="Answer" style="font-size:20px;"><?php echo $option['name']; ?></label>
                </div>
              <?php
              }
              ?>
            </div>
          <?php
          }
          ?>
          <button class="xbutton ">Submit</button>
          <?php } ?>
        </div>
        </form>
      </div>
    </div>
    <!-- Cart Body END -->


    <!-- Footer START -->
    <?php include('includes/footer.php'); ?>
    <!-- Footer END -->


</body>

</html>
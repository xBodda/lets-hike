<style>
  .survey-request {
    width: 100%;
    height: 200px;
    background-color: forestgreen;
    position: fixed;
    bottom: 0;
    left: 0;
    z-index: 9999;
    color: #fff;
    padding: 20px 7%;
    transition: transform .5s;
    transform: translateY(100%);
  }

  .survey-request.show {
    transform: translateY(0%);

  }

  .survey-request .close-button {
    position: absolute;
    top: 20px;
    right: 7%;
    width: 20px;
    height: 20px;
    background-image: url('layout/svg/close.svg');
    background-size: cover;
    background-repeat: no-repeat;
    cursor: pointer;
  }
</style>

<?php
$check_survey = false;
if(Login::isLoggedIn()){
  $get_last_survey = DB::query('SELECT id FROM survey ORDER BY id DESC LIMIT 1');
  if($get_last_survey){
    $get_last_survey = $get_last_survey[0]['id'];
    $check_survey_answered = DB::query('SELECT 1 FROM users u, survey_answers a WHERE a.survey_id=:id AND a.user_id=:user_id',array(':id'=>$get_last_survey,':user_id'=>Login::isLoggedIn()));
    $check_survey_dismissed = DB::query('SELECT 1 FROM users u, survey_dismiss a WHERE a.survey_id=:id AND a.user_id=:user_id', array(':id' => $get_last_survey, ':user_id' => Login::isLoggedIn()));
    if (!$check_survey_answered && !$check_survey_dismissed){
      $check_survey = $get_last_survey;
    }
  }
}

if($check_survey){
?>
<div class="survey-request" id="survey-container">
  <div class="close-button"></div>
  <h1 class="mb-20">Got a minute?</h1>
  <p class="mb-20">We'd appreciate if you take just few minutes of your time to take a short survey. Thank you! </p>
  <a href="survey.php?id=<?php echo $check_survey; ?>"><div class="xbutton white">Take survey</div></a>
</div>
<?php } ?>
<script>
  window.addEventListener('load', function() {
    var survey_container = document.getElementById('survey-container');
    if (survey_container) {
      survey_container.classList.add('show');
      survey_container.querySelector('.close-button').addEventListener('click', function() {
        survey_container.parentNode.removeChild(survey_container);
      });
    }
  });
</script>
<div id="footer">
  <div class="f">
    <div class="logo">
      <a rel="canonical" href="/">
        <img src="layout/svg/logo-grey.svg">
      </a>
      <div class="content">
        IS3 is a hiking arrangement website that aims to let different people join groups for hiking. The project allows the hiker to search for groups to join for hiking. On the other hand, the hiking administrators can add/edit/delete groups. Also, they can respond to hikers' reviews.
      </div>

    </div>
    <a href="#top" onclick="scrollToTop();return false">
      <div class="top"> <img src="layout/svg/arrow.svg" width="20px"> </div>
    </a>
    <div class="links">
      <div class="col">
        <ul>
          <li><a href='terms.php'>Terms & Conditions</a></li>
          <li><a href='privacy.php'>Privacy Policy</a></li>
          <li><a href='faq.php'>FAQ</a></li>
          <li><a href='support.php'>Support</a></li>
        </ul>
      </div>
      <div class="col">
        <ul>
          <li><a href='contact.php'>Contact Us</a></li>
          <li><a href='blog.php'>Blog</a></li>
          <li><a href="currency.php">Currency <?php echo $_SESSION['currency']; ?></a></li>
          <li><a href="my-tickets.php?t">My Tickets</a></li>
        </ul>
      </div>
    </div>
  </div>

  <div class="footer-end">
    <div class="legal">
      All Copyrights Reserved <?php echo '© ' . date('Y') ?>
    </div>
    <div class="social">
      <a href="#" rel="nofollow" target="=_blank"><i style="font-size:20px; color:#999;" class="fab fa-facebook"></i></a>
      <a href="#" rel="nofollow" target="=_blank"><i style="font-size:20px; color:#999;" class="fab fa-instagram"></i> </a>
    </div>
  </div>
</div>
<script>
  var currencyVal = Math.round('<?php echo $getCurrencyValue; ?>' * 10000) / 10000;
  var currency = '<?php echo $_SESSION['currency']; ?>';
</script>
<script type="text/javascript" src="layout/js/all.js"></script>
<script type="text/javascript" src="layout/js/smooth.js"></script>
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
          <li><a href="about-us.php">About Us</a></li>
          <li><a href="take-the-tour.php">Take The Tour</a></li>
          <li><a href="plans.php">Plans & Pricing</a></li>
        </ul>
      </div>
      <div class="col">
        <ul>
          <li><a href='terms.php'>Terms & Conditions</a></li>
          <li><a href='privacy.php'>Privacy Policy</a></li>
          <li><a href='faq.php'>FAQ</a></li>
          <li><a href='returns.php'>Returns Policy</a></li>
          <li><a href='support.php'>Support</a></li>
        </ul>
      </div>
      <div class="col">
        <ul>
          <li><a href='advertise.php'>Advertise</a></li>
          <li><a href='afilliates.php'>Afilliates</a></li>
          <li><a href='careers.php'>Careers</a></li>
          <li><a href='contact.php'>Contact Us</a></li>
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
  var currencyVal = Math.round('<?php echo $getCurrencyValue; ?>'*10000)/10000;
  var currency = '<?php echo $_SESSION['currency']; ?>';
</script>
<script type="text/javascript" src="layout/js/all.js"></script>
<div id="places-might-like">
  <!-- Places you might like START -->
  <div class="heading-line mb-30">
    Places you might like
  </div>
  <div class="hikes-preview">
    <div class="flex-container wrap j-sa">
      <?php for ($i = 0; $i < 7; $i++) {
      ?>
        <div class="item">
          <div class="image"> <img src="layout/jpg/<?php echo $i % 2 + 1; ?>.jpg"> </div>
          <div class="title">Eagles Nest</div>
          <div class="rating">
          </div>
        </div>
      <?php
      } ?>
      <div class="item extra"></div>
      <div class="item extra"></div>
      <div class="item extra"></div>
      <div class="item extra"></div>
      <div class="item extra"></div>
    </div>
  </div>
  <!-- Places you might like END -->
</div>

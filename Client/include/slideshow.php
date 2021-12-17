<div class="slider-body">
<!--image slider start-->
    <div class="slider">
      <div class="slides">
        <!--radio buttons start-->
        <input type="radio" name="radio-btn" id="radio1">
        <input type="radio" name="radio-btn" id="radio2">
        <input type="radio" name="radio-btn" id="radio3">
        <input type="radio" name="radio-btn" id="radio4">
        <input type="radio" name="radio-btn" id="radio5">
        <input type="radio" name="radio-btn" id="radio6">
        <input type="radio" name="radio-btn" id="radio7">
        <!--radio buttons end-->

        <!--slide images start-->
        <div class="slide first">
          <img src="./Process/assets/img/sls-01.png" alt="">
        </div>
        <div class="slide">
          <img src="./Process/assets/img/sls-02.png" alt="">
        </div>
        <div class="slide">
          <img src="./Process/assets/img/sls-03.png" alt="">
        </div>
        <div class="slide">
          <img src="./Process/assets/img/sls-04.png" alt="">
        </div>
        <div class="slide">
          <img src="./Process/assets/img/sls-05.png" alt="">
        </div>
        <div class="slide">
          <img src="./Process/assets/img/sls-06.png" alt="">
        </div>
        <div class="slide">
          <img src="./Process/assets/img/sls-07.png" alt="">
        </div>
        <!--slide images end-->
        <!--automatic navigation start-->
        <div class="navigation-auto">
          <div class="auto-btn1"></div>
          <div class="auto-btn2"></div>
          <div class="auto-btn3"></div>
          <div class="auto-btn4"></div>
          <div class="auto-btn5"></div>
          <div class="auto-btn6"></div>
          <div class="auto-btn7"></div>
        </div>
        <!--automatic navigation end-->
      </div>
      <!--manual navigation start-->
      <div class="navigation-manual">
        <label for="radio1" class="manual-btn"></label>
        <label for="radio2" class="manual-btn"></label>
        <label for="radio3" class="manual-btn"></label>
        <label for="radio4" class="manual-btn"></label>
        <label for="radio5" class="manual-btn"></label>
        <label for="radio6" class="manual-btn"></label>
        <label for="radio7" class="manual-btn"></label>
      </div>
      <!--manual navigation end-->
    </div>
    <!--image slider end-->

    <script type="text/javascript">
    var counter = 1;
    setInterval(function(){
      document.getElementById('radio' + counter).checked = true;
      counter++;
      if(counter > 7){
        counter = 1;
      }
    }, 5000);
    </script>
</div>
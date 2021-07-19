<?php require APPROOT . '/views/inc/header.php'; ?>
<!--HTML for homepage goes here, for CSS visit public folder-->
<?php require APPROOT . '/views/inc/navbar.php'; ?>




<div class="container-fluid" style="background-color:#F2F2F2;">

  <div class="row justify-content-center">
    <div class="landing-image col-sm-12 col-lg-6 px-0">
      <img class="img-responsive" src="<?php echo URLROOT; ?>/images/gym1.jpg" alt="">
      <div class="text-overlay-1">
        <h3 class="land-text-1">Join the fitness</h3>
      </div>
      <div class="text-overlay-2">
        <h3 class="land-text-2">revolution</h3>
      </div>
    </div>
  </div>
</div>

<div class="container" style="padding-top: 20px;">
  <div class="row justify-content-center">
    <div class="col-sm-1 col-lg-6">
      <a href="<?php echo URLROOT; ?>/Accounts/login">
        <button type="button" class="land-login-btn float-left m-2">Sign up now</button>
      </a>
    </div>
  </div>
  <div class="row justify-content-center" style="padding-top: 20px;">
    <div class="col-sm-1 col-lg-6">
      <button href="#" class="land-learnmore-btn float-right m-2">Learn more</button>
    </div>
  </div>
</div>

<div class="container-fluid mt-4" style="padding-top: 20px; background-color:#F2F2F2;">
  <div class="row justify-content-center">
    <div class="col-sm-1 col-lg-6 text-left">
      <h3 class="land-text-3"><span class="land-text-4">Activities</span> near you</h3>

      <div class="container">
        <div class="row">
          <?php
          if ($data['gym_activity'] != NULL) {
            foreach ($data['gym_activity'] as $activity) {
              echo '<div class = "col-6">';
              echo '<div class="card mt-4 " style="width: auto;">';
              echo '<img class="card-img-top" src="' . URLROOT . '/images/gym1.jpg" alt="Card image cap">';
              echo '<div class="card-body rounded-pill">';
              echo '<h6 class="card-title">' . $activity->activity_name . '</h6>';
              echo '<p class="card-subtitle mb-2 text-muted">Category: ' . $activity->category . '</p>';

              echo '<hr>';
              echo '<p><b>$' . $activity->price_per_week . '</b></p>';
              echo '<a href="#" class="card-link">More Details</a>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
            }
          } else {
            echo "No Gym activity please check back later!";
          }
          ?>
        </div>
      </div>


      <div class="row justify-content-center" style="padding-top: 20px;">
        <div class="col-sm-1 col-lg-6 text-center">
          <a href="#">
            <a href="<?php echo URLROOT; ?>/Activity/allactivity"><button type="button" class="land-seeall-btn mb-4">See all<span class="btn-arrow-1"><svg id="arrow" xmlns="http://www.w3.org/2000/svg" width="12.536" height="10.751" viewBox="0 0 12.536 10.751">
                    <g id="Group_87" data-name="Group 87" transform="translate(0 0)">
                      <path id="Path_103" data-name="Path 103" d="M.753,36.337a.9.9,0,0,1,.155-.011H9.752l-.193-.09a1.794,1.794,0,0,1-.507-.359L6.573,33.4a.928.928,0,0,1-.13-1.188.9.9,0,0,1,1.345-.117l4.485,4.485a.9.9,0,0,1,0,1.268h0L7.788,42.331a.9.9,0,0,1-1.345-.09.928.928,0,0,1,.13-1.188l2.476-2.485a1.794,1.794,0,0,1,.448-.327l.269-.121H.958a.928.928,0,0,1-.946-.753A.9.9,0,0,1,.753,36.337Z" transform="translate(0 -31.842)" />
                    </g>
                  </svg>
                </span></button>
            </a>
          </a>
        </div>
      </div>

    </div>
  </div>
</div>



<div class="container-fluid " style="padding-top: 20px;">
  <div class="row justify-content-center">
    <div class="col-sm-1 col-lg-6 text-right">
      <h3 class="land-text-5"><span class="land-text-4">Categories</span> for everyone</h3>
    </div>
  </div>
  <div class="row justify-content-center m-2">
    <div class="col-sm-1 col-lg-6 category-col">
      <a href="#" class="btn category-btn-left">
        <span class="category-img-left"><img src="<?php echo URLROOT; ?>/images/weightlift.svg"></span>
        Weightlifting
        <span class="btn-arrow-left"><svg id="Group_108" data-name="Group 108" xmlns="http://www.w3.org/2000/svg" width="23.917" height="20.511" viewBox="0 0 23.917 20.511">
            <path id="Path_103" data-name="Path 103" d="M1.437,40.418a1.709,1.709,0,0,1,.3-.022H18.606l-.368-.171a3.423,3.423,0,0,1-.967-.684L12.54,34.809a1.771,1.771,0,0,1-.248-2.267,1.711,1.711,0,0,1,2.567-.222l8.556,8.556a1.711,1.711,0,0,1,0,2.42h0l-8.556,8.556a1.711,1.711,0,0,1-2.567-.171,1.771,1.771,0,0,1,.248-2.267l4.723-4.74a3.423,3.423,0,0,1,.856-.625l.513-.231H1.827A1.771,1.771,0,0,1,.022,42.382,1.711,1.711,0,0,1,1.437,40.418Z" transform="translate(0 -31.842)" />
          </svg>

        </span>
      </a>
    </div>
  </div>
  <div class="row justify-content-center m-2">
    <div class="col-sm-1 col-lg-6 category-col">
      <a href="#" class="btn category-btn-right float-right">
        <span class="btn-arrow-right"><svg id="Group_108" data-name="Group 108" xmlns="http://www.w3.org/2000/svg" width="23.917" height="20.511" viewBox="0 0 23.917 20.511">
            <path id="Path_103" data-name="Path 103" d="M1.437,40.418a1.709,1.709,0,0,1,.3-.022H18.606l-.368-.171a3.423,3.423,0,0,1-.967-.684L12.54,34.809a1.771,1.771,0,0,1-.248-2.267,1.711,1.711,0,0,1,2.567-.222l8.556,8.556a1.711,1.711,0,0,1,0,2.42h0l-8.556,8.556a1.711,1.711,0,0,1-2.567-.171,1.771,1.771,0,0,1,.248-2.267l4.723-4.74a3.423,3.423,0,0,1,.856-.625l.513-.231H1.827A1.771,1.771,0,0,1,.022,42.382,1.711,1.711,0,0,1,1.437,40.418Z" transform="translate(0 -31.842)" />
          </svg>
          Yoga
        </span>
        <span class="category-img-right"><img src="<?php echo URLROOT; ?>/images/meditate.svg"></span>
      </a>
    </div>
  </div>
  <div class="row justify-content-center m-2">
    <div class="col-sm-1 col-lg-6 category-col">
      <a href="#" class="btn category-btn-left">
        <span class="category-img-left"><img src="<?php echo URLROOT; ?>/images/treadmill.svg"></span>
        Cardio
        <span class="btn-arrow-left"><svg id="Group_108" data-name="Group 108" xmlns="http://www.w3.org/2000/svg" width="23.917" height="20.511" viewBox="0 0 23.917 20.511">
            <path id="Path_103" data-name="Path 103" d="M1.437,40.418a1.709,1.709,0,0,1,.3-.022H18.606l-.368-.171a3.423,3.423,0,0,1-.967-.684L12.54,34.809a1.771,1.771,0,0,1-.248-2.267,1.711,1.711,0,0,1,2.567-.222l8.556,8.556a1.711,1.711,0,0,1,0,2.42h0l-8.556,8.556a1.711,1.711,0,0,1-2.567-.171,1.771,1.771,0,0,1,.248-2.267l4.723-4.74a3.423,3.423,0,0,1,.856-.625l.513-.231H1.827A1.771,1.771,0,0,1,.022,42.382,1.711,1.711,0,0,1,1.437,40.418Z" transform="translate(0 -31.842)" />
          </svg>
        </span>
      </a>
    </div>
  </div>
  <div class="row justify-content-center m-2">
    <div class="col-sm-1 col-lg-6 category-col">
      <a href="#" class="btn category-btn-right float-right">
        <span class="btn-arrow-right"><svg id="Group_108" data-name="Group 108" xmlns="http://www.w3.org/2000/svg" width="23.917" height="20.511" viewBox="0 0 23.917 20.511">
            <path id="Path_103" data-name="Path 103" d="M1.437,40.418a1.709,1.709,0,0,1,.3-.022H18.606l-.368-.171a3.423,3.423,0,0,1-.967-.684L12.54,34.809a1.771,1.771,0,0,1-.248-2.267,1.711,1.711,0,0,1,2.567-.222l8.556,8.556a1.711,1.711,0,0,1,0,2.42h0l-8.556,8.556a1.711,1.711,0,0,1-2.567-.171,1.771,1.771,0,0,1,.248-2.267l4.723-4.74a3.423,3.423,0,0,1,.856-.625l.513-.231H1.827A1.771,1.771,0,0,1,.022,42.382,1.711,1.711,0,0,1,1.437,40.418Z" transform="translate(0 -31.842)" />
          </svg>
          Cycling
          <span class="category-img-right"><img src="<?php echo URLROOT; ?>/images/cycle.svg"></span>
        </span>
      </a>
    </div>
  </div>
  <div class="row justify-content-center m-2">
    <div class="col-sm-1 col-lg-6 category-col">
      <a href="#" class="btn category-btn-left">
        <span class="category-img-left"><img src="<?php echo URLROOT; ?>/images/swim.svg"></span>
        Swimming
        <span class="btn-arrow-left"><svg id="Group_108" data-name="Group 108" xmlns="http://www.w3.org/2000/svg" width="23.917" height="20.511" viewBox="0 0 23.917 20.511">
            <path id="Path_103" data-name="Path 103" d="M1.437,40.418a1.709,1.709,0,0,1,.3-.022H18.606l-.368-.171a3.423,3.423,0,0,1-.967-.684L12.54,34.809a1.771,1.771,0,0,1-.248-2.267,1.711,1.711,0,0,1,2.567-.222l8.556,8.556a1.711,1.711,0,0,1,0,2.42h0l-8.556,8.556a1.711,1.711,0,0,1-2.567-.171,1.771,1.771,0,0,1,.248-2.267l4.723-4.74a3.423,3.423,0,0,1,.856-.625l.513-.231H1.827A1.771,1.771,0,0,1,.022,42.382,1.711,1.711,0,0,1,1.437,40.418Z" transform="translate(0 -31.842)" />
          </svg>
        </span>
      </a>
    </div>
  </div>
  <div class="row justify-content-center m-2">
    <div class="col-sm-1 col-lg-6 category-col">
      <a href="#" class="btn category-btn-right float-right">
        <span class="btn-arrow-right"><svg id="Group_108" data-name="Group 108" xmlns="http://www.w3.org/2000/svg" width="23.917" height="20.511" viewBox="0 0 23.917 20.511">
            <path id="Path_103" data-name="Path 103" d="M1.437,40.418a1.709,1.709,0,0,1,.3-.022H18.606l-.368-.171a3.423,3.423,0,0,1-.967-.684L12.54,34.809a1.771,1.771,0,0,1-.248-2.267,1.711,1.711,0,0,1,2.567-.222l8.556,8.556a1.711,1.711,0,0,1,0,2.42h0l-8.556,8.556a1.711,1.711,0,0,1-2.567-.171,1.771,1.771,0,0,1,.248-2.267l4.723-4.74a3.423,3.423,0,0,1,.856-.625l.513-.231H1.827A1.771,1.771,0,0,1,.022,42.382,1.711,1.711,0,0,1,1.437,40.418Z" transform="translate(0 -31.842)" />
          </svg>

        </span>
        Martial Arts
        <span class="category-img-right"><img src="<?php echo URLROOT; ?>/images/fight.svg"></span>
      </a>
    </div>
  </div>
  <div class="row justify-content-center m-2" style="padding-top: 20px;">
    <div class="col-sm-1 col-lg-6 text-center">
      <a href="#">
        <button type="button" class="land-seeall-btn">See all<span class="btn-arrow-1"><svg id="arrow" xmlns="http://www.w3.org/2000/svg" width="12.536" height="10.751" viewBox="0 0 12.536 10.751">
              <g id="Group_87" data-name="Group 87" transform="translate(0 0)">
                <path id="Path_103" data-name="Path 103" d="M.753,36.337a.9.9,0,0,1,.155-.011H9.752l-.193-.09a1.794,1.794,0,0,1-.507-.359L6.573,33.4a.928.928,0,0,1-.13-1.188.9.9,0,0,1,1.345-.117l4.485,4.485a.9.9,0,0,1,0,1.268h0L7.788,42.331a.9.9,0,0,1-1.345-.09.928.928,0,0,1,.13-1.188l2.476-2.485a1.794,1.794,0,0,1,.448-.327l.269-.121H.958a.928.928,0,0,1-.946-.753A.9.9,0,0,1,.753,36.337Z" transform="translate(0 -31.842)" />
              </g>
            </svg>
          </span></button>
      </a>
    </div>
  </div>
</div>

<div class="card text-center mt-4">
  <div class="card-header">
    <h2><b>Promotion</b></h2>
  </div>
  <div class="card-body">
    <h5 class="card-title">Get 10% bonus credit when you purchase 100 credits</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="<?php echo URLROOT; ?>/Accounts/login" class="btn land-login-btn">Sign up now</a>
  </div>

</div>

<div class="row justify-content-center" style="padding-top: 20px;">
  <div class="landing-image col-sm-12 col-lg-6 px-0">
    <img class="img-responsive" src="<?php echo URLROOT; ?>/images/gym2.jpg" alt="">
    <div class="text-overlay-3">
      <h3 class="land-text-1">Start</h3>
    </div>
    <div class="text-overlay-4">
      <h3 class="land-text-2">Today</h3>
    </div>
  </div>
</div>
</div>



<?php require APPROOT . '/views/inc/footer.php'; ?>
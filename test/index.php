<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <title>
  </title>

  <link rel="stylesheet" href="../style/test.css"/>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
      integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
      crossorigin="anonymous"/>

  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->

  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->

  <!--<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>-->

  <!-- <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script> -->


</head>
<body>
  <script src="evil.js"></script>
  <noscript>The power of translation</noscript>
  <div class="flex-row flex-center">
    <header id="branding">
      <h1>PORTLAND STATE UNIVERSITY TRANSLATION SERVICE</h1>
      <h2>A SAMPLE PAGE FOR TESTING</h2>
    </header>
  </div>
  <div class="flex-row flex-center">
    <a class="crumb" href="..">&laquo;&nbsp;translate user input</a>
  </div>
  <article>
    <h3>
      view this page in 80 languages
    </h3>
    <div class="flex-row flex-center">
      <a id="translate-cta" aria-label="click here to select a language"><i class="fa fa-globe"></i></a>
    </div>
    <div class="flex-row flex-center">
      <section aria-description="developer-notes">
        <p>
          <b>You can also test the endpoint for this API:</b>
        </p>
        <p><code>/psu-translate/transaltion-service/index.php</code></p>
        <p>
          <b>&mdash;by appending a query string like this one:</b>
        </p>
        <p>
          <code>?lang=fr&content_0=Hello+World&content_1=This+is+fun</code>
        </p>
      </section>
    </div>
    <div class="flex-row flex-center">
      <a href="../translation-service/index.php?lang=fr&content_0=Hello+World&content_1=This+is+fun"
         aria-description="link to translator's API endpoint">
        See it in action!
      </a>
      <br/>
    </div>
    <div class="flex-row flex-center">
      <section>
        <h4>A Bell Is a Cup&mdash;Until It Is Struck</h4>
        <div class="flex-row flex-center">
          <video
            width="360px"
            src="../video/pnw_1.mp4"
            muted="true"
            loop="true"
            autoplay="true"
            controls
            alt="cliff-top view of Pacific Ocean surf crashing against rocky shorline"
           ></video>
        </div>
        <p>
        <i>The hourglass is never right-side-up.</i>
        </p>
      </section>
    </div>
    <div class="flex-row flex-center">
      <ul aria-label="list of alphabetical links">
        <li><a href="#">Link A</a></li>
        <li><a href="#">Link B</a></li>
        <li><a href="#">Link C</a></li>
      </ul>
    </div>
    <div class="flex-row flex-center">
      <section>
        <h4>The Trains Don't Run On-Time</h4>
        <p>
         What is the sound of one hand clapping?
        </p>
        <br/>
        <h4>I Found That Essence Rare</h4>
        <p>
         If no one hears the tree fall, does it still make a sound?
        </p>
        <br/>
      </section>
    </div>
    <section>
      <h4>Have Your Cake and Eat It</h4>
      <div class="flex-row flex-center">
        <section>
          <p>
           The grass is always greener on the other side of the fence.
          </p>
          <br/>
        </section>
      </div>
      <h5>Now, you can enjoy this image of cross-campus traffic in time-lapse:</h5>
      <div class="flex-row flex-center">
        <img alt="white and red streaks from time-lapsed exposure of car headlights as they pass under a pedestrian bridge on the university campus"
             style="margin:1em;" src="../image/timelapse-traffic.png"/>
      </div>
    </section>
  </article>
  <footer>
    <h5>Thank you for visiting our website.</h5>
    <div class="flex-row flex-center">
      <ul aria-label="one more list of alphabetical links">
        <li><a href="#">Link X</a></li>
        <li><a href="#">Link Y</a></li>
        <li><a href="#">Link Z</a></li>
      </ul>
    </div>
    <p style="text-align:center;">
      All of this content is natural, open, and free since 2022
    </p>
  </footer>
  <p><sub>(PSU Translation Service ignores iframes)</sub></p>
  <iframe id="iframe"></iframe>
  <script id="script">console.log('PSU Translation Service ignores executables')</script>
  <script src="../lib/textnode_translate.js"></script>
  <script src="../lib/translation_widget.js"></script>
</body>
</html>

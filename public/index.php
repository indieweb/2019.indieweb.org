<?php
$event = 'summit';
$title = 'IndieWeb Events';
$date = '2019';
$year = 2019;
$city = 'Portland, Oregon';
$url = 'https://2019.indieweb.org/';
$summary = 'IndieWeb upcoming events.';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <title><?= $title ?> <?= $year ?></title>

  <link rel="webmention" href="/webmention.php">

  <link rel="stylesheet" type="text/css" href="/semantic/semantic.min.css">
  <link rel="stylesheet" type="text/css" href="/assets/icomoon/style.css">
  <link rel="stylesheet" type="text/css" href="/assets/styles.css?2">
  <link rel="stylesheet" href="/assets/leaflet/leaflet.css" />
  <script src="/assets/jquery-2.2.0.min.js"></script>
  <script src="/semantic/semantic.min.js"></script>
  <script src="/assets/leaflet/leaflet.js"></script>
  <script src='https://js.tito.io/v1' async></script>

  <meta property="og:url" content="<?= $url ?>">
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?= $title ?> - <?= $date ?>">
  <meta property="og:description" content="<?= htmlspecialchars($summary) ?>">
  <meta property="og:image" content="https://2018.indieweb.org/assets/2014-indieweb-movement.jpg">
</head>
<body>

  <div class="ui vertical stripe segment orange-bkg">
    <div class="ui text container">
      <div style="font-size: 2em; text-align: center; color: white" class="carrot-white">
        IndieWebCamps in 2019
      </div>
    </div>
  </div>


<!-- Page Contents -->
<div class="pusher">
  <div class="ui vertical stripe segment" id="events">
    <div class="ui text container">
      <h3 class="ui header"><a href="/austin">IndieWebCamp Austin</a></h3>
      <p>Capital Factory<br />
      Austin, TX<br />
      February 23-24, 2019</p>

      <h3 class="ui header"><a href="/online">IndieWebCamp Online</a></h3>
      <p>March 9-10, 2019</p>

      <h3 class="ui header"><a href="/newhaven">IndieWebCamp New Haven</a></h3>
      <p>Southern Connecticut State University, Davis Hall<br />
      March 30-31, 2019</p>

      <h3 class="ui header"><a href="https://indieweb.org/2019/Berlin">IndieWebCamp Berlin</a></h3>
      <p>Mozilla Berlin<br />
      Berlin, Germany<br />
      May 4-5, 2019</p>

      <h3 class="ui header"><a href="https://indieweb.org/2019/Düsseldorf">IndieWebCamp Düsseldorf</a></h3>
      <p>Düsseldorf, Germany<br />
      May 11-12, 2019</p>

      <h3 class="ui header"><a href="https://indieweb.org/2019/Utrecht">IndieWebCamp Utrecht</a></h3>
      <p>Utrecht, Netherlands<br />
      May 18-19, 2019</p>

      <h3 class="ui header"><a href="https://indieweb.org/2019">IndieWeb Summit</a></h3>
      <p>Portland, OR<br />
      June 29-30, 2019</p>

      <div style="margin-top: 100px;">
        <p>See more related events at <a href="https://indieweb.org/events">indieweb.org/events</a></p>
      </div>

    </div>
  </div>

  <div class="ui vertical stripe segment orange-bkg" id="social-media-section">
    <div class="ui text container">
      <div style="font-size: 2em; text-align: center;" class="carrot-white">
        #indiewebcamp
      </div>
      <div style="font-size: 4em; text-align: center;" class="social-media-icons">
        <a href="https://indieweb.org"><i class="ui attach icon"></i></a>
        <a href="https://twitter.com/indiewebcamp"><i class="ui twitter icon"></i></a>
        <a href="https://www.facebook.com/indiewebcamp/"><i class="ui facebook icon"></i></a>
      </div>
    </div>
  </div>

</div>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-16359758-38', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>

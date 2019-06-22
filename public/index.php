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
  <div class="ui vertical stripe segment h-feed" id="events">
    <div class="ui text container">

      <div class="h-event vevent">
        <h3 class="ui header p-name summary">
          <a class="u-url url" href="/austin">IndieWebCamp Austin</a>
        </h3>
        <p>
          <span class="p-location location">Capital Factory<br />
          Austin, TX</span><br />
          <time class="dt-start dtstart" datetime="2019-02-23">February 23</time>-<time class="dt-end dtend" datetime="2019-02-24">24, 2019</time>
        </p>
      </div>

      <div class="h-event vevent">
        <h3 class="ui header p-name summary">
          <a class="u-url url" href="/online">IndieWebCamp Online</a>
        </h3>
        <p>
          <time class="dt-start dtstart" datetime="2019-03-09">March 9</time>-<time class="dt-end dtend" datetime="2019-03-10">10, 2019</time>
        </p>
      </div>

      <div class="h-event vevent">
        <h3 class="ui header p-name summary">
          <a class="u-url url" href="/newhaven">IndieWebCamp New Haven</a>
        </h3>
        <p>
          <span class="p-location location">Southern Connecticut State University, Davis Hall</span><br />
          <time class="dt-start dtstart" datetime="2019-03-30">March 30</time>-<time class="dt-end dtend" datetime="2019-03-31">31, 2019</time>
        </p>
      </div>

      <div class="h-event vevent">
        <h3 class="ui header p-name summary">
          <a class="u-url url" href="/berlin">IndieWebCamp Berlin</a>
        </h3>
        <p>
          <span class="p-location location">Mozilla Berlin<br />
          Berlin, Germany</span><br />
          <time class="dt-start dtstart" datetime="2019-05-04">May 4</time>-<time class="dt-end dtend" datetime="2019-05-05">5, 2019</time>
        </p>
      </div>

      <div class="h-event vevent">
        <h3 class="ui header p-name summary">
          <a class="u-url url" href="https://indieweb.org/2019/Düsseldorf">IndieWebCamp Düsseldorf</a>
        </h3>
        <p>
          <span class="p-location location">Düsseldorf, Germany</span><br />
          <time class="dt-start dtstart" datetime="2019-05-11">May 11</time>-<time class="dt-end dtend" datetime="2019-05-12">12, 2019</time>
        </p>
      </div>

      <div class="h-event vevent">
        <h3 class="ui header p-name summary">
          <a class="u-url url" href="https://indieweb.org/2019/Utrecht">IndieWebCamp Utrecht</a>
        </h3>
        <p>
          <span class="p-location location">Utrecht, Netherlands</span><br />
          <time class="dt-start dtstart" datetime="2019-05-18">May 18</time>-<time class="dt-end dtend" datetime="2019-05-19">19, 2019</time>
        </p>
      </div>

      <div class="h-event vevent">
        <h3 class="ui header p-name summary">
          <a class="u-url url" href="/summit">IndieWeb Summit</a>
        </h3>
        <p>
          <span class="p-location location">Portland, Oregon</span><br />
          <time class="dt-start dtstart" datetime="2019-06-29">June 29</time>-<time class="dt-end dtend" datetime="2019-06-30">30, 2019</time>
        </p>
      </div>

      <div class="h-event vevent">
        <h3 class="ui header p-name summary">
          <a class="u-url url" href="https://indieweb.org/2019/Oxford">IndieWebCamp Oxford</a>
        </h3>
        <p>
          <span class="p-location location">Oxford, England</span><br />
          <time class="dt-start dtstart" datetime="2019-09-28">September 28, 2019</time>
        </p>
      </div>

      <div class="h-event vevent">
        <h3 class="ui header p-name summary">
          <a class="u-url url" href="https://indieweb.org/2019/Brighton">IndieWebCamp Brighton</a>
        </h3>
        <p>
          <span class="p-location location">Brighton, England</span><br />
          <time class="dt-start dtstart" datetime="2019-10-19">October 19</time>-<time class="dt-end dtend" datetime="2019-10-20">20, 2019</time>
        </p>
      </div>

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

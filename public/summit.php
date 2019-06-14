<?php
$event = 'summit';
$title = 'IndieWeb Summit';
$date = 'June 29-30, 2019';
$year = 2019;
$city = 'Portland, Oregon';
$url = 'https://2019.indieweb.org/summit';
$summary = 'The ninth annual gathering for independent web creators of all kinds, graphic artists, designers, UX engineers, coders, hackers, to share ideas, create and improve their personal websites, and build upon each others creations.';
include(dirname(__FILE__).'/../lib/rsvps.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <title><?= $title ?> <?= $year ?> - <?= $city ?></title>

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
  <meta property="og:title" content="<?= $title ?> - <?= $date ?> - <?= $city ?>">
  <meta property="og:description" content="<?= htmlspecialchars($summary) ?>">

  <script>
  $(document)
    .ready(function() {

      // fix menu when passed
      $('.masthead')
        .visibility({
          once: false,
          onBottomPassed: function() {
            $('.fixed.menu').transition('fade in');
          },
          onBottomPassedReverse: function() {
            $('.fixed.menu').transition('fade out');
          }
        })
      ;

      // create sidebar and attach to menu open
      $('.ui.sidebar')
        .sidebar('attach events', '.toc.item')
      ;

    })
  ;
  </script>
  <style>
    body.show-banner {
      padding-top: 40px !important;
    }
    body.show-banner .top.menu {
      top: 40px;
    }
  </style>
</head>
<body class="h-event -show-banner">

<!--
<div style="display: block; position: fixed; top: 0; height: 40px; width: 100%; background: #E63630; text-align: center; z-index: 1000; color: white;">
  <div style="padding: 10px;">
    New: <a href="https://aaronparecki.com/2018/06/23/5/indieweb-summit" style="color: white; font-style: bold; text-decoration: underline;">Final details for IndieWeb Summit!</a>
  </div>
</div>
-->

<!-- Following Menu -->
<div class="ui large top fixed hidden menu">
  <div class="ui container">
    <?php include('../templates/'.$event.'/nav.php'); ?>
<!--
    <div class="right menu">
      <div class="item">
        <a class="ui primary button">Sign Up</a>
      </div>
    </div>
 -->
  </div>
</div>

<!-- Sidebar Menu -->
<div class="ui vertical inverted sidebar menu">
  <?php include('../templates/'.$event.'/nav.php'); ?>
</div>


<!-- Page Contents -->
<div class="pusher">
  <div class="ui inverted vertical masthead center aligned segment gold-bkg">

    <div class="ui container">
      <div class="ui large secondary inverted pointing menu">
        <a class="toc item">
          <i class="sidebar icon"></i>
        </a>
        <?php include('../templates/'.$event.'/nav.php'); ?>
      </div>
    </div>

    <div class="ui text container event-header">

      <h1 class="ui inverted header p-name">
        <?= $title ?>
      </h1>

      <h2><?= $date ?></h2>
      <h2><?= $city ?></h2>


      <p class="summary p-summary"><?= htmlspecialchars($summary) ?></p>

    </div>

  </div>


  <div class="ui vertical stripe segment" id="register">
    <div class="ui text container">
      <h3 class="ui header">Register</h3>

      <tito-widget event="indiewebcamp/summit-2019"><a href="http://tickets.indieweb.org/indiewebcamp/summit-2019">Get Tickets</a></tito-widget>

      <p style="font-size: 0.9em; margin-top: 0.5em;">Have a discount code? <a href="https://ti.to/indiewebcamp/summit-2019">Enter it here!</a></p>

    </div>
  </div>


  <div class="ui vertical stripe segment h-feed" id="rsvps">
    <div class="ui text container">
      <h3 class="ui header">Registrations</h3>

      <?php include('../templates/show-tito-tickets.php'); ?>

      <h3 class="ui header">Indie RSVPs</h3>

      <p>See <a href="https://indieweb.org/RSVP">indieweb.org/RSVP</a> for instructions on how to create an RSVP post. Once you've created the RSVP post which links to this page, send a Webmention and you'll appear below! Please make sure to still register for a ticket above though!</p>

      <?php include('../templates/show-rsvps.php'); ?>

    </div>
  </div>



  <div class="ui vertical stripe segment" id="schedule">
    <div class="ui text container">
      <h3 class="ui header">Schedule</h3>
      <?php include('../templates/'.$event.'/schedule.php'); ?>
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


  <div class="ui vertical stripe segment nopadding" style="border-bottom: 0;" id="location">
    <div id="map"></div>
  </div>


  <div class="ui vertical stripe segment" id="travel-assistance">
    <div class="ui text container">
      <h3 class="ui header">Travel Assistance</h3>
      <?php include('../templates/'.$event.'/assistance.php'); ?>
    </div>
  </div>


  <div class="ui vertical stripe segment" id="sponsors">
    <div class="ui text container">
      <h3 class="ui header">Sponsors</h3>
      <?php include('../templates/'.$event.'/sponsors.php'); ?>
    </div>
  </div>



  <div class="ui inverted vertical footer segment gold-bkg">
    <div class="ui container">
      <p><?= $title ?> &bull; <?= $date ?> &bull; <?= $city ?></p>
      <ul>
        <li><a href="https://indieweb.org/">IndieWebCamp Home Page</a></li>
        <li><a href="https://indieweb.org/code-of-conduct">IndieWeb Code of Conduct</a></li>
        <li><a href="https://indieweb.org/images/2/2d/indiewebcamp-sponsorship-prospectus.pdf">Sponsorship Prospectus</a> (PDF)</li>
      </ul>
    </div>
  </div>
</div>

<script>
var map = L.map('map', {
  scrollWheelZoom: false,
  center: [45.523459, -122.682703],
  zoom: 13
});

var layer = L.tileLayer('https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}.png', {
  attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, &copy; <a href="http://cartodb.com/attributions">CartoDB</a>'
});
map.addLayer(layer);

var marker = L.marker([45.523459, -122.682703]).addTo(map);
marker.bindPopup("<b>Mozilla Portland</b><br>1120 NW Couch St. #320<br>Portland, Oregon").openPopup();

/*
var marker2 = L.marker([45.521450, -122.672375]).addTo(map);
marker2.bindPopup("<b>Pine Street Market</b><br>126 SW 2nd Ave.<br>Portland, Oregon");
*/

$(function(){
  $(".popup").popup();
});

</script>
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

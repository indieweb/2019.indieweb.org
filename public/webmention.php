<?php
require_once('../lib/HTTP.php');
require_once('../lib/config.php');

$http = new HTTP();

function error($msg, $code=400) {
  if($code == 400)
    header("HTTP/1.1 400 Bad Request");
  header("Content-type: text/plain");
  echo $msg."\n";
  die();
}

if(!isset($_POST['source']) || !isset($_POST['target'])) {
  if(strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
    error("Missing source or target properties");
  } else {
	?>
    <link rel="stylesheet" type="text/css" href="/semantic/semantic.min.css">
<div class="ui container">
	<h2>Send a Webmention</h2>
	<form action="/webmention.php" method="post">
		Source: <input type="url" name="source" value="" style="width:400px;"><br><br>
		Target: <input type="url" name="target" value="<?= $targetBaseURL ?>/" style="width:400px;"><br><br>
		<input type="submit" value="Send Webmention">
	</form>
</div>
	<?php
	die();
  }
}

$sourceURL = $_POST['source'];
$targetURL = $_POST['target'];

$targetURLParts = parse_url($targetURL);
if(empty($targetURLParts['path']))
  $targetURLParts['path'] = '/';

$folders = glob(__DIR__.'/../data/*');
$events = [];
foreach($folders as $f) {
  $events[] = basename($f);
}

$event = false;
foreach($events as $e) {
  $path = '/'.$e;
  if($path == $targetURLParts['path']) {
    $event = $e;
  }
}

if(!$event) {
  error("Webmentions are only accepted for current events. The target in your request was not the URL of a current event.");
}

$response = $http->get($xrayBaseURL.'/parse?url='.urlencode($sourceURL).'&target='.urlencode($targetURL));
$data = json_decode($response['body'], true);

// XRay tells us if the URL didn't link to the target
if(isset($data['error'])) {
  error($data['error_description']);
}

$source = $data['data'];

if(!is_array($source)) {
  error("There was a problem parsing the source URL");
}

// Check the source for in-reply-to and rsvp properties
if(!array_key_exists('in-reply-to', $source)) {
  error("Your post doesn't seem to have an in-reply-to property");
}

if(!in_array($targetURL, $source['in-reply-to'])) {
  error("It looks like your post does not have the event URL in the in-reply-to property");
}

if(!array_key_exists('rsvp', $source)) {
  error("Your post doesn't have an 'rsvp' property");
}

// Store the response data to disk so that it's rendered on the event page
$folder = dirname(__FILE__).'/../data/'.$event.'/'.md5($sourceURL);

if(strtolower($source['rsvp']) == 'yes') {

  @mkdir($folder);

  if($source['author']['photo']) {
    $tmp = tempnam(sys_get_temp_dir(), 'img');
    $img = $http->get($source['author']['photo']);
    if($img['body']) {
      file_put_contents($tmp, $img['body']);
      if(preg_match('/^<\?xml.+<svg.+<\/svg>$/', trim($img['body']))) {
        $ext = 'svg';
      } else {
        $type = exif_imagetype($tmp);
        $ext = false;
        switch($type) {
          case IMAGETYPE_GIF:
            $ext = 'gif'; break;
          case IMAGETYPE_JPEG:
            $ext = 'jpg'; break;
          case IMAGETYPE_PNG:
            $ext = 'png'; break;
          case IMAGETYPE_ICO:
            $ext = 'ico'; break;
        }
      }
      if($ext) {
        copy($tmp, $folder . '/photo.'.$ext);
      }
    }
  }

  $filename = $folder . '/post.json';
  $data = [
    'received' => date('c'),
    'source' => $sourceURL,
    'data' => $source
  ];
  file_put_contents($filename, json_encode($data));

  echo "Thanks! Your RSVP is listed on the event page now!\n";
} else {

  if(file_exists($folder . '/post.json')) {
    unlink($folder . '/post.json');
  }

  echo "Thanks! Your RSVP was received, but you won't be listed on the event page because your RSVP was not \"yes\"\n";
}

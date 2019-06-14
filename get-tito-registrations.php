<?php
$event = $argv[1];

$config_file = dirname(__FILE__).'/.tito-'.$event.'.json';
if(!file_exists($config_file)) {
  echo "Tito config file was not found\n";
  die();
}
$config = json_decode(trim(file_get_contents($config_file)));

function get_tito($url) {
  global $config;
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Token token=' . $config->token
  ]);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($ch);
  return json_decode($response, true);
}

function normalize_url($url) {
  if($url == '') return $url;
  if(!preg_match('/^https?:\/\//', $url))
    return 'http://'.$url;
  return $url;
}

$registrations = get_tito($config->registrations);

file_put_contents(dirname(__FILE__).'/data/'.$event.'/tito.json', json_encode($registrations, JSON_PRETTY_PRINT));


$ticketData = [];

foreach($registrations['data'] as $reg) {
  if(isset($reg['relationships']['tickets']['links']['related'])) {
    $ticket = get_tito($reg['relationships']['tickets']['links']['related']);
    if($ticket && isset($ticket['data'][0])) {
      $ticket = $ticket['data'][0];
      $name = $ticket['attributes']['name'];
      $timestamp = $reg['attributes']['completed-at'];
      $email = $reg['attributes']['email'];
      $website = false;
      $show = false;
      if(isset($ticket['attributes']['answers']) && is_array($ticket['attributes']['answers'])) {
        foreach($ticket['attributes']['answers'] as $question=>$answer) {
          if($question == 'your-personal-website')
            $website = normalize_url($answer);
          if($question == 'would-you-like-to-be-shown-on-the-public')
            $show = ($answer == 'Yes, show me on the guest list' ? 'yes' : 'no');
        }
      }

      echo "======\n";
      echo $name . "\n";
      echo $timestamp . "\n";
      echo $website . "\n";
      echo $email . "\n";
      echo $show . "\n";
      $hash = md5(strtolower(trim($email)));
      echo $hash . "\n";

      $dir = __DIR__.'/data/'.$event.'/'.$hash;
      $fn = $dir.'/photo.jpg';
      if(!file_exists($fn)) {
        // Try to download the profile photo from Gravatar
        $ch = curl_init('https://www.gravatar.com/avatar/'.$hash.'.jpg?d=404');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        $imgdata = curl_exec($ch);
        
        if($imgdata) {
          echo "found gravatar\n";
          @mkdir($dir, 0755);
          file_put_contents($fn, $imgdata);
        } else {
          echo "no gravatar\n";
        }
      }

      $ticketData[] = [
        'name' => $name,
        'website' => $website,
        'email' => $email,
        'timestamp' => $timestamp,
        'show' => $show
      ];

    }
  }

}

file_put_contents(dirname(__FILE__).'/data/'.$event.'/tickets.json', json_encode($ticketData, JSON_PRETTY_PRINT));


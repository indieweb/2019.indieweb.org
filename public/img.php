<?php
if(!array_key_exists('img', $_GET))
  die();

$img = $_GET['img'];

if(!preg_match('/^([a-z0-9]+)\.(jpg|png|gif|ico|svg)$/', $img, $match))
  die();

$folder = $match[1];
$ext = $match[2];

switch($ext) {
  case 'jpg':
    header('Content-type: image/jpeg'); break;
  case 'gif':
    header('Content-type: image/gif'); break;
  case 'png':
    header('Content-type: image/png'); break;
  case 'ico':
    header('Content-type: image/ico'); break;
  case 'svg':
    header('Content-type: image/svg+xml'); break;
}

if(array_key_exists('event', $_GET))
  $event = preg_replace('/[^a-z0-9]/', '', $_GET['event']);
else
  $event = 'summit';

$filename = dirname(__FILE__).'/../data/'.$event.'/'.$folder.'/photo.'.$ext;

if(file_exists($filename))
  readfile($filename);
else {
  header('Content-type: image/png');
  readfile(__DIR__.'/assets/no-photo.png');
}

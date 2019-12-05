<div class="rsvps">
<?php
$rsvps = loadRSVPs($event);
foreach($rsvps as $rsvp):
  $url = array_key_exists('url', $rsvp['data']) && $rsvp['data']['url'] ? $rsvp['data']['url'] : $rsvp['source'];
  // Don't use the url property unless it's at the same host as the source URL
  if(parse_url($url, PHP_URL_HOST) != parse_url($rsvp['source'], PHP_URL_HOST)) {
    $permalink = $rsvp['source'];
  } else {
    $permalink = $url;
  }

  if(parse_url($rsvp['source'], PHP_URL_HOST) == 'brid-gy.appspot.com') {
    continue;
  }

  $author_mf2 = [];

  // use permalink's domain if no author name
  if (array_key_exists('name', $rsvp['data']['author']) && $rsvp['data']['author']['name']) {
    $author_name = $rsvp['data']['author']['name'];
    $author_mf2[] = 'p-name';
  } else {
    $author_name = parse_url($permalink, PHP_URL_HOST);
  }

  // use permalink if no author url
  if (array_key_exists('url', $rsvp['data']['author']) && $rsvp['data']['author']['url']) {
    $author_url = $rsvp['data']['author']['url'];
    $author_mf2[] = 'u-url';
  } else {
    $author_url = $permalink;
  }

  // use default image if no author photo
  if (array_key_exists('author_photo', $rsvp) && $rsvp['author_photo']) {
    $author_photo = sprintf('<img src="/img.php?event=%s&img=%s" width="48" height="48" class="photo u-photo">', $event, $rsvp['author_photo']);
  } else {
    $author_photo = '<img src="/assets/no-photo.png" width="48" height="48" class="photo">';
  }

  // build author class attribute if there are mf2 classes
  $author_class = '';
  if ($author_mf2) {
    $author_class = sprintf(' class="%s"', implode(' ', $author_mf2));
  }
  ?>
  <div class="rsvp h-card">
    <div class="profile-photo">
      <a href="<?= $author_url; ?>"><?= $author_photo; ?></a>
    </div>
    <div class="profile-info">
      <div>
        <a href="<?= $author_url; ?>"<?= $author_class; ?>><?= $author_name; ?></a>
      </div>
      <div class="permalink"><a href="<?= $permalink ?>">permalink</a></div>
    </div>
  </div>
  <?php
endforeach;
?>
</div>
<div style="clear:both;"></div>

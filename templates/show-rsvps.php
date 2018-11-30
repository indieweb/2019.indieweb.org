<div class="rsvps">
<?php
$rsvps = loadRSVPs($event);
foreach($rsvps as $rsvp):
  $url = array_key_exists('url', $rsvp['data']) && $rsvp['data']['url'] ? $rsvp['data']['url'] : $rsvp['source'];
  // Don't use the url property unless it's at the same host as the source URL
  if(parse_url($url, PHP_URL_HOST) != parse_url($rsvp['source'], PHP_URL_HOST))
    $permalink = $rsvp['source'];
  else
    $permalink = $url;
  if(parse_url($rsvp['source'], PHP_URL_HOST) == 'brid-gy.appspot.com')
    continue;
  ?>
  <div class="rsvp">
    <div class="profile-photo">
      <?php if($rsvp['author_photo']): ?>
        <?php if($rsvp['data']['author']['url']): ?>
          <a href="<?= $rsvp['data']['author']['url'] ?>">
            <img src="/img.php?event=<?= $event ?>&img=<?= $rsvp['author_photo'] ?>" width="48" class="photo">
          </a>
        <?php endif; ?>
      <?php else: ?>
        <img src="/assets/no-photo.png" width="48" class="photo">
      <?php endif; ?>
    </div>
    <div class="profile-info">
      <div>
        <?php if($rsvp['data']['author']['url']): ?>
          <a href="<?= $rsvp['data']['author']['url'] ?>">
           <?= $rsvp['data']['author']['name'] ?: '' ?>
          </a>
        <?php endif; ?>
      </div>
      <div class="permalink"><a href="<?= $permalink ?>">permalink</a></div>
    </div>
  </div>
  <?php
endforeach;
?>
</div>
<div style="clear:both;"></div>

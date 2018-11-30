<div class="rsvps">
<?php

  $rsvps = loadRSVPs($event);
  $websites = [];
  foreach($rsvps as $rsvp) {
    if($rsvp['data']['author']['url']) {
      $websites[] = parse_url($rsvp['data']['author']['url'], PHP_URL_HOST);
    }
  }

  $hidden = 0;
  if(file_exists(dirname(__FILE__).'/../data/'.$event.'/tickets.json')):
  $tickets = json_decode(file_get_contents(dirname(__FILE__).'/../data/'.$event.'/tickets.json'));
  foreach($tickets as $ticket):
    if($ticket->show == 'yes'):
      if(!$ticket->website || !in_array(parse_url($ticket->website, PHP_URL_HOST), $websites)):
        if($ticket->website) {
          $websites[] = parse_url($ticket->website, PHP_URL_HOST);
        }
      ?>
      <div class="rsvp">
        <div class="profile-photo">
          <? if($ticket->website): ?><a href="<?= $ticket->website ?>"><? endif; ?>
            <img src="<?= gravatar($ticket->email) ?>" width="48" class="photo">
          <? if($ticket->website): ?></a><? endif; ?>
        </div>
        <div class="profile-info">
          <div>
            <? if($ticket->website): ?><a href="<?= $ticket->website ?>"><? endif; ?>
              <?= $ticket->name ?>
            <? if($ticket->website): ?></a><? endif; ?>
          </div>    
        </div>    
      </div>
      <?php
      endif;
    else:
      if(!in_array(parse_url($ticket->website, PHP_URL_HOST), $websites)) {
        $hidden++;
      }
    endif;
  endforeach;
  endif;
  ?>

  <?php if($hidden): ?>
  <div class="rsvp">
    <div class="profile-info">
      and <?= $hidden ?> private registrations
    </div>
  </div>
  <?php endif ?>

</div>
<div style="clear:both;"></div>

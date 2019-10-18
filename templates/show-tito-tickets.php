<?php

  $rsvps = loadRSVPs($event);
  $websites = [];
  foreach($rsvps as $rsvp) {
    if($rsvp['data']['author']['url']) {
      $websites[] = parse_url($rsvp['data']['author']['url'], PHP_URL_HOST);
    }
  }

  if(file_exists(dirname(__FILE__).'/../data/'.$event.'/tickets.json')) {
    $tickets = json_decode(file_get_contents(dirname(__FILE__).'/../data/'.$event.'/tickets.json'));
  } else {
    $tickets = false;
  }

  $ticket_types[] = [
    'title' => 'Registrations',
    'filter' => 'Regular',
  ];
  $ticket_types[] = [
    'title' => 'Remote Participants',
    'filter' => 'Remote Participation',
  ];

  if($tickets):
  foreach($ticket_types as $type):
    echo '<h3 class="ui header" id="'.(preg_replace('/[^a-z]/', '-', strtolower($type['title']))).'-rsvps">'.$type['title'].'</h3>';
    echo '<div class="rsvps">';

    $count = 0;
    $hidden = 0;
    foreach($tickets as $ticket):
      if(in_array($type['filter'], $ticket->ticket_type)):
        if($ticket->show == 'yes'):
          $count++;
          if(!$ticket->website || !in_array(parse_url($ticket->website, PHP_URL_HOST), $websites)):
            if($ticket->website) {
              $websites[] = parse_url($ticket->website, PHP_URL_HOST);
            }
          ?>
          <div class="rsvp h-card">
            <div class="profile-photo">
              <? if($ticket->website): ?><a href="<?= $ticket->website ?>"><? endif; ?>
                <img src="<?= gravatar($ticket->email, $event) ?>" width="48" height="48" class="photo u-photo">
              <? if($ticket->website): ?></a><? endif; ?>
            </div>
            <div class="profile-info">
              <div>
                <? if($ticket->website): ?><a href="<?= $ticket->website ?>" class="p-name u-url"><? endif; ?>
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
      endif;
    endforeach;

    if($count == 0) {
      echo 'None yet!';
    }

    if($hidden):
      echo '<div class="rsvp">
        <div class="profile-info">
          and '.$hidden.' private registrations
        </div>
      </div>';
    endif;

    echo '</div>';
    echo '<div style="clear:both;"></div>';

  endforeach;
  endif;


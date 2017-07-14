<?php

if (!function_exists('reaction')) {

  /**
   * Helper function to generate a
   * random short reaction to a type of event
   *
   * @param  string $type The type of event: 'positive', 'bad', 'cautious'
   * @return [type]       [description]
   */
  function react($type = null, $strong = true)
  {
    $reaction = app('reaction');

    return $reaction->getReaction($type, $strong);
  }
}

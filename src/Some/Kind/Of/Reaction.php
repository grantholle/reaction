<?php

namespace Some\Kind\Of;

use Illuminate\Support\Collection;

// react()->positive()

class Reaction
{
  /**
   * Whether to wrap the reaction in <strong/>
   * @var boolean
   */
  private $strong;

  /**
   * Generates a reaction based on a type of reaction
   *
   * @param  string  $type   The type of reaction: positive, bad, unsafe
   * @param  boolean $strong Wrap the reaction in <strong/>
   * @return string/$this    Either return the reaction if its provided, or $this to chain
   */
  public function getReaction($type = null, $strong = true)
  {
    $this->strong = $strong;

    if (is_null($type)) {
      return $this;
    }

    return call_user_func_array([$this, $type], []);
  }

  /**
   * Generates a unsafe reaction
   *
   * @return string
   */
  public function unsafe()
  {
    return $this->speak(collect([
      'careful',
      'be careful',
      'watch it',
      'heads up',
      'warning',
      'caution',
      'easy',
      'easy does it',
      'steer clear',
      'head for open waters',
    ]));
  }

  /**
   * Generates a bad reaction
   *
   * @return string
   */
  public function bad()
  {
    return $this->speak(collect([
      'ouch',
      'bummer',
      'yikes',
      'hey',
      'darn',
      'zoinks',
      'sorry',
      'oof',
      'eesh',
      'doh',
      'shucks',
    ]));
  }

  /**
   * Generates a positive reaction
   *
   * @return string
   */
  public function positive()
  {
    return $this->speak(collect([
      'cool',
      'great',
      'awesome',
      'super',
      'tubular',
      'hey-o',
      'yeah',
      'yee-haw',
      'sick',
      'sweet',
      'yippee',
      'boom',
      'nice one',
      'cool beans',
      'woohoo',
      'yahoo',
    ]));
  }

  /**
   * Chooses a random word from a collection to return as a reaction
   *
   * @param  Collection $words The collection of words from which to randomly choose
   * @return string
   */
  public function speak(Collection $words)
  {
    $word = ucfirst($words->random()) . '!';

    if ($this->strong) {
      $word = '<strong>' . $word . '</strong>';
    }

    return $word;
  }
}

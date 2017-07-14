<?php

namespace Some\Kind\Of\Tests;

use Some\Kind\Of\Reaction;

class ReactionTest extends \PHPUnit_Framework_TestCase
{
  protected $reaction;

  public function setUp()
  {
    $this->reaction = new Reaction();
  }

  /** @test */
  public function test_reaction_is_a_string()
  {
    $r = $this->reaction->getReaction()->positive();

    $this->assertInternalType('string', $r);
  }

  /** @test */
  public function test_reaction_is_wrapped_in_html()
  {
    $r = $this->reaction->getReaction('bad');

    $this->assertStringStartsWith('<strong>', $r);
    $this->assertStringEndsWith('</strong>', $r);
  }

  /** @test */
  public function test_reaction_is_does_not_have_html()
  {
    $r = $this->reaction->getReaction(null, false)->bad();

    $this->assertNotContains('<strong>', $r);
    $this->assertNotContains('</strong>', $r);
  }

  /** @test */
  public function test_reaction_contains_exclamation_point()
  {
    $r = $this->reaction->getReaction('cautious', false);

    $this->assertContains('!', $r);
  }
}

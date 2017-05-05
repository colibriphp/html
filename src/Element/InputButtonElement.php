<?php

namespace Colibri\Html\Element;

/**
 * Class InputButtonElement
 *
 * @package Colibri\Html\Element
 */
class InputButtonElement extends InputElement
{

  /**
   * InputButtonElement constructor.
   *
   * @param null  $value
   * @param array $attributes
   */
  public function __construct($value = null, array $attributes = [])
  {
    parent::__construct(null, $value, $attributes);
    
    $this->setAttribute('type', 'button');
  }

}
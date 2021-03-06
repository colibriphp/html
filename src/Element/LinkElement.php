<?php

namespace Colibri\Html\Element;

use Colibri\Html\HtmlElement;

/**
 * Class LinkElement
 * @package Colibri\Html\Element
 */
class LinkElement extends HtmlElement
{
  
  /**
   * LinkElement constructor.
   * @param null $href
   * @param array $attributes
   */
  public function __construct($href = null, array $attributes = [])
  {
    parent::__construct('link', $attributes, null);
    
    $this->setSingle(true)->setAttribute('href', $href);
  }
  
}
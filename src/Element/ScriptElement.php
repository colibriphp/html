<?php

namespace Colibri\Html\Element;

use Colibri\Html\HtmlElement;

/**
 * Class ScriptElement
 * @package Colibri\Html\Element
 */
class ScriptElement extends HtmlElement
{

  /**
   * ScriptElement constructor.
   *
   * @param null  $src
   * @param array $attributes
   */
  public function __construct($src = null, array $attributes = [])
  {
    parent::__construct('script', $attributes);
    
    $this->setAttribute('src', $src);
  }

  /**
   * @param bool|false $mode
   * @return $this
   */
  public function async($mode = false)
  {
    ($mode == true ? $this->setAttribute('async') : $this->removeAttribute('async'));

    return $this;
  }

}
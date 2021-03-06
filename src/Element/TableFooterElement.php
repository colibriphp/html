<?php

    namespace Colibri\Html\Element;

    use Colibri\Html\HtmlElement;

    class TableFooterElement extends HtmlElement {

        /**
         * TableFooterElement constructor.
         * @param null $content
         * @param array $attributes
         */
        public function __construct($content = null, array $attributes = [])
        {
            parent::__construct('tfoot', $attributes, null);
            $this->setContent($content);
        }

    }
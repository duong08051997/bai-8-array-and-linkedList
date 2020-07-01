<?php
class Node{
    public $element;
    public $next;

    public function __construct($element)
    {
        $this->element = $element;

    }
    public function getNode()
    {
        return $this->element;

    }

}
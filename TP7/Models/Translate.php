<?php

class Translate {
    private $_key;
    private $_value;


    function __construct($key, $value){
        $this->_key = $key;
        $this->_value = $value;
    }
    
    public function getKey(){
        return $this->_key;
    }

    public function getValue(){
        return $this->_value;
    }

    public function setKey($key){
        $this->_key = $key;
    }

    public function setValue($value){
        $this->_value = $value;
    }

    public static function getCorrepondance(){
      return [
          new Translate('a', 'y'),
          new Translate('b', 'p'),
          new Translate('c', 'l'),
          new Translate('d', 't'),
          new Translate('e', 'a'),
          new Translate('f', 'v'),
          new Translate('g', 'k'),
          new Translate('h', 'r'),
          new Translate('i', 'e'),
          new Translate('j', 'z'),
          new Translate('k', 'g'),
          new Translate('l', 'm'),
          new Translate('m', 's'),
          new Translate('n', 'h'),
          new Translate('o', 'u'),
          new Translate('p', 'b'),
          new Translate('q', 'x'),
          new Translate('r', 'n'),
          new Translate('s', 'c'),
          new Translate('t', 'd'),
          new Translate('u', 'i'),
          new Translate('v', 'j'),
          new Translate('w', 'f'),
          new Translate('x', 'q'),
          new Translate('y', 'o'),
          new Translate('z', 'w')

      ];
    }
}
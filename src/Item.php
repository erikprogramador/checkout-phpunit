<?php

namespace App;

interface Item
{
    public function __construct($name, $ammount);

    public function setName($name);

    public function getName();

    public function setAmmount($ammount);

    public function getAmmount();
}

<?php
/**
 * Created by PhpStorm.
 * User: Lucian-PC
 * Date: 6/21/2018
 * Time: 4:38 PM
 */

class Submarine extends AbstractShip
{
    public function __construct(Board $board )
    {
        parent::__construct($board);
        parent::setHitPoints(3);
        parent::setSize(3);
        parent::setType('submarine');
    }
}
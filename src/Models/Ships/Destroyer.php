<?php
/**
 * Created by PhpStorm.
 * User: Lucian-PC
 * Date: 6/21/2018
 * Time: 4:30 PM
 */

class Destroyer extends AbstractShip
{
    /**
     * Destroyer constructor.
     * @param Board $board
     */
    public function __construct(Board $board )
    {
        parent::__construct($board);
        parent::setHitPoints(2);
        parent::setSize(2);
        parent::setType('destroyer');
    }
}
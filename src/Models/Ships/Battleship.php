<?php
/**
 * Created by PhpStorm.
 * User: Lucian-PC
 * Date: 6/21/2018
 * Time: 4:36 PM
 */

class Battleship extends AbstractShip
{
    /**
     * Battleship constructor.
     * @param Board $board
     */
    public function __construct(Board $board )
    {
        parent::__construct($board);
        parent::setHitPoints(4);
        parent::setSize(4);
        parent::setType('battleship');
    }
}
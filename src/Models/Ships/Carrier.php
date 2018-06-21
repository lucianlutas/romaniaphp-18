<?php
/**
 * Created by PhpStorm.
 * User: Lucian-PC
 * Date: 6/21/2018
 * Time: 2:17 PM
 */

class Carrier extends AbstractShip
{

    /**
     * Carrier constructor.
     * @param $board
     */
    public function __construct( Board $board )
    {
        parent::__construct($board);
        parent::setHitPoints(5);
        parent::setSize(5);
        parent::setType('Carrier');
    }




}
<?php
/**
 * Created by PhpStorm.
 * User: Lucian-PC
 * Date: 6/21/2018
 * Time: 10:54 AM
 */

class GameLogic
{
    /**
     * Place a ship on the board
     * @param AbstractShip $ship
     * @param $yPos
     * @param $xPos
     * @param $orientation
     * @return bool
     */
    public function placeShip(AbstractShip $ship, $yPos, $xPos, $orientation) : bool
    {
        return $ship->placeShip($yPos, $xPos, $orientation);
    }

    /**
     * Call a shot on a cell
     * @param Board $board
     * @param $yPos
     * @param $xPos
     * @return string
     */
    public function callShot(Board $board, $yPos, $xPos)
    {
        return $board->shootShipGrid($yPos, $xPos);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Lucian-PC
 * Date: 6/21/2018
 * Time: 10:33 AM
 */

class Board
{
    private $width;
    private $height;
    private $shipGrid;
    private $hitGrid;

    /**
     * Board constructor.
     * @param $width
     * @param $height
     */
    public function __construct($width = 10, $height = 10)
    {
        $this->width = $width;
        $this->height = $height;
        $this->shipGrid = array(array());
        $this->hitGrid = array(array());
        $this->init();
    }

    /**
     *  Initialize the board grid
     */
    public function init() : void
    {
        for($y = 0; $y < $this->height; $y++)
        {
            for ($x = 0; $x < $this->width; $x++)
            {
                $this->shipGrid[$y][$x] = -1;
                $this->hitGrid[$y][$x] = -1;
            }
        }
    }

    /**
     * Add ship part to the cell
     * @param $y
     * @param $x
     * @param AbstractShip $ship
     */
    public function markShip($y, $x, AbstractShip $ship)
    {
        $this->shipGrid[$y][$x] = $ship;
    }

    public function getShipGridCellContent($yPos, $xPos)
    {
        return $this->shipGrid[$yPos][$xPos];
    }
    public function getHitGridCellContent($yPos, $xPos)
    {
        return $this->hitGrid[$yPos][$xPos];
    }

    /**
     * Mark hit on ship grid
     * @param $y
     * @param $x
     * @return string
     */
    public function shootShipGrid($y, $x)
    {
        $pos = new Position($y, $x);

        if(!$pos->checkValidPos($this->height, $this->width)){
            return 'Invalid board position';
        }


        $cell = $this->getShipGridCellContent($pos->getYPos(), $pos->getXPos());
        if(is_object($cell))
        {
            $cell->getHit();
            $this->markHitShipGrid($pos->getYPos(), $pos->getXPos());
            if($cell->getHitPoints() == 0){
                $cell->getDestroyed();
                return 'Sunk '.$cell->getType();
            }
            return 'Hit. '.$cell->getType();
        }
        $this->markMissShipGrid($pos->getYPos(), $pos->getXPos());
        return 'Miss';
    }

    public function checkForCollisions($yPos, $xPos, $size, $orientation)
    {
        switch ($orientation)
        {
            case 0:
                for($i = 0; $i<$size; $i++)
                {
                    if(is_object($this->getShipGridCellContent($yPos, $xPos + $i)))
                    {
                        return TRUE;
                    }
                }
                return FALSE;
            case 1:
                for($i = 0; $i<$size; $i++)
                {
                    if(is_object($this->getShipGridCellContent($yPos - $i, $xPos)))
                    {
                        return TRUE;
                    }
                }
                return FALSE;
            case 2:
                for($i = 0; $i<$size; $i++)
                {
                    if(is_object($this->getShipGridCellContent($yPos, $xPos - $i)))
                    {
                        return TRUE;
                    }
                }
                return FALSE;
            case 3:
                for($i = 0; $i<$size; $i++)
                {
                    if(is_object($this->getShipGridCellContent($yPos + $i, $xPos)))
                    {
                        return TRUE;
                    }
                }
                return FALSE;
        }
    }

    public function markHitShipGrid($y, $x) : void
    {
        $this->shipGrid[$y][$x] = 0;
    }

    public function markMissShipGrid($y, $x) : void
    {
        $this->shipGrid[$y][$x] = 0;
    }

    /**
     * @return int
     */
    public function getWidth() : int
    {
        return $this->width;
    }

    /**
     * @return int
     */
    public function getHeight() : int
    {
        return $this->height;
    }
}
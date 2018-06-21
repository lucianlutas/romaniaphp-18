<?php
/**
 * Created by PhpStorm.
 * User: Lucian-PC
 * Date: 6/21/2018
 * Time: 2:13 PM
 */

abstract class AbstractShip
{
    private $board;
    private $type;
    private $size;
    private $hitPoints;
    private $status;
    private $pos;

    /**
     * AbstractShip constructor.
     * @param Board $board
     */
    public function __construct(Board $board)
    {
        $this->board = $board;
        $this->status = 1;
    }

    /**
     * @param $yPos
     * @param $xPos
     * @param $orientation
     * @return bool
     */
    public function placeShip($yPos, $xPos, $orientation){
        $this->pos = new Position($yPos, $xPos);
        $ret = TRUE;
        if($this->pos->checkValidPlacementPos($this->board->getWidth(), $this->board->getHeight(), $this->size,$orientation))
        {
            if(!$this->board->checkForCollisions($this->pos->getYPos(), $this->pos->getXPos(), $this->size, $orientation)){
                for($i = 0; $i < $this->size; $i++){
                    switch ($orientation)
                    {
                        case 0: $this->board->markShip($this->pos->getYPos(),$this->pos->getXPos() + $i, $this);
                                $ret &= TRUE;
                                break;
                        case 1: $this->board->markShip($this->pos->getYPos() - $i,$this->pos->getXPos(), $this);
                                $ret &= TRUE;
                                break;
                        case 2: $this->board->markShip($this->pos->getYPos(),$this->pos->getXPos() - $i, $this);
                                $ret &= TRUE;
                                break;
                        case 3: $this->board->markShip($this->pos->getYPos() + $i,$this->pos->getXPos(), $this);
                                $ret &= TRUE;
                                break;
                    }
                }

                return $ret;
            }
        }
        return FALSE;
    }

    public function checkForHit()
    {

    }

    /**
     *  Subtract a hit point
     */
    public function getHit()
    {
        $this->hitPoints --;
    }

    /**
     *  Set ship status to destroyed (0)
     */
    public function getDestroyed()
    {
        $this->status = 0;
    }

    /**
     * @return string
     */
    public function getType() : string
    {
        return ucfirst($this->type);
    }

    /**
     * @return int
     */
    public function getHitPoints() : int
    {
        return $this->hitPoints;
    }
    /**
     * @return int
     */
    public function getStatus() : int
    {
        return $this->status;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @param mixed $size
     */
    public function setSize($size): void
    {
        $this->size = $size;
    }

    /**
     * @param mixed $hitPoints
     */
    public function setHitPoints($hitPoints): void
    {
        $this->hitPoints = $hitPoints;
    }


}
<?php
/**
 * Created by PhpStorm.
 * User: Lucian-PC
 * Date: 6/21/2018
 * Time: 2:03 PM
 */

class Position
{

    private $xPos;
    private $yPos;

    /**
     * Position constructor.
     * @param $xPos
     * @param $yPos
     */
    public function __construct($yPos, $xPos)
    {
        $this->xPos = $xPos;
        $this->yPos = $this->asciiToInt($yPos);
    }

    /**
     * @return mixed
     */
    public function getXPos()
    {
        return $this->xPos;
    }

    /**
     * @return mixed
     */
    public function getYPos()
    {
        return $this->yPos;
    }

    public function checkValidPos($limitX, $limitY)
    {
        if($this->yPos >= 0 && $this->yPos < $limitY)
        {
            if($this->xPos >= 0 && $this->xPos < $limitX)
            {
                return TRUE;
            }
        }
        return FALSE;
    }

    public function checkValidPlacementPos($limitX, $limitY, $size, $orientation)
    {
        switch ($orientation) {
            case 0:
                if ($this->xPos + $size - 1 >= $limitX) {
                    return FALSE;
                }

                for ($i = 0; $i < $size; $i++) {
                    return TRUE;
                }
                return TRUE;
            case 1:
                if ($$this->yPos - $size + 1 < 0) {
                    return FALSE;
                }

                for ($i = 0; $i < $size; $i++) {
                    return TRUE;
                }
                return TRUE;
            case 2:
                if ($$this->xPos - $size + 1 < 0) {
                    return FALSE;
                }

                for ($i = 0; $i < $size; $i++) {
                    return TRUE;
                }
                return TRUE;
            case 3:
                if ($$this->yPos + $size - 1 >= $limitY) {
                    return FALSE;
                }

                for ($i = 0; $i < $size; $i++) {
                    return TRUE;
                }
            }
        return FALSE;
    }

    private function asciiToInt($num)
    {
        return ord(strtolower($num)) - 97;
    }
}
<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class GameLogicTest extends TestCase
{
    public function testCallsShot(): void
    {
        $gameLogic = new GameLogic();

        $board = new Board();
        $ship1 = new Carrier($board);
        $ship2 = new Destroyer($board);

        $this->assertSame(TRUE, $gameLogic->placeShip($ship2, 'B', 5, 0));
        $this->assertSame(FALSE, $gameLogic->placeShip($ship2, 'B', 6, 0));

        $this->assertSame("Hit. Destroyer", $gameLogic->callShot($board, 'B', 5));
        $this->assertSame("Sunk Destroyer", $gameLogic->callShot($board, 'B', 6));
        //$this->assertSame('Hit. Cruiser', $gameLogic->callShot('A', 2));
        //$this->assertSame('Miss', $gameLogic->callShot('A', 5));
    }
}
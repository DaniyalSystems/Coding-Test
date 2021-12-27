<?php
require_once('Results.php');

use PHPUnit\Framework\TestCase;

final class unitTest extends TestCase
{
    private $data;

    public function setUp(): void
    {
        $this->data = new ScoreResult();
    }

    public function TestScore(): void
    {
        $this->assertSame(3, $this->data->getCountOfUsersWithinScoreRange(20, 50));
        $this->assertSame(1, $this->data->getCountOfUsersWithinScoreRange(-40, 0));
        $this->assertSame(4, $this->data->getCountOfUsersWithinScoreRange(0, 80));
    }

    public function TestCondition(): void
    {
        $this->assertSame(1, $this->data->getCountOfUsersByCondition('CA', 'w', false, false));
        $this->assertSame(0, $this->data->getCountOfUsersByCondition('CA', 'w', false, true));
        $this->assertSame(1, $this->data->getCountOfUsersByCondition('CA', 'w', true, true));
    }

}

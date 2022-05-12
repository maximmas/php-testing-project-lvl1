<?php

declare(strict_types=1);

use App\Saver;
use PHPUnit\Framework\TestCase;

final class SaverTest extends TestCase
{

    private Saver $instance;


    public function setUp(): void
    {
      $this->instance = new Saver();
    }

    /**
     * @covers \App\Saver::savePage
     *
     */
    public function testSavePage(): void
    {

        $content = "ABCD123";

        $correctName = 'pages/index.html';
        $wrongName = 'pages123/index.html';

        $this->assertTrue($this->instance->savePage($content, $correctName));
        $this->assertFalse(@$this->instance->savePage($content, $wrongName));

    }

}
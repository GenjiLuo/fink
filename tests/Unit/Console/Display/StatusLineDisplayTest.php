<?php

namespace DTL\Extension\Fink\Tests\Unit\Console\Display;

use DTL\Extension\Fink\Console\Display;
use DTL\Extension\Fink\Console\Display\StatusLineDisplay;
use DTL\Extension\Fink\Model\Status;
use Symfony\Component\Console\Helper\FormatterHelper;

class StatusLineDisplayTest extends DisplayTestCase
{
    public function testRendersStatusLine()
    {
        $display = $this->create();
        $output = $display->render($this->formatter, new Status());

        $this->assertEquals(<<<'EOT'
------------------------------
CON: 0 QUE: 0 NOK: 0/0 (0.00%)
EOT
        , FormatterHelper::removeDecoration($this->formatter, $output));
    }

    private function create(): Display
    {
        return new StatusLineDisplay();
    }
}

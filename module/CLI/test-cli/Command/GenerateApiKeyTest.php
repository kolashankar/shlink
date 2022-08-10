<?php

declare(strict_types=1);

namespace ShlinkioCliTest\Shlink\CLI\Command;

use Shlinkio\Shlink\CLI\Command\Api\GenerateKeyCommand;
use Shlinkio\Shlink\CLI\Util\ExitCodes;
use Shlinkio\Shlink\TestUtils\CliTest\CliTestCase;

class GenerateApiKeyTest extends CliTestCase
{
    /** @test */
    public function outputIsCorrect(): void
    {
        [$output, $exitCode] = $this->exec([GenerateKeyCommand::NAME]);

        self::assertStringContainsString('[OK] Generated API key', $output);
        self::assertEquals(ExitCodes::EXIT_SUCCESS, $exitCode);
    }
}

<?php
/**
 * Copyright © 2017 Maks Rafalko
 *
 * License: https://opensource.org/licenses/BSD-3-Clause New BSD License
 */

declare(strict_types=1);

namespace Infection\Tests\Mutator\ConditionalBoundary;

use Infection\Mutator\ConditionalBoundary\LessThanOrEqualTo;
use Infection\Mutator\Mutator;
use Infection\Tests\Mutator\AbstractMutator;

class LessThanOrEqualToTest extends AbstractMutator
{
    public function test_replaces_greater_sign()
    {
        $code = '<?php 1 <= 2;';
        $mutatedCode = $this->mutate($code);

        $expectedMutatedCode = <<<'CODE'
<?php

1 < 2;
CODE;

        $this->assertSame($expectedMutatedCode, $mutatedCode);
    }

    protected function getMutator(): Mutator
    {
        return new LessThanOrEqualTo();
    }
}
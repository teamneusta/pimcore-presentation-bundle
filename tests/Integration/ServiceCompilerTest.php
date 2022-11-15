<?php declare(strict_types=1);

namespace Neusta\Pimcore\PresentationBundle\Tests\Integration;

use Pimcore\Test\KernelTestCase;

class ServiceCompilerTest extends KernelTestCase
{
    /** @test */
    public function symfonyServiceDefinitionsMustCompile(): void
    {
        // when this test passed, it means that the kernel could be loaded (boostrap.php) and there are no
        // compiling errors in the symfony service definitions.
        $this->expectNotToPerformAssertions();
    }
}

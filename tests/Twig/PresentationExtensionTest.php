<?php declare(strict_types=1);

namespace Neusta\Pimcore\PresentationBundle\Tests\Twig;

use Neusta\Pimcore\PresentationBundle\Twig\PresentationExtension;
use PHPUnit\Framework\TestCase;
use Pimcore\Model\Document;
use Prophecy\PhpUnit\ProphecyTrait;
use Twig\Environment;

class PresentationExtensionTest extends TestCase
{
    use ProphecyTrait;

    /**
     * @test
     */
    public function extensionProvidesFunctionPresentationTheme(): void
    {
        $presentationExtension = $this->createPresentationExtension();
        self::assertCount(1, $presentationExtension->getFunctions());
        self::assertSame('presentation_theme', $presentationExtension->getFunctions()[0]->getName());
    }

    /**
     * @test
     */
    public function getThemeReturnsThemeOfCurrentDocumentIfAvailable(): void
    {
        $presentationExtension = $this->createPresentationExtension();

        $themeEditable = $this->createEditableMock('file name of the expected theme');
        $document = $this->createDocumentWithEditableMock($themeEditable);

        $context = [
            'document' => $document,
        ];
        self::assertSame('file name of the expected theme', $presentationExtension->getThemeFile($context));
    }

    /**
     * @test
     */
    public function getThemeReturnsThemeOfParentDocumentIfAvailable(): void
    {
        $presentationExtension = $this->createPresentationExtension();

        $themeEditable = $this->createEditableMock('theme filename of parent document');
        $parentDocument = $this->createDocumentWithEditableMock($themeEditable);
        $document = $this->createDocumentWithEditableMock(null, $parentDocument);

        $context = [
            'document' => $document,
        ];
        self::assertSame('theme filename of parent document', $presentationExtension->getThemeFile($context));
    }

    private function createDocumentWithEditableMock(?Document\Editable $themeEditable, ?Document\PageSnippet $parent = null): Document\PageSnippet
    {
        $document = $this->prophesize(Document\PageSnippet::class);
        $document
            ->hasEditable('theme')
            ->willReturn(null !== $themeEditable);
        $document
            ->getEditable('theme')
            ->willReturn($themeEditable);

        if (null !== $parent) {
            $document
                ->getParent()
                ->willReturn($parent);
        }

        return $document->reveal();
    }

    private function createEditableMock(string $value): Document\Editable
    {
        $themeEditable = $this->prophesize(Document\Editable::class);
        $themeEditable
            ->getValue()
            ->willReturn($value);

        return $themeEditable->reveal();
    }

    private function createPresentationExtension(): PresentationExtension
    {
        $twig = $this->prophesize(Environment::class);
        $twig->addGlobal('revealJsPublicPath', 'mocked-public-path');

        return new PresentationExtension($twig->reveal(), 'mocked-public-path');
    }
}

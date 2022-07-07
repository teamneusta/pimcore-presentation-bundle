<?php

namespace Neusta\Pimcore\PresentationBundle\Tests\Twig;

use Neusta\Pimcore\PresentationBundle\Twig\PresentationExtension;
use PHPUnit\Framework\TestCase;
use Pimcore\Model\Document;
use Prophecy\PhpUnit\ProphecyTrait;
use Prophecy\Prophecy\ObjectProphecy;
use Twig\Environment;

class PresentationExtensionTest extends TestCase
{
    use ProphecyTrait;

    public function testExtensionProvidesFunctionPresentationTheme(): void
    {
        $presentationExtension = $this->createPresentationExtension();
        self::assertCount(1, $presentationExtension->getFunctions());
        self::assertSame('presentation_theme', $presentationExtension->getFunctions()[0]->getName());
    }

    public function testGetThemeReturnsThemeOfCurrentDocumentIfAvailable(): void
    {
        $presentationExtension = $this->createPresentationExtension();

        $themeEditable = $this->createEditableMock('file name of the expected theme');
        $document = $this->createDocumentWithEditableMock($themeEditable->reveal());

        $context = [
            'document' => $document->reveal(),
        ];
        self::assertSame('file name of the expected theme', $presentationExtension->getThemeFile($context));
    }

    public function testGetThemeReturnsThemeOfParentDocumentIfAvailable(): void
    {
        $presentationExtension = $this->createPresentationExtension();

        $themeEditable = $this->createEditableMock('theme filename of parent document');
        $parentDocument = $this->createDocumentWithEditableMock($themeEditable->reveal());
        $document = $this->createDocumentWithEditableMock(null);
        $document
            ->getParent()
            ->willReturn($parentDocument->reveal());

        $context = [
            'document' => $document->reveal(),
        ];
        self::assertSame('theme filename of parent document', $presentationExtension->getThemeFile($context));
    }

    private function createDocumentWithEditableMock(?Document\Editable $themeEditable): Document\PageSnippet|ObjectProphecy
    {
        $document = $this->prophesize(Document\PageSnippet::class);
        $document
            ->hasEditable('theme')
            ->willReturn(null !== $themeEditable);
        $document
            ->getEditable('theme')
            ->willReturn($themeEditable);

        return $document;
    }

    private function createEditableMock(string $value): ObjectProphecy|Document\Editable
    {
        $themeEditable = $this->prophesize(Document\Editable::class);
        $themeEditable
            ->getValue()
            ->willReturn($value);

        return $themeEditable;
    }

    private function createPresentationExtension(): PresentationExtension
    {
        $twig = $this->prophesize(Environment::class);
        $twig->addGlobal('revealJsPublicPath', 'mocked-public-path');

        return new PresentationExtension($twig->reveal(), 'mocked-public-path');
    }
}

<?php

namespace Neusta\Pimcore\PresentationBundle\Tests\Renderer;

use Neusta\Pimcore\PresentationBundle\Renderer\SimpleSlideRenderer;
use PHPUnit\Framework\TestCase;
use Pimcore\Model\Asset;
use Pimcore\Model\Document\Editable;
use Pimcore\Model\Document\PageSnippet;
use Prophecy\Argument;
use Prophecy\PhpUnit\ProphecyTrait;
use Prophecy\Prophecy\ObjectProphecy;
use Twig\Environment;

class SimpleSlideRendererTest extends TestCase
{
    use ProphecyTrait;

    public function testRenderEmptySlide(): void
    {
        $slide = $this->createSlidePageSnippetMock();
        $this->makeSlideHaveChildren($slide, []);
        $this->makeSlideHaveBackground($slide, '');

        $renderedSlide = $this->createSlideRenderer()->renderSlide($slide->reveal());
        self::assertSlide($renderedSlide);
    }

    public function testRenderSlideWithBackground(): void
    {
        $slide = $this->createSlidePageSnippetMock();
        $this->makeSlideHaveChildren($slide, []);
        $this->makeSlideHaveBackground($slide, '/i-am-the-url/of/an/image.png');

        $renderedSlide = $this->createSlideRenderer()->renderSlide($slide->reveal());
        self::assertSlide(
            $renderedSlide,
            '<section data-background-image="/var/assets/i-am-the-url/of/an/image.png">'
        );
    }

    public function testRenderSlideWithChildren(): void
    {
        $childSlide = $this->createSlidePageSnippetMock();
        $this->makeSlideHaveChildren($childSlide, []);
        $this->makeSlideHaveBackground($childSlide, '');

        $slide = $this->createSlidePageSnippetMock();
        $this->makeSlideHaveChildren($slide, [$childSlide]);
        $this->makeSlideHaveBackground($slide, '');

        self::assertSame(
            '<section>{RENDERED-TEMPLATE:@NeustaPimcorePresentation/Slide/partial.html.twig}<section>{RENDERED-TEMPLATE:@NeustaPimcorePresentation/Slide/partial.html.twig}</section></section>',
            $this->createSlideRenderer()->renderSlide($slide->reveal())
        );
    }

    private function createSlideRenderer(): SimpleSlideRenderer
    {
        $twig = $this->prophesize(Environment::class);
        $twig
            ->render(Argument::any(), Argument::any())
            ->will(function ($args) {
                return sprintf('{RENDERED-TEMPLATE:%s}', $args[0]);
            });

        $twig
            ->getGlobals()
            ->willReturn(['document' => 'original document']);
        $twig
            ->addGlobal('document', Argument::any())
            ->shouldBeCalled();

        return new SimpleSlideRenderer($twig->reveal());
    }

    private function makeSlideHaveChildren(ObjectProphecy|PageSnippet $slide, array $listOfChildren): void
    {
        $slide
            ->getChildren()
            ->willReturn($listOfChildren);
    }

    private function makeSlideHaveBackground(ObjectProphecy|PageSnippet $slide, string $urlOfBackgroundImage): void
    {
        if ('' === $urlOfBackgroundImage) {
            $backgroundImageEditable = null;
        } else {
            $imageAsset = $this->prophesize(Asset\Image::class);
            $imageAsset
                ->getRealFullPath()
                ->willReturn($urlOfBackgroundImage);

            $imageEditable = $this->prophesize(Editable\Image::class);
            $imageEditable
                ->getImage()
                ->willReturn($imageAsset->reveal());

            $backgroundImageEditable = $imageEditable->reveal();
        }

        $slide
            ->getEditable('background-image')
            ->willReturn($backgroundImageEditable);
    }

    private function createSlidePageSnippetMock(): PageSnippet|ObjectProphecy
    {
        $slide = $this->prophesize(PageSnippet::class);
        $slide
            ->getTemplate()
            ->willReturn('@NeustaPimcorePresentation/Slides/Layouts/BE/slide.html.twig');

        return $slide;
    }

    public static function assertSlide(
        string $renderedSlide,
        string $startTag = '<section>',
        string $endTag = '</section>',
        string $renderedTemplate = '{RENDERED-TEMPLATE:@NeustaPimcorePresentation/Slide/partial.html.twig}'
    ): void {
        self::assertStringStartsWith($startTag, $renderedSlide);
        self::assertStringEndsWith($endTag, $renderedSlide);
        self::assertStringContainsString($renderedTemplate, $renderedSlide);
    }
}

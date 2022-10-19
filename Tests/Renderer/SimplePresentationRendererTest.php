<?php declare(strict_types=1);

namespace Neusta\Pimcore\PresentationBundle\Tests\Renderer;

use Neusta\Pimcore\PresentationBundle\Renderer\SimplePresentationRenderer;
use Neusta\Pimcore\PresentationBundle\Renderer\SlideRenderer;
use PHPUnit\Framework\TestCase;
use Pimcore\Model\Document\PageSnippet;
use Prophecy\Argument;
use Prophecy\PhpUnit\ProphecyTrait;
use Prophecy\Prophecy\ObjectProphecy;

class SimplePresentationRendererTest extends TestCase
{
    use ProphecyTrait;

    /**
     * @test
     */
    public function renderPresentationWithoutSlidesRendersNothing(): void
    {
        $presentation = $this->prophesize(PageSnippet::class);
        $presentation
            ->getChildren()
            ->willReturn([]);

        $slideRenderer = $this->prophesize(SlideRenderer::class);
        $slideRenderer
            ->renderSlide(Argument::any())
            ->shouldNotBeCalled();

        $presentationRenderer = new SimplePresentationRenderer($slideRenderer->reveal());
        $renderedPresentation = $presentationRenderer->renderPresentation($presentation->reveal());
        self::assertEmpty($renderedPresentation);
    }

    /**
     * @test
     */
    public function eachSlideOfPresentationIsForwardedToSlideRenderer(): void
    {
        $slide1 = $this->createSlideMock();
        $slide2 = $this->createSlideMock();

        $presentation = $this->prophesize(PageSnippet::class);
        $presentation
            ->getChildren()
            ->willReturn([
                $slide1,
                $slide2,
            ]);

        $slideRenderer = $this->prophesize(SlideRenderer::class);
        $slideRenderer
            ->renderSlide($slide1)
            ->willReturn('slide-1-content')
            ->shouldBeCalledOnce();
        $slideRenderer
            ->renderSlide($slide2)
            ->willReturn('slide-2-content')
            ->shouldBeCalledOnce();

        $presentationRenderer = new SimplePresentationRenderer($slideRenderer->reveal());
        $presentationRenderer->renderPresentation($presentation->reveal());
    }

    private function createSlideMock(): PageSnippet
    {
        return $this->prophesize(PageSnippet::class)->reveal();
    }
}

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

    private SimplePresentationRenderer $presentationRenderer;

    /** @var ObjectProphecy<SlideRenderer> */
    private ObjectProphecy|SlideRenderer $slideRenderer;

    protected function setUp(): void
    {
        $this->slideRenderer = $this->prophesize(SlideRenderer::class);

        $this->presentationRenderer = new SimplePresentationRenderer($this->slideRenderer->reveal());
    }

    /**
     * @test
     */
    public function renderPresentationWithoutSlidesRendersNothing(): void
    {
        $presentation = $this->prophesize(PageSnippet::class);
        $presentation
            ->getChildren()
            ->willReturn([]);

        $renderedPresentation = $this->presentationRenderer->renderPresentation($presentation->reveal());

        self::assertEmpty($renderedPresentation);
        $this->slideRenderer
            ->renderSlide(Argument::any())
            ->shouldNotHaveBeenCalled();
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

        $this->slideRenderer
            ->renderSlide($slide1)
            ->willReturn('slide-1-content');
        $this->slideRenderer
            ->renderSlide($slide2)
            ->willReturn('slide-2-content');

        // act
        $this->presentationRenderer->renderPresentation($presentation->reveal());

        $this->slideRenderer
            ->renderSlide($slide1)
            ->shouldHaveBeenCalledOnce();
        $this->slideRenderer
            ->renderSlide($slide2)
            ->shouldHaveBeenCalledOnce();
    }

    private function createSlideMock(): PageSnippet
    {
        return $this->prophesize(PageSnippet::class)->reveal();
    }
}

<?php


namespace Neusta\Pimcore\PresentationBundle\Document\Areabrick;


use Pimcore\Extension\Document\Areabrick\AbstractAreabrick;

abstract class AbstractTemplateAreabrick extends AbstractAreabrick
{
    /**
     * @inheritDoc
     */
    public function getViewTemplate()
    {
        // return null by default = auto-discover
        return null;
    }

    /**
     * @return string
     */
    public function getTemplateLocation(): string
    {
        // Has to be set to bundle-based location instead of global for bundles
        return static::TEMPLATE_LOCATION_BUNDLE;
    }

    /**
     * @return string
     */
    public function getTemplateSuffix(): string
    {
        return parent::TEMPLATE_SUFFIX_TWIG;
    }

}

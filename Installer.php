<?php
declare(strict_types=1);

namespace Neusta\Pimcore\PresentationBundle;

use Neusta\Pimcore\NotificationBundle\Model\AbstractNotice;
use Pimcore\Extension\Bundle\Installer\AbstractInstaller;
use Pimcore\Model\DataObject\ClassDefinition;
use Pimcore\Model\Document\DocType;
use Pimcore\Model\Document\DocType\Dao;
use Symfony\Component\Finder\Finder;

class Installer extends AbstractInstaller
{
    /**
     * @var Dao
     */
    private $documentTypesDao;

    public function install(): void
    {
        $this->installDocumentTypes();
    }

    public function isInstalled(): bool
    {
        return false;
    }

    public function canBeInstalled(): bool
    {
        return !$this->isInstalled();
    }

    public function needsReloadAfterInstall(): bool
    {
        return true;
    }

    private function installDocumentTypes()
    {
        /** @var DocType $model */
        $model = new DocType();
        $model->setId(1000);
        $model->setName('Slide');
        $model->setGroup('presentation');
        $model->setModule('PresentationBundle');
        $model->setController('@AppBundle\\Controller\\DefaultController');
        $model->setAction('default');
        $model->setTemplate('PresentationBundle:Slides/Layouts/BE:slide.html.twig');
        $model->setType('Page');
        $model->setPriority(0);
        $model->setCreationDate(time());
        $model->setModificationDate(time());
        $model->save();
    }
}

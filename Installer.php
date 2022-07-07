<?php
declare(strict_types=1);

namespace Neusta\Pimcore\PresentationBundle;

use Pimcore\Extension\Bundle\Installer\AbstractInstaller;
use Pimcore\Model\Document\DocType;

class Installer extends AbstractInstaller
{
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

    private function installDocumentTypes(): void
    {
        $typeDefinitions = include __DIR__ . DIRECTORY_SEPARATOR . 'Resources' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR .'document-types.php';
        foreach ($typeDefinitions as $typeDefinition) {
            $this->installDocumentType($typeDefinition);
        }
    }

    private function installDocumentType(array $typeDefinition): void
    {
        $model = new DocType();
        $model->setId($typeDefinition['id']);
        $model->setName($typeDefinition['name']);
        $model->setGroup($typeDefinition['group']);
        $model->setController($typeDefinition['controller']);
        $model->setTemplate($typeDefinition['template']);
        $model->setType($typeDefinition['type']);
        $model->setPriority($typeDefinition['priority']);
        $model->setCreationDate($typeDefinition['creationDate']);
        $model->setModificationDate($typeDefinition['modificationDate']);
        $model->save();
    }
}

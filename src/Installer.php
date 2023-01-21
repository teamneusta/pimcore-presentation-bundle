<?php declare(strict_types=1);

namespace Neusta\Pimcore\PresentationBundle;

use Pimcore\Extension\Bundle\Installer\AbstractInstaller;
use Pimcore\Model\Asset\Image\Thumbnail\Config as ThumbnailConfig;
use Pimcore\Model\Document\DocType;

class Installer extends AbstractInstaller
{
    private const THUMBNAIL_CONFIG_BACKGROUND_IMAGE = 'pimcore-presentation-bundle-background-image';

    public function install(): void
    {
        $this->installDocumentTypes();
        $this->installThumbnailConfiguration();
    }

    public function uninstall(): void
    {
        $this->uninstallDocumentTypes();
        $this->uninstallThumbnailConfiguration();
    }

    public function isInstalled(): bool
    {
        $documentTypeDefinitions = $this->getDocumentTypeDefinitions();
        foreach ($documentTypeDefinitions as $documentTypeDefinition) {
            if (!DocType::getById($documentTypeDefinition['id'])) {
                return false;
            }
        }

        return true;
    }

    public function canBeInstalled(): bool
    {
        return !$this->isInstalled();
    }

    public function canBeUninstalled(): bool
    {
        return $this->isInstalled();
    }

    public function needsReloadAfterInstall(): bool
    {
        return true;
    }

    private function installDocumentTypes(): void
    {
        $documentTypeDefinitions = $this->getDocumentTypeDefinitions();
        foreach ($documentTypeDefinitions as $documentTypeDefinition) {
            $this->installDocumentType($documentTypeDefinition);
        }
    }

    private function uninstallDocumentTypes(): void
    {
        $documentTypeDefinitions = $this->getDocumentTypeDefinitions();
        foreach ($documentTypeDefinitions as $documentTypeDefinition) {
            if ($docType = DocType::getById($documentTypeDefinition['id'])) {
                $docType->delete();
            }
        }
    }

    /**
     * @param array{
     *     'id':string,
     *     'name':string,
     *     'group':string,
     *     'controller':string,
     *     'template':string,
     *     'type':string,
     *     'priority':int,
     *     'creationDate':int,
     *     'modificationDate':int
     * } $documentTypeDefinition
     */
    private function installDocumentType(array $documentTypeDefinition): void
    {
        $model = new DocType();
        $model->setId($documentTypeDefinition['id']);
        $model->setName($documentTypeDefinition['name']);
        $model->setGroup($documentTypeDefinition['group']);
        $model->setController($documentTypeDefinition['controller']);
        $model->setTemplate($documentTypeDefinition['template']);
        $model->setType($documentTypeDefinition['type']);
        $model->setPriority($documentTypeDefinition['priority']);
        $model->setCreationDate($documentTypeDefinition['creationDate']);
        $model->setModificationDate($documentTypeDefinition['modificationDate']);
        $model->save();
    }

    private function installThumbnailConfiguration(): void
    {
        if (ThumbnailConfig::exists(self::THUMBNAIL_CONFIG_BACKGROUND_IMAGE)) {
            return;
        }

        $thumbnailConfig = new ThumbnailConfig();
        $thumbnailConfig->setName(self::THUMBNAIL_CONFIG_BACKGROUND_IMAGE);
        $thumbnailConfig->save();
    }

    private function uninstallThumbnailConfiguration(): void
    {
        if ($thumbnailConfig = ThumbnailConfig::getByName(self::THUMBNAIL_CONFIG_BACKGROUND_IMAGE)) {
            $thumbnailConfig->delete();
        }
    }

    /**
     * @return array<int, array{
     *     'id':string,
     *     'name':string,
     *     'group':string,
     *     'controller':string,
     *     'template':string,
     *     'type':string,
     *     'priority':int,
     *     'creationDate':int,
     *     'modificationDate':int
     * }>
     */
    private function getDocumentTypeDefinitions(): array
    {
        return require dirname(__DIR__) . \DIRECTORY_SEPARATOR .
            'config' . \DIRECTORY_SEPARATOR .
            'document-types.php';
    }
}

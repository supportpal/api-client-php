<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\Factory\Ticket;

use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Factory\Ticket\AttachmentFactory;
use SupportPal\ApiClient\Model\Ticket\Attachment;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\AttachmentData;
use SupportPal\ApiClient\Tests\Integration\Factory\BaseModelFactoryTestCase;

class AttachmentFactoryTest extends BaseModelFactoryTestCase
{
    /**
     * @inheritDoc
     */
    protected function getRequiredFields(): array
    {
        return Attachment::REQUIRED_FIELDS;
    }

    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return AttachmentData::DATA;
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): string
    {
        return Attachment::class;
    }

    /**
     * @inheritDoc
     */
    protected function getModelFactory(): ModelFactory
    {
        /** @var ModelFactory $modelFactory */
        $modelFactory = $this->getContainer()->get(AttachmentFactory::class);

        return $modelFactory;
    }
}

<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Model\SelfService;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Exception\MissingRequiredFieldsException;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\SelfService\Comment;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CommentData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

/**
 * Class CommentTest
 * @package SupportPal\ApiClient\Tests\Unit\Model
 * @covers \SupportPal\ApiClient\Model\SelfService\Comment
 * @covers \SupportPal\ApiClient\Model\BaseModel
 */
class CommentTest extends BaseModelTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new Comment;
    }

    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return CommentData::getDataWithObjects();
    }

    /**
     * @param array<mixed> $data
     * @param string $missingField
     * @dataProvider provideDataWithMissingRequiredFields
     * @throws InvalidArgumentException
     */
    public function testCreateWithMissingData(array $data, string $missingField): void
    {
        $this->expectException(MissingRequiredFieldsException::class);
        $this->expectExceptionMessage($missingField);
        $model = new Comment;
        $model->fill($data);
    }

    /**
     * @return iterable<mixed>
     */
    public function provideDataWithMissingRequiredFields(): iterable
    {
        foreach (Comment::REQUIRED_FIELDS as $requiredField) {
            $dataCopy = $this->getModelData();
            unset($dataCopy[$requiredField]);

            yield [$dataCopy, $requiredField];
        }
    }
}

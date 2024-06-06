<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\ApiCalls;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\ArticleData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\AttachmentData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CategoryData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CommentData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\Request\CreateArticleData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\Request\CreateAttachmentData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\Request\CreateCommentData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\Request\UpdateArticleData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\SettingsData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\TagData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\TypeData;

class SelfServiceApisData
{
    /**
     * @return array[]
     */
    public function getApiCalls(): array
    {
        $articleData = new ArticleData;
        $attachmentData = new AttachmentData;
        $categoryData = new CategoryData;
        $commentData = new CommentData;
        $settingsData = new SettingsData;
        $tagData = new TagData;
        $typeData = new TypeData;

        return [
            'getArticles' => [$articleData->getAllResponse(), [[]]],
            'getArticle' => [$articleData->getResponse(), [1]],
            'getArticlesByTerm' => [$articleData->getAllResponse(), ['search term']],
            'getAttachments' => [$attachmentData->getAllResponse(), [[]]],
            'getAttachment' => [$attachmentData->getResponse(), [1]],
            'getRelatedArticles' => [$articleData->getAllResponse(), [1, 'test', []]],
            'getCategories' => [$categoryData->getAllResponse(), []],
            'getCategory' => [$categoryData->getResponse(), [1]],
            'getComments' => [$commentData->getAllResponse(), []],
            'getComment' => [$commentData->getResponse(), [1]],
            'getSettings' => [$settingsData->getResponse(), []],
            'getTag' => [$tagData->getResponse(), [1]],
            'getTags' => [$tagData->getAllResponse(), [[]]],
            'getTypes' => [$typeData->getAllResponse(), []],
            'getType' => [$typeData->getResponse(), [1]],
        ];
    }

    /**
     * @return array[]
     * @throws InvalidArgumentException
     */
    public function postApiCalls(): array
    {
        $createArticle = new CreateArticleData;
        $createAttachment = new CreateAttachmentData;
        $createComment = new CreateCommentData;

        return [
            'createArticle' => [$createArticle->getFilledInstance(), $createArticle->getResponse()],
            'createAttachment' => [$createAttachment->getFilledInstance(), $createAttachment->getResponse()],
            'createComment' => [$createComment->getFilledInstance(), $createComment->getResponse()],
        ];
    }

    /**
     * @return array[]
     * @throws InvalidArgumentException
     */
    public function putApiCalls(): array
    {
        $updateArticle = new UpdateArticleData;

        return [
            'updateArticle' => [1, $updateArticle->getFilledInstance(), $updateArticle->getResponse()],
        ];
    }

    /**
     * @return array<string, int>
     */
    public function deleteApiCalls(): array
    {
        return [
            'deleteArticle' => 1,
            'deleteAttachment' => 1,
        ];
    }

    /**
     * @return array<string, Model>
     * @throws InvalidArgumentException
     */
    public function downloadApiCalls(): array
    {
        return ['downloadAttachment' => (new AttachmentData)->getFilledInstance()];
    }
}

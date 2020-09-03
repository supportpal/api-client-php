<?php


namespace SupportPal\ApiClient;

use SupportPal\ApiClient\Exception\InvalidModelException;
use SupportPal\ApiClient\Model\Comment;
use SupportPal\ApiClient\Model\CoreSettings;
use SupportPal\ApiClient\Model\Model;
use Symfony\Component\Serializer\SerializerInterface;

class Api
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var ApiClient
     */
    private $apiClient;

    /**
     * @var string
     */
    private $serializationType;

    public function __construct(
        SerializerInterface $serializer,
        ApiClient $apiClient,
        string $serializationType
    ) {
        $this->serializer = $serializer;
        $this->apiClient = $apiClient;
        $this->serializationType = $serializationType;
    }

    /**
     * This method fetches all core settings
     * @throws InvalidModelException
     * @return CoreSettings
     */
    public function getCoreSettings(): CoreSettings
    {
        $response = $this->apiClient->getCoreSettings();
        $body = json_decode($response->getBody(), true)['data'];
        $model = $this->serializer->deserialize(
            json_encode($body),
            CoreSettings::class,
            $this->serializationType
        );

        if (! $model instanceof CoreSettings) {
            throw new InvalidModelException;
        }

        return $model;
    }

    /**
     * This method creates a comment in supportPalSystem
     * @param Comment $comment
     * @return Comment
     *@throws InvalidModelException|Exception\HttpResponseException
     */
    public function postComment(Comment $comment): Comment
    {

        $response = $this->apiClient->postSelfServiceComment(
            $this->serializer->serialize($comment, $this->serializationType)
        );

        $model = $this->serializer->deserialize(
            $response->getBody()->getContents(),
            Comment::class,
            $this->serializationType
        );

        if (! $model instanceof Comment) {
            throw new InvalidModelException;
        }

        return $model;
    }


    /**
     * @param Model $model
     * @param string $type
     * @return Model
     */
    private function assertValidType(Model $model, string $type): Model
    {
        if (! $model instanceof $type) {
            throw new InvalidModelException;
        }

        return $model;
    }
}

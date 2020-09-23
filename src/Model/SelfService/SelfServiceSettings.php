<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Annotation\SerializedName;

class SelfServiceSettings extends BaseModel
{
    /**
     * @var string
     * @SerializedName("comment_captcha")
     */
    private $commentCaptcha;

    /**
     * @var string
     * @SerializedName("comment_moderation")
     */
    private $commentModeration;

    /**
     * @var string
     * @SerializedName("comment_ordering")
     */
    private $commentOrdering;

    /**
     * @var string
     * @SerializedName("comment_ratings")
     */
    private $commentRatings;

    /**
     * @var string
     * @SerializedName("comment_threshold")
     */
    private $commentThreshold;

    /**
     * @var string
     * @SerializedName("comment_write")
     */
    private $commentWrite;

    /**
     * @var string
     * @SerializedName("comments_enabled")
     */
    private $commentsEnabled;

    /**
     * @var string
     * @SerializedName("rating_post")
     */
    private $ratingPost;

    /**
     * @var string
     * @SerializedName("ratings_enabled")
     */
    private $ratingsEnabled;

    /**
     * @return string
     */
    public function getCommentCaptcha(): string
    {
        return $this->commentCaptcha;
    }

    /**
     * @param string $commentCaptcha
     * @return self
     */
    public function setCommentCaptcha(string $commentCaptcha): self
    {
        $this->commentCaptcha = $commentCaptcha;
        return $this;
    }

    /**
     * @return string
     */
    public function getCommentModeration(): string
    {
        return $this->commentModeration;
    }

    /**
     * @param string $commentModeration
     * @return self
     */
    public function setCommentModeration(string $commentModeration): self
    {
        $this->commentModeration = $commentModeration;
        return $this;
    }

    /**
     * @return string
     */
    public function getCommentOrdering(): string
    {
        return $this->commentOrdering;
    }

    /**
     * @param string $commentOrdering
     * @return self
     */
    public function setCommentOrdering(string $commentOrdering): self
    {
        $this->commentOrdering = $commentOrdering;
        return $this;
    }

    /**
     * @return string
     */
    public function getCommentRatings(): string
    {
        return $this->commentRatings;
    }

    /**
     * @param string $commentRatings
     * @return self
     */
    public function setCommentRatings(string $commentRatings): self
    {
        $this->commentRatings = $commentRatings;
        return $this;
    }

    /**
     * @return string
     */
    public function getCommentThreshold(): string
    {
        return $this->commentThreshold;
    }

    /**
     * @param string $commentThreshold
     * @return self
     */
    public function setCommentThreshold(string $commentThreshold): self
    {
        $this->commentThreshold = $commentThreshold;
        return $this;
    }

    /**
     * @return string
     */
    public function getCommentWrite(): string
    {
        return $this->commentWrite;
    }

    /**
     * @param string $commentWrite
     * @return self
     */
    public function setCommentWrite(string $commentWrite): self
    {
        $this->commentWrite = $commentWrite;
        return $this;
    }

    /**
     * @return string
     */
    public function getCommentsEnabled(): string
    {
        return $this->commentsEnabled;
    }

    /**
     * @param string $commentsEnabled
     * @return self
     */
    public function setCommentsEnabled(string $commentsEnabled): self
    {
        $this->commentsEnabled = $commentsEnabled;
        return $this;
    }

    /**
     * @return string
     */
    public function getRatingPost(): string
    {
        return $this->ratingPost;
    }

    /**
     * @param string $ratingPost
     * @return self
     */
    public function setRatingPost(string $ratingPost): self
    {
        $this->ratingPost = $ratingPost;
        return $this;
    }

    /**
     * @return string
     */
    public function getRatingsEnabled(): string
    {
        return $this->ratingsEnabled;
    }

    /**
     * @param string $ratingsEnabled
     * @return self
     */
    public function setRatingsEnabled(string $ratingsEnabled): self
    {
        $this->ratingsEnabled = $ratingsEnabled;
        return $this;
    }
}

<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Extra extends BaseModel
{
    public function __construct(
        /** @var string[]|null */
        #[SerializedName('bcc_address')]
        public readonly array|null $bccAddress,

        /** @var string[]|null */
        #[SerializedName('to_address')]
        public readonly array|null $toAddress,

        /** @var string[]|null */
        #[SerializedName('cc_address')]
        public readonly array|null $ccAddress,

        $pivot = null,
    ) {
        parent::__construct($pivot);
    }
}

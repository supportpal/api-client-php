<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\User;

use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\UserClient;
use SupportPal\ApiClient\Model\Shared\Settings as SettingsModel;

trait Settings
{
    /**
     * @throws HttpResponseException
     */
    public function getSettings(): SettingsModel
    {
        $response = $this->getApiClient()->getSettings();

        return new SettingsModel($this->decodeBody($response)['data']);
    }

    abstract protected function getApiClient(): UserClient;
}

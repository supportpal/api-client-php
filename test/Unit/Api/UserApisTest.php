<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Api;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Model\User;
use SupportPal\ApiClient\Tests\DataFixtures\UserData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

class UserApisTest extends ApiTest
{
    /**
     * @var array<mixed>
     */
    protected $getUsersSuccessfulResponse = UserData::GET_USER_SUCCESSFUL_RESPONSE;

    public function testGetUsers(): void
    {
        $response = $this->prophesize(ResponseInterface::class);
        $formatType = 'json';
        $response
            ->getBody()
            ->willReturn(json_encode($this->getUsersSuccessfulResponse));

        $this->decoder
            ->decode(json_encode($this->getUsersSuccessfulResponse), $formatType)
            ->shouldBeCalled()
            ->willReturn($this->getUsersSuccessfulResponse);

        $returnedUsers = [];
        foreach ($this->getUsersSuccessfulResponse['data'] as $key => $value) {
            $user = $this->prophesize(User::class);
            $this->modelCollectionFactory
                ->create(User::class, $value)
                ->shouldBeCalled()
                ->willReturn($user->reveal());
            array_push($returnedUsers, $user->reveal());
        }

        $this
            ->apiClient
            ->getUsers([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());
        $users = $this->api->getusers([]);
        self::assertSame($returnedUsers, $users);
    }
}

# End to End Tests

The included testcases are part of the release process. The main purpose is simulating the usage of the sdk against
real data. Preferably, an instance with a large database.

## Goals
The main goals of these tests are:
- Ensure that the created object values do exactly match these of the APIs
- The SDK is stable when stress tested against real data
- Part of the release process to check support against updates done to either the SDK itself, or the helpdesk

## How to run

In order to run those tests, you will need an instance of the helpdesk software running on a server.
To setup the SDK, follow this link: https://docs.supportpal.com/current/New+Installation

You also need to install the dependencies of the SDK using composer:
```
composer install
```

Finally, to run the tests:

```
BASE_URL=server:port/api/ TOKEN={token} LIMIT={max number of models to test against} ./vendor/bin/phpunit --testsuite=e2e
```


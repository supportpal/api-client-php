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

Finally, to run the tests, copy & paste the below replacing variables (words wrapped in curly braces):

```
URL={supportpal_full_url} TOKEN={token} LIMIT={max number of models to test against} ./vendor/bin/phpunit --testsuite=e2e
```

\* *`URL` should include the full helpdesk installation URI, including host, scheme, port, and path. i.e https://supportpal.com:443/*

\* *`LIMIT` defaults to `100` models.*

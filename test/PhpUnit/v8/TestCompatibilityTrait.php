<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\PhpUnit\v8;

use Exception;
use PHPUnit_Framework_AssertionFailedError;
use Prophecy\Exception\Prediction\PredictionException;
use Prophecy\Prophecy\ObjectProphecy;
use Prophecy\Prophet;

use function count;

trait TestCompatibilityTrait
{
    /** @var Prophet|null */
    private $prophet;

    private $prophecyAssertionsCounted = false;

    /**
     * @param string|null $classOrInterface
     *
     * @return ObjectProphecy
     */
    protected function prophesize(?string $classOrInterface = null)
    {
        return $this->getProphet()->prophesize($classOrInterface);
    }

    protected function verifyMockObjects()
    {
        parent::verifyMockObjects();

        if ($this->prophet === null) {
            return;
        }

        try {
            $this->prophet->checkPredictions();
        } catch (Exception $e) {
            /** Intentionally left empty */
        }

        $this->countProphecyAssertions();

        if (isset($e)) {
            throw $e;
        }
    }

    protected function tearDown()
    {
        if ($this->prophet !== null && ! $this->prophecyAssertionsCounted) {
            // Some Prophecy assertions may have been done in tests themselves even when a failure happened before checking mock objects.
            $this->countProphecyAssertions();
        }

        $this->prophet = null;
    }

    protected function onNotSuccessfulTest(Exception $e)
    {
        if ($e instanceof PredictionException) {
            $e = new PHPUnit_Framework_AssertionFailedError($e->getMessage(), $e->getCode(), $e);
        }

        return parent::onNotSuccessfulTest($e);
    }

    /**
     * @return Prophet
     */
    private function getProphet()
    {
        if ($this->prophet === null) {
            $this->prophet = new Prophet;
        }

        return $this->prophet;
    }

    private function countProphecyAssertions()
    {
        $this->prophecyAssertionsCounted = true;

        foreach ($this->prophet->getProphecies() as $objectProphecy) {
            foreach ($objectProphecy->getMethodProphecies() as $methodProphecies) {
                foreach ($methodProphecies as $methodProphecy) {
                    $this->addToAssertionCount(count($methodProphecy->getCheckedPredictions()));
                }
            }
        }
    }
}

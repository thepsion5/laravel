<?php

use Mockery as m;
use Illuminate\Support\MessageBag;

class TestCase extends Illuminate\Foundation\Testing\TestCase {

	/**
	 * Creates the application.
	 *
	 * @return \Symfony\Component\HttpKernel\HttpKernelInterface
	 */
	public function createApplication()
	{
		$unitTesting = true;

		$testEnvironment = 'testing';

		return require __DIR__.'/../../bootstrap/start.php';
	}

    public function mockValidator()
    {
        $validationFactory = m::mock('Illuminate\Validation\Factory');
        $this->app->instance('Illuminate\Validation\Factory', $validationFactory);
        return $validationFactory;
    }

    public function mockCandidate(array $attrs = array())
    {
        return m::mock(array('toArray' => $attrs));
    }

    public function getMessageBag(array $messages = array())
    {
        $bag = new MessageBag;

        $bag->merge($messages);
        return $bag;
    }

}

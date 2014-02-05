<?php

use Acme\Core\Spec\StubSpec;

class AbstractSpecTest extends TestCase {

    public function testMessages()
    {
        $stub = new StubSpec;

        $messages = $stub->messages();
        $this->assertInstanceOf('Illuminate\Support\MessageBag', $messages);

        $this->assertCount(0, $messages);

        $stub->stubAddMessage('test', 'test message');

        $this->assertCount(1, $messages);

        $this->assertEquals('test message', $messages->first('test'));

        $stub->stubClearMessages();

        $messages = $stub->messages();

        $this->assertCount(0, $messages);
    }

}
<?php


class ResponseParserTest extends PHPUnit_Framework_TestCase {

    public function tearDown(){
        Mockery::close();
    }


    /** @test */
    function it_returns_a_string_when_string_is_input()
    {

        $mock = Mockery::mock('GuzzleHttp\Message\Response')
            ->shouldReceive('json')
            ->once()
            ->andReturn('this is a string')
            ->getMock();

        $parser = new \Siegerhansma\AcumulusPhp\ResponseParser($mock);

        $this->assertEquals('this is a string', $parser->parse());
    }

    /** @test
     *
     * @expectedException Exception
     */
    function it_throws_an_exception_when_error_from_acumulus()
    {
        $response = array(
            'status' => 2
        );

        $mock = Mockery::mock('GuzzleHttp\Message\Response')
            ->shouldReceive('json')
            ->once()
            ->andReturn($response)
            ->getMock();
        $parser = new \Siegerhansma\AcumulusPhp\ResponseParser($mock);
        $parser->parse();
    }

    /** @test */
    function it_should_pick_the_right_model()
    {
        $response = array(
            'contacts' => array(
                'contact' => array(
                    'contactid' => 'value'
                ),
                'contact' => array(
                    'contactid' => 'another value'
                )
            ),
            'status' => 0
        );
        $mock = Mockery::mock('GuzzleHttp\Message\Response')
            ->shouldReceive('json')
            ->once()
            ->andReturn($response)
            ->getMock();

        $parser = new \Siegerhansma\AcumulusPhp\ResponseParser($mock);
        $parseClass = $parser->parse();

        $this->assertInstanceOf('Siegerhansma\AcumulusPhp\Models\Contact', $parseClass);
    }
}
 
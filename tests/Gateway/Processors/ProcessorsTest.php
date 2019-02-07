<?php
namespace MrPrompt\PayCertify\Tests\Gateway\Processors;

use MrPrompt\PayCertify\Tests\Base\Base;
use MrPrompt\PayCertify\Gateway\Processors\Processors;

/**
 * ProcessorsTest
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class ProcessorsTest extends Base
{
    /** 
     * @test 
     * @covers MrPrompt\PayCertify\Gateway\Base::__construct
     * @covers MrPrompt\PayCertify\Gateway\Processors\Processors::process
     */
    public function process()
    {
        $reporting = new Processors($this->client);

        $result = $reporting->process();
        
        $this->assertArrayHasKey('processors', $result);
    }
}

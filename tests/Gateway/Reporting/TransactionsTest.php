<?php
namespace MrPrompt\PayCertify\Tests\Gateway\Reporting;

use MrPrompt\PayCertify\Tests\Base\Base;
use MrPrompt\PayCertify\Tests\Base\Card;
use MrPrompt\PayCertify\Gateway\Reporting\Transactions;

/**
 * TransactionsTest
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class TransactionsTest extends Base
{
    use Card;
    
    /** 
     * @test 
     * @covers MrPrompt\PayCertify\Gateway\Base::__construct
     * @covers MrPrompt\PayCertify\Gateway\Reporting\Transactions::process
     */
    public function process(array $params = [])
    {
        $reporting = new Transactions($this->client);

        $result = $reporting->process($params);
        
        $this->assertArrayHasKey('transactions', $result);
    }
}

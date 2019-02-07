<?php
namespace MrPrompt\PayCertify\Tests\Gateway\Reporting;

use MrPrompt\PayCertify\Tests\Base\Base;
use MrPrompt\PayCertify\Gateway\Reporting\Transactions;

/**
 * TransactionsTest
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class TransactionsTest extends Base
{
    /** 
     * @test 
     * @covers MrPrompt\PayCertify\Gateway\Base::__construct
     * @covers MrPrompt\PayCertify\Gateway\Reporting\Transactions::process
     */
    public function process()
    {
        $reporting = new Transactions($this->client);

        $result = $reporting->process();
        
        $this->assertArrayHasKey('transactions', $result);
    }

    /** 
     * @test 
     * @covers MrPrompt\PayCertify\Gateway\Base::__construct
     * @covers MrPrompt\PayCertify\Gateway\Reporting\Transactions::process
     */
    public function processWithParameters()
    {
        $reporting = new Transactions($this->client);

        $params = [
            'first_name' => 'John',
            'last_name' => 'Doe',
        ];

        $result = $reporting->process($params);
        
        $this->assertArrayHasKey('transactions', $result);
    }
}

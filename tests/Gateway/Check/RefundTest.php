<?php
namespace MrPrompt\PayCertify\Tests\Gateway\Check;

use MrPrompt\PayCertify\Tests\Base\Base;
use MrPrompt\PayCertify\Gateway\Check\Refund;
use MrPrompt\PayCertify\Gateway\Check\Charging;

/**
 * RefundTest
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class RefundTest extends Base
{
    private function subject()
    {
        $params = [
            'processor_id' => getenv('SDK_PROCESSOR_ID'),
            'amount' => 3.56,
            'merchant_transaction_id' => 1,
            'first_name' => 'FD',
            'last_name' => 'SDK',
            'account_number' => '10000000000000',
            'check_number' => '100000',
            'routing_number' => '061103852',
        ];

        $sale = new Charging($this->client);
        
        return $sale->process($params);
    }

    /** 
     * @test 
     * @covers MrPrompt\PayCertify\Gateway\Base::__construct
     * @covers MrPrompt\PayCertify\Gateway\Check\Refund::process
     */
    public function process()
    {
        $auth = $this->subject();

        $charging = new Refund($this->client);
        $result   = $charging->process(
            $auth['transaction']['id'], 
            [
                'amount' => $auth['transaction']['events'][0]['amount']
            ]
        );
        
        $this->assertArrayHasKey('transaction', $result);
        $this->assertArrayHasKey('events', $result['transaction']);
    }
}

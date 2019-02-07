<?php
namespace MrPrompt\PayCertify\Tests\Gateway\Check;

use MrPrompt\PayCertify\Tests\Base\Base;
use MrPrompt\PayCertify\Gateway\Check\Charging;

/**
 * ChargingTest
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class ChargingTest extends Base
{
    public function validChargesParams()
    {
        return [
            [
                [
                    'processor_id' => getenv('SDK_PROCESSOR_ID'),
                    'amount' => 3.56,
                    'merchant_transaction_id' => 1,
                    'first_name' => 'FD',
                    'last_name' => 'SDK',
                    'account_number' => '10000000000000',
                    'check_number' => '100000',
                    'routing_number' => '061103852',
                ]
            ]
        ];
    }
    
    /** 
     * @test 
     * @dataProvider validChargesParams
     * @covers MrPrompt\PayCertify\Gateway\Base::__construct
     * @covers MrPrompt\PayCertify\Gateway\CreditCard\Charging::process
     */
    public function process(array $params = [])
    {
        $charging = new Charging($this->client);

        $result = $charging->process($params);
        
        $this->assertArrayHasKey('transaction', $result);
        $this->assertArrayHasKey('events', $result['transaction']);
    }
}

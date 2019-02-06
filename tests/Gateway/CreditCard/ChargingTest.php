<?php
namespace MrPrompt\PayCertify\Tests\Gateway\CreditCard;

use MrPrompt\PayCertify\Tests\Base\Base;
use MrPrompt\PayCertify\Tests\Base\Card;
use MrPrompt\PayCertify\Gateway\CreditCard\Charging;

/**
 * ChargingTest
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class ChargingTest extends Base
{
    use Card;

    public function validSaleParams()
    {
        return [
            [
                [
                    'processor_id' => getenv('SDK_PROCESSOR_ID'),
                    'amount' => 3.56,
                    'card_number' => $this->visa()['pan'],
                    'card_expiry_month' => substr($this->visa()['exp'], 0, 2),
                    'card_expiry_year' => substr($this->visa()['exp'], -4, 4),
                    'cad_cvv' => $this->visa()['cvv'],
                    'merchant_transaction_id' => 1,
                    'first_name' => 'FD',
                    'last_name' => 'SDK',
                    'email' => 'support@paycertify.com',
                    'mobile_phone' => '+11231231234',
                    'street_address_1' => '59 N Santa Cruz Avenue',
                    'street_address_2' => 'Suite M',
                    'city' => 'Lost Gatos',
                    'state' => 'CA',
                    'country' => 'US',
                    'zip' => '95030',
                    'shipping_street_address_1' => '59 N Santa Cruz Avenue',
                    'shipping street_address_2' => 'Suite M',
                    'shipping_city' => 'Los Gatos',
                    'shipping_state' => 'CA',
                    'shipping_country' => 'US',
                    'shipping_zip' => '95030',
                    'ip_address' => '127.0.0.1',
                ]
            ]
        ];
    }
    
    /** 
     * @test 
     * @dataProvider validSaleParams
     * @covers MrPrompt\PayCertify\Gateway\Base::__construct
     * @covers MrPrompt\PayCertify\Gateway\CreditCard\Charging::process
     */
    public function process(array $params = [])
    {
        $charging = new Charging($this->client);

        $result = $charging->process($params);
        
        $this->assertArrayHasKey('transaction', $result);
    }
}

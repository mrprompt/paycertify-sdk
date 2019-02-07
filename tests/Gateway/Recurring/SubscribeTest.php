<?php
namespace MrPrompt\PayCertify\Tests\Gateway\Recurring;

use DateTime;
use DateInterval;
use MrPrompt\PayCertify\Tests\Base\Base;
use MrPrompt\PayCertify\Tests\Base\Card;
use MrPrompt\PayCertify\Gateway\Recurring\Subscribe;

/**
 * SubscribeTest
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class SubscribeTest extends Base
{
    use Card;

    public function validSubscriptionParams()
    {
        return [
            [
                [
                    'processor_id' => getenv('SDK_PROCESSOR_ID'),
                    'description' => 'Subscription test',
                    'start_date' => (new DateTime)->format('Y-m-d H:i:s'),
                    'end_date' => ((new DateTime())->add(new DateInterval('P30D')))->format('Y-m-d H:i:s'),
                    'interval' => 'month',
                    'interval_count' => 10,
                    'amount' => 3.56,
                    'trial_amount' => 3.56,
                    'card_number' => $this->visa()['pan'],
                    'card_expiry_month' => substr($this->visa()['exp'], 0, 2),
                    'card_expiry_year' => substr($this->visa()['exp'], -4, 4),
                    'cad_cvv' => $this->visa()['cvv'],
                    'merchant_subscription_id' => 1,
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
                    'status_url' => 'https://google.com/status',
                ]
            ]
        ];
    }
    
    /** 
     * @test 
     * @dataProvider validSubscriptionParams
     * @covers MrPrompt\PayCertify\Gateway\Base::__construct
     * @covers MrPrompt\PayCertify\Gateway\Recurring\Subscribe::process
     */
    public function process(array $params = [])
    {
        $subscription = new Subscribe($this->client);

        $result = $subscription->process($params);
        
        $this->assertArrayHasKey('subscription', $result);
        $this->assertArrayHasKey('id', $result['subscription']);
    }
}

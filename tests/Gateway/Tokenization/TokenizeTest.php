<?php
namespace MrPrompt\PayCertify\Tests\Gateway\Tokenization;

use MrPrompt\PayCertify\Tests\Base\Base;
use MrPrompt\PayCertify\Tests\Base\Card;
use MrPrompt\PayCertify\Gateway\Tokenization\Tokenize;

/**
 * TokenizeTest
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class TokenizeTest extends Base
{
    use Card;

    public function validTokenizeParams()
    {
        return [
            [
                [
                    'card_number' => $this->visa()['pan'],
                    'card_expiry_month' => substr($this->visa()['exp'], 0, 2),
                    'card_expiry_year' => substr($this->visa()['exp'], -4, 4),
                ]
            ]
        ];
    }
    
    /** 
     * @test 
     * @dataProvider validTokenizeParams
     * @covers MrPrompt\PayCertify\Gateway\Base::__construct
     * @covers MrPrompt\PayCertify\Gateway\Tokenization\Tokenize::process
     */
    public function process(array $params = [])
    {
        $tokenize = new Tokenize($this->client);
        $result = $tokenize->process($params);
        
        $this->assertArrayHasKey('card_token', $result);
        $this->assertArrayHasKey('card_token', $result['card_token']);
    }
}

<?php
namespace MrPrompt\PayCertify\Tests\Gateway\Tokenization;

use MrPrompt\PayCertify\Tests\Base\Base;
use MrPrompt\PayCertify\Tests\Base\Card;
use MrPrompt\PayCertify\Gateway\Tokenization\Tokenize;
use MrPrompt\PayCertify\Gateway\Tokenization\Detokenize;

/**
 * DetokenizeTest
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class DetokenizeTest extends Base
{
    use Card;

    private function subject()
    {
        $params = [
            'card_number' => $this->visa()['pan'],
            'card_expiry_month' => substr($this->visa()['exp'], 0, 2),
            'card_expiry_year' => substr($this->visa()['exp'], -4, 4),
        ];

        $tokenize = new Tokenize($this->client);

        return $tokenize->process($params);
    }
    
    /** 
     * @test 
     * @covers MrPrompt\PayCertify\Gateway\Base::__construct
     * @covers MrPrompt\PayCertify\Gateway\Tokenization\Detokenize::process
     */
    public function process(array $params = [])
    {
        $tokenize = $this->subject();
        
        $detokenize = new Detokenize($this->client);
        $result   = $detokenize->process(['token' => $tokenize['card_token']['card_token']]);

        $this->assertArrayHasKey('card_token', $result);
        $this->assertArrayHasKey('card_number', $result['card_token']);
    }
}

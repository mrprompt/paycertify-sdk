<?php
namespace MrPrompt\PayCertify\Gateway\Tokenization;

use MrPrompt\PayCertify\Gateway\Base;

/**
 * TOKENIZE
 * 
 * POST https://gateway-api.paycertify.com/api/tokens/tokenize
 * 
 * This endpoint tokenizes a given credit card number. 
 * You will need to provide the card number you wish to store and 
 * then you will be able to retrieve the card number with the 
 * original number out of the token provided on the response.
 * 
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Tokenize extends Base
{
    const END_POINT = '/api/tokens/tokenize';

    /**
     * @inheritdoc
     */
    public function process(array $params = [])
    {
        return $this->client->post(self::END_POINT, $params);
    }
}
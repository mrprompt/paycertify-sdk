<?php
namespace MrPrompt\PayCertify\Gateway\Tokenization;

use MrPrompt\PayCertify\Gateway\Base;

/**
 * DETOKENIZE
 * 
 * POST https://gateway-api.paycertify.com/api/tokens/detokenize
 * 
 * This endpoint detokenizes a given credit card token. You will 
 * need to provide the token you wish to detokenize and as part 
 * of the response you’ll get the original number previously 
 * stored and it’s expiration month and year.
 * 
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Detokenize extends Base
{
    const END_POINT = '/api/tokens/detokenize';

    /**
     * @inheritdoc
     */
    public function process(array $params = [])
    {
        return $this->client->post(self::END_POINT, $params);
    }
}
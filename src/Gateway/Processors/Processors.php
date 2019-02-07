<?php
namespace MrPrompt\PayCertify\Gateway\Processors;

use MrPrompt\PayCertify\Gateway\Base;

/**
 * LIST ALL PROCESSORS
 * 
 * GET https://gateway-api.paycertify.com/api/processors
 * 
 * This endpoint lists all processors previously entered through the UI. 
 * Pagination is available to navigate through record sets. Pagination 
 * information can be found on meta response field. The pages always 
 * return 50 records at a time. While using reporting capabilities, 
 * make sure to monitor rate limits through X-RateLimit-Limit and 
 * X-RateLimit-Remaining response headers.
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Processors extends Base
{
    const END_POINT = '/api/processors';

    /**
     * @inheritdoc
     */
    public function process()
    {
        return $this->client->get(self::END_POINT);
    }
}
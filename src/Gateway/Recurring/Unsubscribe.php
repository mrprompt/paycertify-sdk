<?php
namespace MrPrompt\PayCertify\Gateway\Recurring;

use MrPrompt\PayCertify\Gateway\Base;

/**
 * CANCEL A SUBSCRIPTION
 * DELETE https://gateway-api.paycertify.com/api/subscriptions/{subscription_id}
 *
 * To cancel a subscription, you should use the Subscription ID response field to 
 * reference the subscription being canceled. This endpoint simply cancels the subscription and stops charging it.
 * 
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Unsubscribe extends Base
{
    const END_POINT = '/api/subscriptions/{subscription_id}';

    /**
     * @inheritdoc
     */
    public function process(string $subscription)
    {
        $url = str_replace('{subscription_id}', $subscription, self::END_POINT);

        return $this->client->delete($url);
    }
}
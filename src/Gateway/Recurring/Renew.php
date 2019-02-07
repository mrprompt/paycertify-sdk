<?php
namespace MrPrompt\PayCertify\Gateway\Recurring;

use MrPrompt\PayCertify\Gateway\Base;

/**
 * RENEW A SUBSCRIPTION
 * PATCH https://gateway-api.paycertify.com/api/subscriptions/{subscription_id}
 *
 * You can renew a subscription by updating its end_date field, you should use 
 * the Subscription ID response field to reference the subscription being renewed.
 * 
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Renew extends Base
{
    const END_POINT = '/api/subscriptions/{subscription_id}';

    /**
     * @inheritdoc
     */
    public function process(string $subscription, array $params = [])
    {
        $url = str_replace('{subscription_id}', $subscription, self::END_POINT);

        return $this->client->patch($url, $params);
    }
}
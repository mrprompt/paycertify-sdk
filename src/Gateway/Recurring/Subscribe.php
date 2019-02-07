<?php
namespace MrPrompt\PayCertify\Gateway\Recurring;

use MrPrompt\PayCertify\Gateway\Base;

/**
 * CREATE A SUBSCRIPTION
 * 
 * POST https://gateway-api.paycertify.com/api/subscriptions
 *
 * To create a subscription, you should define when and how much to charge your customer. 
 * To start billing, simply create a subscription and then the Gateway will handle the entire 
 * billing flow for you. The charging period should be defined by the interval and interval_count 
 * fields. Being interval the period of time to calculate the next charge and interval_count 
 * being the interval number that we should wait until the next charge. For example:
 * 
 * - Charging every month: interval = month and interval_count = 1;
 * - Charging every 3 weeks: interval = week and interval_count = 3.
 * 
 * Subscriptions should also receive the start_date and end_date fields, which means the start 
 * and end date of the subscription, respectively. The first charge will always occur on the 
 * start_date. The next payment cycles will be automatically calculated by the Gateway. The whole 
 * period until start_date will be considered as trial and you can charge your customer for this 
 * period filling the trial_amount field.
 * 
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Subscribe extends Base
{
    const END_POINT = '/api/subscriptions';

    /**
     * @inheritdoc
     */
    public function process(array $params = [])
    {
        return $this->client->post(self::END_POINT, $params);
    }
}
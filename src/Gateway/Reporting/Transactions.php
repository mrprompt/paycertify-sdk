<?php
namespace MrPrompt\PayCertify\Gateway\Reporting;

use MrPrompt\PayCertify\Gateway\Base;

/**
 * LIST ALL TRANSACTIONS
 * 
 * GET https://gateway-api.paycertify.com/api/transactions
 * 
 * In order to list all the transactions that have been sent through the gateway, 
 * you can use this endpoint. Please note that for every new event that is sent 
 * under the same transaction, the transaction’s updated_at field is updated.
 * 
 * Filtering is enabled to this endpoint through query parameter search. So whenever 
 * searching for a field, make sure to submit it through the endpoint’s query parameters, 
 * for example: https://gateway-api.paycertify.com/api/transactions?search[first_name]=John&search[last_name]=Doe. 
 * 
 * Filter types are described below:
 * 
 * - starts with which matches for records on a SQL LIKE fashion, e.g.: a string “PayC” will match “PayCertify”;
 * - exact comparison which matches for records through exact comparison, case sensitive, e.g.: a string “Paycertify” will NOT match “PayCertify”;
 * - date which matches for records through SQL date, and these fields should be provided on Y-m-d H:i:s format, e.g.: 2025-01-01 17:59:00
 *
 *  Also, this endpoint provides pagination to navigate through record sets. Pagination information 
 * can be found on meta response field. The pages always return 50 records at a time. While using 
 * reporting capabilities, make sure to monitor rate limits through X-RateLimit-Limit and X-RateLimit-Remaining 
 * response headers.
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Transactions extends Base
{
    const END_POINT = '/api/transactions';

    /**
     * @inheritdoc
     */
    public function process(array $params = [])
    {
        $query = "";

        foreach ($params as $param) {
            $query['']
        }

        return $this->client->get(self::END_POINT);
    }
}
# PayCertify - SDK

![Logo](https://paycertify.github.io/help-center/assets/imgs/logo.png)

A [SDK](https://en.wikipedia.org/wiki/Software_development_kit) to 
consume [PayCertify](https://www.paycertify.com).

You can see API Documentation [here](https://paycertify.github.io/help-center/).

To use the gateway APIs you will need an API Token, which can be requested to 
support or navigating on your gateway account to Users > Details > Api Token.

## Install

```console
composer require mrprompt/paycertify-sdk
```

## Components

- [x] CreditCard
    - [x] Sale
    - [x] Authorization
    - [x] Capture
    - [x] Void
    - [x] Refund
- [x] Recurring
    - [x] Create
    - [x] Cancel
    - [x] Renew
    - [x] Charge
- [x] Check
    - [x] Charge
    - [x] Refund
- [x] Reporting
    - [x] Transactions
- [x] Processors
    - [x] List
- [x] Tokenization
    - [x] Tokenize
    - [x] Detokenize

## Testing

You need export enviroment variables:

- SDK_ENV="local"
- SDK_TOKEN=""
- SDK_PROCESSOR_ID=""

## License

MIT

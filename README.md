Gocardless Enterprise Bundle
============================

Integration of the Gocardless enterprise library into Symfony2.

You will need to create a parameter called gocardless_enterprise with your gocardless configuration:
```
gocardless_enterprise:
    baseUrl: 'https://api.gocardless.com/'
    gocardlessVersion: '2015-04-29'
    webhook_secret: XXXXXXXXXXXXXXXXXXXXXX
    creditorId: XXXXXXXXXXXXXX
    token: XXXXXXXXXXXXXXXXXXXXXXXXXXX
```

You will then have a service available to you called gocardless_enterprise.client with methods for interacting with all API endpoints.
This service includes a method for validating the signature of any webhooks received from GoCardless (assuming you configured the webhook_secret properly).

The following Models will be mapped to your Database automatically:
Customer
CustomerBankAccount
Mandate
Payment
invoicer
========

Implement using Command Form and Handler the following business logic:


### Payment

When we receive a paypal payment we receive the email of the sender (From) and the email of the receiver (To) as well as the amount of money transfered in GBP.

Once we receive a payment we want to inform the sender and the receiver automatically. Sending the invoice number and the amount paid to both of them.

Input:
 - From (Email)
 - To (Email)
 - Amount (Money)

Business requirements:
 - Create a payment
 - Process payment
 - Create invoice
 - Send Email to From with the payment details and invoice ID and current amount in the account
 - Send Email to To with the payment details and invoice ID
 - Save

Controller response:
 - Invoice ID
 - Funds in the account

This is a testing exercise so you can complicate it as much as you want.

I will review:

 - Using Command (Desired action)
 - Form (Action Validation)
 - Handler (Action processing)
 - Exceptions
 
### Bonus

You can integrate the current command with the simple bus command. We will add it to our core bundles this year.
 
 -  https://packagist.org/packages/simple-bus/message-bus

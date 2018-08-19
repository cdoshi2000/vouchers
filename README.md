# vouchers
Managing vouchers

## Installation
 * Git checkout
 * composer install
 * create a database with the name voucher
 * php artisan migrate
 * php artisan db:seed


## End points and usage
Example
### Generate vouchers

```
/generate?offerName=megaOffer&expiryDate=2018-05-15
```

### Check valid vouchers
Example
```
/valid?email=janedoe@example.com
```

### Redeem vouchers 
Example
````
/redeem?email=johndoe@example.com&code=Vrv9XDNp
````

# vouchers
Managing vouchers

## Installattions
Git checkout
composer install
create a database with the name voucher
php artisan migrate
php artisan db:seed


## End points and usage

### Generate vouchers

/generate?offerName=megaOffer&discount=10&expiryDate=2018-05-15

### Check valid vouchers

/valid?email=janedoe@example.com

### Redeem vouchers 

/redeem?email=johndoe@example.com&code=Vrv9XDNp

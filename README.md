# Hypnobox Developer Test

## How to run

Clone this project 

```
git clone https://github.com/daavelar/hypnobox-developer-test
```

Run composer install

```
composer install
```

Then run the docker container
```
docker run -d -p 80:8000 -v ${PWD}:/var/www/html --name hypnobox_teste php:7.2-apache
```

The docker container will be created and the 
application will be available on http://localhost




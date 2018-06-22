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
docker run php:7.2-cli -d -p 80:80 -v $PWD:/var/www/html --name hypnobox_teste
```

The docker container will be created and the 
application will be available on http://localhost




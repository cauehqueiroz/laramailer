# laramailer
A simple Contact page built with Laravel <3,

# Running

The code is ready to run in a docker conteiner, on the fly! 😃

1- Clone (or extract) this repository somewhere.
2- Open up a termina in the cloned/extracted folder.
3- Update the dependencies with composer, run this command (if you have composer installed): 
`$ composer install`

(from here on it is optional, do it only if you want to use the docker conteiner to run)

Note: If you are going to run this on the docker container please change the database host to: `DB_HOST=database` remember to change **AFTER** running the previous command (if your PHP is on your ENV PATH),

4- Run the following in your terminal (if you have docker installed):
`$ docker-compose up --build`

If no errors are shown in your terminal, and when the **webserver** and the **database** are running open a page at `htpp:localhost:8080`.


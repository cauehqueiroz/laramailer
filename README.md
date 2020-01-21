
# laramailer

A simple Contact page built with Laravel <3,

  

# Running

  

The code is ready to run in a docker container, on the fly! 😃

  

1- Clone (or extract) this repository somewhere.

  

2- Open up a terminal in the cloned/extracted folder.

  

3- Update the dependencies with composer, run this command (if you have composer installed):

`$ composer install`

  

4- Migrate the database using laravel artisan (with the proper URL to the database in the `.env` file):

`php artisan migrate`

  

(from here on it is optional, do it only if you want to use the docker container to run)

  

Note: If you are going to run this on the docker container please change the database host to: `DB_HOST=database` remember to change **AFTER** running the previous command (if your PHP is on your ENV PATH),

  

4- Run the following in your terminal (if you have docker installed):

`$ docker-compose up --build`

  

If no errors are shown in your terminal, and when the **webserver** and the **database** are running open a page at `http:\\localhost:8080`.

  

# E-mail config

  

You'll have to configure the mail enviroments variable according to your needs.
Use the `CONTACT_EMAIL` to define the target of the messages sent by your form.

Hint: You can use MailTrap to just check your functionality.

  

    CONTACT_EMAIL=mail-to-receive@from.contact.com
    MAIL_DRIVER=smtp
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=null
    MAIL_PASSWORD=null
    MAIL_ENCRYPTION=null

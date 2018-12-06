# BabCasa
Web platform for the purpese of finding and reserving products and other related services
<a href="http://www.babcasa.com">http://www.babcasa.com</a> 

# How to deploy for developpers 

1 - install <a href="https://getcomposer.org/">composer</a> <br>
2 - Execute the next commandes 

```sh
cd ./BabCasa
composer update
cp .env.example .env
php artisan key:generate
```

3 - create a vhost in your local server for the domaine 

```sh
babcasa.com
www.babcasa.com
```

4 - if you can't find the public storage execute the next commandes

```sh
cd ./BabCasa
php artisan storage:link
```
5 - variables in .env file
```sh
MAIL_USERNAME=6954d680c54c19
MAIL_PASSWORD=dee27c742a9439
```
```sh
LOG_SLACK_WEBHOOK_URL=https://hooks.slack.com/services/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
```

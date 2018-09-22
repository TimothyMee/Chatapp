## Instruction
* update .env file with the right pusher keys and also change broadcast driver from log to "pusher" around line 16 of env 
* Then do "composer require pusher/pusher-php-server"
* Uncomment the "App\Providers\BroadcastServiceProvider::class" from config/app.php
* Now make an event. I made "ChatEvent" event
* Now npm install pusher and laravel echo for your vue "npm install --save laravel-echo pusher-js
"
* Now configure laravel echo to use pusher in bootstrap.js
* Now make your laravel authentication, configure your DB and run migrate
* Make message model and migration table
* Make Chat Controller and routes to get all message, and send message.
* Make Vue "chat.vue"
* in Chat Controller, broadcast the chat event once a message is sent (i.e in function sendMessage)
* also in routes/channels.php add the snippet of code to allow the authenticated User listen on that channel
* Listen to the event fired in Chat.vue and display that's all.

> Oh and also don't forget to add meta tag for CSRF in the php file housing the chat component. mine is in "chat/index.blade.php"

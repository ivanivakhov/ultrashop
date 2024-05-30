## Creating logger in telegram
[laravel doc](https://laravel.com/docs/9.x/logging#creating-custom-channels-via-factories)


1. to create telegram bot see `BotFather` bot and create new one. Get and save token from it
2. Create group so the bot can push message to it. Add bot to the group
3. hit `api.telegram.org/bot<token>/getUpdates`. Get chat id from here

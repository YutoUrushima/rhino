# Rhino

Rhino is a Headless CMS Written in PHP.

## How to use

1. You have to register as a user with your E-mail address and password.
2. On the `/user` page, Press the "Add Article" button and register your article by filling in the title and content.
3. On the `/user` page, press the "Generate apikey" button under the "API Key" heading to issue an API Key.
4. To retrieve an article, set your API Key to `X-Rhino-Apikey` and send a `GET` request.

## Example of how to send a request

You can get all your articles in JSON format.

```sh
$ curl http://urushi.me/api/get_article -H 'X-Rhino-Apikey: {YOUR_APIKEY}'
```

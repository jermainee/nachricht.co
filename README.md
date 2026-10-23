<h1 align="center">Nachricht.co</h1>
<p align="center">
  The encrypted one-time message
  <br/><br/>
  We believe that everyone has the right to communicate privately.<br/>
  That's why we provide <a href="https://nachricht.co">nachricht.co</a>, a tool that allows you to send
  self-destructing messages over the internet.
</p>
<p align="center">
  <a href="https://github.com/jermainee/nachricht.co/actions/workflows/tests.yml">
    <img src="https://github.com/jermainee/nachricht.co/actions/workflows/tests.yml/badge.svg?branch=main" alt="Tests">
  </a>
</p>

## How it works

1. You write a message and optionally protect it with a password, pick a lifetime and decide whether it should
   be destroyed as soon as it has been read.
2. The server encrypts the message with AES-256 using a freshly generated key and IV. Only the ciphertext and
   the IV are stored; the key never touches the database.
3. You get back a link of the form `https://nachricht.co/<uid>_<key>`, which carries the decryption key. Anyone
   who has the link can read the message once, so the link is the secret worth protecting.
4. Opening the link starts a five-minute window in which the message may be revealed. After it is read, or once
   its lifetime expires, the stored ciphertext, IV and password hash are wiped.

## Available languages

* [German](https://nachricht.co/lang/de)
* [English](https://nachricht.co/lang/en)
* [Dutch](https://nachricht.co/lang/nl)
* [Russian](https://nachricht.co/lang/ru)

The language is taken from the session, falling back to the `Accept-Language` header and then to German.

## Tech stack

* [Laravel](https://github.com/laravel/laravel) 13 on PHP 8.5, with Blade views and no frontend framework
* [Bulma](https://github.com/jgthms/bulma) 1.0 and [bulma-switch](https://github.com/Wikiki/bulma-switch),
  compiled with [Dart Sass](https://sass-lang.com)
* MySQL in production, SQLite for tests
* PHPUnit for unit and feature tests, Playwright for browser tests

## Development

Requires PHP 8.5 with `pdo_sqlite`, Composer and Node.js 24.

```bash
composer install
npm ci && npm run build
cp .env.example .env && php artisan key:generate
php artisan serve
```

`npm run build` compiles `resources/scss/app.scss` to `public/css/app.css` minified. Use `npm run watch` while
working on styles, or `npm run scss` for a single unminified build.

### Tests

```bash
vendor/bin/phpunit                       # unit and feature tests
npx playwright install chromium          # once
npm run test:e2e                         # browser tests, starts `php artisan serve`
```

The browser tests need a migrated database for the app, e.g. `DB_CONNECTION=sqlite` with `php artisan migrate`.
Both suites run on every push to `main` and on every pull request; see
[.github/workflows/tests.yml](.github/workflows/tests.yml).

## API

The API exists for the site's own frontend. CORS is disabled and requests are throttled to 60 per minute.

```
POST /api/message/create.json
```

| Field             | Description                                                      |
| ----------------- | ---------------------------------------------------------------- |
| `message`         | The plaintext to encrypt                                         |
| `password`        | Optional password, stored as a hash                              |
| `deletion`        | Lifetime in hours, defaults to 48                                |
| `deleteAfterRead` | Destroy the message once it has been read                        |

The response contains the message link plus ready-made WhatsApp and Telegram share URLs.

## Housekeeping

Expired messages are wiped by an Artisan command, meant to be run from cron:

```bash
php artisan message:delete
```

It relies on MySQL date functions, so it needs the production database rather than the SQLite setup used by the
tests.

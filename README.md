<h1 align="center">Nachricht.co</h1>
<p align="center">
  The encrypted one-time message
  <br/><br/>
  We believe that everyone has the right to communicate privately.<br/>
  That's why we provide https://nachricht.co, a tool that allows you to send self-destructing messages over the internet.
</p>


## Available languages
* [german](https://nachricht.co/lang/de)
* [english](https://nachricht.co/lang/en)
* [dutch](https://nachricht.co/lang/nl)
* [russian](https://nachricht.co/lang/ru)

## Mainly used packages:
 * [laravel/laravel](https://github.com/laravel/laravel)
 * [jgthms/bulma](https://github.com/jgthms/bulma)

## Development
Requires PHP 8.5, Composer and Node.js.

```bash
composer install
npm ci && npm run build
cp .env.example .env && php artisan key:generate
```

### Tests
```bash
vendor/bin/phpunit                       # unit and feature tests
npx playwright install chromium          # once
npm run test:e2e                         # browser tests, starts `php artisan serve`
```

The browser tests need a migrated database for the app, e.g. `DB_CONNECTION=sqlite` with `php artisan migrate`.

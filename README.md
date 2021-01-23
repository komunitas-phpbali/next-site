# PHPBali Next Site

Next generation of PHPBali site.

## Tech Stack

- Laravel 8.x
- Laravel Socialite for GitHub OAuth
- Laravel Livewire
- Tailwindcss 2.x

## Software requirements

- PHP version >= 7.3
- NodeJS version >= 12.x

## How to run

1. Clone repository
2. Go to repository directory and run `composer install`
3. Run `cp .env.example .env` and `php artisan key:generate`
4. Create database `phpbali_next_site` in your localhost then run `php artisan migrate:fresh --seed` for mock data
5. Run `npm run watch-poll`
6. Run `php artisan serve`
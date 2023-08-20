## Learning

migrations commands:

- php artisan make:migration create_listings_table
  (Look at database migrations)
- php artisan migrate

seeders:

- php artisan db:seed
- php artisan migrate:refresh (Basically deletes the fake seeded data)
- php artisan migrate:refresh --seed

models:

- php artisan make:model Listing

factory:

- php artisan make:factory ListingFactory

controllers:

- php artisan make:controller ListingController

other commandes:(Necessary)

- php artisan view:clear

- php artisan cache:clear

vendor:

- php artisan vendor:publish

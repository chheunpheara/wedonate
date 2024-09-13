# We Donate
This is a minimal project to help generous people to raise fund while the donators can also track their own funds to which projects they are linked to.

# Installation Prerequisites
`Docker: ^20.10`
`Docker-compose: ^2.23`

# Installation
1. `docker-compose up --build`
2. `docker exec -it wedonateapp composer install` # In case that the composer does not work
3. `docker exec -it wedonateapp php artisan key:generate && php artisan migrate`
4. `npm run dev` to bundle css/js

The application will be hosted at http://localhost:8000

![Screenshot](./screenshot.png)

#Todo
- Payment integration
- Real-time update donators once payment is made
- Share program single view (SEO included)
- Help Center page
- Improve template and layout
- Localization
- Donation analytic to each program
- Donator can manage his/her donation transaction event
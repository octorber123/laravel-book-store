# Aston book store
- Website Link: https://larabookstore.herokuapp.com/
- Admin username: astonadmin@aston.com pass: astonadmin
- User username: astonuser@aston.com pass: astonuser

I have used the Laravel framework to create this book store, web application, I have used CSS and bootstap styling to keep the website clean and simple to use. This web store allows registered users to place orders for books.


## Structure of system:
This book store can be visited by 3 types of users, unregistered, registered and staff users. Using Authentication gates, low cleareance users cannot visit high clearance views. for exmple an unregistered user will be redirected if try to access an admin view.

## Functionality:

### Unregistered users can…
- can register as customer
- can see book list with title, category, price.
- Can see details of a book with extra information like book cover , stock available and publish year

### Registered Users…
- Can Log in or out
- can view list of books with basic details
- can view details of specific book by clicking on details button on the items list.
- Can check the cart
- Can add books to cart through book list
- Can delete a book from cart
- Can update the quantity of a book in cart
- Can place an order for a book

### Staff users can…
- Log in or out
- Can increase stock quantity of a book
- Can View order and their details
- Can Complete orders

## Other functional features:
- Sensible names for URL
- Simple and neat webpages
- Adequate error reporting
- good site navigation - Pages have links to related pages and home page 

## Security features
- Authentication is used to divert users to their relevant views, so a public user cannot access
staff views
- Passwords are Hashed on the database
- All inputted requests have been validated and some fields guarded from mass injection
- Restricted file upload to only images with restricted size
- Clever stock system, all input is restricted to prevent inserting a value above stock level
When a book is added to cart while same book already exists in cart, the quantity is
increased, and a repeated listing is not added.
In the cart a user can override the stock level.
- A Mix of query builder and eloquent model methods are used to carry out CRUD functions.
Query builder was used since loading times are more than 50% faster then eloquent
methods
See:
- Controller methods use gates to authenticate the user and direct them to the correct view,
this prevents normal users from accessing admin pages by inputting the URL of the page.
See: (all controller methods that direct to a view use gates)

## Database structure
*Disclaimer*
I understand that a pivot table called (book_user) should have been used to store items in
the cart instead of the orders table(see below), however I learnt this later, and due to
shortness of time I continued to use the orders table to store cart items. To distinguish
between orders and cart items I implemented a status field, when it is 0 that row is an item
of the cart when it is 1 then that row is considered an order.
order table (many to many relationship):
book_id is foreign key references id in the book table
customer_id is foreign key references the id in user id


(database picture coming soon) 
















<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- [UserInsights](https://userinsights.com)
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)
- [iMi digital](https://www.imi-digital.de/)
- [Earthlink](https://www.earthlink.ro/)
- [Steadfast Collective](https://steadfastcollective.com/)
- [We Are The Robots Inc.](https://watr.mx/)
- [Understand.io](https://www.understand.io/)
- [Abdel Elrafa](https://abdelelrafa.com)
- [Hyper Host](https://hyper.host)
- [Appoly](https://www.appoly.co.uk)
- [OP.GG](https://op.gg)
- [云软科技](http://www.yunruan.ltd/)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

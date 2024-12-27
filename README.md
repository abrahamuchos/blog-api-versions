# Blog API Versions

Blog API is a testing project or guide for route versioning in Laravel 9. Its goal is not to be a complete Blog system 
but a small blog that can have versioning in its API.

## ✅ Features

- Login users
- Show all posts
- Show post by id
- Soft delete post
- Hard delete post

## ⚙️ Tech Stack

- Laravel 9.19
- Laravel Sanctum 3
- Postgre 14


## 💾 Installation

Install and run

1. Clone and move to folder
```bash
$ git clone git@github.com:abrahamuchos/blog-api-versions.git
$ cd blog-api-versions
```

2. Install dependencies
```bash
$  composer install
```

3. Create a copy of the `.env.example` file and rename it to `.env`. Next, configure the necessary environment variables.

4. Generate an application key by running `php artisan key:generate`.

5. Run `php artisan migrate` to create the database tables.

6. Run `php artisandb:seed` to create dummy data and admin user.

7. Run `php artisan serve` to start the Laravel development server.


### User to test

**mail**: abraham@mail.com
<br/>
**password**: password


## 📊Environment Variables

To run this project, you will need to add the following environment variables to your .env file

```
DB_HOST
DB_PORT
DB_DATABASE
DB_USERNAME
DB_PASSWORD
```

## 📄Docs

[Documentation Blog API - Postman](https://documenter.getpostman.com/view/6168326/2sAYJ6CKts)

You can find a .json with the endpoints in `/docs/Laravel 9 - API Blog.postman_collection.json`

## 🧑‍💻 Authors

- [@abrahamuchos](https://github.com/abrahamuchos)
- [Contact mail](mailto:j.abraham29@gmail.com)



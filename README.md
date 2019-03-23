# Volunteer Registration and Management

PHP app developed for Banco Alimentar de Setúbal

Main features:

- Registering and displaying volunteers
- Generating proof of participation PDF documents

### Development

Edit `src/resources/config.php` with your database info.

Run the MySQL database script `db/scripts/DEV_create_schema_voluntarios` to create the schema and all the necessary tables.

Install the dependencies (gulp, gulp-sass, browser-sync)

```sh
$ npm install
```

I use browser-sync configured with a proxy to wrap my local MAMP.
If your configuration differs, edit gulp's proxy entry.
Run gulp's 'dev' task to build and run a browser-sync instance to serve the app.

```sh
$ gulp dev
```

### Production

Create a `dist` folder ready to be deployed in production

```sh
$ gulp build
```

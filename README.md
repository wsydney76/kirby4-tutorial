# Kirby 4 - Tutorial

This is port of our [Craft 4 Tutorial](https://github.com/wsydney76/craft4-tutorial) for Kirby CMS.

More of a proof of concept/learning resource than best practice, so some rough edges for now.

Trying to make it easier for devs to switch between Craft and Kirby.

* Using Twig as templating language
* Using proven template conventions whenever possible
* Adding a couple of familiar twig variables/filters
* Using Laravel Collections
* Reorganized directory structure
* Find custom config and translations in familiar places
* Autocomplete in PhpStorm, including field names (needs manual config, so may be worth it or not...)

## Installation

A user with credentials `admin@example.com`/`admin` is created during installation.

### DDEV

* Clone repository
* `cd` into project directory
* Run `bash setup/install <projectname>`

### Manual Installation

Untested...

* Clone repository
* `cd` into project directory
* Set up a webserver pointing to the `web` directory
* Run `composer install`
* Run `cp .env.example .env`
* Run `npm install && npm run build`

## Screenshots

### Frontend

![Screenshot home page](/screenshot-home.jpg)

![Screenshot post index page](/screenshot-posts.jpg)

### Backend

![Screenshot Dashboard](/screenshot-dashboard.jpg)

![Screenshot Posts](/screenshot-posts-backend.jpg)

![Screenshot Post](/screenshot-post-backend.jpg)

![Screenshot Post](/screenshot-post2-backend.jpg)


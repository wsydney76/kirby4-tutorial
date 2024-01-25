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
* Demo field types that have no direct equivalent in Craft core (Object, Structure, Layout).
* Make use of .env file for configuration

## Installation

A user with credentials `admin@example.com`/`admin` is created during installation.

Goto the panel at `/panel`.

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

## Environment Variables

Just one in `.env` for now:

`ENVIRONMENT=dev` 

* enables debugging and disables twig template caching. A bit slower.


`ENVIRONMENT=production` 

* disables debugging and enables twig template caching. Faster, but you have to clear the `storage/cache/twig` folder after each update of twig templates.

## Screenshots

### Frontend

![Screenshot home page](/screenshot-home.jpg)

![Screenshot post index page](/screenshot-posts.jpg)

### Backend

![Screenshot Dashboard](/screenshot-dashboard.jpg)
![Screenshot Dashboard](/screenshot-dashboard2.jpg)

![Screenshot Posts](/screenshot-posts-backend.jpg)

![Screenshot Post](/screenshot-post-backend.jpg)

![Screenshot Post](/screenshot-post2-backend.jpg)

![Screenshot Layout field](/screenshot-layout.jpg)

## TODOS

A lot.

For now, this does not handle responsive images. Needs more in-depth knowledge of Kirby's image handling, so skipped this for now instead of doing it wrong.

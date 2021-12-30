# Upfeat Php Laravel Vue Test

## Setup

- Will need to have [docker](https://docs.docker.com/get-docker/) installed
    - Should be somewhat comfortable using basic docker features
- Run `docker compose up` in a shell / terminal to start all services
- Run `docker compose exec backend bash setup.sh` to install backend dependencies
    - Should only need to run this once the first time
- Frontend should be accessible at [http://localhost:8888](http://localhost:8888)
- Backend should be accessible at [http://localhost:8080](http://localhost:8080)
- Project has been tested and working on MacOS Big Sur - if there are any problems with setup please let us know

## The Test

After graduating from school, you want to sell some of your used books. You will be creating a simple listing site for
your books. The website should have a page to list the books; a page to see details of a book; and include the ability
to add/remove/edit books.

The application does not need to be overly complicated or include things like users or authentication. A simple table
with seeded values will suffice. You are welcome to add any features that would help showcase your skills and experience
with the related technologies. We are mainly interested in seeing a working application and rating code quality as well
as design/architecture choices. The test should ideally not take more than a couple of hours, and we don't intend to
consume a lot of your time.

You are not restricted to only using the examples or tools provided and are free to use any open source packages or
libraries if it suits your needs.

## Submission

In your submission, please include documentation (in a separate readme) on instructions for setup, migrations, notes,
etc, relevant to getting the app running. Also include design choices or any other information that would help us better
understand what you've submitted. Perhaps include details on what you would/could improve on, whether code wise or
architecture wise, that would make your app better (given the time constraints and scope of this test).

Any feedback on this test would be greatly appreciated. Let us know how long you spent on the test as well as any areas
for improvement. We look forward to having you potentially joining our team!

## Tech Stack

### Docker

This test has been put together with Docker for ease of setup and to ensure there's no conflict between environments.
You are free to modify the setup if necessary (or if you think there's a better way to set things up) as long as you
also document any changes in your submission.

### Backend

Framework: Laravel 8.6, PHP 8

- The backend has been setup to use the [Laravel](https://laravel.com/docs/8.x) framework
- Should be accessible at [http://localhost:8080](http://localhost:8080) directly from your browser
- There is a `setup.sh` script that installs the initial composer dependencies inside the containers and creates the
  initial `.env` file
- There is an example `api` endpoint created in `routes/api.php`
    - The frontend dev server has been set up to proxy all `/api/*` requests to the backend; you may choose to change
      this setup but should document this in your submission
- No other setup has been performed with the default Laravel application
- We are assuming you know your way around Laravel (or know enough) to create models, controllers, database migrations,
  etc

### Frontend

Framework: Vue 3 with Typescript and Vite

- Should be accessible at [http://localhost:8888](http://localhost:8888) directly from your browser
- Part of the docker setup should install the npm packages inside the container
- Dev server has been configured to proxy requests starting with `/api` to the backend. If you choose to change this
  setup, please document this in your submission
- [Vue Router](https://router.vuejs.org/) and [Vuex](https://vuex.vuejs.org/) have been setup for your convenience. You
  may choose to not use these if you wish
- Use [SCSS](https://sass-lang.com/documentation/syntax) for styling. This has been mostly setup already
- You are free to use any UI library, e.g., Bootstrap, Tailwind CSS, etc. (recommend including one you are comfortable
  with)
- A working example page has been set up to start you off
- Be sure to lint and fix your code before submission with `npm run fix`

### Database

Mysql 5.7

- You can connect to database directly via port `3306` on your localhost with any mysql client, see `docker-compose.yml`
  file for more information

### Useful commands

- `docker compose exec backend bash` get a bash shell to backend container
- `docker compose exec frontend npm install [package]` install a npm package for frontend
- `docker compose exec backend composer install [package]` install a npm package for backend
- for more `docker compose` usage, see the docker official documentation

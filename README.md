# Acme Widget Co Sales System

  Acme Widget Co are the leading provider of made up widgets and they’ve contracted you to
create a proof of concept for their new sales system.

## Requirements

- PHP 8.2
- Composer
- Docker

## Installation

1. Clone the repository:

    ```sh
    git clone https://github.com/Mehran-tr/acme-widget-co.git
    cd acme-widget-co
    ```

2. Install dependencies:

    ```sh
    composer install
    ```

3. Run tests:

    ```sh
    vendor/bin/phpunit
    ```

## Docker

To run the application using Docker:

1. Build and start the Docker containers:

    ```sh
    docker-compose -f docker/docker-compose.yml up --build
    ```

2. Run tests inside the Docker container:

    ```sh
    docker-compose -f docker/docker-compose.yml run app
    ```

## Assumptions

- The delivery charge rules and special offers are passed as arrays for simplicity.
- The special offers are implemented using a strategy pattern.

## Project Structure

- `src/Models/` contains the data models.
- `src/Services/` contains the service classes.
- `tests/Models/` contains unit tests for the data models.
- `tests/Services/` contains unit tests for the service classes.
- `docker/` contains Docker-related files.
- `composer.json` manages dependencies.
- `phpunit.xml` configures PHPUnit.
- `.phpstan.neon` configures PHPStan.


## Authors

- Mehran Taheri <mehran.taheri.t@gmail.com>

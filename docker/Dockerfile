FROM php:8.2-cli

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set the working directory
WORKDIR /app

# Copy the project files
COPY . .

# Install dependencies
RUN composer install

# Command to run PHPUnit tests
CMD ["vendor/bin/phpunit"]

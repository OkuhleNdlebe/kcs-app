# KCS App

This project is a Laravel application integrated with TailwindCSS and Livewire for building an admin dashboard.

## Prerequisites

Before you begin, ensure you have met the following requirements:
- **Docker**: latest version
- **Docker Compose**: latest version

## Installation

Follow these steps to get the project up and running with Laravel Sail:

### Clone the Repository

```sh
git clone https://github.com/your-username/kcs-app.git
cd kcs-app

## Copy the .env.example file to .env and modify the environment-specific settings.
cp .env.example .env

##Configure Database

##Update your .env file with your database credentials:

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password

## Build and Run Docker Containers

## Build and start your Docker containers using Laravel Sail:
./vendor/bin/sail up -d

## Install PHP Dependencies

## Once the containers are running, you need to install the PHP dependencies inside the container:

./vendor/bin/sail composer install

## Install JavaScript Dependencies

## If you are using npm:

./vendor/bin/sail npm install

## If you are using Yarn:

./vendor/bin/sail yarn install

## Run Migrations

## Run the database migrations:

./vendor/bin/sail artisan migrate

## Compile Assets

## If you are using npm:

./vendor/bin/sail npm run dev

##If you are using Yarn:

./vendor/bin/sail yarn dev

## Access the Application

## The application should now be running at http://localhost.


# Product Catalog API  

## Introduction  
This is a RESTful API for managing a product catalog, built using Laravel. It supports CRUD operations for products and categories.  

## Features  
- Retrieve, create, update, and delete products  
- Retrieve all categories with parent-child relationships  
- Request validation and error handling  
- Unit testing for repositories and services  

## Installation  
1. Clone the repository:  
   ```sh
   git clone <repository_url>
   cd ProductCatalogAPI

2. Install dependencies: 
   ```sh
   composer install

3. Copy the environment file and generate an application key: 
   ```sh
   cp .env.example .env
   php artisan key:generate

4. Set up the database in .env and run migrations: 
   ```sh
    php artisan migrate --seed

5. Start the development server: 
   ```sh
    php artisan serve

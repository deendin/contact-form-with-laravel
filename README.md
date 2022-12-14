# Basic Contact Api Service with Laravel.
## What does this solution do?

This solution is a simple contact form API service (no frontend expected).

At a minimum this solution provides the ability to:

1. Create a message (name, email address and message)
2. View messages
3. Notify an admin when the contact form API (create) service is triggered. To change the recipient of this email, the `.env.example` file needs to be updated with a new value. The key is called :  `email` and can be found in the `.env.example` file, if there is no value for this email, the fallback email would be the one set in the constant file called: `admin_email` with a value of `admin@example.com`

### How has this been done?

- I have followed the TDD approach by having some feature testing in place by testing ability to create contact and view contact before implementation.
- After completing these tests, I started creating the application logic, controllers, routes, models and model factories.
- I used laravel's form requests for data validation and model resources and model resource collection to transform and expost the data to the enduser/api consumer.
- After successfully creating a contact, there is an observer that observes and automatically generates and assign a uuid to the new record.
- When a contact is saved, an admin receives this notification with the sender of the contact form, their email address and the message body.
- This implementation uses an action `App\Actions\CreateContact` to implement the business logic.
- This implementation uses model resources in exposing some information from our databases and can be found in `App\Http\Resources` and expose the data returned from the Contact Model to the user.

### Tooling

- [Composer] for dependency management.
- [PhpUnit] [PhpUnit] for the test suite.
- [Mailhog] for email service provider.

## Getting started

Before setting up this repository, the following are the dependencies that needs to be available on your machine:

- Composer
- PHP (I have PHP 8.1.11 installed)
- Mailhog (as seen in the .env.exaple file). For more information about setup and instructions, see here for more info: https://github.com/mailhog/MailHog


## Setup & Instruction

1. Clone the repository: `git clone https://github.com/deendin/contact-form-with-laravel.git`
2. Assuming that the Dependencies listed above are satisfied, you can ```cd``` into the directory called ```contact-form-with-laravel.git```
3. When inside this repository directory, run ```composer install``` to install the project dependencies.
4. Modify the .env file and set the required database credentials.
5. Run `php artisan migrate` to generate the database tables.
6. To test, make sure you are still in this repository directory and in your terminal, to run the test suite run ```vendor/bin/phpunit``` for the test.
7. Go to your email service provider either Mailtrap or Mailhog (http://0.0.0.0:8025/), but I have tested this on Mailhog, you should see an email that contains the contact message, name and email.

## Task specification
At a minimum we are looking to take a message (name, email address and message) and view messages.

## Example Input
<img width="1302" alt="example_input" src="https://user-images.githubusercontent.com/118926333/204593286-0bb7e4e5-4c11-4e2f-9810-e367d1760d36.png">

## Example Output

<img width="1594" alt="example_output" src="https://user-images.githubusercontent.com/118926333/204593291-e2590045-4a9d-42cb-a0da-0092fbcd51c6.png">

## Postman Collection for testing
This can be found in the public directory. This file is called `contact_api_service.postman_collection.json`

## What I could have done better if I had more time:

1. Add ability to fetch a single contact.
2. Properly handle the API exceptions, possibly in the Handler file or have a custom exception that will be wrapped around a try catch just incase an unknown exception occurs.
3. Add user auth and authorization checks/Gate or policy before allowing the create contact request logic to get executed in the CreateContact Action. This is expected to check if the authed user has the permission to perform the intended request.
4. Add Github Action for PHP-CS-Fixer that will be triggered before commit or push. This will act like a pre-commit.
5. Have a basic front end to allow creation of the contact.
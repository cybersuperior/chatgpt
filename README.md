<h1 align="center">OpenAI-Laravel Integration Examples</h1>

This repository contains OpenAI API Integration examples utilizing the Laravel framework. Use this repository as a resource to get a good idea of how to start integrating OpenAI into your own Laravel application.  A paid OpenAI API Key is required in order to get the application fully functional. 

## Installation

Ensure Laravel is installed, [official instructions](https://laravel.com/docs/10.x/installation)

Clone the repository

    git clone git@github.com:cybersuperior/openai.git

Switch to the repo folder

    cd openai

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

macOS/Linus

    cp .env.example .env

Windows 

    copy .env.example .env

Ensure you set your OpenAI API Key in the .env file, instructions on locating your OpenAPI Key can be found [here](https://youtube.com/shorts/nnSI7hOfMKo?feature=share). You will need to enabled billing in order to get the full application functionality.

Generate application key

    php artisan key:generate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000 or http://127.0.0.1:8000 depending on your local setup.

## Examples

**ChatGPT Chatbot Example** - Can be found by navigating to `/chatgpt`.  Utilizes the OpenAI text engine to provide live responses with a chatbox UI.

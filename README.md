# Docker Installation for Lumen
This repository contains a Docker setup for running a Lumen application. Lumen is a micro-framework by Laravel, designed for building lightweight and fast microservices.

## Prerequisites

Before you begin, make sure you have the following installed on your machine:

- Docker: [Install Docker](https://docs.docker.com/get-docker/)
- Docker Compose: [Install Docker Compose](https://docs.docker.com/compose/install/)

## Getting Started

1. Clone this repository to your local machine:

    ```bash
    git clone https://github.com/zalakhirani/php-microservice.git
    ```

2. Navigate to the project directory:

    ```bash
    cd php-microservice
    ```

3. Create a copy of the example environment file and customize it:

    ```bash
    cp .env.example .env
    ```

    Update the values in `.env` according to your Lumen application's configuration.
    For this application add AUTHENTICATION_TOKEN variable, this token will be used as Bearertoken to call the APIs.

4. Build and start the Docker containers:

    ```bash
    docker build -t php-microservice .
    ```

    This command will build the necessary Docker images and start the containers in the background.

6. The final step is to run the container you have just built using Docker:

    ```bash
    docker run -it -p 8080:8080 php-microservice
    ```

7. Your Lumen application should now be accessible at [http://0.0.0.0:8080](http://0.0.0.0:8080).

## Testing with Bearer Token

1. Obtain a Bearer Token:

    Bearer token can be obtained from .env file. It is stored in AUTHENTICATION_TOKEN variable.

2. Make API Requests:

    Use a tool like `curl` or Postman to make requests to your API. Include the Bearer Token in the Authorization header.

    Example:

    ```bash
    curl -X GET http://0.0.0.0:8080/api/resource -H "Authorization: Bearer YOUR_ACCESS_TOKEN"
    ```

    Replace `YOUR_ACCESS_TOKEN` with the actual Bearer Token you obtained from .env.

## User Data Retrieval Endpoint

### Endpoint

- **URL:** `http://0.0.0.0:8080/api/users/{id}`
- **Method:** `GET`

```bash
curl -X GET http://0.0.0.0:8080/api/users/1 -H "Authorization: Bearer YOUR_ACCESS_TOKEN"
```

### Request

- **Headers:**
  - `Authorization: Bearer YOUR_ACCESS_TOKEN`

### Parameters

- **id (required):** The unique identifier of the user.

### Response

- **Success (200 OK):**
  - Returns user data in JSON format.

```json
    {
        "response": "Success",
        "data": {
            "id": 5,
            "name": "Katie Jane",
            "email": "katie.jane@gmail.com"
        }
    }
```

- **Error (401 Unauthorized):**
  - If the access token is missing or invalid.

```json
    {
        "response": "Failure",
        "message": "Invalid or missing access token!"
    }
```

- **Error (404 Not Found):**
  - If the user with the specified ID is not found.

```json
    {
        "response": "Failure",
        "message": "Resource not found!"
    }
```


## Get All Users Endpoint

### Endpoint

- **URL:** `http://0.0.0.0:8080/api/users`
- **Method:** `GET`


```bash
curl -X GET http://0.0.0.0:8080/api/users -H "Authorization: Bearer YOUR_ACCESS_TOKEN"
```

### Request

- **Headers:**
  - `Authorization: Bearer YOUR_ACCESS_TOKEN`

### Response

- **Success (200 OK):**
  - Returns user data in JSON format.

```json
   {
    "response": "Success",
    "data":
        [
            {
            "id": 1,
            "name": "Zalak Hirani",
            "email": "zalak.hirani@gmail.com"
            },
            {
            "id": 2,
            "name": "John Smith",
            "email": "John.smith@gmail.com"
            },
            {
            "id": 3,
            "name": "James Bond",
            "email": "james.bond@gmail.com"
            },
            {
            "id": 4,
            "name": "Phillips Doe",
            "email": "phillips.doe@gmail.com"
            },
            {
            "id": 5,
            "name": "Katie Jane",
            "email": "katie.jane@gmail.com"
            }
        ]
    }
```

- **Error (401 Unauthorized):**
  - If the access token is missing or invalid.

```json
    {
        "response": "Failure",
        "message": "Invalid or missing access token!"
    }
```

## Run PHPUnit tests:

```bash
    /vendor/bin/phpunit
```

## Writing Tests

Tests are located in the `tests` directory. You can add your own test cases or modify existing ones based on your application's needs.
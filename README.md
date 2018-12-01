# CronDocker


![Packagist](https://img.shields.io/packagist/l/doctrine/orm.svg)
![PHP](https://img.shields.io/badge/php-7.2-brightgreen.svg)
![SYMFONY](https://img.shields.io/badge/symfony-4.1-red.svg)
![DOCKER](https://img.shields.io/badge/docker-3-yellow.svg)

The following instructions will allow to run cronjobs in a Docker container using **nginx**, **php 7.2** and **Symfony**. In order to run multiple services in a container, we'll use [supervisord](https://docs.docker.com/config/containers/multi-service_container/).


## Getting Started

### Prerequisites

Make sure you have [Docker](https://www.docker.com/) installed in yout system.

### Initialize environment

After cloning this repository we can build the docker container by using

```
docker-compose -f docker.dev.yml up --build
```

### Checking cronjob

Check the cronjob file content

```
docker exec -ti cron_docker_php cat /etc/cron.d/cronjobs
```

The Symfony Command used for this cron can be found at `www/src/Command/SayHelloCommand`

### Checking the log

By default there's a cronjob that will print a message in a log file every minute. We can check the log

```
docker exec -ti cron_docker_php cat /var/log/cron.log
```

## Testing

### Conecting to the container 

We'll be using `docker exec` to connect with the running container

```
docker exec -ti cron_docker_php bash
```

### Cronjob list

The file it's placed next to **Dockerfile** at

> docker/php/cronjobs

You can add as many cron jobs as you want. Make sure the **php** path is right by using `which php` inside the running container and you **leave and empty line** after the last cronjob

### Dockerfile

In this file we'll find all the related actions commented

### Running web app

We can test our web app via [http://localhost:8080](http://localhost:8080) is also working
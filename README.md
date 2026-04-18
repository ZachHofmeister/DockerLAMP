# DockerLAMP

A docker-compose to build a LAMP environment with Apache, Mariadb, PHP, and PHPMyAdmin.

I am using this repo to learn more about Docker and Docker Compose, and as a starting point for containerizing my [MissionSite](https://github.com/ZachHofmeister/MissionSite) repo.

## How to Build

```bash
git clone https://github.com/ZachHofmeister/DockerLAMP.git
docker-compose up -d --build
```

You can see if it works by navigating to the following links in your browser:

**Main Page:** [http://localhost:8080](http://localhost:8080)

**PHPMyAdmin:** [http://localhost:8081](http://localhost:8081)

## Attribution
The initial code for this primarily came from the Dev.to post [*Docker Compose for Development: Setting Up a Complete LAMP Stack*](https://dev.to/caffinecoder54/docker-compose-for-development-setting-up-a-complete-lamp-stack-16h2) by **Purushotam Adhikari**. Check it out if you want to build something similar, and check out his other content!
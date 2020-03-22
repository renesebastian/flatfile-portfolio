# Flatfile portfolio

This is the codebase that makes rene.io (English) and renesebastian.nl (Dutch) run. All based on 1 code base with the smallest config file I've ever made. It's not perfect, but it serves my needs for a portfolio website.

Since most of the projects and repo's I work on are hidden, I figured why not publicly share this one. If you have improvements, feel free to fork it!

## Install

Just clone the repo to your desktop and run this simple install in your terminal:

`npm install`

## To run local + turn on watcher

The development environment is based on Docker. Without it, it won't run. If you have Docker running you'll get the dev site running with:

```
docker-compose up
webpack -w
```

Go to [http://127.0.0.1:8080](http://127.0.0.1:8080) or [http://localhost:8080](http://localhost:8080/) (or declare different port in the docker compose file)

## The basics

The site is based around one main flat Json file and some supporting json files (collections, videos and client data) that are hosted on my CDN. Why not choose for a database? Because I didn't want to build a whole CMS for myself if I could just edit a single json file.

The `config.php` file containts an integer settings that loads the specific site data, the code base running it is exactly the same on _rene.io_ and _renesebastian.nl_.

In `autoload.php` all the essential data is loaded into globals. You can pretty much guess what happens in `io.php` . It's the input output file that pretty much handles all the data that is being parsed from the json files.

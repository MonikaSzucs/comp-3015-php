# COMP 3015 News

An article aggregrator.

## Running the application

Ensure an `articles.json` file is at the server root.

Run:

```
php -S localhost:9000 # or you could use a different port
```

## Install Node (dev) dependencies:

```
npm i
```

Run the Node server for reloading CSS changes:

```
npm run dev
```

You can also run this using Apache or Nginx.

## Instructions

- need to install node
- when you do npm run dev and the php -S localhost:3000 then it will work - need to do two terminals

## Limitations/assumptions
- For the application i am just assuming we can just see the title and the url. We are only going to be able to delete or update the article. We will not be able to go inside the article to create its own page.
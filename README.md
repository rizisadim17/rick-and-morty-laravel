# Rick and Morty Explorer — Laravel

A web application built with **Laravel 12** that lets you browse and search characters, episodes, and locations from the Rick and Morty universe using the [Rick and Morty API](https://rickandmortyapi.com/api).

## Tech Stack

- **Backend:** PHP 8.2+, Laravel 12
- **Frontend:** Blade templates, Tailwind CSS 3, Vite, Axios
- **Database:** SQLite (for sessions, cache, and jobs)
- **Infrastructure:** Docker (via Laravel Sail)

## Features

- Browse all **characters** with images, status, species, gender, origin, and location
- View individual **character profiles** with full episode history
- Browse all **episodes** sorted by air date (newest first)
- View **episode details** with a paginated list of characters that appear in it
- Search characters by **dimension** or **location**
- View **location details** with paginated resident characters
- Pagination support across all list views (20 items per page)
- API error handling with a dedicated error view

## Routes

| Path | Description |
|------|-------------|
| `/` | Redirects to character list |
| `/character` | List all characters |
| `/character/{id}` | Character detail page |
| `/episode` | List all episodes |
| `/episode/{id}` | Episode detail page |
| `/location/{id}` | Location detail page |
| `/search/characters/dimension` | Search characters by dimension |
| `/search/characters/location` | Search characters by location |
| `/characters/dimension/{dimension}` | Characters filtered by dimension |
| `/characters/location/{location}` | Characters filtered by location |

## Getting Started

### Prerequisites

- Docker & Docker Compose
- Node.js 18+
- Composer

### Run with Docker

```bash
docker compose -f docker-compose.yml up -d
```

### Install dependencies

```bash
composer install
npm install
```

### Build frontend assets

```bash
npm run dev
```

### Run migrations

```bash
php artisan migrate
```

### Access the app

```
http://localhost:{port}/search/characters/dimension
```

## Project Structure

```
app/
├── Http/
│   └── Controllers/   # Route handlers (Character, Episode, Location)
├── Services/          # API business logic (Character, Episode, Location, Pagination)
├── Models/            # Eloquent models (User — standard Laravel auth)
resources/
├── views/
│   ├── characters/    # Character list and detail views
│   ├── episodes/      # Episode list and detail views
│   ├── locations/     # Location detail and search views
│   ├── components/    # Reusable Blade components (nav, pagination, search, character card)
│   ├── errors/        # API error views
│   └── layouts/       # Base layout
├── js/                # JavaScript modules (toggle, menu, loader)
├── css/               # Tailwind CSS entry
routes/
└── web.php            # All application routes
```

## Environment Variables

Copy `.env.example` to `.env` and adjust as needed:

```
APP_NAME=Laravel
APP_ENV=local
DB_CONNECTION=sqlite
API_BASE_URL=https://rickandmortyapi.com/api
```

## Optional: Bash Aliases

To make navigation easier, you can add aliases to your `~/.bashrc`:

```bash
alias raclaravel='cd ~/projects/rickandmorty-laravel'
alias raclaravel-up='cd ~/projects/rickandmorty-laravel && docker compose up -d'
alias raclaravel-down='cd ~/projects/rickandmorty-laravel && docker compose down'
```

Then apply the changes:

```bash
source ~/.bashrc
```

## Notes

- All Rick and Morty data is fetched **live from the public API** — no local persistence for content.
- The SQLite database is only used for Laravel's built-in users, sessions, cache, and job queues.
- The API service layer includes retry logic (3 attempts, 100ms delay) and request timeout (10s).

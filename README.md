# Rick and Morty Explorer — Laravel API + Next.js

A full-stack web application that lets you browse and search characters, episodes, and locations from the Rick and Morty universe using the [Rick and Morty API](https://rickandmortyapi.com/api).

Built with a **decoupled architecture** — Laravel serves as a REST API backend while Next.js handles the frontend with server-side rendering.

## Screenshots
<img width="600" height="623" alt="ram-characters" src="https://github.com/user-attachments/assets/958327ca-3088-4048-a932-31ed3cbcd4c0" />
<img width="600" height="815" alt="ram-per-character" src="https://github.com/user-attachments/assets/83793581-bce2-456e-9ff7-03f699b7f5b6" />
<img width="600" height="714" alt="ram-per-location" src="https://github.com/user-attachments/assets/e5264246-fbae-4f57-9d33-49888f37b804" />
<img width="600" height="686" alt="ram-dimension" src="https://github.com/user-attachments/assets/afe30a30-9366-47be-a391-3cdd61567acf" />
<img width="600" height="789" alt="ram-per-episode" src="https://github.com/user-attachments/assets/74e45583-1ede-441c-a48c-b62e4b5843e6" />

## Tech Stack

### Backend
- **PHP 8.2+, Laravel 12** — REST API server
- **SQLite** — sessions, cache, and job queues
- **Docker** — Nginx + PHP-FPM containerized setup

### Frontend
- **Next.js 16** (App Router) — frontend framework
- **React 19** — UI components
- **TypeScript 5** — type-safe development
- **Tailwind CSS 4** — utility-first styling

## Architecture

```
Browser → Next.js (localhost:3000) → Laravel API (localhost:8000) → Rick and Morty API
          (UI + Routing)              (REST JSON)                    (External)
```

- **Next.js** handles all routing, pages, and UI rendering
- **Laravel** exposes JSON API endpoints consumed by Next.js
- **No Blade templates** are used in production — Next.js is the sole frontend

## Features

- Browse all **characters** with images, status, species, gender, origin, and location
- View individual **character profiles** with full episode history
- Browse all **episodes** sorted by air date (newest first)
- View **episode details** with a paginated list of characters that appear in it
- Search characters by **dimension** or **location**
- View **location details** with paginated resident characters
- Pagination support across all list views (20 items per page)
- API error handling with dedicated error views

## Routes

### Laravel API Routes (`/api`)

| Method | Path | Description |
|--------|------|-------------|
| GET | `/api/characters` | List all characters |
| GET | `/api/characters/{id}` | Character detail |
| GET | `/api/episodes` | List all episodes |
| GET | `/api/episodes/{id}` | Episode detail |
| GET | `/api/locations/{id}` | Location detail |
| GET | `/api/search/characters/dimension` | Search by dimension |
| GET | `/api/search/characters/location` | Search by location |

### Next.js Frontend Routes

| Path | Description |
|------|-------------|
| `/` | Redirects to character list |
| `/characters` | List all characters |
| `/characters/{id}` | Character detail page |
| `/episodes` | List all episodes |
| `/episodes/{id}` | Episode detail page |
| `/locations/{id}` | Location detail page |
| `/search` | Search characters by dimension or location |

## Getting Started

### Prerequisites

- Docker & Docker Compose
- Node.js 18+

### 1. Start the Laravel API (Docker)

```bash
docker compose up -d
```

Verify containers are running:

```bash
docker ps
```

Laravel API will be available at: `http://localhost:8000`

### 2. Start the Next.js Frontend

```bash
cd frontend
npm install
npm run dev
```

Next.js will be available at: `http://localhost:3000`

### 3. Access the App

Open your browser and go to:

```
http://localhost:3000
```

## Project Structure

```
rickandmorty-laravel/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── Api/           # API controllers (Character, Episode, Location)
│   └── Services/              # Business logic (Character, Episode, Location, Pagination)
├── routes/
│   ├── api.php                # Laravel API routes
│   └── web.php                # (legacy Blade routes)
├── docker/                    # Nginx config
├── docker-compose.yml
├── Dockerfile
└── frontend/                  # Next.js application
    ├── app/
    │   ├── layout.tsx         # Root layout
    │   ├── page.tsx           # Home (redirects)
    │   ├── characters/        # Character pages
    │   ├── episodes/          # Episode pages
    │   ├── locations/         # Location pages
    │   └── search/            # Search pages
    ├── components/
    │   ├── CharacterCard.tsx
    │   ├── Navigation.tsx
    │   ├── Pagination.tsx
    │   └── SearchForm.tsx
    ├── lib/                   # API utility functions
    ├── types/                 # TypeScript type definitions
    └── package.json
```

## Environment Variables

### Laravel (`.env`)

Copy `.env.example` to `.env` and adjust as needed:

```
APP_NAME=Laravel
APP_ENV=local
DB_CONNECTION=sqlite
API_BASE_URL=https://rickandmortyapi.com/api
```

### Next.js (`frontend/.env.local`)

```
NEXT_PUBLIC_API_URL=http://localhost:8000
```

## Optional: Bash Aliases

To make navigation easier, you can add aliases to your `~/.bashrc`:

```bash
alias raclaravel='cd ~/projects/rickandmorty-laravel'
alias raclaravel-up='cd ~/projects/rickandmorty-laravel && docker compose up -d'
alias raclaravel-down='cd ~/projects/rickandmorty-laravel && docker compose down'
alias raclaravel-fe='cd ~/projects/rickandmorty-laravel/frontend && npm run dev'
```

Then apply the changes:

```bash
source ~/.bashrc
```

## Notes

- All Rick and Morty data is fetched **live from the public API** — no local persistence for content.
- The SQLite database is only used for Laravel's built-in sessions, cache, and job queues.
- The API service layer includes retry logic (3 attempts, 100ms delay) and request timeout (10s).
- The legacy Blade templates in `resources/views/` are kept for reference but are no longer the primary frontend.

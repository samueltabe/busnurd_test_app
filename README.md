# Busnurd App

Lightweight Laravel admin for managing products (CRUD) with image support, AJAX search, pagination and small UX helpers.

This README documents how to run the project locally, what features are implemented, important files/locations, troubleshooting tips and suggested next steps.

---

## Quick summary

- Framework: Laravel
- Repo name: `busnurd_test_app` (workspace: `busnurd_app`)
- Main features implemented:
  - Product CRUD (create, read, update, delete)
  - Single-image upload (stored in `storage/app/public/products`) with fallback to external URLs
  - Partial UI for multi-file attachments (`$product->files` shown when available)
  - AJAX live search (filters products by name without page reload)
  - Pagination with server-side paging and client-side updates
  - Flash messages for create/update/delete (dismissible + auto-hide)
  - Delete confirmation modal with action set dynamically by JS
  - Validation via `ProductRequest`

---

## Requirements

- PHP 8.1+ (project used PHP 8.2 in development)
- Composer
- MySQL (or another supported DB)
- Node.js + npm (for frontend assets)
- Recommended PHP extensions: `gd`, `fileinfo`, `curl` (for Faker image provider)

---

## Quick start (local)

1. Clone the repo

```bash
git clone <repo-url> busnurd_app
cd busnurd_app
```

2. Install PHP dependencies

```bash
composer install
```

3. Copy `.env` and set DB credentials

```bash
cp .env.example .env
php artisan key:generate
# then edit .env to set DB_DATABASE, DB_USERNAME, DB_PASSWORD, etc.
```

4. Create storage symlink (for public access to uploaded images)

```bash
php artisan storage:link
```

5. Run migrations and seeders

```bash
php artisan migrate --seed
```

6. Install frontend dependencies and build assets (for local development)

```bash
npm install
npm run dev   # or npm run build for production
```

7. Serve the app

```bash
php artisan serve
```


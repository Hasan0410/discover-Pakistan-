# Railway Deployment

The Django service lives in `discover_pakistan/`; `railway.toml` at the repository root supplies the build, migration, static collection, health-check, and Gunicorn commands.

## Railway Setup

1. Create a Railway project and connect the GitHub repository.
2. Add a PostgreSQL service in the same Railway project.
3. Deploy the repository using the root `railway.toml`.
4. Add these service variables:

```text
ENVIRONMENT=production
DEBUG=False
SECRET_KEY=<long-random-secret>
ALLOWED_HOSTS=<railway-domain>,<custom-domain>
CSRF_TRUSTED_ORIGINS=https://<railway-domain>,https://<custom-domain>
DATABASE_URL=${{Postgres.DATABASE_URL}}
SECURE_SSL_REDIRECT=True
SESSION_COOKIE_SECURE=True
CSRF_COOKIE_SECURE=True
```

Use the exact Railway variable reference shown in the project for `DATABASE_URL` if the Postgres service has a different name.

5. Generate a Railway public domain or attach a custom domain.
6. Add that domain to `ALLOWED_HOSTS` and `CSRF_TRUSTED_ORIGINS`.
7. Deploy and confirm the health check at `/` returns HTTP 200.
8. Create an administrator from a one-off shell or local command using `python manage.py createsuperuser`; do not seed passwords.

## Local Verification

From the repository root:

```powershell
python -m pip install -r discover_pakistan/requirements.txt
Set-Location discover_pakistan
python manage.py check
python manage.py migrate
python manage.py collectstatic --noinput
python manage.py test
python manage.py runserver
```

## Important Limitations

- Railway Postgres is required for durable production data. SQLite is only for local development.
- Uploaded media currently lives on the application filesystem. Configure object storage or a Railway persistent volume before accepting production uploads.
- Payment provider credentials and webhook integration are not configured by this repository. Payments remain pending until a provider is integrated and verified.

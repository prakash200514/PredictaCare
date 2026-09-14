# 🚀 PredictaCare Cloud Deployment Guide

This guide walks you through deploying **PredictaCare** (PHP & MySQL) to modern Cloud PaaS platforms (**Railway** or **Render**) using Docker and automated database initialization.

---

## 📌 Table of Contents
1. [Step 1: Push Your Code to GitHub](#step-1-push-your-code-to-github)
2. [Option A: Deploying on Railway (Recommended & Easiest)](#option-a-deploying-on-railway-recommended--easiest)
3. [Option B: Deploying on Render](#option-b-deploying-on-render)
4. [Step 3: Initializing the Cloud Database](#step-3-initializing-the-cloud-database)
5. [Option C: Testing Locally with Docker](#option-c-testing-locally-with-docker)
6. [Troubleshooting & FAQs](#troubleshooting--faqs)

---

## Step 1: Push Your Code to GitHub

Before deploying to Railway or Render, commit and push the newly added deployment files to your repository (`https://github.com/prakash200514/PredictaCare`):

Open your terminal or command prompt in the project root:

```bash
git add .
git commit -m "Add Docker and cloud deployment configuration"
git push origin main
```

---

## Option A: Deploying on Railway (Recommended & Easiest)

[Railway](https://railway.app) allows you to host both the **PHP Application** and a **MySQL Database** together in one dashboard with zero server configuration.

### 1. Create a Project on Railway
1. Sign up or log in at [railway.app](https://railway.app) using your GitHub account.
2. Click **+ New Project**.
3. Choose **Provision MySQL**. Railway will create a managed MySQL database instance for you in seconds.

### 2. Add Your Application Service
1. In the same project dashboard, click **+ New** (or **Add Service**).
2. Select **GitHub Repo** and choose `PredictaCare`.
3. Railway will detect the `Dockerfile` automatically and start building the container.

### 3. Connect the Web Service to the MySQL Database
1. Click on your `PredictaCare` web service card.
2. Go to the **Variables** tab.
3. Click **Add Reference** (or enter the variables manually):
   - `DB_HOST`: Reference `${{MySQL.MYSQLHOST}}` or enter the host.
   - `DB_USER`: Reference `${{MySQL.MYSQLUSER}}` or enter the user.
   - `DB_PASS`: Reference `${{MySQL.MYSQLPASSWORD}}` or enter the password.
   - `DB_NAME`: Reference `${{MySQL.MYSQLDATABASE}}` or enter the database name.
   - `DB_PORT`: Reference `${{MySQL.MYSQLPORT}}` or enter `3306`.
   *(Railway also provides `DATABASE_URL` directly, which PredictaCare supports automatically!)*

### 4. Generate Your Public URL
1. In the `PredictaCare` web service, go to **Settings** > **Networking**.
2. Click **Generate Domain** (e.g., `predictacare-production.up.railway.app`).
3. Proceed to [Step 3: Initializing the Cloud Database](#step-3-initializing-the-cloud-database).

---

## Option B: Deploying on Render

[Render](https://render.com) provides free and low-cost Web Services with automated Docker builds.

### 1. Get a Free Cloud MySQL Database
Since Render's free tier only offers PostgreSQL, you can provision a free MySQL database from:
- [Aiven.io](https://aiven.io) (Free tier managed MySQL)
- [Clever Cloud](https://www.clever-cloud.com) (Free 20MB MySQL add-on)
- [TiDB Cloud](https://tidbcloud.com) (Free Serverless MySQL-compatible cluster)

Copy the **Host**, **Port**, **User**, **Password**, and **Database Name** provided by your database provider.

### 2. Create a Web Service on Render
1. Sign up or log in at [render.com](https://render.com).
2. Click **New +** > **Web Service**.
3. Connect your GitHub account and select `prakash200514/PredictaCare`.
4. Fill in the service details:
   - **Name**: `predictacare`
   - **Region**: Choose the region closest to you (or your database).
   - **Language / Runtime**: **Docker** (Render detects the `Dockerfile` automatically).
   - **Instance Type**: **Free** (or Starter).

### 3. Add Environment Variables
Scroll down to the **Environment Variables** section and add:
- `DB_HOST`: *(Your remote MySQL host)*
- `DB_USER`: *(Your remote MySQL username)*
- `DB_PASS`: *(Your remote MySQL password)*
- `DB_NAME`: *(Your remote MySQL database name)*
- `DB_PORT`: *(Your remote MySQL port, usually `3306`)*

### 4. Deploy
Click **Create Web Service**. Render will automatically build the Docker image and launch your application at a URL like `https://predictacare.onrender.com`.

---

## Step 3: Initializing the Cloud Database

Once your application is live on Railway or Render, you need to populate the database tables and sample data:

1. Open your browser and navigate to:
   ```
   https://<your-deployed-domain>/setup-db.php
   ```
2. The diagnostic page will show **✓ Connected** and list the required tables.
3. Click the blue button: **🚀 Initialize Database Tables & Data**.
4. The script will execute `database/disease.sql` and verify that all tables (`admin`, `disease_tb`, `symptoms_tb`, `user`, `user_result`) are ready with their data.
5. Click **Go to PredictaCare App →** or navigate to the root domain (`https://<your-deployed-domain>/`) to start using the live app!

### Default Credentials
| Role | Username | Password |
| :--- | :--- | :--- |
| **Admin** | `admin` | `Ab123456` |
| **User** | `user` | `Ab123456` |

---

## Option C: Testing Locally with Docker

If you have Docker Desktop installed, you can test the entire production container stack locally:

```bash
# Start web and database containers
docker compose up -d

# Visit the app in your browser
http://localhost:8080/
```

To stop the containers:
```bash
docker compose down
```

---

## Troubleshooting & FAQs

### 1. Database Connection Error on deployment
- Double check that your `DB_HOST`, `DB_USER`, `DB_PASS`, `DB_NAME`, and `DB_PORT` match your cloud database credentials.
- Ensure your cloud MySQL instance allows incoming connections from `0.0.0.0/0` (any IP).

### 2. Does local XAMPP still work?
Yes! `link/config.php` has default fallbacks to `localhost`, `root`, and standard XAMPP settings. Your local installation in `c:\xampp\htdocs\disease\` will continue working without any changes.

### 3. How to lock or disable `setup-db.php` after deployment?
Once run, `setup-db.php` records an `.installed` file in `database/`. If you want to disable it entirely from public access, you can delete or rename `setup-db.php` and commit the change to GitHub.

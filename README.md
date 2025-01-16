<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaravelProject README</title>
</head>
<body>
    <h1>LaravelProject</h1>
    <p>
        This project is built using <strong>WSL</strong>. To ensure a smooth setup, please complete all steps within your WSL/Linux environment.
    </p>
    <p>
        <strong>Tip:</strong> Clone the repository into a directory like <code>/home/{user}/projects</code> 
        (e.g., <code>/home/username/projects</code>) to avoid potential debugging issues.
    </p>

<h2>Prerequisites</h2>
    <p>Make sure you have the following installed before proceeding:</p>
    <ul>
        <li>WSL (if you're on Windows)</li>
        <li>Composer</li>
        <li>Node.js</li>
        <li>MySQL</li>
        <li>PHP</li>
        <li>Git</li>
        <li>An email delivery service (e.g., Mailtrap)</li>
    </ul>

<h2>Installation Steps</h2>

<h3>1. Clone the Repository</h3>
    <p>Navigate to your projects directory and clone the repository:</p>
    <pre><code>git clone <https://github.com/LunaDHeere05/laravelProject></code></pre>
    <p>Then, go to the project folder:</p>
    <pre><code>cd laravelProject</code></pre>

<h3>2. Configure the <code>.env</code> File</h3>
    <ol>
        <li>Duplicate the example environment file:
            <pre><code>cp .env.example .env</code></pre>
        </li>
        <li>Edit the <code>.env</code> file and update the following configurations:</li>
    </ol>

<h4>Database Configuration:</h4>
    <pre><code>DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravelProject
DB_USERNAME="your-database-username"
DB_PASSWORD="your-database-password"
</code></pre>

<h4>Mail Configuration:</h4>
    <pre><code>MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME="your-mailtrap-username"
MAIL_PASSWORD="your-mailtrap-password"
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="Gamers' Chronicles"
</code></pre>

<p>Generate the application key:</p>
    <pre><code>php artisan key:generate</code></pre>

<h3>3. Install Dependencies</h3>
    <p>Install the required PHP and JavaScript dependencies:</p>
    <pre><code>composer install</code></pre>
    <pre><code>npm install</code></pre>

<h3>4. Set Up the Database</h3>
    <ol>
        <li>Log in to MySQL:
            <pre><code>mysql -u root -p</code></pre>
        </li>
        <li>Create the database:
            <pre><code>CREATE DATABASE laravelProject;</code></pre>
        </li>
        <li>Exit MySQL:
            <pre><code>exit</code></pre>
        </li>
    </ol>

<h3>5. Start MySQL Service</h3>
    <p>Start the MySQL service if it isn't already running:</p>
    <pre><code>sudo systemctl start mysql</code></pre>
    <p>Check its status:</p>
    <pre><code>sudo systemctl status mysql</code></pre>
    <p>Optionally, enable it to start at boot:</p>
    <pre><code>sudo systemctl enable mysql</code></pre>

<h3>6. Run Migrations and Seeders</h3>
    <p>Set up the database structure and seed initial data:</p>
    <pre><code>php artisan migrate:fresh --seed</code></pre>

<h3>7. Configure Storage</h3>
    <p>Create a symbolic link for the <code>public/storage</code> directory:</p>
    <pre><code>php artisan storage:link</code></pre>

<h3>8. Start the Development Server</h3>
    <p>Compile frontend assets and start the development server:</p>
    <pre><code>npm run dev</code></pre>
    <pre><code>php artisan serve</code></pre>

<h3>9. Verify Installation</h3>
    <p>Visit the following URL in your browser to ensure the setup is complete:</p>
    <pre><code>http://127.0.0.1:8000</code></pre>

<h2>Project Features</h2>
    <h3>For Guests</h3>
    <ul>
        <li>Browse posts</li>
        <li>Explore walkthroughs</li>
    </ul>
    <h3>For Registered Users</h3>
    <ul>
        <li>Like walkthroughs</li>
        <li>Filter walkthroughs by genre</li>
        <li>Create, edit, or delete your own walkthroughs</li>
    </ul>
    <h3>For Admins</h3>
    <ul>
        <li>Create and manage posts</li>
        <li>Promote users to admin</li>
        <li>Create users manually</li>
    </ul>

<h2>Additional Notes</h2>
    <h3>Resetting the Database</h3>
    <p>To reset and reseed the database, run:</p>
    <pre><code>php artisan migrate:fresh --seed</code></pre>
</body>
</html>

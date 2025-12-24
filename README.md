# Event Registration Ticket System

## Setup Instructions

### Prerequisites
- PHP 8.4 or higher
- MySQL/MariaDB

### Database Setup
1. Log in to MySQL as root:
   ```bash
   mysql -u root -p
   ```

2. Create the database and user:
   ```sql
   CREATE DATABASE event_system;
   CREATE USER 'event_user'@'localhost' IDENTIFIED BY 'event_password_123!';
   GRANT ALL PRIVILEGES ON event_system.* TO 'event_user'@'localhost';
   FLUSH PRIVILEGES;
   EXIT;
   ```

3. Import the database schema:
   ```bash
   mysql -u event_user -p event_system < database.sql
   ```
   Enter password: `event_password_123!`

### Running the Application
1. Navigate to the public directory:
   ```bash
   cd public
   ```

2. Start the PHP built-in server:
   ```bash
   php -S localhost:8000
   ```

3. Open your browser and go to `http://localhost:8000`

### Admin Access
- Admin panel: `http://localhost:8000/../admin/` (or set up proper routing)
- Default admin credentials: (set up in database)

Note: The application uses session-based authentication. Ensure cookies are enabled.
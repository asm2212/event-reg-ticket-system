CREATE DATABASE event_system;
USE event_system;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100) UNIQUE,
  password VARCHAR(255),
  role ENUM('admin', 'organizer', 'attendee') DEFAULT 'attendee',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE events (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(150),
  description TEXT,
  event_date DATE,
  venue VARCHAR(150),
  category VARCHAR(50),
  banner VARCHAR(255),
  capacity INT,
  created_by INT,
  FOREIGN KEY (created_by) REFERENCES users(id)
);

CREATE TABLE tickets (
  id INT AUTO_INCREMENT PRIMARY KEY,
  event_id INT,
  type VARCHAR(50),
  price DECIMAL(10,2),
  quantity INT,
  FOREIGN KEY (event_id) REFERENCES events(id)
);

CREATE TABLE bookings (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  ticket_id INT,
  quantity INT,
  booked_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (ticket_id) REFERENCES tickets(id)
);

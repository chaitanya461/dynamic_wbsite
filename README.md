/var/www/html/
├── index.php
├── register.php
├── login.php
├── logout.php
├── dashboard.php
├── config.php
└── includes/
    ├── header.php
    ├── footer.php
    └── auth_functions.php

    # Connect to your EC2 instance via SSH
ssh -i your-key.pem ec2-user@your-ec2-public-ip

# Update the system
sudo dnf update -y

# Install Apache, PHP, and PostgreSQL client
sudo dnf install -y httpd php php-pgsql php-mbstring php-xml

# Start and enable Apache
sudo systemctl start httpd
sudo systemctl enable httpd

# Install git for version control (optional)
sudo dnf install -y git

# Set permissions for web directory
sudo chown -R ec2-user:apache /var/www
sudo chmod 2775 /var/www
find /var/www -type d -exec sudo chmod 2775 {} \;
find /var/www -type f -exec sudo chmod 0664 {} \;

# Install PostgreSQL client (psql)
sudo dnf install -y postgresql15

# Verify installation
psql --version
# Connect to RDS PostgreSQL from your EC2 instance
psql -h your-rds-endpoint.rds.amazonaws.com -U your_db_username -d your_database_name

-- Create users table
CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NOT NULL
);

# Restart Apache to apply changes
sudo systemctl restart httpd

# Configure Apache to start on boot
sudo systemctl enable httpd

# Set SELinux permissions (if enabled)
sudo setsebool -P httpd_can_network_connect_db 1

# Professor Management System

A dynamic web application for managing professor information with MongoDB Atlas integration.

## Features

- **Add Professors**: Insert new professor records with 5 key attributes
- **View All Professors**: Display all professors with computed salary bonuses
- **Business Rules**: Automatic bonus calculation based on:
  - Years of experience (2% per year, up to 20 years)
  - High-demand specialties (15% bonus for AI, ML, Data Science, Cybersecurity, etc.)
  - Senior leadership (10% bonus for 15+ years)
  - Mid-career merit (5% bonus for 5-14 years)

## Professor Attributes

1. **Name**: Full name of the professor
2. **Department**: Academic department (Computer Science, Mathematics, Physics, etc.)
3. **Specialty**: Area of expertise
4. **Years of Experience**: Total years teaching/researching
5. **Salary**: Base annual salary in USD
6. **ID**: Auto-generated MongoDB ObjectId

## Technology Stack

- **Frontend**: HTML5, CSS3, JavaScript (Vanilla)
- **Backend**: PHP 7.4+
- **Database**: MongoDB Atlas (Cloud)
- **Styling**: Responsive design with modern gradients

## Setup Instructions

### Prerequisites

- PHP 7.4 or higher
- Composer (PHP package manager)
- Web server (Apache/Nginx) or PHP built-in server
- MongoDB Atlas account (already configured)

### Installation

1. **Install PHP MongoDB Driver**
   ```bash
   composer install
   ```

2. **Configure Database**
   - The MongoDB Atlas URI is already configured in `php/config.php`
   - Database: `ExamProfessors`
   - Collection: `professors`

3. **Run Local Server**
   ```bash
   php -S localhost:8000
   ```

4. **Access Application**
   - Open browser: `http://localhost:8000`

## Cloud Deployment Options

### Option 1: Heroku
1. Create `Procfile`:
   ```
   web: vendor/bin/heroku-php-apache2
   ```
2. Deploy:
   ```bash
   git init
   git add .
   git commit -m "Initial commit"
   heroku create your-app-name
   git push heroku main
   ```

### Option 2: InfinityFree / 000webhost
1. Upload all files via FTP
2. Run `composer install` via SSH or upload vendor folder
3. Access via provided URL

### Option 3: Railway.app
1. Connect GitHub repository
2. Railway auto-detects PHP
3. Set buildpack: `heroku/php`

### Option 4: Render.com
1. Connect repository
2. Build command: `composer install`
3. Start command: `php -S 0.0.0.0:$PORT`

## File Structure

```
Exam/
├── index.html              # Main HTML interface
├── css/
│   └── styles.css         # Responsive CSS styling
├── php/
│   ├── config.php         # MongoDB connection & business logic
│   ├── insert.php         # Insert professor endpoint
│   └── read_all.php       # Read all professors endpoint
├── composer.json          # PHP dependencies
└── README.md             # This file
```

## API Endpoints

### POST `/php/insert.php`
Insert a new professor
```json
{
  "name": "Dr. John Smith",
  "department": "Computer Science",
  "specialty": "Artificial Intelligence",
  "years_experience": 10,
  "salary": 75000
}
```

### GET `/php/read_all.php`
Retrieve all professors with computed bonuses
```json
{
  "success": true,
  "count": 5,
  "data": [...]
}
```

## Business Logic (Computed Values)

The system calculates salary bonuses using PHP in `config.php`:

- **Experience Bonus**: 2% per year (max 20 years)
- **High-Demand Specialty**: Additional 15% for AI, ML, Data Science, etc.
- **Senior Leadership**: 10% for professors with 15+ years
- **Mid-Career Merit**: 5% for professors with 5-14 years

Example: A professor with 10 years experience in AI and $75,000 salary:
- Experience: $15,000 (20%)
- High-demand: $11,250 (15%)
- Mid-career: $3,750 (5%)
- **Total Bonus**: $30,000 (40%)

## Database Connection

MongoDB Atlas connection is configured with:
- **URI**: `mongodb+srv://jeancarlo:jean12345@cluster0.3ixvnnj.mongodb.net/`
- **Database**: `ExamProfessors`
- **Collection**: `professors`

## Notes

- All monetary values are in USD
- Bonuses are calculated server-side (PHP) for security
- Summary statistics display total professors, salaries, and bonuses
- Responsive design works on mobile, tablet, and desktop
- CORS enabled for development/testing

## Author

Created for Company X Exam Assignment - Professor Management System

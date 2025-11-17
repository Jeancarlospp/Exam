@echo off
echo ============================================
echo   Professor Management System - Setup
echo ============================================
echo.

echo [1/3] Checking PHP installation...
php --version
if errorlevel 1 (
    echo ERROR: PHP is not installed or not in PATH
    echo Please install PHP from: https://www.php.net/downloads
    pause
    exit /b 1
)
echo.

echo [2/3] Checking Composer installation...
composer --version
if errorlevel 1 (
    echo ERROR: Composer is not installed or not in PATH
    echo Please install Composer from: https://getcomposer.org/download/
    pause
    exit /b 1
)
echo.

echo [3/3] Installing PHP dependencies...
composer install
if errorlevel 1 (
    echo ERROR: Failed to install dependencies
    pause
    exit /b 1
)
echo.

echo ============================================
echo   Setup Complete!
echo ============================================
echo.
echo To start the development server, run:
echo   start_server.bat
echo.
echo Or manually:
echo   php -S localhost:8000
echo.
pause

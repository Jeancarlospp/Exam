# Deployment Guide - Professor Management System

## Quick Deploy to Cloud (Free Options)

### Option 1: InfinityFree (Recommended - Free & Easy)

1. **Sign up**: https://www.infinityfree.net/
2. **Create account** and get your FTP credentials
3. **Upload files**:
   - Use FileZilla or any FTP client
   - Upload all files to `htdocs` folder
4. **Install Composer dependencies**:
   - SSH into server (if available) and run: `composer install`
   - OR upload `vendor` folder after running `composer install` locally
5. **Access your site**: `http://your-subdomain.infinityfreeapp.com`

### Option 2: 000webhost (Free with PHP & MySQL)

1. **Sign up**: https://www.000webhost.com/
2. **Create website**
3. **Upload via File Manager** or FTP
4. **Run**: `composer install` or upload vendor folder
5. **Access**: `http://your-site.000webhostapp.com`

### Option 3: Railway.app (Modern & Free Tier)

1. **Install Railway CLI**: `npm install -g @railway/cli`
2. **Login**: `railway login`
3. **Initialize**:
   ```bash
   railway init
   railway up
   ```
4. **Get URL**: Railway provides automatic URL

### Option 4: Render.com (Free Static + PHP)

1. **Push to GitHub**:
   ```bash
   git init
   git add .
   git commit -m "Professor Management System"
   git branch -M main
   git remote add origin YOUR_GITHUB_REPO
   git push -u origin main
   ```

2. **On Render.com**:
   - Connect GitHub repo
   - Service type: Web Service
   - Build command: `composer install`
   - Start command: `php -S 0.0.0.0:$PORT`

### Option 5: Heroku (Classic Option)

1. **Install Heroku CLI**: https://devcenter.heroku.com/articles/heroku-cli

2. **Create Procfile**:
   ```
   web: vendor/bin/heroku-php-apache2
   ```

3. **Deploy**:
   ```bash
   heroku login
   heroku create your-app-name
   git init
   git add .
   git commit -m "Initial commit"
   git push heroku main
   ```

4. **Access**: `https://your-app-name.herokuapp.com`

## Local Testing

### Using PHP Built-in Server

```bash
# Install dependencies
composer install

# Start server
php -S localhost:8000

# Open browser
# http://localhost:8000
```

### Using XAMPP/WAMP

1. Copy project folder to `htdocs` (XAMPP) or `www` (WAMP)
2. Run `composer install` in project directory
3. Start Apache from control panel
4. Access: `http://localhost/Exam`

## MongoDB Atlas Configuration

Already configured in `php/config.php`:
- **URI**: `mongodb+srv://jeancarlo:jean12345@cluster0.3ixvnnj.mongodb.net/`
- **Database**: `ExamProfessors`
- **Collection**: `professors`

**Important**: Make sure MongoDB Atlas allows connections from:
- Your cloud hosting IP
- Or allow from anywhere: `0.0.0.0/0` (in Network Access settings)

## Pre-Deployment Checklist

- [ ] Run `composer install` to generate vendor folder
- [ ] Test locally with `php -S localhost:8000`
- [ ] Verify MongoDB Atlas connection
- [ ] Check Network Access in MongoDB Atlas (allow your server IP)
- [ ] Test insert functionality
- [ ] Test read all functionality
- [ ] Verify business rules are calculating correctly
- [ ] Check responsive design on mobile

## Environment-Specific Notes

### For Production:
1. Change MongoDB credentials (update config.php)
2. Disable PHP error display (in .htaccess)
3. Add security headers
4. Implement rate limiting

### For InfinityFree/000webhost:
- May need to disable some CORS settings
- Check if MongoDB extension is available
- May need to upload vendor folder manually

## Troubleshooting

### "MongoDB extension not found"
```bash
# Install via Composer
composer require mongodb/mongodb
```

### CORS Issues
- Check .htaccess is uploaded
- Verify config.php CORS headers
- Check browser console for specific errors

### Connection Issues
- Verify MongoDB Atlas allows your server IP
- Check credentials in config.php
- Test connection with MongoDB Compass

## Support Files Created

- `composer.json` - PHP dependencies
- `.htaccess` - Apache configuration
- `.gitignore` - Git ignore rules
- `README.md` - Project documentation
- `DEPLOYMENT.md` - This file

## Success Criteria

✓ Web page loads without errors
✓ Can insert new professors
✓ Can view all professors
✓ Bonuses are calculated correctly
✓ Responsive design works
✓ Hosted in the cloud

## Final Step: Get Your URL

After deployment, submit your cloud URL:
- InfinityFree: `http://your-subdomain.infinityfreeapp.com`
- Railway: `https://your-app.up.railway.app`
- Render: `https://your-app.onrender.com`
- Heroku: `https://your-app.herokuapp.com`

Good luck with your deployment! 🚀

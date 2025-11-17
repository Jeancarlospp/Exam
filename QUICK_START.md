# 🚀 QUICK START GUIDE

## Step 1: Install Dependencies (5 minutes)

### Option A: Automatic (Windows)
```bash
# Double-click this file:
setup.bat
```

### Option B: Manual
```bash
# Make sure Composer is installed
composer install
```

## Step 2: Start Local Server (1 minute)

### Option A: Automatic (Windows)
```bash
# Double-click this file:
start_server.bat
```

### Option B: Manual
```bash
php -S localhost:8000
```

## Step 3: Test Locally (2 minutes)

1. Open browser: http://localhost:8000
2. Try adding a professor:
   - Name: Dr. John Smith
   - Department: Computer Science
   - Specialty: Artificial Intelligence
   - Experience: 10 years
   - Salary: $75,000

3. Click "Load All Professors" to see results with calculated bonuses

## Step 4: Deploy to Cloud (15-30 minutes)

### Easiest Option: InfinityFree

1. Sign up: https://www.infinityfree.net/
2. Create a website
3. Get FTP credentials
4. Upload ALL files using FileZilla
5. Make sure `vendor` folder is uploaded
6. Access your site!

### Alternative: Railway.app

```bash
# Install Railway CLI
npm install -g @railway/cli

# Login and deploy
railway login
railway init
railway up
```

## 🎯 What You Get

✅ Professional web interface for managing professors
✅ MongoDB Atlas integration (already configured)
✅ Automatic bonus calculation based on:
   - Years of experience
   - Specialty (AI, ML, Data Science get extra bonus)
   - Career level (senior, mid-career bonuses)
✅ Beautiful responsive design
✅ Summary statistics
✅ Ready for cloud deployment

## 📋 Files Created

| File | Purpose |
|------|---------|
| `index.html` | Main application interface |
| `test.html` | Testing and debugging page |
| `css/styles.css` | Professional styling |
| `php/config.php` | MongoDB connection + business logic |
| `php/insert.php` | Insert professor endpoint |
| `php/read_all.php` | Read all professors endpoint |
| `composer.json` | PHP dependencies |
| `.htaccess` | Apache configuration |
| `README.md` | Full documentation (English) |
| `RESUMEN_PROYECTO.md` | Full documentation (Spanish) |
| `DEPLOYMENT.md` | Cloud deployment guide |
| `sample_data.json` | Sample professor data |
| `setup.bat` | Windows setup script |
| `start_server.bat` | Windows server start script |

## 🔧 Troubleshooting

### "Composer not found"
Download from: https://getcomposer.org/download/

### "PHP not found"
Download from: https://www.php.net/downloads
Or install XAMPP: https://www.apachefriends.org/

### "MongoDB connection failed"
1. Check MongoDB Atlas Network Access
2. Allow IP: 0.0.0.0/0 (allow from anywhere)
3. Verify credentials in `php/config.php`

### Page doesn't load
```bash
# Check if server is running
php -S localhost:8000

# Try different port
php -S localhost:3000
```

## 📞 Support Checklist

Before asking for help:
- [ ] Ran `composer install`
- [ ] PHP 7.4+ installed
- [ ] Server running on localhost:8000
- [ ] Checked MongoDB Atlas Network Access
- [ ] Checked browser console (F12) for errors
- [ ] Tried `test.html` to verify connection

## 🎓 Business Logic Explanation

The system calculates professor bonuses using this formula:

1. **Experience Bonus**: 2% per year (max 20 years)
2. **High-Demand Specialty**: +15% for AI, ML, Data Science, Cybersecurity
3. **Senior Leadership**: +10% for 15+ years experience
4. **Mid-Career Merit**: +5% for 5-14 years experience

Example:
- Professor with 10 years in AI, salary $75,000
- Experience: 10 × 2% = 20% = $15,000
- High-demand: 15% = $11,250
- Mid-career: 5% = $3,750
- **Total Bonus: $30,000 (40%)**
- **Total Compensation: $105,000**

## ✅ Project Requirements Met

- [x] 5 attributes + ID (name, department, specialty, years_experience, salary, _id)
- [x] Cloud database (MongoDB Atlas)
- [x] Web client (HTML/CSS/JavaScript)
- [x] PHP backend
- [x] INSERT operation
- [x] READ ALL operation
- [x] Business logic computation (bonus calculation in PHP)
- [ ] Deployed to cloud (do this next!)

## 🏁 Next Steps

1. Test locally ✓
2. Fix any issues ✓
3. Deploy to cloud → **DO THIS NOW**
4. Test cloud deployment
5. Get your public URL
6. Submit project

**Recommended Cloud Providers:**
- InfinityFree (easiest)
- Railway.app (fastest)
- Render.com (GitHub integration)
- Heroku (classic)

Good luck! 🎉

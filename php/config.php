<?php
// config.php - MongoDB Connection Configuration

// Enable CORS for development
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');

// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// MongoDB Connection using PHP MongoDB Driver
// Make sure you have installed: composer require mongodb/mongodb

require_once __DIR__ . '/../vendor/autoload.php';

function getMongoDBConnection() {
    try {
        // MongoDB Atlas connection string
        $connectionString = "mongodb+srv://jeancarlo:jean12345@cluster0.3ixvnnj.mongodb.net/?appName=Cluster0";
        
        // Create MongoDB client
        $client = new MongoDB\Client($connectionString);
        
        // Select database and collection
        $database = $client->ExamProfessors;
        $collection = $database->professors;
        
        return $collection;
    } catch (Exception $e) {
        throw new Exception("MongoDB Connection Error: " . $e->getMessage());
    }
}

/**
 * Business Rule: Calculate Salary Bonus
 * 
 * Bonus calculation based on:
 * 1. Years of experience (10% per 5 years)
 * 2. High-demand specialties get additional 15% bonus
 * 3. Senior professors (15+ years) get extra 10% leadership bonus
 */
function calculateSalaryBonus($salary, $years_experience, $specialty) {
    $bonus = 0;
    $explanation = [];
    
    // Base bonus: 2% per year of experience (capped at 20 years)
    $experienceBonus = min($years_experience, 20) * 0.02 * $salary;
    $bonus += $experienceBonus;
    $explanation[] = "Experience bonus: " . min($years_experience, 20) . " years × 2% = $" . number_format($experienceBonus, 2);
    
    // High-demand specialty bonus (15% additional)
    $highDemandSpecialties = [
        'Artificial Intelligence',
        'Machine Learning',
        'Data Science',
        'Cybersecurity',
        'Cloud Computing',
        'Blockchain'
    ];
    
    $isHighDemand = false;
    foreach ($highDemandSpecialties as $demandSpecialty) {
        if (stripos($specialty, $demandSpecialty) !== false) {
            $isHighDemand = true;
            break;
        }
    }
    
    if ($isHighDemand) {
        $specialtyBonus = $salary * 0.15;
        $bonus += $specialtyBonus;
        $explanation[] = "High-demand specialty bonus: 15% = $" . number_format($specialtyBonus, 2);
    }
    
    // Senior leadership bonus (15+ years)
    if ($years_experience >= 15) {
        $leadershipBonus = $salary * 0.10;
        $bonus += $leadershipBonus;
        $explanation[] = "Senior leadership bonus: 10% = $" . number_format($leadershipBonus, 2);
    }
    
    // Merit bonus for mid-career (5-14 years)
    if ($years_experience >= 5 && $years_experience < 15) {
        $meritBonus = $salary * 0.05;
        $bonus += $meritBonus;
        $explanation[] = "Mid-career merit bonus: 5% = $" . number_format($meritBonus, 2);
    }
    
    return [
        'bonus' => round($bonus, 2),
        'explanation' => implode('; ', $explanation)
    ];
}
?>

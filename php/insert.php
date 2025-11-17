<?php
// insert.php - Insert Professor into MongoDB

require_once 'config.php';

try {
    // Get JSON input
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);
    
    // Validate required fields
    if (empty($data['name']) || empty($data['department']) || empty($data['specialty']) || 
        !isset($data['years_experience']) || !isset($data['salary'])) {
        throw new Exception("All fields are required");
    }
    
    // Validate data types
    if (!is_numeric($data['years_experience']) || !is_numeric($data['salary'])) {
        throw new Exception("Years of experience and salary must be numeric");
    }
    
    // Sanitize and prepare data
    $professor = [
        'name' => trim($data['name']),
        'department' => trim($data['department']),
        'specialty' => trim($data['specialty']),
        'years_experience' => (int)$data['years_experience'],
        'salary' => (float)$data['salary'],
        'created_at' => new MongoDB\BSON\UTCDateTime(),
        'updated_at' => new MongoDB\BSON\UTCDateTime()
    ];
    
    // Get MongoDB collection
    $collection = getMongoDBConnection();
    
    // Insert professor into database
    $result = $collection->insertOne($professor);
    
    if ($result->getInsertedCount() === 1) {
        echo json_encode([
            'success' => true,
            'message' => 'Professor added successfully',
            'id' => (string)$result->getInsertedId()
        ]);
    } else {
        throw new Exception("Failed to insert professor");
    }
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
?>

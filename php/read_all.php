<?php
// read_all.php - Read All Professors and Apply Business Rules

require_once 'config.php';

try {
    // Get MongoDB collection
    $collection = getMongoDBConnection();
    
    // Find all professors, sorted by name
    $cursor = $collection->find([], [
        'sort' => ['name' => 1]
    ]);
    
    $professors = [];
    
    foreach ($cursor as $document) {
        // Convert MongoDB document to array
        $professor = [
            'id' => (string)$document['_id'],
            'name' => $document['name'],
            'department' => $document['department'],
            'specialty' => $document['specialty'],
            'years_experience' => $document['years_experience'],
            'salary' => $document['salary']
        ];
        
        // Apply business rule: Calculate salary bonus
        $bonusCalculation = calculateSalaryBonus(
            $professor['salary'],
            $professor['years_experience'],
            $professor['specialty']
        );
        
        $professor['computed_bonus'] = $bonusCalculation['bonus'];
        $professor['bonus_explanation'] = $bonusCalculation['explanation'];
        $professor['total_compensation'] = $professor['salary'] + $bonusCalculation['bonus'];
        
        $professors[] = $professor;
    }
    
    // Sort by total compensation (highest first) for better display
    usort($professors, function($a, $b) {
        return $b['total_compensation'] <=> $a['total_compensation'];
    });
    
    echo json_encode([
        'success' => true,
        'count' => count($professors),
        'data' => $professors
    ]);
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage(),
        'data' => []
    ]);
}
?>

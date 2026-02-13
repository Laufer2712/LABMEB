<?php
require_once '../config/db.php';

header("Content-Type: application/json; charset=UTF-8");

try {

    $search = trim($_GET['q'] ?? '');

    if ($search === '') {
        echo json_encode([]);
        exit;
    }

    $sql = "
    SELECT DISTINCT
        i.Id_institution,
        i.institution_name,
        l.laboratory_name,
        l.specialization,
        se.equipment_name,
        s.service_name,
        c.country_name
    FROM institution i
    LEFT JOIN state st ON i.Id_state = st.Id_state
    LEFT JOIN region r ON st.Id_region = r.Id_region
    LEFT JOIN country c ON r.Id_country = c.Id_country
    LEFT JOIN scientific_equipment se ON se.Id_institution = i.Id_institution
    LEFT JOIN equipment_services es ON es.Id_equipment = se.Id_equipment
    LEFT JOIN service s ON s.Id_service = es.Id_service
    LEFT JOIN laboratory_services ls ON ls.Id_service = s.Id_service
    LEFT JOIN laboratory l ON l.Id_laboratory = ls.Id_laboratory
    WHERE
        i.institution_name LIKE :search
        OR se.equipment_name LIKE :search
        OR s.service_name LIKE :search
        OR l.laboratory_name LIKE :search
        OR l.specialization LIKE :search
        OR c.country_name LIKE :search
    LIMIT 50
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'search' => "%{$search}%"
    ]);

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($results ?: []);
} catch (Exception $e) {

    http_response_code(500);
    echo json_encode([
        "error" => "Search failed",
        "message" => $e->getMessage()
    ]);
}

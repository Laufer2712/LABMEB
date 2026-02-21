<?php
require_once '../backend/config.php';

header("Content-Type: application/json; charset=UTF-8");

$search = isset($_GET['q']) ? trim($_GET['q']) : '';

if (strlen($search) < 2) {
    echo json_encode([]);
    exit;
}

$sql = "
SELECT 
    i.Id_institution,
    i.institution_name,
    i.phone,
    i.email,
    i.adress,
    i.website,

    st.state_name,
    r.region_name,
    c.country_name,

    se.Id_equipment,
    se.equipment_name,
    se.technology,

    s.Id_service,
    s.service_name

FROM institution i

LEFT JOIN state st ON i.Id_state = st.Id_state
LEFT JOIN region r ON st.Id_region = r.Id_region
LEFT JOIN country c ON r.Id_country = c.Id_country

LEFT JOIN scientific_equipment se 
    ON i.Id_institution = se.Id_institution

LEFT JOIN equipment_services es 
    ON se.Id_equipment = es.Id_equipment

LEFT JOIN service s 
    ON es.Id_service = s.Id_service

WHERE
    i.institution_name LIKE ? OR
    st.state_name LIKE ? OR
    r.region_name LIKE ? OR
    c.country_name LIKE ? OR
    se.equipment_name LIKE ? OR
    se.technology LIKE ? OR
    s.service_name LIKE ?

ORDER BY i.institution_name
LIMIT 100
";

$stmt = $pdo->prepare($sql);

$searchParam = "%{$search}%";

$stmt->execute([
    $searchParam,
    $searchParam,
    $searchParam,
    $searchParam,
    $searchParam,
    $searchParam,
    $searchParam
]);

$rows = $stmt->fetchAll();

$institutions = [];

foreach ($rows as $row) {

    $id = $row['Id_institution'];

    if (!isset($institutions[$id])) {
        $institutions[$id] = [
            'Id_institution' => $id,
            'institution_name' => $row['institution_name'],
            'country_name' => $row['country_name'],
            'state_name' => $row['state_name'],
            'address' => $row['adress'],
            'website' => $row['website'],
            'phone' => $row['phone'],
            'email' => $row['email'],
            'equipment' => [],
            'services' => []
        ];
    }

    if (!empty($row['Id_equipment'])) {
        $institutions[$id]['equipment'][$row['Id_equipment']] = [
            'name' => $row['equipment_name'],
            'technology' => $row['technology']
        ];
    }

    if (!empty($row['Id_service'])) {
        $institutions[$id]['services'][$row['Id_service']] =
            $row['service_name'];
    }
}

foreach ($institutions as &$inst) {
    $inst['equipment'] = array_values($inst['equipment']);
    $inst['services'] = array_values($inst['services']);
}

echo json_encode(array_values($institutions), JSON_UNESCAPED_UNICODE);

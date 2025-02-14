<?php

require_once '../app/Models/Database.php';

class DetalhesController
{
    public function show()
    {
        $filmId = $_GET['id'] ?? null;

        $db = new Database();
        $connection = $db->getConnection() ?? null;

        $stmt = $connection->prepare("INSERT INTO logs (endpoint, method, request_payload) VALUES (?, ?, ?)");
        $stmt->execute(['/detalhes', 'GET', json_encode(['id' => $filmId])]);

        $url = "https://swapi.dev/api/films/{$filmId}/";

        $response = file_get_contents($url);
        $film = json_decode($response, true);

        $releaseDate = new DateTime($film['release_date']);
        $today = new DateTime();
        $interval = $releaseDate->diff($today);

        $filmAge = "{$interval->y} anos, {$interval->m} meses e {$interval->d} dias";

        $multiCurl = [];
        $results = [];
        $mh = curl_multi_init();

        foreach ($film['characters'] as $i => $characterUrl) {
            $multiCurl[$i] = curl_init();
            curl_setopt($multiCurl[$i], CURLOPT_URL, $characterUrl);
            curl_setopt($multiCurl[$i], CURLOPT_RETURNTRANSFER, true);
            curl_setopt($multiCurl[$i], CURLOPT_CAINFO, 'certs\cacert-2024-12-31.pem');
            curl_multi_add_handle($mh, $multiCurl[$i]);
        }

        do {
            curl_multi_exec($mh, $running);
        } while ($running > 0);

        foreach ($multiCurl as $i => $ch) {
            $response = curl_multi_getcontent($ch);
            $results[] = json_decode($response, true);
            curl_multi_remove_handle($mh, $ch);
        }

        curl_multi_close($mh);

        $characters = $results;
        require_once '../app/Views/detalhes.php';
    }
}

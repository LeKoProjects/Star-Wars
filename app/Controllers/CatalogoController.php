<?php
require_once '../app/Models/Database.php';

class CatalogoController
{
    public function index()
    {
        $db = new Database();
        $connection = $db->getConnection();
        
        $stmt = $connection->prepare("INSERT INTO logs (endpoint, method, request_payload) VALUES (?, ?, ?)");
        $stmt->execute(['/catalogo', 'GET', null]);
        
        $url = 'https://swapi.dev/api/films/';
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CAINFO, 'certs\cacert-2024-12-31.pem');
        $response = curl_exec($ch);
        curl_close($ch);
        
        $data = json_decode($response, true);
        
        usort($data['results'], function ($a, $b) {
            return strtotime($a['release_date']) - strtotime($b['release_date']);
        });
        
        $films = $data['results'];
        
        require_once '../app/Views/catalogo.php';
    }
}
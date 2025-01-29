<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Icd_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Function untuk mendapatkan nama ICD-10 berdasarkan kode ICD
    public function get_icd_name_by_code($codeicd) {
        // Lakukan request ke API ICD WHO atau cari di database
        $token = $this->get_icd_api_token();  // Fungsi untuk mendapatkan token
        $url = 'https://id.who.int/icd/entity/' . $codeicd;

        // Menggunakan cURL untuk mendapatkan data dari API
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $token,
            'Accept: application/json',
            'Accept-Language: en',
            'API-Version: v2'
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);

        // Jika data ditemukan, kembalikan nama ICD-10
        if (isset($data['title'])) {
            return $data['title'];
        }

        return false;  // Jika tidak ditemukan, kembalikan false
    }

    // Function untuk mendapatkan token API ICD WHO
    private function get_icd_api_token() {
        // Endpoint token dan kredensial API
        $tokenEndpoint = "https://icdaccessmanagement.who.int/connect/token";
        $clientId = "46e8e3db-d2a9-401e-9d64-eabc298726fd_77b3b445-3e9f-4545-a6ae-36011c84a333";  // Ganti dengan client ID yang benar
        $clientSecret = "n/iz79oZscZEyXDReVzDvVZpLQHr3CbB9IDRKAGT3xM=";  // Ganti dengan client secret yang benar
        $scope = "icdapi_access";
        $grant_type = "client_credentials";

        // Buat cURL request untuk mendapatkan token
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $tokenEndpoint);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
            'scope' => $scope,
            'grant_type' => $grant_type
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        $json_array = json_decode($result, true);
        curl_close($ch);

        return $json_array['access_token'];
    }
}
?>

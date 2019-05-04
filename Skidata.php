<?php

/**
 * Skidata mini v1
 * @author Martin Dobry
 * @link http://webscript.cz
 * @version 1.0
 */

namespace DTA;

class Skidata
{
    public $customerId;
    public $cert;
    public $serverAPI;
    public $action;
    public $parametr;
    
    public function __construct() {
        $this->customerId = ''; // id strediska (je nutne, aby na serveru existoval konfiguracni soubor)
        $this->cert = '-----CERTIFICATE-----'; // verejny certifikat
        $this->serverAPI = ''; // url adresa komunikacniho serveru
    }
    
    public function readData() {
                
        # zasifrovat obsah
        openssl_get_publickey($this->cert);
        if (!openssl_public_encrypt($this->json, $crypttext, $this->cert))
            return json_encode(array('error' => 'Failed to encrypt data!'));
        
        # odeslat data na server
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->serverAPI . "/dta/" . $this->action . ".php");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "json=" . base64_encode($crypttext) . ($this->parametr ? '&parametr='.base64_encode(json_encode($this->parametr)) : ''));
        curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
        $data = curl_exec($ch);
        curl_close($ch);
        
        # return data
        return $data;
        
    }
    
    public function Catalog() {
        
        $this->json = json_encode(array(
            'id' => $this->customerId
        ));
        
        $this->action = "catalog";
        
        return $this->readData();
        
    }
    
    public function Chip($chip) {
        
        $this->json = json_encode(array(
            'id' => $this->customerId,
            'chip' => $chip
        ));
        
        $this->action = "chip";
        
        return $this->readData();
        
    }
    
    public function Product($product) {
        
        $this->json = json_encode(array(
            'id' => $this->customerId,
            'id_produkt' => $product
        ));
        
        $this->action = "produkt";
        
        return $this->readData();
        
    }
    
    public function Order($orderId) {
    
        $this->json = json_encode(array(
            'id' => $this->customerId,
            'id_order' => $orderId
        ));
    
        $this->action = "order";
    
        return $this->readData();
    
    }
    
    public function Orders() {
    
        $this->json = json_encode(array(
            'id' => $this->customerId
        ));
    
        $this->action = "orders";
    
        return $this->readData();
    
    }
    
    public function OrderNew($parametr) {
        
        $this->json = json_encode(array(
            'id' => $this->customerId
        ));
        
        $this->parametr = $parametr;
        $this->action = "order_new";
    
        return $this->readData();
    
    }
    
    public function Storno($orderId) {
    
        $this->json = json_encode(array(
            'id' => $this->customerId,
            'idOrder' => $orderId
        ));
    
        $this->action = "storno";
    
        return $this->readData();
    
    }
    
}
?>

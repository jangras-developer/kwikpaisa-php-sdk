<?php

namespace Jangras\Kwikpaisa;

use Illuminate\Support\Facades\Http;

class KwikPaisaService
{
    protected $apiUrl;
    protected $appId;
    protected $secretKey;
    protected $orderCurrency;

    public function __construct()
    {
        $this->apiUrl = config('kwikpaisa.api_url');
        $this->appId = config('kwikpaisa.app_id');
        $this->secretKey = config('kwikpaisa.secret_key');
        $this->orderCurrency = config('kwikpaisa.order_currency');
    }

    public function generateChecksum(array $data)
    {
        $sortedString = 'app_id' . $this->appId . 
                        'customer_address_city' . $data['customer_address_city'] . 
                        'customer_address_country' . $data['customer_address_country'] . 
                        'customer_address_line1' . $data['customer_address_line1'] . 
                        'customer_address_line2' . $data['customer_address_line2'] . 
                        'customer_address_postal_code' . $data['customer_address_postal_code'] . 
                        'customer_address_state' . $data['customer_address_state'] . 
                        'customer_email' . $data['customer_email'] . 
                        'customer_name' . $data['customer_name'] . 
                        'customer_phone' . $data['customer_phone'] . 
                        'order_amount' . $data['order_amount'] . 
                        'order_currency' . $this->orderCurrency . 
                        'order_id' . $data['order_id'] . 
                        'order_note' . $data['order_note'] . 
                        'return_url' . $data['return_url'] . 
                        'service_type' . $data['service_type'];

        // Generate the HMAC signature
        $signature = hash_hmac('sha256', $sortedString, $this->secretKey, true);
        return base64_encode($signature);
    }
	
	
	public function createOrder(array $data)
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'x-client-id' => $this->appId,
            'x-client-secret' => $this->secretKey,
            'order-source' => 'reset-api',
        ])->post("{$this->apiUrl}/order", $data);

        return $response->json();
    }
	
	
	public function fetchStatus(array $data)
{
    $response = Http::withHeaders([
        'Content-Type' => 'application/json',
        'x-client-id' => $this->appId,
        'x-client-secret' => $this->secretKey,
        'order-source' => 'reset-api', // Ensure this is the correct header value
    ])->post("{$this->apiUrl}/status", $data); // Ensure the endpoint is correct

    return $response->json();
}

	
	
	
}

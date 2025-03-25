<?php

namespace App\Models;

use CodeIgniter\Model;
use GuzzleHttp\Client;
use App\Config\OpenAI;

class OpenAIModel extends Model
{
    protected $client;

    public function __construct()
    {
        parent::__construct();
        $this->client = new Client([
            'base_uri' => 'https://api.openai.com/v1/',
            'headers' => [
                'Authorization' => 'Bearer ' . OpenAI::$apiKey,
                'Content-Type' => 'application/json'
            ]
        ]);
    }

    public function Taskhelper($userInput)
{
    try {
        $response = $this->client->post('chat/completions', [
            'json' => [
                'model' => 'gpt-4o-mini',  
                'messages' => [
                    ['role' => 'system', 'content' => 'You are a helpful assistant helping users complete their task.  Always summarise responses concisely, ensuring they fit within 500 tokens'],
                    ['role' => 'user', 'content' => "Help users complete their tasks based on: " . $userInput]
                ],
                'max_tokens' => 500
            ]
        ]);

        $body = $response->getBody()->getContents();  
        log_message('debug', 'OpenAI Response: ' . $body);

        $data = json_decode($body, true);

        return $data['choices'][0]['message']['content'] ?? 'No suggestions found.';
        } catch (\Exception $e) {
        log_message('error', 'OpenAI API Error: ' . $e->getMessage());
        return 'Error: ' . $e->getMessage();
        }
    }
}
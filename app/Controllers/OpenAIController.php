<?php

namespace App\Controllers;

use App\Models\OpenAIModel;
use CodeIgniter\RESTful\ResourceController;

class OpenAIController extends ResourceController
{
    public function HelpTask()
    {
        $userInput = $this->request->getVar('input');

        if (!$userInput) {
            return $this->response->setJSON(['error' => 'Input is required']);
        }

        $openAI = new OpenAIModel();
        $helper = $openAI->Taskhelper($userInput);

        return $this->response->setJSON(['suggestions' => $helper]);
    }
}

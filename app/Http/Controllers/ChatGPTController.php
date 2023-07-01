<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatGPTController extends Controller
{
    public function index()
    {
        return view('chatgpt.index');
    }

    public function ask(Request $request)
    {
        $prompt = $request->input('prompt');
        return $this->askToChatGPT($prompt);
    }

    private function askToChatGPT($prompt) 
    {
        $response = Http::withoutVerifying()
            ->withHeaders([
                'Authorization' => 'Bearer ' . config('openai.api_key'),
                'Content-Type' => 'application/json',
            ])->post('https://api.openai.com/v1/chat/completions', [
                "model" => "gpt-3.5-turbo",
                "messages" => [[
                    "role" => "user",
                    "content" => $prompt
                ]],
                "max_tokens" => 1000
            ]);

        return $response->json()['choices'][0]['message']['content'];
    }
}
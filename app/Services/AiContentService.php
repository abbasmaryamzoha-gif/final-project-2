<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;





class AiContentService
{
    
    public function generateDraft(string $title, string $type, string $tone, $temp): string
    {
   
    $response = Http::withHeaders([
    'x-goog-api-key' => config('services.gemini.key'),
    'Content-Type'   => 'application/json',
])->post(config('services.gemini.url') . '/models/' . config('services.gemini.model') . ':generateContent', [
    'systemInstruction' => [
        'parts' => [['text' => 'Keep responses brief. ']],
    ],
    'contents' => [
        ['parts' => [['text' => $this->buildPrompt($title, $type, $tone)]]],
    ],
    'generationConfig' => [
        'temperature'     => (float)$temp,
        'maxOutputTokens' => 50,
    ],
]);
 //dd($response->status(), $response->body());

if (! $response->successful()) {
    Log::error('Gemini request failed', [
        'status' => $response->status(),
        'body'   => $response->body(),
    ]);

    throw new Exception('The AI request failed.');
}

$text = $response['candidates'][0]['content']['parts'][0]['text'] ?? 'No output received';
return $text;

 }



 private function buildPrompt(string $title, string $type, string $tone): string
{
return "create a short {$type} in a {$tone} tone, on the subject {$title}.";
   
 }


}

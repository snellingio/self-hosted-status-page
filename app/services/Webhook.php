<?php

namespace Service;

class Webhook
{

    public function send(array $data) : bool
    {
        if (!WEBHOOK) {
            return false;
        }
        $urls = unserialize(WEBHOOK_URLS);
        $data = json_encode($data, JSON_PRETTY_PRINT);

        foreach ($urls as $url) {
            if (filter_var($url, FILTER_VALIDATE_URL)) {
                $context = stream_context_create(
                    [
                        'http' => [
                            'method'  => 'POST',
                            'header'  => 'Content-Type: application/json',
                            'content' => $data,
                        ],
                        'ssl'  => [
                            'verify_peer'      => false,
                            'verify_peer_name' => false,
                        ],
                    ]
                );
                file_get_contents($url, false, $context);
            }
        }
        return true;
    }

    public function slack(string $message) : bool
    {
        if (!SLACK_WEBHOOK) {
            return false;
        }
        $data    = json_encode(['text' => $message]);
        $context = stream_context_create(
            [
                'http' => [
                    'method'  => 'POST',
                    'header'  => 'Content-Type: application/json',
                    'content' => $data,
                ],
                'ssl'  => [
                    'verify_peer'      => false,
                    'verify_peer_name' => false,
                ],
            ]
        );
        file_get_contents(SLACK_WEBHOOK_URL, false, $context);
        return true;
    }
}

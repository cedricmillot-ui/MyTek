<?php

namespace Lib\Mailer;

class Mailer
{
    // Valeurs dynamiques (définies via Mailer::set())
    protected static string $to = '';
    protected static string $subject = '';
    protected static string $body = '';
    protected static string $from = '';

    // Valeurs par défaut (configurées via Mailer::init())
    protected static string $defaultTo = '';
    protected static string $defaultFrom = '';

    /**
     * Initialise les valeurs par défaut à partir d'une config.
     */
    public static function init(array $defaults): void
    {
        self::$defaultTo   = $defaults['to']   ?? '';
        self::$defaultFrom = $defaults['from'] ?? '';
    }

    /**
     * Définit les infos d'un email à envoyer.
     */
    public static function set(
        string $to = '',
        string $subject = '',
        string $body = '',
        string $from = ''
    ): void {
        self::$to      = $to;
        self::$subject = $subject;
        self::$body    = $body;
        self::$from    = $from;
    }

    public static function sendWithBrevo(string $subject, string $body, string $replyTo = ''): bool
    {
        $apiKey = getenv('BREVO_API_KEY');
        if (!$apiKey) {
            return false;
        }

        $data = [
            "sender" => [
                "name"  => "Byfect Website",
                "email" => "noreply@byfect.com"
            ],
            "to" => [[
                "email" => "contact@byfect.com",
                "name"  => "Byfect Contact"
            ]],
            "subject"     => $subject,
            "htmlContent" => "<html><body>{$body}</body></html>"
        ];

        if ($replyTo) {
            $data['replyTo'] = ["email" => $replyTo];
        }

        $ch = curl_init('https://api.brevo.com/v3/smtp/email');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'api-key: ' . $apiKey,
            'Content-Type: application/json',
            'Accept: application/json',
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return $httpCode === 201;
    }

    public static function debug(string $subject, string $body): void
    {
        echo "<pre>";
        echo "TO: contact@byfect.com\n";
        echo "FROM: noreply@byfect.com\n";
        echo "SUBJECT: $subject\n\n";
        echo "BODY:\n$body";
        echo "</pre>";
    }
}

<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    public const LOG_ERROR   = 1;
    public const LOG_WARNING = 2;
    public const LOG_INFO    = 3;

    protected $fillable = [
        'title',
        'message',
        'type',
        'date',
    ];

    public static function make(string $title, string $message, int $type)
    {
        Log::create([
            'title' => $title,
            'message' => $message,
            'type' => $type,
            'date' => (new \DateTimeImmutable()),
        ]);
    }
}

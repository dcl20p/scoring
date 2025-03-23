<?php

namespace App\Logging;

use App\Models\Log;
use Monolog\Logger;
use Monolog\LogRecord;
use Illuminate\Support\Facades\Auth;
use Monolog\Handler\AbstractProcessingHandler;

class DatabaseLogger extends AbstractProcessingHandler
{
    protected function write(LogRecord $record): void
    {
        if (!in_array($record['level_name'], ['ERROR', 'WARNING', 'CRITICAL', 'ALERT', 'EMERGENCY'])) {
            return;
        }

        $request = request();
    
        // Get route info
        $routeName = $request->route() ? $request->route()->getName() : 'unknown';
        $method = $request->method();
        $url = $request->fullUrl();

        // Convert LogRecord to array format
        $context = [];
        if ($record->context) {
            $context = array_map(function ($item) {
                if ($item instanceof \Exception) {
                    return [
                        'class' => get_class($item),
                        'message' => $item->getMessage(),
                        'code' => $item->getCode(),
                        'file' => $item->getFile(),
                        'line' => $item->getLine(),
                        'trace' => $item->getTraceAsString()
                    ];
                }
                return $item;
            }, $record->context);
        }
        
        // Create log entry
        Log::create([
            'level' => $record->level->getName(),
            'message' => $record->message,
            'context' => array_merge($context, [
                'route' => $routeName,
                'method' => $method,
                'url' => $url,
                'referer' => $request->headers->get('referer'),
                'channel' => $record->channel
            ]),
            'extra' => $record->extra ?? null,
            'user_id' => $record->context['userId'] ?? null,
            'user_type' => Auth::check() ? Auth::user()->role : Log::USER_TYPE_GUEST,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'created_at' => $record->datetime->format('Y-m-d H:i:s.u'),
        ]);
    }

    public function __invoke(array $config)
    {
        $logger = new Logger('database');
        $logger->pushHandler($this);

        return $logger;
    }
}
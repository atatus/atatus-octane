<?php

namespace Atatus\Laravel\Octane\Middleware;

use Closure;
use Atatus\Models\Transaction;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\TerminableInterface;

class WebRequestMonitoring implements TerminableInterface
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     * @throws \Exception
     */
    public function handle($request, Closure $next)
    {

        $this->startTransaction($request);

        return $next($request);
    }

    /**
     * Start a transaction for the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     */
    protected function startTransaction($request)
    {
        if (extension_loaded('atatus')) {
            atatus_end_transaction();
            atatus_begin_transaction();
            atatus_set_background_transaction(false);
            atatus_set_transaction_name($request->route()->uri());
	      }

    }

    public function terminate(Request $request, Response $response): void
    {
        if (extension_loaded('atatus')) {
            atatus_end_transaction();
        }
    }
}

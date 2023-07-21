<?php

namespace App\Http\Middleware;

use App\Models\System\Invitation;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HasInvitation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /**
         * Only for GET requests. Otherwise, this middleware will block our registration.
         */
        if ($request->isMethod('get')) {

            /**
             * No token = Goodbye.
             */
         //   dd($request->has('invitation_token'));
            if (!$request->has('invitation_token')) {
                return $next($request);
            }

            $invitation_token = $request->get('invitation_token');

            $invitation = Invitation::where('invitation_token', $invitation_token)->firstOrFail();
            if (!$invitation) {
                return abort(412);
            }
            /**
             * Lets try to find invitation by its token.
             * If failed -> return to request page with error.
             */
//            try {
//                $invitation = Invitation::where('invitation_token', $invitation_token)->whereNull('register_at')->firstOrFail();
//            } catch (ModelNotFoundException $e) {
//                return redirect(route('invite'))
//                    ->with('error', 'Wrong invitation token! Please check your URL.');
//            }

            /**
             * Let's check if users already registered.
             * If yes -> redirect to login with error.
             */
            if (!is_null($invitation->registered_at)) {
                return redirect(route('login'))->with('error', 'The invitation link has already been used.');
            }
        }

        return $next($request);
    }
}

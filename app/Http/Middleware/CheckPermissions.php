<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Config;

class CheckPermissions
{

    public function handle($request, Closure $next, $role = null) {

        switch ($role) {

            case 'operator':
                $mask = Config::get('constants.PERMISSIONS_OPERATOR');
                break;
            case 'clients':
                $mask = Config::get('constants.PERMISSIONS_CLIENTS');
                break;
            case 'administrator':
                $mask = Config::get('constants.PERMISSIONS_ADMINISTRATOR');
                break;
            case 'superuser':
                $mask = Config::get('constants.PERMISSIONS_SUPERUSER');
                break;
            default:
                $mask = 0x00;
        }
        if (! Auth::check())  return redirect('./');


        if (! (Auth::user()->permissions & $mask)) {
            return redirect('./');
        }
        return $next($request);
    }

}
<?php 

namespace App\Http\Middleware;

class onlyAjax
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        if ( !$request->ajax()) {
            $requestedURLAJ = str_after($request->url(), '.com');
            $subQ = explode("/", $requestedURLAJ);
            $redirectURL = preg_replace('/[^A-Za-z0-9_\-]/', '', $subQ[1]);
            if(isset($subQ[2])) {
                if(isset($subQ[3])) {
                    $redirectURL = preg_replace('/[^A-Za-z0-9_\-]/', '', $subQ[1]) .'/'. preg_replace('/[^A-Za-z0-9_\-]/', '', $subQ[2]);
                    return redirect('/?redirect='.$redirectURL."&args=".$subQ[3]);
                } else {
                    return redirect('/?redirect='.$redirectURL."&args=".$subQ[2]);
                }
            } else {
                return redirect('/?redirect='.$redirectURL);
            }
        }

        return $next($request);
    }
}
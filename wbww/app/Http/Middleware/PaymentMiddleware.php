<?php
namespace App\Http\Middleware;
require 'vendor/autoload.php';
use Closure;



class PaymentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $payment = new AuthorizeNetAIM("99C53fvUdh", "98chL8Z8Dn5L4v59");
        $payment ->setSandbox(true);
        $payment -> amount = "99.00";
        $payment -> card_num = $request->get('cc_number');
        $payment -> exp_date = $request->get('exp-date');
        $payment -> card_code = $request->get('cvv_num');

        if ($request->get('same') == '1'){
            $payment -> first_name = $request->get('first_name');
            $payment -> last_name = $request->get('last_name');
            $payment -> user_address = $request->get('user_address');
            $payment -> user_city = $request->get('user_city');
            $payment -> user_state = $request->get('user_state');
            $payment -> user_zip = $request->get('user_zip');
        }
        else{
            $payment -> first_name = $request->get('first_name_billing');
            $payment -> last_name = $request->get('last_name_billing');
            $payment -> user_address = $request->get('user_address_billing');
            $payment -> user_city = $request->get('user_city_billing');
            $payment -> user_state = $request->get('user_state_billing');
            $payment -> user_zip = $request->get('user_zip_billing');
        }

        $response = $payment->authorizeAndCapture();
        if ($response->approved) {
            return $next($request);
        }
        else{
            return redirect()->back()
                ->with('payment_failed', 'Oops! Something went wrong. Please check your payment info.')
                ->withInput();
        }
        
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\CustomerService;
use App\Traits\ApiResponse;
use App\Traits\RenderIdNumberTrait;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use ApiResponse, RegistersUsers, RenderIdNumberTrait;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $max255 = 'max:255';

        return Validator::make($data, [
            'name' => ['required', 'string', $max255],
            'email' => ['required', 'string', 'email', $max255, 'unique:users'],
            'company_name' => ['required', 'string', $max255],
            'password' => ['required', 'string', 'min:8'],
            'password_confirmation' => ['required', 'string', 'min:8', 'same:password'],
            //            'g-recaptcha-response' => ['recaptchav3:register,0.5'],
        ], [], [
            'name' => strtolower(__('message.user.user_name')),
            'email' => strtolower(__('message.user.email')),
            'company_name' => strtolower(__('message.user.company_name')),
            'password' => strtolower(__('message.auth.new_password')),
            'password_confirmation' => strtolower(__('message.auth.confirm_password')),
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return app(CustomerService::class)->createCustomer($data, isCreatedByClient: true);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($this->create($request->all())));

        return $request->wantsJson()
            ? $this->successResponse(__('message.notify.success.sign_up'))
            : redirect()->route('login')->with('success', __('message.notify.success.sign_up'));
    }
}

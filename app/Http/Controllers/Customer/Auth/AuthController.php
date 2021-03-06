<?php

namespace App\Http\Controllers\Customer\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Customer\Auth\LoginRegisterRequest;
use App\Mail\OtpMail;
use App\Models\DeliveryTime;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function loginRegisterForm(): View
    {
        return view('customer.auth.login-register');
    }

    public function loginRegister(LoginRegisterRequest $request): RedirectResponse
    {
        $request = $request->validated();
        $isEmail = false;
        $newUser = null;
        $user = null;

        if (filter_var($request['id'], FILTER_VALIDATE_EMAIL)) {
            $isEmail = true;

            $user = User::where('email', $request['id'])->first();

            if (empty($user)) {
                $newUser['email'] = $request['id'];
            }
        } else {
            return back()
                ->withInput()
                ->withErrors(['id' => 'ایمیل معتبر نیست.']);
        }

        if (!$user) {
            $newUser['password'] = bcrypt('password');
            $newUser['delivery_time_id'] = DeliveryTime::first()->id;

            $user = User::create($newUser);
        }

        $otp = $this->getOtpCode($user, $request['id'], $isEmail);

        // remove this - superadmin logs without code
        if($user->email === User::SUPERADMIN_EMAIL) {
            auth()->login($user);

            if ($session = session('url.intended')) {
                session()->forget('url');
            } else if ($session = session('verify.finally')) {
                session()->forget('verify');
            }

            return $session
                ? redirect($session)
                : redirect()->route('customer.index');
        }
        // 

        Mail::to($user->email)
            ->queue(new OtpMail($otp->code));

        return redirect()
            ->route('customer.auth.confirmationForm', $otp->token);
    }

    public function confirmationForm(Otp $otp): View
    {
        return view('customer.auth.confirmation', compact('otp'));
    }

    public function confirmation(Request $request, Otp $otp): RedirectResponse
    {
        $request = $request->validate([
            'code' => 'required'
        ]);

        $otpIsActive = $otp->updated_at->gt(now()->subMinutes(2));

        if ($otp->code != $request['code']) {
            return back()
                ->withInput()
                ->withErrors([
                    'code' => 'کد وارد شده معتبر نیست.'
                ]);
        } else if (!$otpIsActive) {
            return back()
                ->withInput()
                ->withErrors([
                    'code' => 'کد وارد شده منقضی شده. '
                ]);
        }

        $id = null;

        if ($otp->type === Otp::MOBILE) {
            $id = [
                'mobile' => $otp->login_id
            ];
        } else if ($otp->type === Otp::EMAIL) {
            $id = [
                'email' => $otp->login_id
            ];
        }

        $otp->user->update([
            'email_verified_at' => now(),
            $id
        ]);
        auth()->login($otp->user, true);
        $otp->delete();

        if ($session = session('url.intended')) {
            session()->forget('url');
        } else if ($session = session('verify.finally')) {
            session()->forget('verify');
        }

        return $session
            ? redirect($session)
            : redirect()->route('customer.index');
    }

    public function resendCode(Otp $otp): RedirectResponse
    {
        $otpIsActive = $otp->updated_at->gt(now()->subMinutes(2));

        if ($otpIsActive) {
            return back()
                ->withErrors(['code' => 'باید دو دقیقه از ارسال کد بگذرد.']);
        }

        $otp->update([
            'code' => rand(111111, 999999)
        ]);

        Mail::to($otp->login_id)
            ->queue(new OtpMail($otp->code));

        return back()
            ->with('sent', 'با موفقیت دوباره ارسال شد.');
    }

    // public function verifyEmailForm()
    // {
    //     if (!filter_var($email = session('verify.email') ?? auth()->user()->email, FILTER_VALIDATE_EMAIL)) {
    //         return back()
    //             ->withInput()
    //             ->withErrors(['code' => 'ایمیل معتبر نیست.']);
    //     }

    //     $otp = $this->getOtpCode(auth()->user(), $email, isEmail: true);

    //     Mail::to($email)
    //         ->queue(new OtpMail($otp->code));

    //     return view('customer.auth.confirmation', compact('otp'));
    // }

    public function logout()
    {
        auth()->logout();

        return to_route('customer.index');
    }

    private function getOtpCode($user, $id, $isEmail = false)
    {
        if ($user->otps()->active()->exists()) {
            $otp = $user->otps()->active()->first();
        } else {
            $otp = $user->otps()->create([
                'token' => \Str::random(60),
                'code' => rand(111111, 999999),
                'login_id' => $id,
                'type' => $isEmail ? Otp::EMAIL : Otp::MOBILE
            ]);
        }

        return $otp;
    }
}

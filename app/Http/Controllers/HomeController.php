<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegistratioinRequest;

use App\Models\PaymentMethod;
use App\Models\ReunionRegistrationDetail;

use App\Models\StudentInformation;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(): View
    {
        //show home page
        $payment_methods = PaymentMethod::PAYMENT_METHODS;
        return view('pages.home',compact('payment_methods'));
    }

    public function store(StoreRegistratioinRequest $request)
    {
        try {
            if ($request->name!=null && $request->phone && $request->passing_year!=null && $request->gender!=null && $request->t_shirt_size!=null && $request->payment_method!=null &&  $request->account_no!=null && $request->transaction_no!=null ){

                $student = new StudentInformation();
                $student->name = $request->name;
                $student->phone = $request->phone;
                $student->passing_year = $request->passing_year;
                $student->gender = $request->gender;
                $student->status = StudentInformation::ACTIVE;
                $student->created_at = Carbon::now();
                $student->created_by = auth()->id();
                $student->updated_at = Carbon::now();
                $student->updated_by = auth()->id();
                $student->deleted = StudentInformation::DELETED_NO;
                $student->deleted_by = auth()->id();
                $student->deleted_at = Carbon::now();

                $student->save();
                $registration = new ReunionRegistrationDetail();
                $registration->student_id = $student->id;
                if (isset($request->guest) && $request->guest!=null){
                    $registration->total_guest = $request->guest;
                    $registration->payment_method_id = $request->payment_method;

                    $registration->amount = ($registration->total_guest*300)+500;
                }else{
                    $registration->amount = ($registration->total_guest*300)+500;
                }
                $registration->transaction_id = $request->transaction_no;
                $registration->payment_status = ReunionRegistrationDetail::PAYMENT_UNPAID;
                $registration->t_shirt_size = $request->t_shirt_size;
                $registration->account_no = $request->account_no;
                $registration->transaction_id = $request->transaction_no;
                $registration->status = ReunionRegistrationDetail::ACTIVE;
                $registration->created_at = Carbon::now();
                $registration->created_by = auth()->id();
                $registration->updated_at = Carbon::now();
                $registration->updated_by = auth()->id();
                $registration->deleted = ReunionRegistrationDetail::DELETED_NO;
                $registration->deleted_by = auth()->id();
                $registration->deleted_at = Carbon::now();
                $registration->save();
                $payment_method = new PaymentMethod();
                $payment_method->name = $request->payment_method;
                $payment_method->reunion_registration_details_id = $registration->id;
                $payment_method->status = PaymentMethod::ACTIVE;
                $payment_method->created_at = Carbon::now();
                $payment_method->created_by = auth()->id();
                $payment_method->updated_at = Carbon::now();
                $payment_method->updated_by = auth()->id();
                $payment_method->deleted = PaymentMethod::DELETED_NO;
                $payment_method->deleted_by = auth()->id();
                $payment_method->deleted_at = Carbon::now();
                $payment_method->save();
                $registration->payment_method_id = $payment_method->id;
                $registration->save();
                return redirect()->route('frontend.registration.success');
            }
        }catch(\Exception $e){
            return back()->with('error',$e->getMessage());
        }
        return back()->with('error','Something is wrong');
    }

    public function showLogin()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/dashboard');
        }

        // Authentication failed...
        return redirect()->route('login')->withErrors(['email' => 'Invalid credentials']);
    }
    public function success()
    {
        return view('pages.success');
    }

    public function dashboard()
    {
        $students = StudentInformation::with('detail')
            ->where('deleted',StudentInformation::DELETED_NO)
            ->paginate(2);
        return view('pages.admin' ,compact('students'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}

<?php

namespace App\Http\Controllers;

use App\Exports\StudentExport;
use App\Http\Requests\StoreRegistratioinRequest;

use App\Models\PaymentMethod;
use App\Models\ReunionRegistrationDetail;

use App\Models\StudentInformation;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Excel;

class HomeController extends Controller
{
    public function index(): View
    {
        //show home page
        $payment_methods = PaymentMethod::PAYMENT_METHODS;
        return view('pages.home',compact('payment_methods'));
    }

        public function getSponserList()
    {
         $students = StudentInformation::with('details')
         ->where('sponsor','on')
            ->where('deleted',StudentInformation::DELETED_NO)
            ->get();
          //dd($students);
        return view('pages.sponser' ,compact('students'));
    }
    public function store(StoreRegistratioinRequest $request)
    {
        try {
            if ($request->name!=null && $request->phone && $request->passing_year!=null && $request->gender!=null && $request->t_shirt_size!=null && $request->payment_method!=null &&  $request->account_no!=null && $request->transaction_no!=null ){

                $student = new StudentInformation();
                $student->name = $request->name;
                $student->phone = $request->phone;
                $student->passing_year = $request->passing_year;
                if ($request->current_student!=null){
                    $student->current_student = $request->current_student;
                }
                if ($request->sponsor!=null){
                    $student->sponsor = $request->sponsor;
                }
                $student->gender = $request->gender;
                $student->status = StudentInformation::ACTIVE;
                $student->created_at = Carbon::now();
                $student->created_by = auth()->id();
                $student->updated_at = Carbon::now();
                $student->updated_by = auth()->id();
                $student->save();
                $registration = new ReunionRegistrationDetail();
                $registration->student_id = $student->id;
                $registration->t_shirt_size = $request->t_shirt_size;
                if ($request->current_student!=null && $request->current_student=='on'){
                    if (isset($request->guest) && $request->guest!=null){
                        $registration->total_guest = $request->guest;
                        $registration->amount = ($registration->total_guest*300)+300;
                    }else{
                        $registration->amount = 300;
                    }
                }elseif(isset($request->sponsor) && $request->sponsor!=null){
                    $registration->amount = $request->sponsor_amount;
                }else{
                    if (isset($request->guest) && $request->guest!=null){
                        $registration->total_guest = $request->guest;
                        $registration->amount = ($registration->total_guest*300)+500;
                    }else{
                        $registration->amount = 500;
                    }

                    }
                $registration->payment_method_id = $request->payment_method;
                $registration->transaction_id = $request->transaction_no;
                $registration->payment_status = ReunionRegistrationDetail::PAYMENT_UNPAID;

                $registration->account_no = $request->account_no;
                $registration->status = ReunionRegistrationDetail::ACTIVE;
                $registration->created_at = Carbon::now();
                $registration->created_by = auth()->id();
                $registration->updated_at = Carbon::now();
                $registration->updated_by = auth()->id();
                $registration->save();
                $payment_method = new PaymentMethod();
                $payment_method->name = $request->payment_method;
                $payment_method->reunion_registration_details_id = $registration->id;
                $payment_method->status = PaymentMethod::ACTIVE;
                $payment_method->created_at = Carbon::now();
                $payment_method->created_by = auth()->id();
                $payment_method->updated_at = Carbon::now();
                $payment_method->updated_by = auth()->id();
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
        $students = StudentInformation::with('details','details.method')
            ->where('deleted',StudentInformation::DELETED_NO)
            ->get();
          // dd($students);
        return view('pages.admin' ,compact('students'));
    }
    public function export(){
        return Excel::download(new StudentExport, 'students.xlsx');
          //redirect()->route('dashboard');
    }
    public function status($id)
    {
        try {
            $payment_status = ReunionRegistrationDetail::where('deleted',StudentInformation::DELETED_NO)
                ->where('id',$id)
                ->first();
            $payment_status->payment_status = !$payment_status->payment_status;
            $payment_status->status = ReunionRegistrationDetail::ACTIVE;
            $payment_status->updated_at = Carbon::now();
            $payment_status->updated_by = auth()->id();
            $payment_status->save();
                         if($payment_status->payment_status == 1 ){
                 $student = StudentInformation::where('id',$payment_status->student_id)->first();
                 if (substr($student->phone, 0, 2) !== "88") {
    $phone_number = "88".$student->phone;
}
$cupon = $this->generateUniqueCode($payment_status);
                 $url = "https://smsapi.shiramsystem.com/user_api/";
$post = array(
 "email" => "exstudentforumjbschool@gmail.com",
 "password" => "87654321",
 "method" => "send_sms",
 "mobile" => array($phone_number),
 "mask" => "Non-Masking", 
 "message"=>"অভিনন্দন। আপনার রিইউনিয়ন-২০২৪ রেজিট্রেশন সফল হয়েছে। আপনার কুপন ".$cupon."। টিশার্ট, খাবার এবং লটারির জন্য কুপনটি গোপন রাখুন।",
);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FAILONERROR, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
//return $result;

             }
            return back()->with('success','Status Updated Successfully');
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
public function delete($id){
    try{
         $student = StudentInformation::where('id',$id)->first();
                $student->deleted = PaymentMethod::DELETED_YES;
                $student->deleted_by = auth()->id();
                $student->deleted_at = Carbon::now();
    $student->save();
    $reunion =  ReunionRegistrationDetail::where('student_id',$student->id)
                ->first();
                  $reunion->deleted = PaymentMethod::DELETED_YES;
                $reunion->deleted_by = auth()->id();
                $reunion->deleted_at = Carbon::now();
    $reunion->save();
      $payment =  PaymentMethod::where('reunion_registration_details_id',$reunion->id)
                ->first();
       $payment->deleted = PaymentMethod::DELETED_YES;
                $payment->deleted_by = auth()->id();
                $payment->deleted_at = Carbon::now();
    $payment->save();
                return redirect()->route('dashboard')->with('success','Data has been deleted.');
    }catch(\Exception $e)
    { return redirect()->route('dashboard')->with('success',$e->getMessage());}
   
}
public function generateUniqueCode($payment_status)
    {
       
        do {
            $newCode = $this->generateRandomCode();
        } while ($this->codeExists($newCode));
 $payment_status->cupon = $newCode;
  $payment_status->save();
        return $newCode;
    }

    private function generateRandomCode()
    {
        return str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
    }

    private function codeExists($code)
    {
        return ReunionRegistrationDetail::where('cupon', $code)->exists();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}

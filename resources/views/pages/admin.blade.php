@extends('main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Students</h3>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered table-responsive text-capitalize text-center">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th>Passing Year</th>
                            <th>T-Shirt Size</th>
                            <th>Guest</th>
                            <th>Payment Method</th>
                            <th>Account No</th>
                            <th>Transaction No</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>{{$student->name}}</td>
                                <td>{{$student->phone}}</td>
                                <td>{{$student->gender}}</td>
                                <td>{{$student->passing_year}}</td>
                                <td>{{$student->detail->t_shirt_size}}</td>
                                <td>{{$student->detail->total_guest}}</td>
                                <td>{{\App\Models\PaymentMethod::PAYMENT_METHODS[$student->detail->method->name]}}</td>
                                <td>{{$student->detail->account_no}}</td>
                                <td>{{$student->detail->transaction_id}}</td>
                                <td>{{$student->detail->amount}}</td>
                                <td>
                                    @if($student->detail->payment_status==0) <span class="bg-danger text-white p-1 rounded-2">Pending</span> @else<span class="bg-primary text-white p-1 rounded-2">Paid</span> @endif
                                </td>
                                <td><a>Paid</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $students->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

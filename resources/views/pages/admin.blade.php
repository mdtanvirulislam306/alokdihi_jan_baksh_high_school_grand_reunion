@extends('main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Registered Students Details</h3>
                </div>
                <div class="card-body">
                    <table id="myTable" class="table table-hover table-bordered text-capitalize text-center">
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
                                <td>{{$student->details->t_shirt_size}}</td>
                                <td>{{$student->details->total_guest}}</td>
                                <td>{{\App\Models\PaymentMethod::PAYMENT_METHODS[$student->details->method->name]}}</td>
                                <td>{{$student->details->account_no}}</td>
                                <td>{{$student->details->transaction_id}}</td>
                                <td>{{$student->details->amount}}</td>
                                <td id="payment_status">
                                    @if($student->details->payment_status==0) <span class="bg-danger text-white p-1 rounded-2">Pending</span> @else<span class="bg-primary text-white p-1 rounded-2">Paid</span> @endif
                                </td>
                                <td>
                                    @if($student->details->payment_status==0)
                                    <a href="{{ route('status',$student->details->id) }}" class="btn btn-info btn-sm">Paid</a>
                                    @elseif($student->details->payment_status==1)
                                        <a href="{{ route('status',$student->details->id) }}" class="btn btn-info btn-sm" >Unpaid</a>
                                    @endif
                                    <a href="{{ route('delete',$student->id) }}" class="btn btn-danger btn-sm m-2" >Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        /*let id = $('#status').attr('data-id');
        $('#status-'+id+'').on('click',function (e) {
            let id = $('#status').attr('data-id');
                let url = '{{ route('status',':id') }}'
            url = url.replace(':id',id)
            $.ajax({
                url:url,
                type: 'GET',
                success:function (r) {
                     $('#status').text('loading..');
                    if(r.status===200){
                        console.log(r.msg)
                        window.location.reload()
                    }
                },
                error: function (error) {
                    console.error(error);
                    // Handle error response
                }
            })
        })*/
        let table = new DataTable('#myTable');
    </script>

@endsection

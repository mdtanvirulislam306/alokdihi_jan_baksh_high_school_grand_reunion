@extends('main')
@section('content')
        <table id="myTable" class="table table-hover table-bordered text-capitalize text-center">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Passing Year</th>
                            <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                        @if($student->details->payment_status==1 && $student->details->amount>2000)
                        <tr>
                                <td>{{$student->name}}</td>
                                <td>{{$student->passing_year}}</td>
                                <td>{{$student->details->amount}}</td>
                            </tr>
                          
                        @endif
                            
                        @endforeach
                        </tbody>
                    </table>



@endsection
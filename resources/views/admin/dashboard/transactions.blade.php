@extends('admin.partials.layout')
@section('admincontent')

<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Payment Name</th>
        <th scope="col">Amount</th>
        <th scope="col">Payment Status</th>
        <th scope="col">Transaction Id</th>
      </tr>
    </thead>

    <tbody>
        @forelse ($usertransactions as $usertransaction)
        <tr>
            <th scope="row">{{$usertransaction->payment_name}}</th>
            <td>{{$usertransaction->payment_amount}}</td>
            <td>{{$usertransaction->payment_status}}</td>
            <td>{{$usertransaction->transaction_id}}</td>
          </tr>
        @empty
            
        @endforelse

    
    
    </tbody>
  </table>
  <div class="d-flex justify-content-center">
    {!! $usertransactions->links() !!}
</div>
@endsection
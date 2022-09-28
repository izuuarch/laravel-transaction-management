@include('user/partials/header')

<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Payment Name</th>
        <th scope="col">Amount</th>
        <th scope="col">Payment Status</th>
        <th scope="col">Transaction Id</th>
        <th scope="col">Restore</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>

    <tbody>
        @forelse ($trash as $usertransaction)
        <tr>
            <th scope="row">{{$usertransaction->payment_name}}</th>
            <td>{{$usertransaction->payment_amount}}</td>
            <td>{{$usertransaction->payment_status}}</td>
            <td>{{$usertransaction->transaction_id}}</td>
            <td>
                <form action="restore/{{ $usertransaction->transaction_id}}" method="POST">
                    @csrf
                   <button class="btn btn-danger" type="submit">restoreissue</button>
                   </form>
            </td>
            <td>
              <form action="forcedelete/{{ $usertransaction->transaction_id}}" method="post">
                @csrf
                @method('DELETE')
            <button class="btn btn-danger" type="submit">Delete Permanently</button>
            </form>
            </td>
          </tr>
        @empty
            
        @endforelse
    
    
    </tbody>
  </table>
  <div class="d-flex justify-content-center">
    {!! $trash->links() !!}
</div>
@include('user/partials/footer')
@extends('admin.partials.layout')
@section('admincontent')
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">UserId</th>
      </tr>
    </thead>

    <tbody>
        @forelse ($fetchusers as $fetchuser)
        <tr>
            <th scope="row">{{$fetchuser->name}}</th>
            <td>{{$fetchuser->email}}</td>
            <td>{{$fetchuser->userid}}</td>
          </tr>
        @empty
            
        @endforelse

    
    
    </tbody>
  </table>
@endsection
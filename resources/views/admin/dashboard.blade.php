@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 p-3">
                <div class="card">
                    <div class="card-header">
                        My Camps
                    </div>
                    <div class="card-body">
                        @include('components.alert')
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Camp</th>
                                    <th>Price</th>
                                    <th>Register Data</th>
                                    <th>Paid Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($checkout as $item)
                                    <tr>
                                        <td>{{ $item->User->name }}</td>
                                        <td>{{ $item->Camp->title }}</td>
                                        <td>{{ $item->Camp->price }}</td>
                                        <td>{{ $item->created_at->format('M d Y') }}</td>
                                        <td>
                                            @if ($item->is_paid)
                                                <span class="badge bg-success">Paid</span>
                                            @else
                                                <span class="badge bg-warning">Waiting</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if (!$item->is_paid)
                                                <form action="{{ route('admin.checkout.update', $item->id) }}"
                                                    method="post">
                                                    @csrf
                                                    <button class="btn btn-primary btn-sm">Set To Paid</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">No camps Registered</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <section class="dashboard my-5">
        <div class="container">
            <div class="row text-left">
                <div class=" col-lg-12 col-12 header-wrap mt-4">
                    <p class="story">
                        DASHBOARD
                    </p>
                    <h2 class="primary-header ">
                        My Bootcamps
                    </h2>
                </div>
            </div>
            <div class="row my-5">
                @include('components.alert')
                <table class="table">
                    <tbody>
                        @forelse ($checkout as $item)
                            <tr class="align-middle">
                                <td width="18%">
                                    <img src="{{ asset('images/item_bootcamp.png') }}" height="120" alt="">
                                </td>
                                <td>
                                    <p class="mb-2">
                                        <strong>{{ $item->Camp->title }}</strong>
                                    </p>
                                    <p>
                                        {{ $item->created_at->format('M d, Y') }}
                                    </p>
                                </td>
                                <td>
                                    <strong>{{ $item->Camp->price }}K</strong>
                                </td>
                                <td>
                                    @if ($item->is_paid == true)
                                        <strong class="text-green">Payment success</strong>
                                    @else
                                        <strong class="text-warning">Waiting For Payment</strong>
                                    @endif
                                </td>
                                <td>
                                    <a href="https://wa.me/+6289627103183?text=Hi, Saya ingin Bertanya tentang Kelas {{ $item->Camp->title }}"
                                        class="btn btn-primary">
                                        Contact Support
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr colspan='5'>
                                <h3>No Data</h3>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

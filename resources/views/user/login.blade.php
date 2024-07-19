@extends('dashboard')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-4 mx-auto mt-4">
                @if (session('msg'))
                    <div class="alert bg-danger text-white">
                        {{ session('msg') }}
                    </div>
                @endif
                @if (session('msg1'))
                    <div class="alert text-white" style="background-color: rgb(78, 208, 78)">
                        {{ session('msg1') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <h2 class="h4">Login Here</h2>
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <input type="submit" value="Login"
                                    class="py-2 rounded-lg bg-green-700 text-white hover:bg-green-800 w-100">
                            </div>
                            <div class="mb-2">
                                <small class="float-end"><a href="" class="text-primary">Forget Password
                                        ?</a></small>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('register') }}" class="nav-item nav-link float-end">
                            <p>New user ? Create an Account</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

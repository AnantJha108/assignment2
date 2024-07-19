@extends('dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4 mx-auto mt-4">
                @if (session('msg'))
                    <div class="alert bg-danger text-white">
                        {{session('msg')}}
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <form action="{{route("register")}}" method="post">
                            @csrf
                            <h2 class="h4">Register Here</h2>
                            <div class="mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <input type="submit" value="Register" class="py-2 rounded-lg bg-green-700 text-white hover:bg-green-800 w-100">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <a href="{{route("login")}}" class="nav-item nav-link float-end">Alredy Exsists ? Login here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
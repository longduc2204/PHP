@extends('layouts.app')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Category</h6>
        </div>
        <div class="card-body">
            <h1 style="text-align: center">Edit name of category</h1>
        <form class="user" method="POST" action="{{ route('category.update') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $namecategory->id }}">
                <div class="form-group">
                    <input type="text"
                        class="form-control form-control-user"
                name="name" value="{{ $namecategory->name }}" required autocomplete="email"
                        autofocus placeholder="Name Category">
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    {{ __('Edit Category') }}
                </button>
            </form>

            <script src="{{ asset('./sb/vendor/jquery/jquery.min.js') }}"></script>
            <script src="{{ asset('./sb/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
            <script src=" {{ asset('./sb/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
            <script src="{{ asset('./sb/js/sb-admin-2.min.js') }}"></script>
            <script src="{{ asset('./sb/vendor/datatables/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('./sb/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('./sb/js/demo/datatables-demo.js') }}"></script>
        </div>
    </div>

@endsection

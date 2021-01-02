@extends('layouts.app')

@section('content')
    <style>
        h1 {
            text-align: center;
        }

    </style>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Change Password User</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('password.store') }}" method="POST" class="user">
                @csrf
                @foreach ($errors->all() as $error)
                    <p class="text-danger">{{ $error }}</p>
                @endforeach
                <h1>Change Password Of User</h1>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <input id="password" type="password" class="form-control form-control-user" name="current_password"
                            autocomplete="current-password" required placeholder="Old Password">
                        @error('password')
                            <div style="color: red">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <input id="new_password" type="password" class="form-control form-control-user" name="new_password"
                            autocomplete="current-password" required placeholder="new password">
                        @error('password')
                            <div style="color: red">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <input id="new_confirm_password" type="password" class="form-control form-control-user" name="new_confirm_password"
                            autocomplete="current-password" placeholder="Repeat New Password" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    {{ __('Update Password') }}
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


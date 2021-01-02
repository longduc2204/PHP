@extends('layouts.app')

@section('content')

    <style>
        .cbx {
            display: inline-block;
        }

        h1 {
            text-align: center;
        }

        .cbx2 {
            margin-left: 50px;
        }

        .form-control-123 {
            text-align: center;
        }

        .inputimg {
            margin-left: 350px;
            margin-bottom: 10px;
        }

    </style>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Change Information User</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('changeinforuser.update') }}" method="POST" class="user" enctype="multipart/form-data">
                @csrf
                <h1>Change Information Of User</h1>

                <input type="hidden" name="id" value="{{ $user->id }}">

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <input type="text" name="username" value="{{ $user->username }}"
                            class="form-control form-control-user" placeholder="username">
                        @error('username')
                            <div style="color: red">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <input type="text" name="full_name" value="{{ $user->full_name }}"
                            class="form-control form-control-user" placeholder="full_name">
                        @error('full_name')
                            <div style="color: red">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="inputimg">
                    <label style="color: blue">Select Image:</label>
                    <input type="file" name="featue_url" placeholder="featue_url" style="width: 100px;height: 30px;">
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group form-control-123">
                        <div class="cbx">
                            <div style="display: flex;">
                                <div class="cbx1">
                                    <input type="radio" <?php if ($user->gender == 0) {
                                    echo 'checked';
                                    } ?> id="male" name="gender" value="0">
                                    <label for="male">Male</label>
                                </div>
                                <div class="cbx2">
                                    <input type="radio" <?php if ($user->gender == 1) {
                                    echo 'checked';
                                    } ?> id="female" name="gender" value="1">
                                    <label for="female">Female</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    {{ __('Change Infor User') }}
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

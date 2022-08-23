@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.students.update', ['id' => $each->id]) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="inputName">Tên
                                @if ($errors->has('name'))
                                    <span class="text-danger">
                                        {{ $errors->first('name') }}
                                    </span>
                                @endif
                            </label>

                            <input type="text" class="form-control" id="inputName" placeholder="Tên" name="name"
                                value="{{ $each->name }}">
                        </div>
                        <div class="form-group">
                            <label for="example-email">Email
                                @if ($errors->has('email'))
                                    <span class="text-danger">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif
                            </label>
                            <input type="email" id="example-email" name="email" class="form-control" placeholder="Email"
                                value="{{ $each->email }}">
                        </div>
                        <div class="form-group">
                            <label for="example-phone">Số điện thoại
                                @if ($errors->has('phone'))
                                    <span class="text-danger">
                                        {{ $errors->first('phone') }}
                                    </span>
                                @endif
                            </label>
                            <input type="phone" id="example-phone" name="phone" class="form-control"
                                placeholder="Số điện thoại" value="{{ $each->phone }}">
                        </div>
                        <div class="form-group">
                            <label for="example-select">Giới tính
                                @if ($errors->has('gender'))
                                    <span class="text-danger">
                                        {{ $errors->first('gender') }}
                                    </span>
                                @endif
                            </label>
                            <select class="form-control" id="example-select" name="gender">
                                @if ($each->name == 0)
                                    <option value="0" selected>Nam</option>
                                    <option value="1">Nữ</option>
                                @else
                                    <option value="0">Nam</option>
                                    <option value="1" selected>Nữ</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="example-date">Ngày sinh</label>
                            <input class="form-control" id="example-date" type="date" name="birthday"
                                value="{{ $each->birthday }}">
                        </div>
                        <div class="form-group">
                            <label for="example-select">Ngành
                                @if ($errors->has('department_id'))
                                    <span class="text-danger">
                                        {{ $errors->first('department_id') }}
                                    </span>
                                @endif
                            </label>
                            <select class="custom-select" name="classroom_id">
                                <option selected>Chọn lớp</option>
                                @foreach ($classrooms_data as $option)
                                    <option value="{{ $option->id }}"
                                        @if ($each->classroom_id == $option->id) {{ 'selected' }} @endif>
                                        {{ $option->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="example-fileinput">Ảnh đại diện
                                @if ($errors->has('avatar'))
                                    <span class="text-danger">
                                        {{ $errors->first('avatar') }}
                                    </span>
                                @endif
                            </label>
                            <input type="file" id="example-fileinput" class="form-control-file" name="avatar">
                        </div>
                        <div class="form-group">
                            <label for="example-textarea">Địa chỉ
                                @if ($errors->has('address'))
                                    <span class="text-danger">
                                        {{ $errors->first('address') }}
                                    </span>
                                @endif
                            </label>
                            <textarea class="form-control" id="example-textarea" rows="3" name="address">{{ $each->address }}</textarea>
                        </div>
                        <div class="form-group
                                    mb-0 justify-content-end row">
                            <div class="col-9">
                                <button type="submit" class="btn btn-info">Sửa</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('menusidebar')
    @include('admin/sidebar_admin')
@endsection

@push('js')
@endpush

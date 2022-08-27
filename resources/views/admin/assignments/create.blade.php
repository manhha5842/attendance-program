@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.assignments.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="example-select">Lớp
                                @if ($errors->has('classroom_id'))
                                    <span class="text-danger">
                                        {{ $errors->first('classroom_id') }}
                                    </span>
                                @endif
                            </label>
                            <select class="custom-select" name="classroom_id">
                                <option selected>Chọn lớp</option>
                                @foreach ($classrooms_data as $option)
                                    <option value="{{ $option->id }}">{{ $option->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="example-select">Môn học
                                @if ($errors->has('course_id'))
                                    <span class="text-danger">
                                        {{ $errors->first('course_id') }}
                                    </span>
                                @endif
                            </label>
                            <select class="select2 form-control select2-multiple" data-toggle="select2" multiple="multiple"
                                data-placeholder="Chọn môn học" name="course_id">
                                @foreach ($departments_data as $department)
                                    <optgroup label="{{ $department->name }}">
                                        @foreach ($courses_data as $course)
                                            @if ($department->id == $course->department_id)
                                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                                            @endif
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="example-select">Giáo viên phụ trách
                                @if ($errors->has('lecturer_id'))
                                    <span class="text-danger">
                                        {{ $errors->first('lecturer_id') }}
                                    </span>
                                @endif
                            </label>
                            <select class="select2 form-control select2-multiple" data-toggle="select2" multiple="multiple"
                                data-placeholder="Chọn giáo viên" name="lecturer_id">
                                @foreach ($departments_data as $department)
                                    <optgroup label="{{ $department->name }}">
                                        @foreach ($lecturers_data as $lecturer)
                                            @if ($department->id == $lecturer->department_id)
                                                <option value="{{ $lecturer->id }}">{{ $lecturer->name }}</option>
                                            @endif
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            @if ($errors->has('shift'))
                                <span class="text-danger">
                                    {{ $errors->first('shift') }}
                                </span>
                            @endif
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Ca</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01" name="shift">
                                    <option selected>Chọn ca </option>
                                    <option value="1">1 (7h15-9h15)</option>
                                    <option value="2">2 (9h30-11h30)</option>
                                    <option value="3">3 (12h30-14h30)</option>
                                    <option value="4">4 (14h45-16h45)</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            @if ($errors->has('weekday'))
                                <span class="text-danger">
                                    {{ $errors->first('weekday') }}
                                </span>
                            @endif
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Thứ</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01" name="weekday">
                                    <option selected>Chọn ngày trong tuần</option>
                                    <option value="2">Hai</option>
                                    <option value="3">Ba</option>
                                    <option value="4">Tư</option>
                                    <option value="5">Năm</option>
                                    <option value="6">Sáu</option>
                                    <option value="7">Bảy</option>
                                    <option value="8">Chủ nhật</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            @if ($errors->has('room_id'))
                                <span class="text-danger">
                                    {{ $errors->first('room_id') }}
                                </span>
                            @endif
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Phòng</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01" name="room_id">
                                    <option selected>Chọn phòng</option>
                                    @foreach ($rooms_data as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-0 justify-content-end row">
                            <div class="col-9">
                                <button type="submit" class="btn btn-info">Thêm</button>
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

@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.classrooms.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="inputName">Tên
                                @if ($errors->has('name'))
                                    <span class="text-danger">
                                        {{ $errors->first('name') }}
                                    </span>
                                @endif
                            </label>
                            <input type="text" class="form-control" id="inputName" placeholder="Tên" name="name">
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

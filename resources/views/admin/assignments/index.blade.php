@extends('layout.master')
@extends('layout.datatable')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div style="text-align: end; padding: 1em">
                        {{-- <label for="csv" class="btn btn-info" style="margin: 0"> Import CSV </label>
                        <input type="file" name="csv" id="csv" class="d-none"
                            accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" /> --}}
                        <button type="button" class="btn btn-primary"
                            onclick="window.location='{{ route('admin.assignments.create') }}'">Thêm</button>
                    </div>
                    {{-- <button class="btn btn-secondary buttons-print" tabindex="0" aria-controls="datatable-buttons"
                        type="button"><span>Print</span></button> --}}
                    <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100 ">
                        <thead>
                            <tr>
                                <th>Mã phân công</th>
                                <th>Môn học</th>
                                <th>Lớp</th>
                                <th>Giảng viên</th>
                                <th>Phòng</th>
                                <th>Ca</th>
                                <th>Thứ</th>
                                <th>Tình trạng </th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $each)
                                <tr>
                                    <td>{{ $each->id }}</td>
                                    <td>
                                        @foreach ($courses_data as $course)
                                            @if ($each->course_id == $course->id)
                                                {{ $course->name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($classrooms_data as $class)
                                            @if ($each->classroom_id == $class->id)
                                                {{ $class->name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($lecturers_data as $lecturer)
                                            @if ($each->lecturer_id == $lecturer->id)
                                                {{ $lecturer->name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($rooms_data as $room)
                                            @if ($each->room_id == $room->id)
                                                {{ $room->name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $each->shift }}</td>
                                    <td>{{ $each->weekday }}</td>
                                    <td>
                                        @switch($each->status)
                                            @case(0)
                                                Đang diễn ra
                                            @break

                                            @case(2)
                                                Đã hoàn thành
                                            @break

                                            @case(2)
                                                Đã hủy
                                            @break

                                            @default
                                        @endswitch
                                    </td>
                                    <td class="table-action">
                                        <a href="{{ route('admin.assignments.edit', ['id' => $each->id]) }}"
                                            class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                                    </td>
                                    <td class="table-action">
                                        <form id="form_delete_<?php echo $each->id; ?>"
                                            action="{{ route('admin.assignments.destroy', ['id' => $each->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="javascript:{};" class="action-icon"
                                                onclick="document.getElementById('form_delete_<?php echo $each->id; ?>').submit();">
                                                <i class="mdi mdi-delete"></i></a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <nav style="margin-top: 20px">
                        <ul class="pagination pagination-rounded mb-0">
                            {{ $data->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('menusidebar')
    @include('admin/sidebar_admin')
@endsection

{{-- @push('js')
    <script>
        $(document).ready(function() {
            $("#csv").change(function(e) {
                var formData = new FormData();
                formData.append('file', $(this)[0].files[0]);
                $.ajax({
                    url: '{{ route('admin.assignments.import_csv') }}',
                    type: 'POST',
                    dataType: 'json',
                    enctype: 'multipart/form-data',
                    data: formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $.NotificationApp.send("Hoàn thành", "Bạn đã nhập dữ liệu thành công",
                            "bottom-right", "rgba(0,0,0,0.2)", "success");
                        window.setTimeout(function() {
                            location.reload()
                        }, 6000)
                    },
                    error: function(response) {
                        $.NotificationApp.send("Thất bại",
                            "Đã xảy ra lỗi, xin kiểm tra lại file",
                            "bottom-right", "rgba(0,0,0,0.2)", "warning");
                    }
                });
            });
        });
    </script>
@endpush --}}

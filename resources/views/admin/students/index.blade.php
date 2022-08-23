@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div style="text-align: end; padding: 1em">
                        <label for="csv" class="btn btn-info" style="margin: 0">
                            Import CSV </label>
                        <input type="file" name="csv" id="csv" class="d-none"
                            accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
                        <button type="button" class="btn btn-primary"
                            onclick="window.location='{{ route('admin.students.create') }}'">Thêm sinh viên</button>
                    </div>
                    <table class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th>Mã sinh viên</th>
                                <th>Tên</th>
                                <th>Lớp</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $each)
                                <tr>
                                    <td>{{ $each->id }}</td>
                                    <td>{{ $each->name }}</td>
                                    <td>
                                        @foreach ($classrooms_data as $item)
                                            @if ($each->classroom_id == $item->id)
                                                {{ $item->name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="table-action">
                                        <a href="{{ route('admin.students.edit', ['id' => $each->id]) }}"
                                            class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                                    </td>
                                    <td class="table-action">
                                        <form id="form_delete_<?php echo $each->id; ?>"
                                            action="{{ route('admin.students.destroy', ['id' => $each->id]) }}"
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


@push('js')
    <script>
        $(document).ready(function() {
            $("#csv").change(function(e) {
                var formData = new FormData();
                formData.append('file', $(this)[0].files[0]);
                $.ajax({
                    url: '{{ route('admin.students.import_csv') }}',
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
@endpush

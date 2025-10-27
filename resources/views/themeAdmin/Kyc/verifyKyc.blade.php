@extends('layoutsAdmin.layouts')
@section('content')
    <style>
        .select-none {

            border: none;
            background: transparent;
            outline: none;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            padding: 0;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
    <!-- MAIN -->
    <main>
        @php
            $kycOptions = [
                2 => 'Chờ xác minh',
                3 => 'Đã xác minh',
            ];
        @endphp
        <div class="head-title">
            <div class="left">
                <h1>KYC</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">KYC</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="#">List</a>
                    </li>
                </ul>
            </div>

        </div>

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Recent KYC</h3>
                    <i class='bx bx-search'></i>
                    <i class='bx bx-filter'></i>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Ngày</th>
                            <th>Giấy tờ</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $value)
                            <tr>
                                <td>
                                    <p>{{ $value->lastname }}</p>
                                </td>
                                <td>{{ $value->created_at->format('d/m/Y H:i') }}</td>
                                <td>{{ $value->email}}</td>
                                <td>
                                    <img src="{{ asset('storage/cccd/' . $value->cccd_front) }}" />
                                    <img src="{{ asset('storage/cccd/' . $value->cccd_back) }}" />
                                </td>
                                <td>
                                    <form action="{{ route('kyc.update', $value->id) }}" method="post" class="kyc-form">
                                        @csrf
                                        <span class="status {{ $value->kyc == 'Chờ xác minh' ? 'pending' : 'completed' }}" id="status-{{ $value->id }}"  >
                                            <select name="kyc" class="select-none kyc-select" data-id="{{ $value->id }}"  {{ $value->kyc !== 'Đã xác minh' ? '' : 'disabled'  }}>
                                                @foreach ($kycOptions as $key => $label)
                                                    <option value="{{ $label }}"
                                                        {{ $label == $value->kyc ? 'selected' : '' }}>
                                                        {{ $label }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </span>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <!-- MAIN -->
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Lắng nghe sự kiện change trên tất cả các select có class kyc-select
            document.querySelectorAll('.kyc-select').forEach(function(select) {
                select.addEventListener('change', function() {
                    const form = this.closest('form');
                    const statusSpan = this.closest('.status');
                    const selectedValue = this.value;
                    
                    // Lấy CSRF token
                    const token = form.querySelector('input[name="_token"]').value;
                    
                    // Gửi request AJAX
                    fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': token,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            kyc: selectedValue
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Cập nhật class của status span
                            statusSpan.className = 'status ' + (selectedValue === 'Chờ xác minh' ? 'pending' : 'completed');
                            // Hiển thị thông báo thành công
                            alert('Cập nhật trạng thái thành công!');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Có lỗi xảy ra khi cập nhật trạng thái!');
                    });
                });
            });
        });
    </script>
@endsection

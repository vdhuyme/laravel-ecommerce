<div>
    <div class="my-account-wrapper mt-text mb-text">
        <div class="container container-default-2 custom-area">
            <div class="row">
                <div class="col-lg-12 col-custom">
                    <!-- My Account Page Start -->
                    <div class="myaccount-page-wrapper">
                        <!-- My Account Tab Menu Start -->
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-custom">
                                <div class="myaccount-tab-menu nav" role="tablist">
                                    <a wire:ignore href="#account-info" class="active" data-bs-toggle="tab"><i
                                            class="fa fa-user"></i>
                                        Thông tin cá nhân</a>
                                    <a wire:ignore href="#orders" data-bs-toggle="tab"><i
                                            class="fa fa-cart-arrow-down"></i>
                                        Đơn hàng của tôi</a>
                                    <a wire:ignore href="#address-edit" data-bs-toggle="tab"><i
                                            class="fa fa-map-marker"></i>
                                        Sổ địa chỉ</a>
                                    <a href="{{route('logout')}}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>
                                        Đăng
                                        xuất
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </a>
                                </div>
                            </div>
                            <!-- My Account Tab Menu End -->

                            <!-- My Account Tab Content Start -->
                            <div class="col-lg-9 col-md-8 col-custom">
                                <div class="tab-content" id="myaccountContent">
                                    <!-- Single Tab Content Start -->

                                    @include('client.components.alerts')

                                    <!-- Single Tab Content Start -->
                                    <div wire:ignore.self class="tab-pane fade show active" id="account-info"
                                        role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Thông tin cá nhân</h3>
                                            <div class="account-details-form">
                                                <form wire:submit.prevent="updateProfile">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-custom">
                                                            <div class="single-input-item mb-3">
                                                                <label for="first-name" class="required mb-1">Họ</label>
                                                                <input wire:model.defer="firstName" type="text"
                                                                    id="first-name" placeholder="Họ" />

                                                                @error('firstName')
                                                                <span class="text-danger">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-custom">
                                                            <div class="single-input-item mb-3">
                                                                <label for="last-name" class="required mb-1">Tên</label>
                                                                <input wire:model.defer="lastName" type="text"
                                                                    id="last-name" placeholder="Tên" />

                                                                @error('lastName')
                                                                <span class="text-danger">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="single-input-item mb-3">
                                                        <label for="display-name" class="required mb-1">Số điện
                                                            thoại</label>
                                                        <input wire:model.defer="phoneNumber" type="text"
                                                            id="display-name" placeholder="Số điện thoại" />

                                                        @error('phoneNumber')
                                                        <span class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>

                                                    <div class="single-input-item mb-3">
                                                        <label for="email" class="required mb-1">Địa chỉ email</label>
                                                        <input readonly wire:model.defer="email" type="email" id="email"
                                                            placeholder="Địa chỉ email" />
                                                    </div>

                                                    <div class="form-check">
                                                        <input wire:model="gender" class="form-check-input" type="radio"
                                                            name="flexRadioDefault" id="flexRadioDefault1" value="male">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Nam
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input wire:model.defer="gender" class="form-check-input"
                                                            type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                                                            value="female">
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            Nữ
                                                        </label>
                                                    </div>

                                                    @error('gender')
                                                    <span class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                    <div class="single-input-item single-item-button">
                                                        <button type="submit" class="btn obrien-button primary-btn">Lưu
                                                            thông tin</button>
                                                    </div>
                                                </form>
                                                @if (Auth::user()->roles !== 'admin')
                                                <form wire:submit.prevent="updatePassword">
                                                    <fieldset>
                                                        <legend>Đổi mật khẩu</legend>
                                                        <div class="single-input-item mb-3">
                                                            <label for="current-pwd" class="required mb-1">Mật khẩu hiện
                                                                tại</label>
                                                            <input wire:model.defer="currentPassword" type="password"
                                                                id="current-pwd" placeholder="Mật khẩu hiện tại" />

                                                            @error('currentPassword')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-custom">
                                                                <div class="single-input-item mb-3">
                                                                    <label for="new-pwd" class="required mb-1">Mật khẩu
                                                                        mới</label>
                                                                    <input wire:model.defer="newPassword"
                                                                        type="password" id="new-pwd"
                                                                        placeholder="Mật khẩu mới" />

                                                                    @error('newPassword')
                                                                    <span class="text-danger">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-custom">
                                                                <div class="single-input-item mb-3">
                                                                    <label for="confirm-pwd" class="required mb-1">Xác
                                                                        nhận
                                                                        mật khẩu</label>
                                                                    <input wire:model.defer="confirmPassword"
                                                                        type="password" id="confirm-pwd"
                                                                        placeholder="Xác nhận mật khẩu" />

                                                                    @error('confirmPassword')
                                                                    <span class="text-danger">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <div class="single-input-item single-item-button">
                                                        <button class="btn obrien-button primary-btn">Đổi mật
                                                            khẩu</button>
                                                    </div>
                                                </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div> <!-- Single Tab Content End -->

                                    <!-- Single Tab Content Start -->
                                    <div wire:ignore.self class="tab-pane fade" id="orders" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Đơn hàng</h3>
                                            <div class="myaccount-table table-responsive text-center">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>Mã Đơn</th>
                                                            <th>Người nhận</th>
                                                            <th>Ngày đặt</th>
                                                            <th>Trạng thái</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($orders->count() > 0)
                                                        @foreach ($orders as $order)
                                                        <tr>
                                                            <td>{{$order->trackingNumber}}</td>
                                                            <td>{{$order->userName}}</td>
                                                            <td>{{$order->created_at->format('H:i:s d/m/Y')}}</td>
                                                            <td>
                                                                @if ($order->status === "pending")
                                                                <p class="text-center text-warning">Đang xử lý</p>
                                                                @elseif($order->status === "accepted")
                                                                <p class="text-center text-primary">Đã xác nhận</p>
                                                                @elseif($order->status === "inDelivery")
                                                                <p class="text-center text-info">Đang vận chuyển</p>
                                                                @elseif($order->status === "success")
                                                                <p class="text-center text-success">Giao hàng thành công
                                                                </p>
                                                                @elseif($order->status === "cancel")
                                                                <p class="text-center text-danger">Đã hủy</p>
                                                                @elseif($order->status === "refund")
                                                                <p class="text-center text-danger">Hoàn hàng</p>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @else
                                                        <td class="text-center" colspan="10">Chưa có đơn hàng nào
                                                        </td>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        {{$orders->links('client.components.pagination')}}
                                    </div>
                                    <!-- Single Tab Content End -->

                                    <!-- Single Tab Content Start -->
                                    <div wire:ignore.self class="tab-pane fade" id="address-edit" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Địa chỉ nhận hàng</h3>
                                            <div class="account-details-form">
                                                <form wire:submit.prevent="newAddress">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-custom">
                                                            <div class="single-input-item mb-3">
                                                                <label for="user-name" class="required mb-1">Họ và
                                                                    tên</label>
                                                                <input wire:model.defer="userNames" type="text"
                                                                    id="user-name" placeholder="Họ và tên" />

                                                                @error('userNames')
                                                                <span class="text-danger">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-custom">
                                                            <div class="single-input-item mb-3">
                                                                <label for="emails" class="required mb-1">Email</label>
                                                                <input wire:model.defer="emails" type="text" id="emails"
                                                                    placeholder="Email" />

                                                                @error('emails')
                                                                <span class="text-danger">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="single-input-item mb-3">
                                                                <label for="phone-numbers" class="required mb-1">Số điện
                                                                    thoại</label>
                                                                <input wire:model.defer="phoneNumbers" type="text"
                                                                    id="phone-numbers" placeholder="Số điện thoại" />

                                                                @error('phoneNumbers')
                                                                <span class="text-danger">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="single-input-item mb-3">
                                                                <label for="houseNumber" class="required mb-1">Số
                                                                    nhà</label>
                                                                <input wire:model.defer="houseNumbers" type="text"
                                                                    id="houseNumber" placeholder="Số nhà" />

                                                                @error('houseNumbers')
                                                                <span class="text-danger">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="mb-3 form-label">
                                                                <label class="form-label"
                                                                    for="provinceName">Tỉnh/TP</label>
                                                                <select id="provinceName"
                                                                    class="form-select rounded-0 wide mb-3"
                                                                    wire:model="provinceId">
                                                                    <option value="">Chọn Tỉnh/TP</option>
                                                                    @foreach ($provinces as $province)
                                                                    <option value="{{$province->id}}">
                                                                        {{$province->provinceName}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>

                                                                @error('provinceId') <span class="text-danger"><strong>
                                                                        {{ $message
                                                                        }}</strong></span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="mb-3 form-label">
                                                                <label class="form-label"
                                                                    for="districtName">Quận/Huyện</label>
                                                                <select id="districtName"
                                                                    class="form-select rounded-0 wide mb-3"
                                                                    wire:model="districtId">
                                                                    <option value="">Chọn Quận/Huyện</option>

                                                                    @foreach ($districts as $district)
                                                                    <option value="{{$district->id}}">
                                                                        {{$district->districtName}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>

                                                                @error('districtId') <span class="text-danger"><strong>
                                                                        {{ $message
                                                                        }}</strong></span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="mb-3 form-label">
                                                                <label class="form-label"
                                                                    for="districtName">Phường/Xã</label>
                                                                <select id="districtName"
                                                                    class="form-select rounded-0 wide mb-3"
                                                                    wire:model="wardId">
                                                                    <option value="">Chọn Phường/Xã</option>

                                                                    @foreach ($wards as $ward)
                                                                    <option value="{{$ward->id}}">{{$ward->wardName}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>

                                                                @error('wardId') <span class="text-danger"><strong>{{
                                                                        $message
                                                                        }}</strong></span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button class="btn obrien-button-2 primary-color rounded-0 mb-3"
                                                        type="submit">
                                                        <i class="fa fa-plus mr-2"></i> Thêm địa chỉ
                                                    </button>
                                                </form>
                                            </div>

                                            <h3 class="text-danger"><strong>Để sử dụng dịch vụ thanh toán hãy thêm địa
                                                    chỉ</strong></h3>
                                            @foreach ($userAddresses as $userAddress)
                                            <address>
                                                <p>Họ và tên người nhận: {{$userAddress->userName}}. <br>
                                                    Số nhà: {{$userAddress->houseNumber}},
                                                    {{$userAddress->ward->wardName}},
                                                    {{$userAddress->district->districtName}},
                                                    {{$userAddress->province->provinceName}}.
                                                </p>
                                                <p>Email: {{$userAddress->email}}</p>
                                                <p>SĐT: {{$userAddress->phoneNumber}}.</p>
                                            </address>
                                            <button wire:click="deleteAddress({{ $userAddress->id }})"
                                                class="btn obrien-button-2 primary-color rounded-0"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal"><i
                                                    class="fa fa-trash mr-2"></i> Xóa địa
                                                chỉ</button>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->
                                </div>
                            </div> <!-- My Account Tab Content End -->
                        </div>
                    </div> <!-- My Account Page End -->
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <form wire:submit.prevent="destroyAddress">
                            <div class="mt-2 text-center">
                                <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                    <h4>Bạn có chắc là muốn xóa không?</h4>
                                    <p class="text-muted mx-4 mb-0">Dữ liệu sẽ được cập nhật</p>
                                </div>
                            </div>
                            <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                <button type="submit" class="btn obrien-button-2 primary-color rounded-0"
                                    id="delete-notification">Có, Hãy xóa</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    window.addEventListener('hidden-modal', event =>{
            $('#deleteModal').modal('hide');
        });
</script>
@endsection
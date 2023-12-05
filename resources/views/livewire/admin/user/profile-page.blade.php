<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">User Profile</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('users') }}">Users</a></li>
                            <li class="breadcrumb-item active">User Profile</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.components.alerts')

        <div class="col-xxl-9">
            <div class="card mt-xxl-n5">
                <div class="card-header">
                    <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a wire:ignore class="nav-link active" data-bs-toggle="tab" href="#personalDetails"
                               role="tab">
                                <i class="fas fa-home"></i> Personal Details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a wire:ignore class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab">
                                <i class="far fa-user"></i> Change Password
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="card-body p-4">
                    <div class="tab-content">
                        <div wire:ignore.self class="tab-pane active" id="personalDetails" role="tabpanel">
                            <form wire:submit.prevent="updateProfile">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="firstnameInput" class="form-label">First Name</label>
                                            <input type="text" wire:model.defer="firstName"
                                                   class="form-control @error('firstName') is-invalid @enderror"
                                                   id="firstnameInput" placeholder="Enter your firstname">

                                            @error('firstName') <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="lastnameInput" class="form-label">Last Name</label>
                                            <input type="text"
                                                   class="form-control @error('lastName') is-invalid @enderror"
                                                   id="lastnameInput" placeholder="Enter your lastname"
                                                   wire:model.defer="lastName">

                                            @error('lastName') <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="phonenumberInput" class="form-label">Phone Number</label>
                                            <input type="text"
                                                   class="form-control @error('phoneNumber') is-invalid @enderror"
                                                   id="phonenumberInput" placeholder="Enter your phone number"
                                                   wire:model.defer="phoneNumber">

                                            @error('phoneNumber') <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="emailInput" class="form-label">Email Address</label>
                                            <input type="email" readonly class="form-control" id="emailInput"
                                                   placeholder="Enter your email" wire:model="email">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Updates</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div wire:ignore.self class="tab-pane" id="changePassword" role="tabpanel">
                            <form wire:submit.prevent="updatePassword">
                                <div class="row g-2">
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="oldpasswordInput" class="form-label">Old Password<span
                                                        class="text-danger">*</span></label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password" wire:model.defer="currentPassword"
                                                       class="form-control pe-5 password-input @error('currentPassword') is-invalid @enderror"
                                                       placeholder="Enter current password" id="password-input"
                                                       name="oldPassword">

                                                @error('currentPassword')
                                                <span class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <button
                                                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                        type="button" id="password-addon"><i
                                                            class="ri-eye-fill align-middle"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div>
                                            <label for="newpasswordInput" class="form-label">New Password<span
                                                        class="text-danger">*</span></label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password" wire:model.defer="newPassword"
                                                       class="form-control pe-5 password-input @error('newPassword') is-invalid @enderror"
                                                       placeholder="Enter new password" id="password-input"
                                                       name="password">
                                                <button
                                                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                        type="button" id="password-addon"><i
                                                            class="ri-eye-fill align-middle"></i></button>

                                                @error('newPassword')
                                                <span class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div>
                                            <label for="confirmpasswordInput" class="form-label">Confirm
                                                Password<span class="text-danger">*</span></label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password" wire:model.defer="confirmPassword"
                                                       class="form-control pe-5 password-confirmation-input @error('confirmPassword') is-invalid @enderror"
                                                       placeholder="Enter Password Confirmation"
                                                       id="password-confirmation-input" name="password_confirmation">

                                                @error('confirmPassword')
                                                <span class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Change Password</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
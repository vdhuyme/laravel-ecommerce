<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Users</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('users') }}">Users</a></li>
                            <li class="breadcrumb-item active">Users of list</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.components.alerts')

        <div class="col-xl-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row g-4">
                        <div class="col-sm">
                            <div class="d-flex justify-content-sm-end">
                                <div class="search-box ms-2">
                                    <input wire:model="searchTerm" type="text" class="form-control"
                                           id="searchProductList" placeholder="Search user...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle table-nowrap mb-0">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Status</th>
                                <th scope="col">Date of participation</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if ($users->count() > 0)
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="fw-medium">{{ $user->id }}</td>
                                        <td>{{ $user->firstName }} {{ $user->lastName }}</td>
                                        <td>{{ $user->email }}</td>
                                        @if ($user->roles === 'admin')
                                            <td><span class="badge badge-outline-secondary">Admin</span></td>
                                        @else
                                            <td><span class="badge badge-outline-primary">Customer</span></td>
                                        @endif

                                        @if ($user->userStatus === 'active')
                                            <td><span class="badge badge-outline-success">Active</span></td>
                                        @else
                                            <td><span class="badge badge-outline-danger">In Active</span></td>
                                        @endif
                                        <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            <div class="hstack gap-3 fs-15">
                                                <a wire:click="editUser({{ $user->id }})" class="link-warning"
                                                   data-bs-toggle="modal" data-bs-target=".updateModal"
                                                   data-bs-backdrop="static" style="cursor: pointer"><i
                                                            class="ri-edit-2-line"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <th class="text-center" colspan="10">Do not have value</th>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-body">
                    {{ $users->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade updateModal" id="updateModal" tabindex="-1" data-bs-backdrop="static"
         aria-labelledby="updateModalExtra" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalExtra">UPDATE USER</h5>
                    <button type="button" class="btn-close" wire:click="closeModal"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="updateUser">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="mb-3 form-label">
                                                    <label class="form-label" for="firstName">First Name</label>
                                                    <input type="text" readonly
                                                           class="form-control @error('firstName') is-invalid @enderror"
                                                           id="firstName" wire:model="firstName">

                                                    @error('firstName') <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3 form-label">
                                                    <label class="form-label" for="lastName">Last Name</label>
                                                    <input type="text" readonly
                                                           class="form-control @error('lastName') is-invalid @enderror"
                                                           id="lastName" wire:model="lastName">

                                                    @error('lastName') <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3 form-label">
                                                    <label class="form-label" for="gender">Gender</label>
                                                    <input type="text" readonly
                                                           class="form-control @error('gender') is-invalid @enderror"
                                                           id="gender" wire:model="gender">

                                                    @error('gender') <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3 form-label">
                                                    <label class="form-label" for="phoneNumber">Phone Number</label>
                                                    <input type="text" readonly
                                                           class="form-control @error('phoneNumber') is-invalid @enderror"
                                                           id="phoneNumber" wire:model="phoneNumber">

                                                    @error('phoneNumber') <span class="text-danger">{{ $message
                                                        }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3 form-label">
                                                    <label class="form-label" for="email">Email</label>
                                                    <input type="text" readonly
                                                           class="form-control @error('email') is-invalid @enderror"
                                                           id="email" wire:model="email">

                                                    @error('email') <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3 form-label">
                                                    <label for="choices-publish-addresses-input"
                                                           class="form-label">Addresses</label>
                                                    <select
                                                            class="form-select @error('addresses') is-invalid @enderror">
                                                        @foreach ($addresses as $address)
                                                            <option readonly> {{$address->houseNumber}},
                                                                {{$address->ward->wardName}},
                                                                {{$address->district->districtName}},
                                                                {{$address->province->provinceName}}.</option>
                                                        @endforeach
                                                    </select>

                                                    @error('addresses') <span class="text-danger">{{
                                                        $message
                                                        }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3 form-label">
                                                    <label for="choices-publish-status-input"
                                                           class="form-label">Status</label>
                                                    <select
                                                            class="form-select @error('userStatus') is-invalid @enderror"
                                                            wire:model="userStatus">
                                                        <option>Choose a status</option>
                                                        <option value="active">Active</option>
                                                        <option value="inActive">In Active</option>
                                                    </select>

                                                    @error('userStatus') <span class="text-danger">{{
                                                        $message
                                                        }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3 form-label">
                                                    <label for="choices-publish-status-input"
                                                           class="form-label">Roles</label>
                                                    <select class="form-select @error('roles') is-invalid @enderror"
                                                            wire:model="roles">
                                                        <option>Choose a role</option>
                                                        <option value="customer">Customer</option>
                                                        <option value="admin">Admin</option>
                                                    </select>

                                                    @error('roles') <span class="text-danger">{{
                                                        $message
                                                        }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-primary w-sm">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script>
        window.addEventListener('hidden-modal', event => {
            $('#updateModal').modal('hide');
        });
    </script>
@endsection
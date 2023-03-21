<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Contacts</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('contacts')}}">Contacts</a></li>
                            <li class="breadcrumb-item active">Contacts of list</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        @include('admin.components.alerts')

        <div class="col-xl-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row g-4">
                        <div class="col-sm">
                            <div class="d-flex justify-content-sm-end">
                                <div class="search-box ms-2">
                                    <input wire:model="searchTerm" type="text" class="form-control"
                                        id="searchProductList" placeholder="Search contacts...">
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
                                    <th scope="col" style="width: 40px;">
                                    </th>
                                    <th scope="col">ID</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($contacts->count() > 0)
                                @foreach ($contacts as $contact)
                                <tr>
                                    @if ($contact->marked === 0)
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                wire:click="marked({{$contact->id}})">
                                        </div>
                                    </th>
                                    <td class="fw-medium">{{$contact->id}}</td>
                                    <td>{{$contact->fullName}}</td>
                                    <td>{{$contact->subject}}</td>
                                    <td>{{$contact->created_at->format('d/m/Y')}}</td>
                                    @else
                                    <th scope="row">
                                        <div class="form-check">
                                            <input checked class="form-check-input" type="checkbox"
                                                wire:click="unMarked({{$contact->id}})">
                                        </div>
                                    </th>
                                    <td class="fw-medium"><del>{{$contact->id}}</del></td>
                                    <td><del>{{$contact->fullName}}</del></td>
                                    <td><del>{{$contact->subject}}</del></td>
                                    <td><del>{{$contact->created_at->format('d/m/Y')}}</del></td>
                                    @endif
                                    <td>
                                        <div class="hstack gap-3 fs-15">
                                            <a wire:click="deleteContact({{ $contact->id }})" class="link-danger"
                                                style="cursor: pointer"><i class="ri-delete-bin-2-line"
                                                    data-bs-toggle="modal" data-bs-target=".deleteModal"
                                                    data-bs-backdrop="static"></i></a>

                                            <a wire:click="viewContact({{ $contact->id }})" class="link-warning"
                                                style="cursor: pointer"><i class="ri-search-eye-line"
                                                    data-bs-toggle="modal" data-bs-target=".viewModal"
                                                    data-bs-backdrop="static"></i></a>
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
                </div><!-- end card-body -->

                <div class="card-body">
                    {{$contacts->onEachSide(1)->links()}}
                </div>
            </div><!-- end card -->
        </div><!-- end col -->
    </div>

    <!-- View Modal -->
    <div wire:ignore.self class="modal fade viewModal" id="viewModal" tabindex="-1" data-bs-backdrop="static"
        aria-labelledby="viewModalExtra" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalExtra">VIEW CONTACT</h5>
                    <button type="button" class="btn-close" wire:click="closeModal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-3 form-label">
                                                <label class="form-label" for="fullName">User Name</label>
                                                <p>{{$this->fullName}}</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3 form-label">
                                                <label class="form-label" for="email">Email</label>
                                                <p>{{$this->email}}</p>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="mb-3 form-label">
                                                <label class="form-label" for="subject">Subject</label>
                                                <p>{{$this->subject}}</p>
                                            </div>
                                        </div>


                                        <div class="col-sm-12">
                                            <div class="mb-3 form-label">
                                                <label class="form-label" for="message">Message</label>
                                                <p>{{$this->message}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <!-- Delete Modal -->
    <div wire:ignore.self class="modal fade zoomIn deleteModal" id="deleteModal" tabindex="-1"
        aria-labelledby="deleteModalExtra" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" wire:click="closeModal" aria-label="Close"
                        id="deleteModalExtra"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="destroyContact">
                        <div class="mt-2 text-center">
                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                <h4>Are you sure ?</h4>
                                <p class="text-muted mx-4 mb-0">Are you sure you want to remove this contact ?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" wire:click="closeModal">Close</button>
                            <button type="submit" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete
                                It!</button>
                        </div>
                    </form>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>

@section('scripts')
<script>
    window.addEventListener('hidden-modal', event =>{
            $('#deleteModal').modal('hide');
            $('#viewModal').modal('hide');
        });
</script>
@endsection
<div class="dropdown topbar-head-dropdown ms-1 header-item" id="notificationDropdown">
    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
        id="page-header-notifications-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside"
        aria-haspopup="true" aria-expanded="false">
        <i class='bx bx-message-rounded-error fs-22'></i>
        <span class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger">
            @if($contacts->count() > 99)
            99+
            @else
            {{$contacts->count()}}
            @endif</span>
    </button>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
        aria-labelledby="page-header-notifications-dropdown">

        <div class="dropdown-head bg-primary bg-pattern rounded-top">
            <div class="p-3">
                <div class="row align-items-center">
                    <div class="col">
                        <h6 class="m-0 fs-16 fw-semibold text-white"> Notifications </h6>
                    </div>
                    <div class="col-auto dropdown-tabs">
                        <span class="badge badge-soft-light fs-13">
                            @if ($contacts->count() > 99)
                            99+
                            @else
                            {{$contacts->count()}}
                            @endif New</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-content position-relative" id="notificationItemsTabContent">
            <div class="tab-pane fade show active py-2 ps-2" id="all-noti-tab" role="tabpanel">
                <div data-simplebar style="max-height: 300px;" class="pe-2">
                    @foreach ($limitContacts as $contact)
                    <div class="text-reset notification-item d-block dropdown-item position-relative">
                        <div class="d-flex">
                            <div class="avatar-xs me-3">
                                <span class="avatar-title bg-soft-info text-info rounded-circle fs-16">
                                    <i class="bx bx-notification"></i>
                                </span>
                            </div>
                            <div class="flex-1">
                                <a href="" class="stretched-link">
                                    <h6 class="mt-0 mb-2 lh-base">{{$contact->fullName}}
                                        has just created an contact!
                                    </h6>
                                </a>
                                <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                    <span><i class="mdi mdi-clock-outline"></i>
                                        {{$contact->created_at->diffForHumans()}}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="my-3 text-center view-all">
                        <a href="{{route('contacts')}}" class="btn btn-soft-success waves-effect waves-light">View
                            All Contacts <i class="ri-arrow-right-line align-middle"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
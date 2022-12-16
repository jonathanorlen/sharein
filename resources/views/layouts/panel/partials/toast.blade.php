<div class="position-fixed top-0 end-0 p-3" style="z-index: 1800">
    <div id="warningToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-warning text-light">
            {{-- <img src="..." class="rounded me-2" alt="..."> --}}
            <strong class="me-auto" id="warningHeader">Warning!</strong>
            {{-- <small>11 mins ago</small> --}}
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" id="warningBody">
            Hello, world! This is a toast message.
        </div>
    </div>
    <div id="dangerToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-danger text-light">
            {{-- <img src="..." class="rounded me-2" alt="..."> --}}
            <strong class="me-auto" id="dangerHeader">Fail!</strong>
            {{-- <small>11 mins ago</small> --}}
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" id="dangerBody">
            Hello, world! This is a toast message.
        </div>
    </div>

    <div id="successToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-light">
            {{-- <img src="..." class="rounded me-2" alt="..."> --}}
            <strong class="me-auto" id="successHeader">Success!</strong>
            {{-- <small>11 mins ago</small> --}}
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" id="successBody">
            Hello, world! This is a toast message.
        </div>
    </div>
</div>

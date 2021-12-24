@if(session('status'))
    <div class="container">
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
            <div id="notification" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto text-success">Notification</strong>
                    <small>a moment ago</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('status') }}
                </div>
            </div>
        </div>
    </div>


    <script>
        var toast = new bootstrap.Toast(document.getElementById('notification'));
        toast.show();
    </script>
@endif

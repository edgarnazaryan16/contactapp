@include('layouts.header')

@include('layouts.navigation')
    <!-- content -->
    <div class="auth-wrapper d-flex bg-light">
        <div class="col-md-4 m-auto">
            <div class="bg-white shadow-sm">

                <h1 class="border-bottom p-4">Reset Password</h1>
                <div class="px-4 py-4">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" />
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-block btn-primary">Send Password reset link</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>

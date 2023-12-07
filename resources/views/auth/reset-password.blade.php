@include('layouts.header')

@include('layouts.navigation')
    <!-- content -->
    <div class="auth-wrapper d-flex bg-light">
        <div class="col-md-4 m-auto">
            <div class="bg-white shadow-sm">
                <h1 class="border-bottom p-4">Reset Password</h1>

                <div class="px-4 py-4">
                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="{{ request()->email }}"/>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" />
                        </div>
                        @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                             @enderror
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                                id="password_confirmation" />
                            <input type="hidden" name="token" value="{{ request()->route('token') }}">
                        </div>
                        @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="mb-3">
                            <button type="submit" class="btn btn-block btn-primary">Reset Password</button>
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

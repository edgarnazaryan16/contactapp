@include('layouts.header')

@include('layouts.navigation')

<main class="py-5">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-8">
            <form action="{{ route('contacts.store') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header card-title">
                    <strong>Add New Contact</strong>
                    </div>
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group row">
                            <label for="firstname" class="col-md-3 col-form-label">First Name</label>
                            <div class="col-md-9">
                            <input type="text" name="firstname" id="firstname" value="{{ old('firstname') }}" class="form-control @error('firstname') is-invalid @enderror">
                            @error('firstname')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-3 col-form-label">Last Name</label>
                            <div class="col-md-9">
                            <input type="text" name="lastname" id="lastname" value="{{ old('lastname') }}" class="form-control @error('lastname') is-invalid @enderror">
                            @error('lastname')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label">Email</label>
                            <div class="col-md-9">
                            <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-3 col-form-label">Phone</label>
                            <div class="col-md-9">
                            <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror">
                            @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label">Address</label>
                            <div class="col-md-9">
                            <textarea name="address" id="address" rows="3" value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror"></textarea>
                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="company_id" class="col-md-3 col-form-label">Company</label>
                            <div class="col-md-9">
                                <select name="company_id" id="company_id" class="form-control @error('company_id') is-invalid @enderror">
                                    <option value="" selected disabled>Select Company</option>
                                    @foreach ($companies as $id => $company_name )
                                    <option value="{{ $id }}">{{ $company_name }}</option>
                                    @endforeach
                                </select>
                                @error('company_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row mb-0">
                            <div class="col-md-9 offset-md-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="{{ route('contacts.index') }}" class="btn btn-outline-secondary">Cancel</a>
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
  </main>

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>

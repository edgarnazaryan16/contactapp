@include('layouts.header')
    <!-- navbar -->
@include('layouts.navigation')

    <!-- content -->
    <main class="py-5">
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header card-title">
                <strong>Company Details</strong>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label for="name" class="col-md-3 col-form-label">Name</label>
                      <div class="col-md-9">
                        <p class="form-control-plaintext text-muted">{{ $company -> name }}</p>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="email" class="col-md-3 col-form-label">Email</label>
                      <div class="col-md-9">
                        <p class="form-control-plaintext text-muted">{{ $company -> email }}</p>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="website" class="col-md-3 col-form-label">Website</label>
                      <div class="col-md-9">
                        <a href="{{ $company -> website }}"><p class="form-control-plaintext text-muted">{{ $company -> website }}</p></a>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="name" class="col-md-3 col-form-label">Address</label>
                      <div class="col-md-9">
                        <p class="form-control-plaintext text-muted">{{ $company -> address }}</p>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group row mb-0">
                      <div class="col-md-9 offset-md-3">
                          <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-info">Edit</a>
                          <a class="btn btn-outline-danger text-danger" title="Delete" onclick="confirm('Are you sure?'); document.getElementById('delete-form').submit()">Delete</a>
                          <a href="{{ route('companies.index') }}" class="btn btn-outline-secondary">Cancel</a>
                      </div>
                    </div>
                    <form id="delete-form" action="{{ route('companies.destroy', $company->id) }}" method="POST" class="diplay-none">
                        @csrf
                        @method("DELETE")
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>

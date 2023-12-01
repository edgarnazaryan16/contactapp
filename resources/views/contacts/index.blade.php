@include('layouts.header')

@include('layouts.navigation')
    <!-- content -->
    {{-- @dump(auth()->user()) --}}
    <main class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
                <div class="card-header card-title">
                  <div class="d-flex align-items-center">
                    <h2 class="mb-0">All Contacts</h2>
                    <div class="ml-auto">
                      <a href="{{ route('contacts.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add New</a>
                    </div>
                  </div>
                </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6"></div>
                  <div class="col-md-6">
                        <form action="" method="GET" class="display-flex">
                            <div class="row">
                                <div class="col">
                                    <select class="custom-select" name="company_id" onchange="this.form.submit()">
                                        <option value="" selected>All Companies</option>
                                        @foreach ($companies as $id => $company_name )
                                            <option value="{{ $id }}" @if (request()->input('company_id') == $id) selected @endif>{{ $company_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <input name='searching' type="text" class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="button-addon2" value="{{ request()->input('searching') }}">
                                        <div class="input-group-append">
                                            <a href="{{ route('contacts.index') }}" class="btn btn-outline-secondary" type="button">
                                                <i class="fa fa-refresh"></i>
                                                </a>
                                            <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="this.form.submit()">
                                            <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                  </div>
                </div>
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">First Name</th>
                      <th scope="col">Last Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Company</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <th scope="row">{{ $loop->iteration + 10 * ($contacts->currentPage() - 1)   }}</th>
                            <td>{{ $contact -> firstname }}</td>
                            <td>{{ $contact -> lastname }}</td>
                            <td>{{ $contact -> email }}</td>
                            <td>{{ $contact -> company -> name }}</td>
                            <td width="150">
                                <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-sm btn-circle btn-outline-danger" title="Delete" onclick="confirm('Are you sure?'); document.getElementById('delete-form').submit()"><i class="fa fa-times"></i></a>
                                <form id="delete-form" action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="diplay-none">
                                    @csrf
                                    @method("DELETE")
                                </form>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>

                {{-- <nav class="mt-4">
                    <ul class="pagination justify-content-center">
                      <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                      </li>
                    </ul>
                  </nav> --}}
                  {{ $contacts->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <script src="{{asset('/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('/assets/js/bootstrap.min.js')}}"></script>
  </body>
</html>

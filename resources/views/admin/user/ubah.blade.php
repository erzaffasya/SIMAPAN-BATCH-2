<x-app-layout>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>User</h4>
                <h6>Ubah Data User</h6>
            </div>
        </div>
        <!-- /add -->
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('user.update', $user->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Username</label>
                                <input name="name" type="text" value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" type="text" value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Password</label>
                                <input name="password" type="text">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <a href="{{ route('user.index') }}" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

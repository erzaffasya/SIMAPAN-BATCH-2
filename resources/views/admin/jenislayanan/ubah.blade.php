<x-app-layout>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Jenis Layanan</h4>
                <h6>Ubah Data Jenis Layanan</h6>
            </div>
        </div>
        <!-- /add -->
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('jenis-layanan.update', $JenisLayanan->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Jenis Layanan</label>
                                <input name="jenis_layanan" type="text" value="{{ $JenisLayanan->jenis_layanan }}" required>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <a href="{{ route('jenis-layanan.index') }}" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

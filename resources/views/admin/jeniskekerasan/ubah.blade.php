<x-app-layout>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Jenis Kekerasan</h4>
                <h6>Ubah Data Jenis Kekerasan</h6>
            </div>
        </div>
        <!-- /add -->
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('jenis-kekerasan.update', $JenisKekerasan->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="row">

                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Jenis Kekerasan</label>
                                <input name="jenis_kekerasan" type="text" value="{{ $JenisKekerasan->jenis_kekerasan }}" required>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <a href="{{ route('jenis-kekerasan.index') }}" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

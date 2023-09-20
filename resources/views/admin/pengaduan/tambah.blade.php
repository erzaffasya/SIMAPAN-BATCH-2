<x-app-layout>
    <style>
        .wrapper {
            position: relative;
            width: 400px;
            height: 200px;
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .signature-pad {
            position: absolute;
            left: 0;
            top: 0;
            width: 400px !important;
            height: 200px;
        }
    </style>
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Pengaduan</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Pengaduan</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">

        <!-- Lightbox -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Form Pengaduan</h4>
                </div>
                -
            </div>
            <!-- end card body -->
        </div>
    </div>
    <!-- /Wizard -->
    </div>

    <script>
        function onChangeSelect(url, id, name) {
            // send ajax request to get the cities of the selected province and append to the select tag
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    id: id
                },
                success: function(data) {
                    $('#' + name).empty();
                    $('#' + name).append('<option>==Pilih Salah Satu==</option>');

                    $.each(data, function(key, value) {
                        $('#' + name).append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        }
        $(function() {
            $('#kecamatan').on('change', function() {
                onChangeSelect('{{ route('villages') }}', $(this).val(), 'desa');
            })

            $('#lahir_korban').on('change', function() {
                const birthdate = document.getElementById('lahir_korban').value;
                const today = new Date();
                const birthDate = new Date(birthdate);
                const age = today.getFullYear() - birthDate.getFullYear();

                // Adjust age if birthday hasn't occurred yet this year
                if (today < new Date(today.getFullYear(), birthDate.getMonth(), birthDate.getDate())) {
                    age--;
                }

                document.getElementById('usia_korban').value = age;

            })


            $('#lahir_pelaku').on('change', function() {
                const birthdate = document.getElementById('lahir_pelaku').value;
                const today = new Date();
                const birthDate = new Date(birthdate);
                const age = today.getFullYear() - birthDate.getFullYear();

                // Adjust age if birthday hasn't occurred yet this year
                if (today < new Date(today.getFullYear(), birthDate.getMonth(), birthDate.getDate())) {
                    age--;
                }

                document.getElementById('usia_pelaku').value = age;

            })
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
    <script>
        $(function() {

            var wrapper = document.getElementById("signature-pad"),
                clearButton = wrapper.querySelector("[data-action=clear]"),
                saveButton = wrapper.querySelector("[data-action=save]"),
                canvas = wrapper.querySelector("canvas"),
                signaturePad;

            signaturePad = new SignaturePad(canvas, {
                backgroundColor: "rgb(255,255,255)",
            });
            // canvas.select = function(){
            //     window.scrollTo(0, 0);
            //     document.body.scrollTop = 0;
            // };
            canvas.focus({
                preventScroll: true
            });
            clearButton.addEventListener("click", function(event) {
                signaturePad.clear();
            });
        });
    </script>

</x-app-layout>

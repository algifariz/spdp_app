<x-app-layout title="Scan QR Code">
    <div class="flex flex-col gap-7">
        <header>
            <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl dark:text-white">
                Scan QR Code
            </h1>
        </header>

        <div
            class="flex flex-col bg-white border shadow-sm rounded-xl p-4 md:p-5 dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7] dark:text-gray-400">
            <div class="flex items-center justify-center">
                <div id="reader" style="width:100%;"
                    class="max-w-lg [&>div]:flex [&>div]:flex-col [&>div]:justify-center [&>div]:items-center">
                </div>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            function onScanSuccess(decodedText, decodedResult) {
                const hash = decodedText;

                // Send decodedText to controller
                html5QrcodeScanner.clear().then(() => {
                    $.ajax({
                        url: "{{ route('admin.scan.store') }}",
                        type: "POST",
                        data: {
                            "_method": "POST",
                            "_token": "{{ csrf_token() }}",
                            "qr_code": hash
                        },
                        success: function(response) {
                            if (response.status == 200) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: response.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(function() {
                                    window.location = "{{ route('admin.scan.index') }}";
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal',
                                    text: response.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(function() {
                                    window.location = "{{ route('admin.scan.index') }}";
                                });
                            }
                        },
                        error: function(xhr, textStatus, errorThrown) {
                            console.error("AJAX Error:", textStatus, errorThrown);
                            // You can log or display the error message here
                        }
                    });
                });
            }

            let config = {
                fps: 10,
                qrbox: {
                    width: 300,
                    height: 300
                },
                rememberLastUsedCamera: true,
                // Only support camera scan type.
                supportedScanTypes: [Html5QrcodeScanType.SCAN_TYPE_CAMERA]
            };

            let html5QrcodeScanner = new Html5QrcodeScanner(
                "reader", config, /* verbose= */ false);
            html5QrcodeScanner.render(onScanSuccess);
        </script>
    </x-slot>
</x-app-layout>

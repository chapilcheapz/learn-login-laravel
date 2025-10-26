<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KYC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container-fluid mt-5">
        <div class="col-4 text-center m-auto border p-4">
<form action="{{ route('kyc.submit', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="d-flex justify-content-around mb-3">
                    <div class="block-left">
                        <div class="input-group card btn btn-outline-primary position-relative">
                            <input type="file" class="form-control opacity-0 position-absolute" 
                                id="cccdfront" name="cccd_front" accept="image/*">
                            <label for="cccdfront" class="w-100 text-center">Upload CCCD Front</label>
                        </div>
                        <img id="preview-front" class="mt-2 rounded d-none" alt="Front Preview" style="width:150px">
                    </div>
                    <div class="block-right">
                        <div class="input-group card btn btn-outline-primary position-relative">
                            <input type="file" class="form-control opacity-0 position-absolute"
                                id="cccdback" name="cccd_back" accept="image/*">
                            <label for="cccdback" class="w-100 text-center">Upload CCCD Back</label>
                        </div>
                        <img id="preview-back" class="mt-2 rounded d-none" alt="Back Preview" style="width:150px">
                    </div>
                </div>
                <button class="btn btn-danger form-control mt-2">Submit KYC</button>
            </form>
        </div>
    </div>

    <script>
        // Hàm hiển thị ảnh preview
        function previewImage(input, imgId) {
            const file = input.files[0];
            const imgEl = document.getElementById(imgId);

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imgEl.src = e.target.result;
                    imgEl.classList.remove('d-none');
                };
                reader.readAsDataURL(file);
            }
        }

        // Gắn sự kiện cho từng input
        document.getElementById('cccdfront').addEventListener('change', function() {
            previewImage(this, 'preview-front');
        });

        document.getElementById('cccdback').addEventListener('change', function() {
            previewImage(this, 'preview-back');
        });
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Upload an Image</h2>

        <!-- Image Upload Form -->
        <form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data" class="mb-5">
            @csrf
            <div class="row g-2 align-items-center">
                <div class="col-md-10">
                    <input type="file" name="image" class="form-control" required>
                    @error('image')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Upload Image</button>
                </div>
            </div>
        </form>
        <!-- Uploaded Images Table -->
        <h3 class="text-center">Uploaded Images Will Be Shown Here</h3>
        <table class="table table-bordered table-striped mt-3">
            <thead class="table-primary">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image Preview</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($images as $index => $image)
                    <!-- Image Preview -->
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>
                            @php
                                // Check if the file is a valid URL or a local file
                                $imageSrc = filter_var($image->filepath, FILTER_VALIDATE_URL)
                                    ? $image->filepath
                                    : asset('storage/' . $image->filepath);
                            @endphp
                            <img src="{{ $imageSrc }}" alt="Image" class="img-thumbnail" width="100">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap 5 JS CDN (for any JavaScript functionality, e.g., modals) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

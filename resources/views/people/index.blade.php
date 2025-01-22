<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>People</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1>People's Information</h1>
    <div class="row">
        @foreach($people as $person)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $person->name }}</h5>
                        <p class="card-text">Age: {{ $person->age }}</p>
                        <p class="card-text">Status: {{ ucfirst($person->status) }}</p>
                        @if($person->notice)
                            <p class="card-text"><strong>Notice:</strong> {{ $person->notice }}</p>
                        @else
                            <p class="card-text">No notice available.</p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

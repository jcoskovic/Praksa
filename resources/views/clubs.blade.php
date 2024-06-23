<!DOCTYPE html>
<html>
<head>
    <title>Clubs</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Clubs</h1>
    
   
    <form method="POST" action="{{ route('clubs.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Club Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="supervisor">Supervisor</label>
            <select class="form-control" id="supervisor" name="supervisor_id">
                <option value="">No Supervisor</option>
                @foreach ($supervisors as $supervisor)
                    <option value="{{ $supervisor->id }}">{{ $supervisor->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create Club</button>
    </form>

    <hr>

 
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Supervisor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clubs as $club)
                <tr>
                    <td>{{ $club->name }}</td>
                    <td>{{ $club->supervisor->name ?? 'N/A' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>

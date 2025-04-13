<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Feedback List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha384-***" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap");
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            padding-top: 80px;
        }

        .container {
            max-width: 90%; /* Adjust this value if needed */
            width: 100%;
        }

        .table-responsive {
            overflow-x: auto;
            white-space: nowrap;
        }
    </style>
</head>
<body>
    @include('adminNavigation')
    <section id="feedbackList">
    <div class="container mt-4">
        <div class="card shadow p-4">
            <h2 class="mb-4">User Feedback List</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover bg-white shadow-sm rounded">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th class="py-2 px-3 text-start">ID</th>
                            <th class="py-2 px-3 text-start">Customer Name</th>
                            <th class="py-2 px-3 text-start">Email</th>
                            <th class="py-2 px-3 text-start">Message</th>
                            <th class="py-2 px-3 text-start">Submit Date</th>
                            <th class="py-2 px-3 text-start">Status</th>
                            <th class="py-2 px-3 text-start">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($feedbacks as $id => $feedback)
                            <tr>
                                <td class="py-2 px-3">{{ $id }}</td>
                                <td class="py-2 px-3">{{ $feedback['customerName'] }}</td>
                                <td class="py-2 px-3">{{ $feedback['email'] }}</td>
                                <td class="py-2 px-3">{{ Str::limit($feedback['message'], 50) }}</td>
                                <td class="py-2 px-3">{{ $feedback['submitDate'] }}</td>
                                <td class="py-2 px-3">
                                    @if ($feedback['isRead'])
                                        <span class="badge bg-success">✅ Read</span>
                                    @else
                                        <span class="badge bg-danger">❌ Unread</span>
                                    @endif
                                </td>
                                <td class="py-2 px-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <!-- View Feedback (Eye Icon) -->
                                        <a href="{{ url('/adminFeedbackView?id=' . $id) }}" class="text-primary me-4" title="View Feedback">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <!-- Delete Feedback (Trash Icon) -->
                                        <form action="{{ url('adminFeedbackDelete/' . $id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this feedback?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link text-danger p-0 ms-4" title="Delete Feedback">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>    
    </div>
</section>
</body>
</html>

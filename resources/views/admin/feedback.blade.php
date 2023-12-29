
@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Feedback Items</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>User Name</th>
                    <th>Votes</th>
                    <th>Created At</th>
                    <th>Action</th>
                    <th>Toggle Comment Status</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($feedbackItems as $feedback)
                    <tr>
                        <td>{{ $feedback->id }}</td>
                        <td>{{ $feedback->title }}</td>
                        <td>{{ Str::limit($feedback->description, 30, '...') }}</td>
                        <td>{{ $feedback->category }}</td>
                        <td>{{ $feedback->user->name }}</td>
                        <td>{{ $feedback->votes_count }}</td>
                        <td>{{ $feedback->created_at->format('M d, Y h:i A') }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.deleteFeedbackItem', $feedback->id) }}" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                        <td>
                            <button class="toggle-comment-status btn btn-sm {{ $feedback->comments_enabled ? 'btn-warning' : 'btn-success' }}"
                                    data-feedback-id="{{ $feedback->id }}"
                                    data-toggle-url="{{ route('feedback.toggleCommentStatus', $feedback->id) }}">
                                {{ $feedback->comments_enabled ? 'Disable' : 'Enable' }} Comments
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">No feedback items available.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.toggle-comment-status').forEach(function (button) {
                button.addEventListener('click', function () {
                    var feedbackId = this.getAttribute('data-feedback-id');
                    var toggleUrl = this.getAttribute('data-toggle-url');
                    fetch(toggleUrl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                    })
                        .then(response => response.json())
                        .then(data => {
                            this.classList.remove('btn-success', 'btn-warning');
                            this.classList.add(data.status ? 'btn-warning' : 'btn-success');
                            this.textContent = data.status ? 'Disable Comments' : 'Enable Comments';
                        })
                        .catch(error => console.error('Error:', error));
                });
            });
        });
    </script>
@endsection

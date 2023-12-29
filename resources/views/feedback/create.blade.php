@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-info text-white" style="background: linear-gradient(90deg, #bb084a, #68062a);">
                        <h2 class="display-6 mb-0">Create New Feedback</h2>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('feedback.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label">Feedback Title</label>
                                <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Feedback Description</label>
                                <textarea id="description" name="description" class="form-control" required>{{ old('description') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Select Category</label>
                                <select id="category" name="category" class="form-select" required>
                                    <option value="bug">Bug</option>
                                    <option value="feature">Feature</option>
                                    <option value="improvement">Improvement</option>
                                </select>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" style="background-color: #1e38a3;">Submit Feedback</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

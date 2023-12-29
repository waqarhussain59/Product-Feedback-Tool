@extends('layouts.app')

@section('content')
    <div class="container my-3">
        @auth
            <div class="text-end">
                <a href="{{ route('feedback.create') }}" class="btn btn-success">Share Your Thoughts</a>
            </div>
        @endauth
            @guest
                <h2 class="text-center mb-4">Discussions!</h2>

                @foreach ($feedbackItems as $feedback)
                    <div class="col">
                        <div class="card">
                            <div class="card-header bg-info text-white">
                                <h5 class="card-title">
                                    <strong>Title:</strong> <strong>{{ $feedback->title }}</strong>
                                </h5>
                            </div>

                            <div class="card-body">
                                <p class="card-text" style="font-size: 1.1rem;">
                                    <strong>Description:</strong> {{ $feedback->description }}
                                </p>
                                <div class="mb-2">
                                    <span class="badge bg-secondary">Category: {{ $feedback->category }}</span>
                                </div>
                                <div class="mb-2">
                                    <span class="badge bg-secondary">By: {{ $feedback->user->name }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <section class="bg-light py-3 text-center">
                        <div class="container">
                            <h2 class="display-4 mb-4">Join the Discussion!</h2>
                            <p class="lead text-muted mb-4">Register now to leave feedback, participate in discussions, and connect with the community.</p>
                            <a href="{{ url('/register') }}" class="btn btn-primary btn-lg">Register Now</a>
                        </div>
                    </section>
                @endforeach
            @else
                <h2 class="text-center mb-4">Discussions!</h2>

                @foreach ($feedbackItems as $feedback)
                    <div class="col">
                        <div class="card">
                            <div class="card-header bg-info text-white">
                                <h5 class="card-title">
                                    <strong>Title:</strong> <strong>{{ $feedback->title }}</strong>
                                </h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text" style="font-size: 1.1rem;">
                                    <strong>Description:</strong> {{ $feedback->description }}
                                </p>
                                <div class="mb-2">
                                    <span class="badge bg-secondary">Category: {{ $feedback->category }}</span>
                                </div>
                                <div class="mb-2">
                                    <span class="badge bg-secondary">By: {{ $feedback->user->name }}</span>
                                </div>
                                <div class="mb-2">
                                    <span class="badge bg-secondary">Votes: <span id="votes-count-{{ $feedback->id }}">{{ $feedback->votes_count }}</span></span>
                                    <button class="btn btn-outline-primary btn-sm ms-2" onclick="vote('{{ $feedback->id }}')">
                                        <i class="fas fa-thumbs-up"></i> Vote
                                    </button>
                                </div>
                            </div>
                            <div class="card-footer">
                                <form method="POST" action="{{ route('comments.store', $feedback->id) }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="content" class="form-label">Add Your Insight:</label>
                                        <textarea id="comment-content-{{ $feedback->id }}" name="content" class="form-control" required></textarea>
                                        <div id="user-suggestions-{{ $feedback->id }}"></div>
                                    </div>
                                    @guest
                                        <div class="alert alert-info" role="alert">
                                            Log in to leave a comment and engage with the community.
                                        </div>
                                    @else
                                        <button type="submit" class="btn btn-primary">Share Comment</button>
                                    @endguest
                                </form>
                            </div>
                            <div class="card-footer">
                                <strong>Comments:</strong>
                                <div class="comments-section mt-2">
                                    @if($feedback->comments_enabled)
                                        @forelse ($feedback->comments as $comment)
                                            <div class="comment mb-2">
                                                <div class="comment-header">
                                                    <strong>{{ $comment->user->name }}</strong>
                                                    <span class="comment-date">{{ $comment->created_at->format('M d, Y') }}</span>
                                                </div>
                                                <div class="comment-content" id="comment-{{ $comment->id }}">
                                                    {!! $comment->parseMentions() !!}
                                                </div>
                                            </div>
                                        @empty
                                            <div class="no-comments mt-2">No comments yet. Be the first to share your thoughts!</div>
                                        @endforelse
                                    @else
                                        <div class="comments-disabled mt-2">Comments are currently disabled for this feedback item.</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endguest



        <div class="mt-4 d-flex justify-content-center">
            {{ $feedbackItems->links('pagination::bootstrap-4') }}
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard-all/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard-all/plugins/emoji/emoji/images/emoji.png"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard-all/plugins/emoji/emoji/plugin.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            @foreach ($feedbackItems as $feedback)
            CKEDITOR.replace('comment-content-{{ $feedback->id }}', {
                extraPlugins: 'emoji',
                height: 100
            });
            @endforeach
        });
    </script>
    <script>
        function vote(feedbackId) {
            $.ajax({
                url: '/feedback/' + feedbackId + '/vote',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    $('#votes-count-' + feedbackId).text(data.votes_count);
                }
            });
        }
        $(document).ready(function () {
            @foreach ($feedbackItems as $feedback)
            (function() {
                var commentContent = $('#comment-content-{{ $feedback->id }}');

                commentContent.on('input', function () {
                    var content = commentContent.val();
                    var lastAtPos = content.lastIndexOf('@');

                    if (lastAtPos !== -1) {
                        var query = content.substring(lastAtPos + 1);

                        if (query.length > 0) {
                            $.ajax({
                                url: '/users/search/' + query,
                                method: 'GET',
                                success: function (data) {
                                    displayUserSuggestions(data.users, '{{ $feedback->id }}');
                                }
                            });
                        }
                    }
                });

                function displayUserSuggestions(users, feedbackId) {
                    var suggestionsContainer = $('#user-suggestions-' + feedbackId);
                    suggestionsContainer.empty();

                    if (users.length > 0) {
                        users.forEach(function (user) {
                            var suggestionElement = $('<div class="user-suggestion"></div>');
                            suggestionElement.data('username', user.username);
                            suggestionElement.text(user.name);
                            suggestionsContainer.append(suggestionElement);
                            suggestionElement.on('click', function () {
                                var name = $(this).text().trim();
                                insertMention(name, feedbackId);
                                $('#user-suggestions-' + feedbackId).empty();
                            });
                        });
                    }
                }

                function insertMention(name, feedbackId) {
                    var content = $('#comment-content-' + feedbackId).val();

                    if (!content.trim()) {
                        $('#comment-content-' + feedbackId).val('@' + name + ' ');
                    } else {
                        var words = content.split(' ');
                        words[words.length - 1] = '@' + name;
                        var newContent = words.join(' ') + ' ';
                        $('#comment-content-' + feedbackId).val(newContent);
                    }

                    $('#selected-username-' + feedbackId).text(name);
                }
            })();
            @endforeach
        });
    </script>

@endsection

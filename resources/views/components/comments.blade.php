@props(['type', 'typeId'])

<div class="comments-section mt-4">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Comments</h5>
        </div>
        <div class="card-body">
            <!-- Comment Form -->
            @auth
            <form id="commentForm" class="mb-4">
                @csrf
                <input type="hidden" name="{{ $type }}_id" value="{{ $typeId }}">
                <div class="mb-3">
                    <textarea class="form-control" name="content" rows="3" placeholder="Write your comment here..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Post Comment</button>
            </form>
            @else
            <div class="alert alert-info">
                Please <a href="{{ route('login') }}">login</a> to post a comment.
            </div>
            @endauth

            <!-- Comments List -->
            <div id="commentsList" class="mt-4">
                <!-- Comments will be loaded here -->
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    loadComments();

    // Handle form submission
    const form = document.getElementById('commentForm');
    if (form) {
        form.addEventListener('submit', async function(e) {
            e.preventDefault();

            try {
                const response = await fetch('{{ route("comments.store") }}', {
                    method: 'POST',
                    body: new FormData(this),
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });

                if (response.ok) {
                    // Clear form and reload comments
                    this.reset();
                    loadComments();
                } else {
                    console.error('Error posting comment');
                }
            } catch (error) {
                console.error('Error:', error);
            }
        });
    }

    // Load comments function
    async function loadComments() {
        try {
            const response = await fetch('{{ route($type . ".comments", [$type => $typeId]) }}');
            const comments = await response.json();

            const commentsList = document.getElementById('commentsList');
            commentsList.innerHTML = comments.map(comment => `
                <div class="comment mb-3">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <img src="${comment.user.avatar || '/assets/img/avatars/default.png'}"
                                 class="rounded-circle"
                                 width="40"
                                 height="40"
                                 alt="${comment.user.name}">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">${comment.user.name}</h6>
                                <small class="text-muted">${new Date(comment.created_at).toLocaleDateString()}</small>
                            </div>
                            <p class="mb-1">${comment.content}</p>
                            @auth
                            ${comment.user_id === {{ auth()->id() }} ? `
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-link text-warning p-0 me-2"
                                            onclick="editComment(${comment.id})">
                                        Edit
                                    </button>
                                    <button class="btn btn-link text-danger p-0"
                                            onclick="deleteComment(${comment.id})">
                                        Delete
                                    </button>
                                </div>
                            ` : ''}
                            @endauth
                        </div>
                    </div>
                </div>
            `).join('');
        } catch (error) {
            console.error('Error loading comments:', error);
        }
    }

    // Edit comment function
    window.editComment = function(commentId) {
        // Implement edit functionality
    }

    // Delete comment function
    window.deleteComment = async function(commentId) {
        if (confirm('Are you sure you want to delete this comment?')) {
            try {
                const response = await fetch(`/comments/${commentId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });

                if (response.ok) {
                    loadComments();
                }
            } catch (error) {
                console.error('Error deleting comment:', error);
            }
        }
    }
});
</script>
@endpush

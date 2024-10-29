@extends('layouts.app')

@section('title', 'Create BFAR Office')
@vite(['resources/css/app.css', 'resources/js/app.js'])

@section('content')
<div class="grid w-full gap-6 p-20 ml-40 pl-28 mx-auto font-nunito">
<div class="flex space-x-4">
    <a class="w-fit bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 active:bg-blue-800" href="{{ route('iar.create') }}">Add IAR Form</a>
    <a class="w-fit bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 active:bg-red-800" href="{{ route('archive.iar') }}">Archive</a>
</div>
    <div class="mb-4">
        <input type="text" id="searchInput" class="form-control p-2 border rounded" placeholder="Search IAR...">
    </div>

    @php
        $reversedIars = array_reverse($iars->toArray());
    @endphp

    @foreach($reversedIars as $data)
        <div class="w-full md:w-1/2 border-t-4 border-blue-900 bg-white p-6 rounded-md shadow-lg card">
            <div class="card-body p-4">
                <p class="text-2xl font-semibold mb-2"><strong>{{ $data['iar_entityname'] }}</strong></p>
                <p class="text-lg mb-2"><strong>Fund Cluster:</strong> {{ $data['iar_fundcluster'] }}</p>
                <p class="text-lg mb-2"><strong>Supplier:</strong> {{ $data['iar_supplier'] }}</p>

                <div class="action-column mt-4">
                    <a class="btn btn-primary bg-[#3a5998] text-white border-[#3a5998] rounded px-4 py-2 hover:bg-[#0056b3] hover:border-[#0056b3]" href="{{ route('item.show', $data['iar_id']) }}">View</a>
                    <button class="btn btn-success bg-[#67b868] text-white border-[#67b868] rounded px-4 py-2 hover:bg-[#218838] hover:border-[#218838] print-preview-btn" data-iar-id="{{ $data['iar_id'] }}">Print Preview</button>
                    <a class="btn btn-danger bg-[#ff5ca1] text-white border-[#ff5ca1] rounded px-4 py-2 hover:bg-[#c82333] hover:border-[#c82333]" href="{{ route('delete.iar', ['iar_id' => $data['iar_id']]) }}">Delete</a>
                </div>

                <div class="comments-section mt-4">
                    <h5 class="text-xl font-semibold mb-2">Comments</h5>
                    @if(empty($data['comments']))
                        <p>No comments yet.</p>
                    @else
                        @foreach($data->comments as $comment)
                            <div class="comment mb-2">
                                <p><strong>{{ $comment->user->name }}:</strong> {{ $comment->content }}</p>
                            </div>
                        @endforeach
                    @endif

                    @if(auth()->user()->is_admin)
                        <form action="{{ route('comments.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="commentable_id" value="{{ $data['iar_id'] }}">
                            <input type="hidden" name="commentable_type" value="App\Models\Iar">
                            <div class="form-group">
                                <textarea name="content" class="form-control p-2 border rounded" placeholder="Add a comment" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary bg-[#3a5998] text-white border-[#3a5998] rounded px-4 py-2 mt-2 hover:bg-[#0056b3] hover:border-[#0056b3]">Add Comment</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchInput');
        const iarCards = document.querySelectorAll('.card');

        searchInput.addEventListener('input', function () {
            const query = searchInput.value.toLowerCase();

            iarCards.forEach(function (card) {
                const cardText = card.innerText.toLowerCase();
                const isVisible = cardText.includes(query);
                card.style.display = isVisible ? 'block' : 'none';
            });
        });

        document.querySelectorAll('.print-preview-btn').forEach(button => {
            button.addEventListener('click', function() {
                const iarId = button.getAttribute('data-iar-id');
                window.open("{{ route('print.preview.excel', '') }}/" + iarId, '_blank');
            });
        });
    });
</script>
@endsection

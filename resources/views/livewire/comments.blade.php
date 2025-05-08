<div>
    @if ($comments)
        <div class="bg-white shadow rounded-md p-6 mb-8">
            <ul>
                @foreach ($comments as $comment)
                    <li>
                        {{$comment}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

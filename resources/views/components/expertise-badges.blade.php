@if (empty($expertise) || count($expertise) === 0)
    <p class="text-gray-500">No expertise added yet.</p>
@else
    <div class="flex flex-wrap gap-2">
        @foreach($expertise as $item)
            @php
                $colors = ['slate', 'sky', 'indigo', 'emerald', 'amber', 'neutral'];
                $color = $colors[crc32($item) % count($colors)];
            @endphp
            <x-badge :text="$item" :color="$color" />
        @endforeach
    </div>
@endif
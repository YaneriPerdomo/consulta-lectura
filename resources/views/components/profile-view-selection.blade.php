<div>
    <div class="d-flex gap-3">
        @foreach ($options as $key =>  $value)
            <a  class="fs-3 text-decoration-none" 
                href="{{ route('user.profile.'.$key) }}" 
                style="color: inherit;"    
            >
                @if ($value == $selected)
                    <b>{{ $value }}</b>
                @else
                    {{ $value }}
                @endif
            </a>
        @endforeach
    </div>
</div>
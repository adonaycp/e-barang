@if(!empty($kelurahans))
    @foreach($kelurahans as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
@endif
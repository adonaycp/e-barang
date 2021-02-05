@if(!empty($category))
    @foreach($category as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
@endif
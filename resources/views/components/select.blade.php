<x-label for="{{ $name }}">{{ $label ?? ucfirst($label) }}</x-label>

<select name="{{ $name }}" multiple class='px-2 font-sans border-2 border-gray-300 focus:outline-none focus:border-red-400 focus:ring-0 w-full'>
    <option value="">--empty--</option>
    @foreach($items as $item)
        @if (in_array($item['id'], $filter))
            <option value="{{$item['id']}}" selected>{{$item['name']}}</option>
        @else
            <option value="{{$item['id']}}">{{$item['name']}}</option>
        @endif
    @endforeach
</select>

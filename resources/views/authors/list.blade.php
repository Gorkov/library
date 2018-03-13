@foreach($authors as $key => $author)
<tr>
    <td>{{++$key}}</td>
    <td><a href="/author/{{$author->id}}">{{$author->name}} {{$author->surname}}</a></td>
    <td class="td--center">
        @if (!empty($author->books))
        {{$author->books}}
        @else
        -
        @endif
    </td>
    <td class="td--center">
        @if ($author->rating > 0)
        {{$author->rating}}
        @else
        -
        @endif
    </td>
</tr>
@endforeach
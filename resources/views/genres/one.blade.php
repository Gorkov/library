@foreach($authors as $key => $author)
    <tr>
        <td>{{++$key}}</td>
        <td><a href="/author/{{$author->author_id}}">{{$author->author_name}} {{$author->author_surname}}</a></td>
        <td class="td--center">
            @if ($author->rating > 0)
                {{$author->rating}}
            @else
                -
            @endif
        </td>
    </tr>
@endforeach
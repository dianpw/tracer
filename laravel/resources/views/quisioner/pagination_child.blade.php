@foreach($data as $row)

   {{ $row->konten }}

@endforeach
<br><br>
{!! $data->links() !!}

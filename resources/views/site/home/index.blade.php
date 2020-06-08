@extends('site.template.template')

@section('content')

    <h1>Academia Fitnnes</h1>

    @if($var1 == '1234')
    <p>É igual</p>
        @else
        <p>É diferente</p>
    @endif

    @unless($var1 == '1234')
    <p>Não é igual...unless</p>
    @endunless

    @for($i = 0; $i < 10; $i++)
        <p>Valor: {{$i}}</p>
    @endfor

    {{--
    @if(count($arrayData) > 0)
         @foreach($arrayData as $array)
             <p>Valor foreach: {{$array}}</p>
         @endforeach
    @else
    <p>Não existe itens para serem impressos</p>
    @endif
    --}}
    @forelse($arrayData as $array)
        <p>Forelse: {{$array}}</p>
    @empty
        <p>Não existe itens para serem impressos</p>
    @endforelse

@endsection

@push('scripts')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
@endpush
@php
$creneauList = ['de 10h a 10h30', 'de 11h a 11h30', 'de 14h a 14h30', 'de 15h a 15h30', 'de 16h a 16h30'];
$today = date('Y-m-d');
@endphp

@component('components.layout')
    <div style="display:grid;grid-template-columns:repeat(3, 1fr);gap: 1rem">
        @foreach ($list as $rdv)
            <div style="background-color: grey">
                <div style="display: flex; gap:1rem">
                    @if ($today < $rdv['date'])
                        <a href="{{ createLink('/rdv/update/' . $rdv['id']) }}">update</a>
                    @endif
                    <a href="{{ createLink('/rdv/delete/' . $rdv['id']) }}">delete</a>
                </div>
                <p>sujet : {{ $rdv['sujet'] }}</p>
                <p>creneau : {{ $creneauList[$rdv['creneau']] }}</p>
                <p>date : {{ $rdv['date'] }}</p>
            </div>
        @endforeach
    </div>
@endcomponent

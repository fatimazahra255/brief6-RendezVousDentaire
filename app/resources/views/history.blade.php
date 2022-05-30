@php
$creneauList = ['de 10h a 10h30', 'de 11h a 11h30', 'de 14h a 14h30', 'de 15h a 15h30', 'de 16h a 16h30'];
$today = date('Y-m-d');
@endphp
@push('styles')
    <link rel="stylesheet" href="css/history.css">
@endpush
@component('components.layout')
    <div class="history">
        <a class="create" href="{{ createLink('/create') }}">nouveau rendez vous</a>
        <div class="list">

            @foreach ($list as $rdv)
                <div class="card">
                    <div class="controls">
                        @if ($today < $rdv['date'])
                            <a href="{{ createLink('/rdv/update/' . $rdv['id']) }}">update</a>
                        @endif
                        <a href="{{ createLink('/rdv/delete/' . $rdv['id']) }}">delete</a>
                    </div>
                    <div class="section"><span class="label">sujet:</span> <span
                            class="value">{{ $rdv['sujet'] }}</span></div>
                    <div class="section"><span class="label">creneau:</span> <span
                            class="value">{{ $creneauList[$rdv['creneau']] }}</span></div>
                    <div class="section"><span class="label">date:</span> <span
                            class="value">{{ $rdv['date'] }}</span></div>
                </div>
            @endforeach
        </div>
    </div>
@endcomponent

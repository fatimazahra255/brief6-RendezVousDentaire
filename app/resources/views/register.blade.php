@component('components.layout')
    @push('styles')
        <link rel="stylesheet" href="css/register.css">
    @endpush

    @php
    $fields = [
        'nom' => [
            'label' => 'Nom',
            'placeholder' => 'John',
            'name'=>'nom',
        ],
        'prenom' => [
            'label' => 'prenom',
            'placeholder' => 'Smith',
            'name'=>'prenom',
        ],
        'email' => [
            'label' => 'email',
            'type' => 'email',
            'placeholder' => 'example@gmail.com',
            'name'=>'email',
        ],
        'tel' => [
            'label' => 'Num de telephone',
            'type' => 'tel',
            'placeholder' => '095456461331',
            'name'=>'tel',
        ],
        'ddn' => [
            'label' => 'Date de naissance',
            'type' => 'date',
            'name'=>'dateN',
        ],
    ];
    @endphp

    <div class="register">
        <h1>Sign Up</h1>
        @if (isset($ref))
            <div class="code">
                <div class="content">
                    <p class="text">your ref code is  "{{ $ref }}" please copy it </p>
                    <a href="{{ createLink("/") }}">Nouveau rendez vous</a>
                </div>
            </div>
        @endif

        <form action="" method="post" class="form">
            @foreach ($fields as $field)
                <label class="input">
                    <span class="label">{{ $field['label'] }}</span>
                    <input type="{{ $field['type'] ?? 'text' }}" name="{{ $field['name'] }}" placeholder="{{ $field['placeholder'] ?? '' }}">
                </label>
            @endforeach
            <p class="login">
                Already have an account?
                <a href="{{ createLink('/login') }}">Sign In</a>
            </p>
            <button type="submit">Sign Up</button>
        </form>
    </div>
@endcomponent

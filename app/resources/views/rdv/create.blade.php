@component('components.layout', ['title' => 'create form'])
    @push('styles')
        <link rel="stylesheet" href="create.css">
    @endpush

    @php
    $creneauList = ['de 10h a 10h30', 'de 11h a 11h30', 'de 14h a 14h30', 'de 15h a 15h30', 'de 16h a 16h30'];
    $subjects = ['traitment', 'Radiologie dentaire', 'urgence dentaire', 'soins dentaires'];
    $tomorrow = date('Y-m-d', strtotime('+1 day'));
    @endphp

    <div class="create">
        <form method="POST">
            @if ($error !== null)
                <p>{{ $error }}</p>
            @endif
            <input type="date" value="{{ $tomorrow }}" name="date" min="{{ $tomorrow }}" id="date">
            <select name="creneau" id="creneau">
                <option value="" selected disabled>please select a slot</option>
                @foreach ($creneauList as $index => $creneau)
                    @if (!isset($usedSlots[$index]))
                        <option value="{{ $index }}">{{ $creneau }}</option>
                    @endif
                @endforeach
            </select>

            <select name="sujet" id="sujet">
                @foreach ($subjects as $subject)
                    <option value="{{ $subject }}">{{ $subject }}</option>
                @endforeach
            </select>
            <button type="submit">create</button>
    </div>
    </div>
    <script>
        const creneauList = JSON.parse('@php echo json_encode($creneauList) @endphp');
        const creneauSelect = document.querySelector("#creneau");
        const dateInput = document.querySelector("#date");

        dateInput.addEventListener("change", (e) => {
            fetch(`http://localhost/BRIEFAPITEST/rdv/all?date=${e.target.value}`)
                .then(res => res.json())
                .then(setupCreneau);
        })

        function setupCreneau(list) {
            creneauSelect.innerHTML = `<option value="" selected disabled>please select a slot</option>`;
            creneauList.forEach((creneau, index) => {
                if (list.includes(index)) return;
                creneauSelect.innerHTML += `<option value="${index}">${creneau}</option>`;
            });
        }
    </script>
@endcomponent

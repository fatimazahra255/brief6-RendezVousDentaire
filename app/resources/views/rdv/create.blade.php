@component('components.layout', ['title' => 'create form'])
    @push('styles')
        <link rel="stylesheet" href="css/create.css">
    @endpush

    @php
    $creneauList = ['de 10h a 10h30', 'de 11h a 11h30', 'de 14h a 14h30', 'de 15h a 15h30', 'de 16h a 16h30'];
    $subjects = ['traitment', 'Radiologie dentaire', 'urgence dentaire', 'soins dentaires'];
    $tomorrow = date('Y-m-d', strtotime('+1 day'));
    @endphp

    <div class="create">
        <a href="{{ createLink('/history') }}" class="history">mes rendez vous</a>
        <form method="POST" class="form">
            @if ($error !== null)
                <p class="error">{{ $error }}</p>
            @endif
            <label class="input">
                <span class="label">Choose a date</span>
                <input type="date" value="{{ $tomorrow }}" name="date" min="{{ $tomorrow }}" id="date">
            </label>

            <label class="input">
                <span class="label">choose a slot</span>
                <select name="creneau" id="creneau">
                    <option value="" selected disabled>please select a slot</option>
                    @foreach ($creneauList as $index => $creneau)
                        @if (!isset($usedSlots[$index]))
                            <option value="{{ $index }}">{{ $creneau }}</option>
                        @endif
                    @endforeach
                </select>
            </label>

            <label class="input"><span class="label">What is this about?</span>
                <select name="sujet" id="sujet">
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject }}">{{ $subject }}</option>
                    @endforeach
                </select>
            </label>
            <button type="submit">create</button>
        </form>
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

    <nav class="nav">
            @if (isLoggedIn())
            @php
                $patient = currentPatient();
            @endphp
            <div class="intro">
                <p class="welcome"><span>welcome,</span> {{ $patient['prenom'] }} {{ $patient['nom'] }}</p>
                <a class="logout" href="{{ createLink("/logout") }}">logout</a>
            </div>
            @endif
    </nav>

@if(session()->has('god'))
                <x-alert type="god">
                    {{ session('god') }}
                </x-alert>
            @endif
            
            
            @if(session()->has('warning'))
                <x-alert type="warning">
                    {{ session('warning') }}
                </x-alert>
            @endif
@if(session('status'))
                <div class="alert alert-success" role="success">
                {{session('status')}}
                </div>
 @elseif(session()->has('error'))
 <div class="alert alert-danger col-4 offset-3" role="danger">
                {{session('error')}}
                </div>
    @endif
    @if ($errors->any())
        <div class="py-4 px-2 bg-red-300">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

 <div class="card my-3">
      
    <div class="card-header">
        @if ( $image->user->image)
            <div class="avatar_mask float-left">
                <img src="{{ route('user.avatar',['filename'=>  $image->user->image]) }}" 
                class="img-fluid" alt="User Avatar">
            </div>
        @endif
        <a class="nav-link text-dark" 
        href="{{ route('profile',['id'=>$image->user->id]) }}">
            <span class="float-left ml-3">
                <b>{{ $image->user->name }}</b> |
                @<b class="text-secondary">{{$image->user->nick }}</b>
            </span>
        </a>
    </div>

    <div class="card-body tarjetaimagen">
        <div class="float-left mb-3">
            <img src="{{ route('image.user',['filename'=>  $image->image_path]) }}" 
            class="img-fluid imagenhome" alt="Image User">
        </div>

        <div class="mx-4 mt-5">
            <b class="text-secondary">{{  $image->user->nick }}
            | {{ \FormatTime::LongTimeFilter($image->created_at) }}</b>
            <p>{{ $image->description }}</p>    
        </div>

        <div class="mx-4 mb-2">
            <span class="con_likes{{ $image->id }}">{{ count($image->likes) }}</span>

            {{-- Recorro los likes si el usuario le pertenece el like pinta el corazon rojo --}}
            @php
                $user_like = false;
                foreach ($image->likes as $like)
                {
                    if($like->user->id == Auth::user()->id)
                    {
                        $user_like = true;
                    }
                }
            @endphp

            @if (!$user_like)
            
                <img src="{{ asset('img/heart-black.png') }}" 
                width="25" class="img-fluid mr-2 pointer btn-like"
                alt="" data-id="{{ $image->id}}"> 

            @else
                <img src="{{ asset('img/heart-red.png') }}" 
                width="25" class="img-fluid mr-2 pointer btn-dislike"
                alt="" data-id="{{ $image->id}}"> 
            @endif
            
            <a href="{{ route('image.detail',['id'=>$image->id]) }}"  
            class="btn btn-small btn-warning">
                Comentarios ({{ count($image->comments) }})
            </a>
        </div>

    </div>
</div>
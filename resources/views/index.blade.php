@extends('layouts.master')
@section('aside')
     <aside class="col-lg-5 align-self-center">
         <h2 class="text-center">
            Ignite Your Potential in the World of Artificial Intelligence!
         </h2>
         <div class="text-center">
            <img src="{{ asset('/images/logo.png')}}" alt="Intellicademy Logo" class="img-fluid w-25 mt-3 mb-3">
             {{-- <button class="btn btn-info">
                 learn now!
             </button> --}}
         </div>
         <p class="text-center">
            Enhance Your AI Expertise with Intellicademy's Premier E-Course!
         </p>
     </aside>
@endsection
@section('content')
<div class="text-center">
    <img src="/images/landingpage.png" alt="landing page" class="w-75">
</div>
@endsection
@component('mail::message')
<p>
    Halo <b>{{ $details['username'] }}</b>
</p> 
<p>
    Berikut adalah data anda:
</p>

@component('mail::table')
| #                  | Table                                                  | 
| ------------------ |:------------------------------------------------------:| 
| Name               | {{ $details['firstName'] }} {{ $details['lastName'] }} | 
| Username           | {{ $details['username'] }}                             | 
| Website            | {{ $details['website'] }}                              | 
| Role               | {{ $details['role'] }}                                 | 
| Tanggal Register   | {{ $details['datetime'] }}                             | 

@endcomponent

@component('mail::button', ['url' => 'http://127.0.0.1:8000/register/'.$details['key'] ])
    Verification
@endcomponent

Thanks, <br>
IntelliCademy

@endcomponent
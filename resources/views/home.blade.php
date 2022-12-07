@if(session()->has('name') )
<h1 style="color:blue">Welcome,{{ session()->get('name') }}</h1>
{{-- {{ session()->get('id') }} --}}
@endif


<a href="logout"><button>Log Out</button></a>
<a href="items"><button>View Venues</button></a>

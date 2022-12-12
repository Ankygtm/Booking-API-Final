<html>

<head>
  
    <title>My booking</title>
    @include('css')
   
</head>
<body>
@include('header')
@include('navbar')
    <table class="items">
        <caption><h2 class="item_head">My Bookings</h2></caption>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Opening Time</th>
            <th>Closing Time</th>
            <th>Address</th>
            <th>Contact</th>
            <th>Booked On</th>
            
            
        </tr>
        <?php $i=0; ?>
       @foreach ($items as $value)
       <tr>
        @foreach($value as $item)
        
            <td>{{ $item['I_name'] }}</td>
            <td>{{ $item['I_price'] }}</td>
            <td>{{ $item['I_start_time'] }}</td>
            <td>{{ $item['I_end_time'] }}</td>
            <td>{{ $item['I_address'] }}</td>
            <td>{{ $item['I_phone'] }}</td>
            <td>{{ $b_dates[$i] }}</td>
         
        
        @endforeach
    </tr>
    <?php $i++; ?>
       @endforeach
    </table>
    <a href="{{ url('/') }}"><button style="width:100%;">Back</button></a>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    @include('css')
    <title>Item Display</title>
</head>
<body>
    @include('header')
    @include('navbar')
    <div style="overflow-x:auto;">
    <table class="items">
        <caption><h2 class="item_head">Make Bookings</h2></caption>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Opening Time</th>
            <th>Closing Time</th>
            <th>Address</th>
            <th>Contact</th>
            <th>Rating</th>
            <th>Facilities</th>
            <th>Action</th>
            
        </tr>
       @foreach ($data as $item)
        <tr>
            <td>{{ $item['I_name'] }}</td>
            <td>{{ $item['I_price'] }}</td>
            <td>{{ $item['I_start_time'] }}</td>
            <td>{{ $item['I_end_time'] }}</td>
            <td>{{ $item['I_address'] }}</td>
            <td>{{ $item['I_phone'] }}</td>
            <td>{{ $item['I_rating'] }}</td>
            <td>{{ $item['I_facility'] }}</td>
            <td><a href="{{ url('book/'.$item['I_id']) }}"><button class="button_book">Book Now</button></a></td>
        </tr>
       @endforeach
    </table>
    <div />
</body>
</html>


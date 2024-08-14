@extends('layouts.master')

@section('content')

    {{-- Display success messages --}}
    @if (session('success'))
        <div class="alert alert-success" id="successAlert" xmlns="">
            {{ session('success') }}
        </div>
    @endif

    <button id="species" data-url="{{route("species")}}">
        .ajax refresh
    </button>

    <button id="getContent">CLICK TO REPEAT</button>

    <button class="panel-button" data-toggleid="btn2">BUTTON2</button>

    <button class="panel-button" data-toggleid="btn3">BUTTON3</button>

    <button class="panel-button" data-toggleid="btn4">BUTTON4</button>

    <div class="row">
        <div class="col-xs-3">
            <p>What do you want dogs or cats</p>
        </div>
        <div class="col-xs-3" id="btn2">
            <p2>Treat</p2>
        </div>
        <div class="col-xs-3" id="btn3">
            <p3>Milk</p3>
        </div>
        <div class="col-xs-3" id="btn4">
            <p4>Sleep</p4>
        </div>
    </div>

    <div class="container">
        <div class="header">
            <h1 class="text-muted"> Slider</h1>
        </div>

        <div id="slider">
            <ul class="slides">
                <li class="slide">
                    <img src="{{ asset('images/house-vet.jpg') }}" class="img-vet house-image" alt="House Image">
                </li>
                <li class="slide">
                    <img src="{{ asset('images/dog-vet.jpg') }}" class="img-vet dog-image" alt="Dog Image">
                </li>
            </ul>
        </div>
    </div>

    <h2> Dog Orders </h2>


    <ul id="orders">

    </ul>

    <h4>Add a Dog Order</h4>
    <p> name: <input type="text" id="name"></p>
    <p> food: <input type="text" id="food"></p>
    <button id="add-order">Add!</button>

    <div class="container" id="table-species">
        <a href="{{route('species.create')}}" class="nav-link">New Specie</a>
        @include('front.pages.species.partials.species_table')
    </div>
    </table>


@endsection

@section('javascripts')

    @parent

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Hide the success message after 5 seconds (5000 milliseconds)
            $("#successAlert").fadeTo(5000, 500).slideUp(500, function() {
                $("#successAlert").slideUp(500);
            });
        });
    </script>

    <script>
        $("#species").click(function (){
            alert('species')
            let url=$(this).data('url')
                $.ajax({
                    url: url,
                    type: "GET",
            success:function (response){
                        $('#table-species').empty();
                        $("#table-species").html(response.view);
            }
                })

        })
    </script>

    <script>
        $(document).ready(function(){
            $("#getContent").css({color:"red"}).on("mouseover",function (){
                $("p").fadeOut(200);
            });

            $(".panel-button").css({color:"red"}).on("click",function (){
                var toggleId = $(this).attr('data-toggleid');
                alert(toggleId);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            var $orders = $('#orders');
            var $name = $('#name');
            var $food = $('#food');

            // Retrieve saved orders from localStorage when the page loads
            var savedOrders = JSON.parse(localStorage.getItem('orders')) || [];
            var $orders = $('#orders');

            // Display saved orders
            savedOrders.forEach(function(order) {
                $orders.append('<li class="order-item">name: <span class="order-name">' + order.name + '</span>, food: <span class="order-food">' + order.food + '</span><button class="remove-order">Remove</button></li>');
            });


            $('#add-order').on('click', function(event) {
                event.preventDefault();

                var name = $('#name').val();
                var food = $('#food').val();

                console.log("Name:", name);
                console.log("Food:", food);

                // Check if the name and food fields are not empty
                if (name.trim() === '' || food.trim() === '') {
                    alert('Please enter both name and food');
                    return; // Exit the function if fields are empty
                }

                // Create new order object
                var newOrder = {
                    name: name,
                    food: food
                };

                // Add the new order to saved orders
                savedOrders.push(newOrder);

                // Save the updated orders to localStorage
                localStorage.setItem('orders', JSON.stringify(savedOrders));

                // Append the new item to the list
                $orders.append('<li class="order-item">name: ' + name + ', food: ' + food + '<button class="remove-order">Remove</button></li>');

                // Clear the input fields after adding the order
                $('#name').val('');
                $('#food').val('');
            });

            // Function to remove the order item
            $(document).on('click', '.remove-order', function() {
                $(this).parent('.order-item').remove();

                // Update saved orders in localStorage
                var updatedOrders = [];
                $('.order-item').each(function() {
                    var order = {
                        name: $(this).find('.order-name').text(),
                        food: $(this).find('.order-food').text()
                    };
                    updatedOrders.push(order);
                });
                localStorage.setItem('orders', JSON.stringify(updatedOrders));
            });
        });

    </script>

@endsection

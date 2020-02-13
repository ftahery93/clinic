<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <style type="text/css" rel="stylesheet" media="all">
        /* Media Queries */
        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }

        body {
            font-family: sans-serif;
            color: #74787E;
            font-size: 16px;
        }

        p,
        span {
            font-size: 13px;
            margin: 0px 0px 5px 0px;
        }

        b {
            font-weight: 600;
            font-size: 14px;
        }

        h6 {
            font-size: 15px;
            font-style: italic;
            margin: 0px;
        }

        hr {
            border-bottom: 1px solid #bababa;
            border-top: 0px;
        }
    </style>
</head>



<body style="margin: 0; padding: 0; width: 100%; background-color: #fff;">
    <div style="padding:10px;">
        <div align="center">
            <a style="font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;"
                href="{{ config('app.url') }}" target="_blank">
                <img src="{{ asset('assets/images/logo_white.png') }}" style="width:80px;">
            </a>
        </div>

        <h6>Shipment Status</h6>
        <p style="color:#4293ff;">{{ $detail }}</p>

        <hr>
        <br>

        <h6>Category</h6>
        <p>{{ $shipment->category['category_name'] }}</p>

        <hr>
        <br>

        <h6>Pickup Location</h6>

        <div style="margin-left:10px;margin-top:10px;">
            <p><b>{{ $shipment->address_from['city']['name'] }}</b></p>
            <p>Block:{{ $shipment->address_from['block'] }} /
                Street:{{ $shipment->address_from['street'] }} /
                Building:{{ $shipment->address_from['building'] }}</p>
            <p>{{ $shipment->address_from['mobile'] }}</p>
        </div>

        <hr>
        <br>

        <h6>Drop Location</h6>

        <div style="margin-left:10px;margin-top:10px;">
            @foreach ($shipment->addresses as $address)
            <p><b>{{ $address['city']['name'] }}</b></p>
            <p>Price:{{ $address['price'] }}</p>
            <p>Block:{{ $address['block'] }} /
                Street:{{ $address['street'] }} /
                Building:{{ $address['building'] }}</p>

            @if ($address['notes']!='')
            <p>Notes:{{ $address['notes'] }}</p>
            @endif

            <p>{{ $address['mobile'] }}</p>

            @if ($loop->last)

            @else
            <hr style="border-bottom:0.5px dotted;border-top:0px;">
            @endif

            @endforeach
        </div>
        <hr>

        <br>

        <div>
            <span>Total: <b style="color:#000;">{{ $shipment->price }} KWD</b></span>
            @if ($shipment->is_today)
            <span style="margin-left:10px;float:right">Pickup time: <b>Now</b></span>
            @else
            <span style="margin-left:10px;float:right">Pickup time:
                <b>{{ date('d/m/Y',strtotime($shipment->date))}} {{ $shipment->pickup_time_from }}</b></span>
            @endif
        </div>
    </div>
</body>

</html>
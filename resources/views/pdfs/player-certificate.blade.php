<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificate</title>
    <style>
        .certificate-container {
            border: 8px solid #ff6f61;
            width: 800px;
            margin: 0 auto;
            padding: 20px;
            position: relative;
            background-color: #fff;
        }

        .inner-container {
            border: 2px solid #8b66b0;
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.95);

            background-repeat: repeat;
            background-size: 15%;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.05);
            position: relative;
        }

        .title {
            text-align: center;
            font-weight: bold;
            font-size: 28px;
            color: #ff6f61;
            margin-bottom: 10px;
        }

        .name {
            text-align: center;
            font-size: 48px;
            font-weight: bold;
            color: #ff6f61;
            margin-bottom: 10px;
        }

        .description {
            text-align: center;
            font-size: 20px;
            margin-bottom: 20px;
            color: #555;
        }

        .logo {
            text-align: center;
            margin-top: 30px;
        }

        .trophy {
            position: absolute;
            bottom: 160;
            left: 30px;
            width: 80px;
        }

        .medal {
            position: absolute;
            top: 30px;
            left: 30px;
            width: 60px;
        }

        .signature-area {
            position: absolute;
            bottom: 250px;
            right: 30px;
            width: 200px;
            height: 4px;
            background-color: #333;
        }
    </style>
</head>
<body>
    <div class="certificate-container">
        <div class="inner-container" style="background-image: url('{{ public_path('images/watermark.jpg') }}');">
            <img src="{{ public_path('images/trophy.png') }}" alt="Trophy" class="trophy">
            <img src="{{ public_path('images/gold-medal.png') }}" alt="Medal" class="medal">
            <h1 class="title">CERTIFICATE OF MEMBERSHIP</h1>
            <p class="description">This is awarded to</p>
            <h2 class="name">{{ auth()->user()->name }}</h2>
            <p class="description">For their <strong>outstanding commitment to the Nairobi Team.</strong></p>
            <div class="signature-area"></div>
            <div class="logo">
                <img src="{{ public_path('images/logos/sports_logo.png') }}" alt="Sports Logo" width="150">
            </div>
        </div>
    </div>
</body>
</html>

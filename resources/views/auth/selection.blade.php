<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>   Attiwe - (erp-system)      </title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/rtl.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Cairo', sans-serif;
            background-image: url('{{ asset('assets/img/sativa.png') }}');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-box {
            background: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
        }

        .login-title {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .login-buttons a {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 15px;
            background: #f8f9fa;
            border: 2px solid transparent;
            border-radius: 10px;
            transition: all 0.3s ease-in-out;
        }

        .login-buttons a:hover {
            background: #e2e6ea;
            border-color: #007bff;
        }

        .login-buttons img {
            width: 80px;
            margin-bottom: 8px;
        }

        .login-buttons span {
            font-weight: bold;
            color: #333;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="login-box">
                    <h3 class="login-title text-primary ">حدد طريقة الدخول</h3>
                    <div class="row text-center login-buttons">
                        <div class="col-6 col-md-3 mb-3">
                            <a wire:navigate href="{{ route('login.show', 'student') }}" title="طالب">
                                <img src="{{ URL::asset('assets/img/student.png') }}" alt="طالب">
                                <span>طالب</span>
                            </a>
                        </div>
                        <div class="col-6 col-md-3 mb-3">
                            <a href="{{ route('login.show', 'parent') }}" title="ولي أمر">
                                <img src="{{ URL::asset('assets/img/parent.png') }}" alt="ولي أمر">
                                <span>ولي أمر</span>
                            </a>
                        </div>
                        <div class="col-6 col-md-3 mb-3">
                            <a href="{{ route('login.show', 'teacher') }}" title="معلم">
                                <img src="{{ URL::asset('assets/img/teacher.png') }}" alt="معلم">
                                <span>معلم</span>
                            </a>
                        </div>
                        <div class="col-6 col-md-3 mb-3">
                            <a href="{{ route('login.show', 'admin') }}" title="مسؤول">
                                <img src="{{ URL::asset('assets/img/admin.png') }}" alt="مسؤول">
                                <span>مسؤول</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

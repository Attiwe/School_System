<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>تسجيل الدخول   </title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="shortcut icon" href="img/favicon.ico" />
    
    <style>
        body {
            background: #f8f9fa; /* لون خلفية فاتح يتناسب مع الشعار */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .logo {
            max-width: 150px;
            margin-bottom: 20px;
        }
        .login-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            padding: 30px;
            text-align: center;
        }
        .login-title {
            font-weight: bold;
            color: #333;
        }
        .btn-custom {
            background-color: #2575fc;
            color: #fff;
            font-weight: bold;
            transition: 0.3s;
        }
        .btn-custom:hover {
            background-color: #2575fc;
        }
    </style>
</head>

<body>
    <img  src="{{ URL::asset('assets/img/logo.jpg') }}"   alt="شعار" class="logo">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="login-card">
                    <h3 class="login-title mb-4">تسجيل الدخول</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="type" value="{{ $type }}">

                        <div class="mb-3">
                            <label for="email" class="form-label">البريد الإلكتروني</label>
                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" required autofocus>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">كلمة المرور</label>
                            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe" name="remember">
                                <label class="form-check-label" for="rememberMe">تذكرني</label>
                            </div>
                         </div>

                        <button type="submit" class="btn btn-custom w-100">
                            <i class="fa fa-sign-in-alt"></i> تسجيل الدخول
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
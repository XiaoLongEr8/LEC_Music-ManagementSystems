<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/register.css">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <title>Register</title>
</head>

<body>

    <nav class="navBar_Container">
        <img src="image/Logo.svg" alt="">
    </nav>

    <main class="main_container">
        <div class="registration_container">
            <section class="title_container">
                <h1 class="regis_title">Lyrics-Go</h1>
            </section>

            <form action="">

                <section class="input_Row_Section">
                    <div class="input_Column_Section">
                        <label for="full_name" class="item_Title">Full Name</label>
                        <input type="text" class="full_Name" id="full_Name_Value" placeholder="Full Name" required>
                    </div>
                </section>

                <section class="input_Row_Section">
                    <div class="input_Column_Section">
                        <label for="username" class="item_Title">Username</label>
                        <input type="text" class="username" id="username" placeholder="Username" required>
                    </div>
                </section>

                <section class="input_Row_Section">
                    <div class="input_Column_Section">
                        <label for="email" class="item_Title">Email</label>
                        <input type="email" class="email" id="email_Value" placeholder="Email"
                            aria-describedby="emailHelp" required>
                    </div>
                </section>

                <section class="input_Row_Section">
                    <div class="input_Column_Section">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone"
                            pattern="^(^\+62|62|^08)(\d{3,4}-?){2}\d{3,4}$" placeholder="Phone Number" required>
                    </div>
                </section>

                <section class="input_Row_Section">
                    <div class="input_Column_Section">
                        <label for="pass">Password</label>
                        <input type="password" id="pass" placeholder="Password" name="password" minlength="8"
                            required>
                    </div>
                </section>

                <section class="input_Row_Section">
                    <div class="input_Column_Section">
                        <label for="pass">Confirm Password</label>
                        <input type="password" id="con_pass" name="password" placeholder="Confirm Password"
                            minlength="8" required>
                    </div>
                </section>

                <div class="input_Row_Section">
                    <div class="aggrement_Container">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
                            I agree to terms and conditions
                        </label>
                    </div>
                </div>

                <div class="Submit_BTN_Container">
                    <button class="btn btn-primary" type="submit">Create new Account</button>
                </div>

            </form>

            <section class="anchor_Section">
                <h4 class="Login_Anchor">Already have an account? <a href="">Click Here</a></h4>
            </section>

        </div>
        <div class="picture_container">
            <picture>
                <img src="image/bro.png">
            </picture>
        </div>
    </main>
</body>

</html>

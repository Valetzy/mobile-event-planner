<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* From Uiverse.io by Yaya12085 */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f0f2f5;
            gap: 30px;
            flex-wrap: wrap; /* Allow wrapping when needed */
            padding: 10px;
        }

        .plan {
            border-radius: 16px;
            box-shadow: 0 30px 30px -25px rgba(0, 38, 255, 0.205);
            padding: 10px;
            background-color: #fff;
            color: #697e91;
            max-width: 300px;
            width: 100%; /* Make sure the plan takes the full available width */
        }

        .plan strong {
            font-weight: 600;
            color: #425275;
        }

        .plan .inner {
            align-items: center;
            padding: 20px;
            padding-top: 40px;
            background-color: #ecf0ff;
            border-radius: 12px;
            position: relative;
        }

        .plan .pricing {
            position: absolute;
            top: 0;
            right: 0;
            background-color: #bed6fb;
            border-radius: 99em 0 0 99em;
            display: flex;
            align-items: center;
            padding: 0.625em 0.75em;
            font-size: 1.25rem;
            font-weight: 600;
            color: #425475;
        }

        .plan .pricing small {
            color: #707a91;
            font-size: 0.75em;
            margin-left: 0.25em;
        }

        .plan .title {
            font-weight: 600;
            font-size: 1.25rem;
            color: #425675;
        }

        .plan .title+* {
            margin-top: 0.75rem;
        }

        .plan .info+* {
            margin-top: 1rem;
        }

        .plan .features {
            display: flex;
            flex-direction: column;
        }

        .plan .features li {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .plan .features li+* {
            margin-top: 0.75rem;
        }

        .plan .features .icon {
            background-color: #1FCAC5;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            border-radius: 50%;
            width: 20px;
            height: 20px;
        }

        .plan .features .icon svg {
            width: 14px;
            height: 14px;
        }

        .plan .features+* {
            margin-top: 1.25rem;
        }

        .plan .action {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: end;
        }

        .plan .button {
            background-color: #6558d3;
            border-radius: 6px;
            color: #fff;
            font-weight: 500;
            font-size: 1.125rem;
            text-align: center;
            border: 0;
            outline: 0;
            width: 100%;
            padding: 0.625em 0.75em;
            text-decoration: none;
        }

        .plan .button:hover,
        .plan .button:focus {
            background-color: #4133B7;
        }

        /* Media Query for responsive design */
        @media (max-width: 768px) {
            body {
                flex-direction: column; /* Stack the plans vertically on small screens */
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>

    <div class="plan">
        <div class="inner">
            <span class="pricing">
                <span>
                    Free <small>/ m</small>
                </span>
            </span>
            <p class="title">Organizer Plan</p>
            <p class="info">This plan is for free for First User. Be an Organizer and achieve your dreams</p>
            <ul class="features">
                <li>
                    <span class="icon">
                        <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path fill="currentColor"
                                d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                        </svg>
                    </span>
                    <span><strong>Oragnize</strong> Events</span>
                </li>
                <li>
                    <span class="icon">
                        <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path fill="currentColor"
                                d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                        </svg>
                    </span>
                    <span>Plan <strong>Your Events</strong></span>
                </li>
                <li>
                    <span class="icon">
                        <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path fill="currentColor"
                                d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                        </svg>
                    </span>
                    <span>Manage Your Events</span>
                </li>
            </ul>
            <div class="action">
                <a class="button" href="free_plan.php">
                    Free plan - First User
                </a>
            </div>
        </div>
    </div>

    <div class="plan">
        <div class="inner">
            <span class="pricing">
                <span>
                ₱299 <small>/ m</small>
                </span>
            </span>
            <p class="title">Organizer Plan</p>
            <p class="info">This plan is for free for First User. Be an Organizer and achieve your dreams</p>
            <ul class="features">
                <li>
                    <span class="icon">
                        <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path fill="currentColor"
                                d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                        </svg>
                    </span>
                    <span><strong>Oragnize</strong> Events</span>
                </li>
                <li>
                    <span class="icon">
                        <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path fill="currentColor"
                                d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                        </svg>
                    </span>
                    <span>Plan <strong>Your Events</strong></span>
                </li>
                <li>
                    <span class="icon">
                        <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path fill="currentColor"
                                d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                        </svg>
                    </span>
                    <span>Manage Your Events</span>
                </li>
            </ul>
            <div class="action">
                <a class="button" href="monthly_plan.php">
                    Choose plan
                </a>
            </div>
        </div>
    </div>

    <div class="plan">
        <div class="inner">
            <span class="pricing">
                <span>
                ₱3,499 <small>/ yr</small>
                </span>
            </span>
            <p class="title">Organizer Plan</p>
            <p class="info">This plan is for free for First User. Be an Organizer and achieve your dreams</p>
            <ul class="features">
                <li>
                    <span class="icon">
                        <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path fill="currentColor"
                                d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                        </svg>
                    </span>
                    <span><strong>Oragnize</strong> Events</span>
                </li>
                <li>
                    <span class="icon">
                        <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path fill="currentColor"
                                d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                        </svg>
                    </span>
                    <span>Plan <strong>Your Events</strong></span>
                </li>
                <li>
                    <span class="icon">
                        <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path fill="currentColor"
                                d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                        </svg>
                    </span>
                    <span>Manage Your Events</span>
                </li>
            </ul>
            <div class="action">
                <a class="button" href="yearly_plan.php">
                    Choose plan
                </a>
            </div>
        </div>
    </div>

    <!-- Repeat .plan as needed -->

</body>

</html>

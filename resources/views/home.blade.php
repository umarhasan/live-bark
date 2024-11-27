<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css"
        integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css"
        integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet" />

    <title>Bark</title>
    <style>
        #service-suggestions {
    position: absolute;
    top: 38%; /* Directly below the input */
    left: 7%;
    right: 62%;
    border: 1px solid #ddd;
    border-radius: 21px 13px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    background: #fff;
    max-height: 200px; /* Optional: Limit height */
    overflow-y: auto; /* Scroll for long lists */
    z-index: 1050;
}

#service-suggestions .dropdown-item {
    padding: 10px 15px;
    cursor: pointer;
}

#service-suggestions .dropdown-item:hover {
    background-color: #f8f9fa;
}
    </style>
</head>

<body>
    <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0"
            aria-valuemax="100"></div>
    </div>

    <header data-aos="fade-down">
        <nav>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-4 col-4">
                        <div class="dropdown">
                            <button class="custom-button1 dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span>Explore</span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="./animation.html">Animation</a></li>
                                <li><a class="dropdown-item" href="./brand-design.html">Brand Design</a></li>
                                <li><a class="dropdown-item" href="./graphic-design.html">Graphic Design</a></li>
                                <li><a class="dropdown-item" href="./ux-and-ui-design.html">UX & UI Design</a></li>
                                <li><a class="dropdown-item" href="./web-development.html">Web Development</a></li>
                                <li><a class="dropdown-item" href="./all-services.html">See All</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4 col-4 text-center">
                        <a href="./index.html"><img src="./assets/images/logohere.png" class="logo" /></a>
                    </div>
                    <div class="col-sm-4 col-4 text-end">
                        <button class="custom-button1"><span>Login</span></button>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="overlay" id="overlay"></div>



    <div id="confirmation-popup" class="popup">
        <div class="popup-content">
            <p>Do you want to quit the form?</p>
            <button id="quit-button">Quit</button>
            <button id="continue-button">Continue</button>
        </div>
    </div>

    <section class="bg1">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="main-text">FIND THE PERFECT <br> PROFESSIONAL FOR YOU</h1>
                    <button class="custom-button"><span>Join As A Professional</span></button>
                </div>
            </div>
        </div>
    </section>

    <section class="bg2" data-aos="zoom-in">
        <div class="container-fluid">
            <form id="myForm-search">
                <div class="row">
                    <div class="col-sm-6">
                        <input class="input-form" id="lead_service_type" type="text"
                            placeholder="What Services are You Looking For?" required />
                            <div id="service-suggestions" class="dropdown-menu show" style="position: absolute; display: none; z-index: 1000;"></div>
                        </div>
                    <div class="col-sm-6">
                        <input class="input-form" id="postcode" type="text" placeholder="Postcode" required />
                    </div>
                    <div class="col-sm-12">
                        <button type="submit" class="search-btn">Search</button>
                    </div>
                    <div class="col-sm-12">
                        <p class="form-p">Popular: House Cleaning, Web Design, Personal Trainers</p>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <section class="step-up" id="myForm">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="text-center p-0 mb-2">
                    <div class="card px-0 pb-0 mb-3">
                        <button type="button" class="btn cancel" onclick="closeForm()"><i
                                class="fa-solid fa-x"></i></button>
                        <form id="msform">
                            @csrf
                            <fieldset>
                                <div class="form-card">
                                    <div class="field-main-div">
                                        <div id="dynamic-services" class="field-main-div">
                                            <!-- Dynamic services will be injected here -->
                                        </div>
                                    </div>
                                    <div class="error-message" id="age-error"></div>
                                </div>
                                <input type="button" name="next" class="next action-button" value="Next" />
                            </fieldset>
                            {{-- First other --}}
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="fs-title">What type of business is this for? </h2>
                                        </div>
                                    </div>
                                    <div class="field-main-div">
                                        <div class="field-div">
                                            <input type="radio" id="daily" name="business" value="Personal project">
                                            <label for="daily">Personal project</label>
                                        </div>
                                        <div class="field-div">
                                            <input type="radio" id="twice" name="business"
                                                value="Sole trader/self-employed">
                                            <label for="twice">Sole trader/self-employed</label>
                                        </div>
                                        <div class="field-div">
                                            <input type="radio" id="weekly" name="business"
                                                value="Small business (1 - 9 employees)">
                                            <label for="weekly"> Small business (1 - 9 employees)</label>
                                        </div>
                                        <div class="field-div">
                                            <input type="radio" id="every" name="business"
                                                value="Medium business (10 - 29 employees)">
                                            <label for="every">Medium business (10 - 29 employees)</label>
                                        </div>
                                        <div class="field-div">
                                            <input type="radio" id="once" name="business"
                                                value="Large business (30 - 99 employees)">
                                            <label for="once">Large business (30 - 99 employees)</label>
                                        </div>
                                        <div class="field-div">
                                            <input type="radio" id="one" name="business"
                                                value="Extra large business (100 or more employees)">
                                            <label for="one">Extra large business (100 or more employees)</label>
                                        </div>
                                        <div class="field-div">
                                            <input type="radio" id="charity" name="business" value="Charity/non-profit">
                                            <label for="charity">Charity/non-profit</label>
                                        </div>

                                        <!-- Other Option -->
                                        <div class="field-div">
                                            <input type="radio" id="other_business" name="business" value="Other" onclick="toggleOtherInput('business')">
                                            <label for="other_business">Other</label>
                                        </div>
                                        <div class="field-div" id="other_business_input" style="display: none;">
                                            <input type="text" id="other_business_value" name="other_business_value" placeholder="Please specify..." />
                                        </div>

                                    </div>
                                    <div class="error-message" id="daily-error"></div>
                                </div> <input type="button" name="next" class="next action-button" value="Next" />
                                <input type="button" name="previous" class="previous action-button-previous"
                                    value="Previous" />
                            </fieldset>

                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="fs-title">What industry do you operate in?</h2>
                                        </div>
                                    </div>
                                    <div class="field-main-div">
                                        <div class="field-div">
                                            <input type="radio" id="0bedroom" name="industry" value="Business services">
                                            <label for="0bedroom">Business services</label>
                                        </div>
                                        <div class="field-div">
                                            <input type="radio" id="1bedroom" name="industry"
                                                value="Creative industries">
                                            <label for="1bedroom">Creative industries</label>
                                        </div>
                                        <div class="field-div">
                                            <input type="radio" id="2bedroom" name="industry"
                                                value="Entertainment & events">
                                            <label for="2bedroom"> Entertainment & events</label>
                                        </div>
                                        <div class="field-div">
                                            <input type="radio" id="3bedroom" name="industry"
                                                value="Financial services">
                                            <label for="3bedroom">Financial services</label>
                                        </div>
                                        <div class="field-div">
                                            <input type="radio" id="4bedroom" name="industry" value="Health & fitness">
                                            <label for="4bedroom">Health & fitness</label>
                                        </div>
                                        <div class="field-div">
                                            <input type="radio" id="5bedroom" name="industry" value="Home services">
                                            <label for="5bedroom">Home services</label>
                                        </div>
                                        <div class="field-div">
                                            <input type="radio" id="studio" name="industry" value="Restaurant/food">
                                            <label for="studio">Restaurant/food</label>
                                        </div>
                                        <div class="field-div">
                                            <input type="radio" id="consumer" name="industry"
                                                value="Retail/consumer goods">
                                            <label for="consumer">Retail/consumer goods</label>
                                        </div>


                                        <!-- Other Option -->
                                        <div class="field-div">
                                            <input type="radio" id="other_industry" name="industry" value="Other" onclick="toggleOtherInput('industry')">
                                            <label for="other_industry">Other</label>
                                        </div>
                                        <div class="field-div" id="other_industry_input" style="display: none;">
                                            <input type="text" id="other_industry_value" name="other_industry_value" placeholder="Please specify..." />
                                        </div>
                                    </div>
                                    <div class="error-message" id="bed-error"></div>
                                </div> <input type="button" name="next" class="next action-button" value="Next" />
                                <input type="button" name="previous" class="previous action-button-previous"
                                    value="Previous" />
                            </fieldset>

                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="fs-title">When would you like the website to go live/be updated?
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="field-main-div">
                                        <div class="field-div">
                                            <input type="radio" id="1bathroom" name="live_website"
                                                value="As soon as possible">
                                            <label for="1bathroom">As soon as possible</label>
                                        </div>
                                        <div class="field-div">
                                            <input type="radio" id="1bathroom+1" name="live_website"
                                                value="Within a few weeks">
                                            <label for="1bathroom+1">Within a few weeks</label>
                                        </div>
                                        <div class="field-div">
                                            <input type="radio" id="2bathroom" name="live_website" value="Within a month">
                                            <label for="2bathroom"> Within a month</label>
                                        </div>
                                        <div class="field-div">
                                            <input type="radio" id="2bathroom+1" name="live_website"
                                                value="Within a few months">
                                            <label for="2bathroom+1">Within a few months</label>
                                        </div>
                                        <div class="field-div">
                                            <input type="radio" id="3bathroom" name="live_website"
                                                value="I would like to discuss this with the professional">
                                            <label for="3bathroom">I would like to discuss this with the
                                                professional</label>
                                        </div>
                                        <!-- Other Option -->
                                        <div class="field-div">
                                            <input type="radio" id="other_live_website" name="live_website" value="Other" onclick="toggleOtherInput('live_website')">
                                            <label for="other_live_website">Other</label>
                                        </div>
                                        <div class="field-div" id="other_live_website_input" style="display: none;">
                                            <input type="text" id="other_live_website_value" name="other_live_website_value" placeholder="Please specify..." />
                                        </div>
                                    </div>
                                    <div class="error-message" id="bath-error"></div>
                                </div> <input type="button" name="next" class="next action-button" value="Next" />
                                <input type="button" name="previous" class="previous action-button-previous"
                                    value="Previous" />
                            </fieldset>

                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="fs-title">What is your estimated budget for this project?</h2>
                                        </div>
                                    </div>
                                    <div class="field-main-div">
                                        <div class="field-div">
                                            <input type="radio" id="rec0" name="budget" value="Less than £250">
                                            <label for="rec0">Less than £250</label>
                                        </div>
                                        <div class="field-div">
                                            <input type="radio" id="rec1" name="budget" value="£250 - £999">
                                            <label for="rec1">£250 - £999</label>
                                        </div>
                                        <div class="field-div">
                                            <input type="radio" id="rec2" name="budget" value="£1,000 - £1,999">
                                            <label for="rec2">£1,000 - £1,999</label>
                                        </div>
                                        <div class="field-div">
                                            <input type="radio" id="rec3" name="budget" value="£2,000 - £2,999">
                                            <label for="rec3">£2,000 - £2,999</label>
                                        </div>
                                        <div class="field-div">
                                            <input type="radio" id="rec4" name="budget" value="£3,000 - £4,999">
                                            <label for="rec4">£3,000 - £4,999</label>
                                        </div>
                                        <div class="field-div">
                                            <input type="radio" id="rec5" name="budget" value="£5,000 or more">
                                            <label for="rec5">£5,000 or more</label>
                                        </div>

                                        <!-- Other Option -->
                                        <div class="field-div">
                                            <input type="radio" id="other_budget" name="budget" value="Other" onclick="toggleOtherInput('budget')">
                                            <label for="other_budget">Other</label>
                                        </div>
                                        <div class="field-div" id="other_budget_input" style="display: none;">
                                            <input type="text" id="other_budget_value" name="other_budget_value" placeholder="Please specify..." />
                                        </div>
                                    </div>
                                    <div class="error-message" id="rec-error"></div>
                                </div> <input type="button" name="next" class="next action-button" value="Next" />
                                <input type="button" name="previous" class="previous action-button-previous"
                                    value="Previous" />
                            </fieldset>

                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="fs-title">How likely are you to make a hiring decision?</h2>
                                        </div>
                                    </div>
                                    <div class="field-main-div">
                                        <div class="field-div">
                                            <input type="radio" id="hire1" name="hire" value="Im ready to hire now">
                                            <label for="hire1">I'm ready to hire now</label>
                                        </div>
                                        <div class="field-div">
                                            <input type="radio" id="hire2" name="hire"
                                                value="Im definitely going to hire someone">
                                            <label for="hire2">I'm definitely going to hire someone</label>
                                        </div>
                                        <div class="field-div">
                                            <input type="radio" id="hire3" name="hire"
                                                value="Im likely to hire someone">
                                            <label for="hire3">I'm likely to hire someone</label>
                                        </div>
                                        <div class="field-div">
                                            <input type="radio" id="hire4" name="hire"
                                                value="I will possibly hire someone">
                                            <label for="hire4">I will possibly hire someone</label>
                                        </div>
                                        <div class="field-div">
                                            <input type="radio" id="hire5" name="hire"
                                                value="Im planning and researching">
                                            <label for="hire5">I'm planning and researching</label>
                                        </div>

                                        <!-- Other Option -->
                                        <div class="field-div">
                                            <input type="radio" id="hire4" name="hire" value="Other" onclick="toggleOtherInput('hire4')">
                                            <label for="hire5">Other</label>
                                        </div>
                                        <div class="field-div" id="other_hire4_input" style="display: none;">
                                            <input type="text" id="other_hire4_value" name="hire" placeholder="Please specify..." />
                                        </div>
                                    </div>
                                    <div class="error-message" id="hire-error"></div>
                                </div> <input type="button" name="next" class="next action-button" value="Next" />
                                <input type="button" name="previous" class="previous action-button-previous"
                                    value="Previous" />
                            </fieldset>

                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="fs-title">Provide Your Project Details</h2>
                                        </div>
                                    </div>
                                    <div class="field-main-div">
                                        <div class="field-div">
                                            <input name="contact" rows="5" placeholder="Enter your Project details" class="input-text"></input>
                                        </div>
                                    </div>
                                    <div class="error-message" id="name-error"></div>
                                </div>
                                <input type="button" name="next" class="next action-button" value="Next" />
                                <input type="button" name="previous" class="previous action-button-previous"
                                    value="Previous" />
                            </fieldset>

                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="fs-title">Provide Your Personal Information</h2>
                                        </div>
                                    </div>
                                    <div class="field-main-div">
                                        <div class="field-div">
                                            <input type="text" class="input-text" name="name"
                                                placeholder="Enter Your Full Name" />
                                        </div>

                                        <div class="field-div">
                                            <input type="text" class="input-text" name="phone"
                                                placeholder="Enter Your Phone Number" />
                                        </div>

                                        <div class="field-div">
                                            <input type="email" class="input-text" name="email"
                                                placeholder="Enter Your Email" />
                                        </div>

                                        <div class="field-div">
                                            <input type="text" class="input-text" name="zip"
                                                placeholder="Enter Your Zip Code" />
                                        </div>

                                        <div class="field-div">
                                            <input name="address" rows="3" placeholder="Enter Your Address" class="input-textarea"></input>
                                        </div>
                                        <div class="field-div">
                                            <input type="text" class="input-text" name="city" placeholder="Enter Your City" />
                                        </div>

                                        <div class="field-div">
                                            <input type="text" class="input-text" name="state" placeholder="Enter Your State" />
                                        </div>

                                        <div class="field-div">
                                            <input type="text" class="input-text" name="country" placeholder="Enter Your Country" />
                                        </div>
                                    </div>
                                    <div class="error-message" id="name-error"></div>
                                </div>
                                    <button type="submit"  class="next action-button" id="submit-button">Submit</button>
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="purple-text text-center"><strong>Great!</strong></h2> <br>
                                    <div class="row justify-content-center">
                                        <div class="col-3"> <img src="{{ asset('assets/images/success.gif') }}" class="fit-image">
                                        </div>
                                    </div> <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-7 text-center">
                                            <h5 class="purple-text text-center">We've Recieved Your Details.</h5>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg3">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-12" data-aos="zoom-in-right">
                    <img src="./assets/images/about-1.gif" class="about-img" />
                    <div class="two-img">
                        <img src="./assets/images/about-2.gif" class="about-img" />
                        <img src="./assets/images/about-3.gif" class="about-img" />
                    </div>
                </div>
                <div class="col-sm-6 col-12" data-aos="zoom-in-left">
                    <h2 class="about-text">ABOUT</h2>
                    <p class="about-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sed pulvinar
                        nibh. Vivamus tempor tortor mi, vel hendrerit ex vestibulum in. Morbi mattis ligula leo, ac
                        <br><br>
                        consequat urna molestie ac. Etiam pretium tellus sit amet justo aliquet venenatis. Quisque ex
                        turpis, laoreet quis neque ut, semper tempus massa. Quisque tincidunt augue sed nibh viverra, et
                        tempus risus pulvinar. In magna turpis, condimentum quis semper a, ornare ultricies turpis.
                        <br><br>
                        Praesent laoreet nec velit et gravida. Pellentesque commodo nisi sit amet libero laoreet mattis.
                        Vestibulum dui massa, pretium ac lorem eget, commodo auctor purus. Sed egestas arcu et vulputate
                        dignissim. Sed ornare risus ex, at scelerisque orci ornare vehicula. Integer blandit purus quis
                        turpis fermentum tempus. Aliquam porttitor magna eget tortor blandit, eget convallis nunc
                        vulputate. Proin vitae varius est, vel malesuada urna. Duis maximus ex quis risus elementum, vel
                        fermentum nulla ultrices. Sed ut egestas dui. Aliquam laoreet justo quis massa pulvinar iaculis.
                        Donec porttitor mollis mi, eu imperdiet lorem molestie eget.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg4">
        <div class="container">
            <div class="row">
                <div class="col-sm-6" data-aos="zoom-in-right">
                    <h3 class="service-h3 mb-4">WHAT SERVICES WE OFFER</h3>
                    <!-- Tab content -->
                    <div id="London" class="tabcontent" style="display: block;">
                        <p class="service-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sed
                            pulvinar nibh. Vivamus
                            tempor tortor mi, vel hendrerit ex vestibulum in. Morbi mattis ligula leo, ac consequat urna
                            molestie ac. Etiam pretium tellus sit amet justo aliquet venenatis. Quisque ex turpis,
                            laoreet
                            <br><br>
                            quis neque ut, semper tempus massa. Quisque tincidunt augue sed nibh viverra, et tempus
                            risus
                            pulvinar. In magna turpis, condimentum quis semper a, ornare ultricies turpis. Praesent
                            laoreet
                            nec velit et gravida. Pellentesque commodo nisi sit amet libero laoreet mattis.
                        </p>
                        <img src="./assets/images/service-img.png" class="service-img" />
                    </div>

                    <div id="Paris" class="tabcontent">
                        <p class="service-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sed
                            pulvinar nibh. Vivamus
                            tempor tortor mi, vel hendrerit ex vestibulum in. Morbi mattis ligula leo, ac consequat urna
                            molestie ac. Etiam pretium tellus sit amet justo aliquet venenatis. Quisque ex turpis,
                            laoreet
                            <br><br>
                            quis neque ut, semper tempus massa. Quisque tincidunt augue sed nibh viverra, et tempus
                            risus
                            pulvinar. In magna turpis, condimentum quis semper a, ornare ultricies turpis. Praesent
                            laoreet
                            nec velit et gravida. Pellentesque commodo nisi sit amet libero laoreet mattis.
                        </p>
                        <img src="./assets/images/service-img.png" class="service-img" />
                    </div>

                    <div id="Tokyo" class="tabcontent">
                        <p class="service-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sed
                            pulvinar nibh. Vivamus
                            tempor tortor mi, vel hendrerit ex vestibulum in. Morbi mattis ligula leo, ac consequat urna
                            molestie ac. Etiam pretium tellus sit amet justo aliquet venenatis. Quisque ex turpis,
                            laoreet
                            <br><br>
                            quis neque ut, semper tempus massa. Quisque tincidunt augue sed nibh viverra, et tempus
                            risus
                            pulvinar. In magna turpis, condimentum quis semper a, ornare ultricies turpis. Praesent
                            laoreet
                            nec velit et gravida. Pellentesque commodo nisi sit amet libero laoreet mattis.
                        </p>
                        <img src="./assets/images/service-img.png" class="service-img" />
                    </div>
                </div>
                <div class="col-sm-6" data-aos="zoom-in-left">
                    <div class="tab">
                        <button class="tablinks active" onclick="openCity(event, 'London')">Personal Trainers</button>
                        <button class="tablinks" onclick="openCity(event, 'Paris')">Personal Trainers</button>
                        <button class="tablinks" onclick="openCity(event, 'Tokyo')">Personal Trainers</button>
                        <button class="tablinks" onclick="openCity(event, 'Tokyo')">Personal Trainers</button>
                        <button class="tablinks" onclick="openCity(event, 'Tokyo')">Personal Trainers</button>
                        <button class="tablinks" onclick="openCity(event, 'Tokyo')">Personal Trainers</button>
                        <button class="tablinks" onclick="openCity(event, 'Tokyo')">Personal Trainers</button>
                        <button class="tablinks" onclick="openCity(event, 'Tokyo')">Personal Trainers</button>
                        <button class="tablinks" onclick="openCity(event, 'Tokyo')">Personal Trainers</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 mb-4" data-aos="fade-down">
                    <h4 class="discover-h4 mb-4">DISCOVER</h4>
                    <p class="discover-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sed pulvinar
                        nibh. Vivamus tempor tortor mi, vel hendrerit ex vestibulum in. Morbi mattis ligula leo, ac
                        consequat urna molestie ac. Etia</p>
                </div>
                <div class="col-sm-12 extra" data-aos="zoom-in">
                    <div class="your-class">
                        <div>
                            <img src="./assets/images/dis-1.png" alt="Image 1">
                            <p>Lorem Ipsum</p>
                        </div>
                        <div>
                            <img src="./assets/images/dis-2.png" alt="Image 1">
                            <p>Health & Wellbeing</p>
                        </div>
                        <div>
                            <img src="./assets/images/dis-3.png" alt="Image 1">
                            <p>Weddings & Events</p>
                        </div>
                        <div>
                            <img src="./assets/images/dis-4.png" alt="Image 1">
                            <p>Business Services</p>
                        </div>
                        <div>
                            <img src="./assets/images/dis-5.png" alt="Image 1">
                            <p>Lorem Ipsum</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg6" data-aos="zoom-out-down">
        <div class="container">
            <div class="owl-carousel testimonial owl-theme">
                <div class="item">
                    <div class="row align-items-center">
                        <div class="col-sm-5">
                            <img src="./assets/images/test-1.png" class="test-img" />
                        </div>
                        <div class="col-sm-7 text-back">
                            <h4 class="test-h4">KATHY J. TURNER</h4>
                            <p class="test-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sed
                                pulvinar nibh. Vivamus tempor tortor mi, vel hendrerit ex vesti bulum in. Morbi mattis
                                ligula leo, ac consequat urna molest ie ac. Etiam pretium tellus sit amet justo aliquet
                                venenatis. Quisque ex turpis, laoreet quis neque ut, semper tempus massa. Quisque
                                tincidunt augue sed nibh viverra, et tempus risus pulvinar. In magna turpis, condimentum
                                quis semper a, ornare ultricies turpis. Praesent laoreet nec velit et gravida</p>
                            <div class="left-div">
                                <p class="left-p">Personal Trainers</p>
                                <div class="test-star">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="row align-items-center">
                        <div class="col-sm-5">
                            <img src="./assets/images/test-1.png" class="test-img" />
                        </div>
                        <div class="col-sm-7 text-back">
                            <h4 class="test-h4">KATHY J. TURNER</h4>
                            <p class="test-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sed
                                pulvinar nibh. Vivamus tempor tortor mi, vel hendrerit ex vesti bulum in. Morbi mattis
                                ligula leo, ac consequat urna molest ie ac. Etiam pretium tellus sit amet justo aliquet
                                venenatis. Quisque ex turpis, laoreet quis neque ut, semper tempus massa. Quisque
                                tincidunt augue sed nibh viverra, et tempus risus pulvinar. In magna turpis, condimentum
                                quis semper a, ornare ultricies turpis. Praesent laoreet nec velit et gravida</p>
                            <div class="left-div">
                                <p class="left-p">Personal Trainers</p>
                                <div class="test-star">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="row align-items-center">
                        <div class="col-sm-5">
                            <img src="./assets/images/test-1.png" class="test-img" />
                        </div>
                        <div class="col-sm-7 text-back">
                            <h4 class="test-h4">KATHY J. TURNER</h4>
                            <p class="test-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sed
                                pulvinar nibh. Vivamus tempor tortor mi, vel hendrerit ex vesti bulum in. Morbi mattis
                                ligula leo, ac consequat urna molest ie ac. Etiam pretium tellus sit amet justo aliquet
                                venenatis. Quisque ex turpis, laoreet quis neque ut, semper tempus massa. Quisque
                                tincidunt augue sed nibh viverra, et tempus risus pulvinar. In magna turpis, condimentum
                                quis semper a, ornare ultricies turpis. Praesent laoreet nec velit et gravida</p>
                            <div class="left-div">
                                <p class="left-p">Personal Trainers</p>
                                <div class="test-star">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer data-aos="zoom-in-up">
        <div class="upper-foot">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <img src="./assets/images/logohere-white.png" class="logo-white" />
                        <p class="foot-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed dolor smod tempor
                            incididunt ut labore consectetur adipiscing elit, sed dolor smod tempo adipiscing elit</p>
                    </div>
                    <div class="col-sm-2">
                        <h4 class="foot-head">Helpfull Link</h4>
                        <ul class="foot-ul">
                            <li><a href="#">Resource</a></li>
                            <li><a href="#">Company Profile</a></li>
                            <li><a href="#">Our Signature</a></li>
                            <li><a href="#">Linked partner</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-3">
                        <h4 class="foot-head">Company Address</h4>
                        <ul class="foot-ul">
                            <li>806 Main Ave, St Maries, ID 83861, Amerika Serikat</li>
                        </ul>
                    </div>
                    <div class="col-sm-3">
                        <h4 class="foot-head">Follow Us</h4>
                        <div class="social-links">
                            <a href="#"><i class="fa-brands fa-google-plus-g"></i></a>
                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lower-foot">
            <div class="container p-0">
                <div class="row">
                    <div class="col-sm-6">
                        <p class="copy">© 2023 X-y-z. All Rights Reserved</p>
                    </div>
                    <div class="col-sm-6 text-end">
                        <p class="copy"><a href="#">Cookie policy – Privacy policy</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js"
        integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="assets/js/script.js"></script>
    <script>
        $(document).ready(function () {
            // Fetch suggestions as the user types
            $('#lead_service_type').on('input', function () {
                let query = $(this).val();

                if (query.length > 1) {
                    $.ajax({
                        url: "{{ route('search.service') }}",
                        method: 'GET',
                        data: { service: query },
                        success: function (data) {
                            let suggestions = '';
                            if (data.length > 0) {
                                data.forEach(function (item) {
                                    suggestions += `<a href="#" class="dropdown-item service-item" data-id="${item.id}">${item.name}</a>`;
                                });
                            } else {
                                suggestions = '<a href="#" class="dropdown-item disabled">No services found</a>';
                            }
                            $('#service-suggestions').html(suggestions).show();
                        },
                        error: function () {
                            $('#service-suggestions').html('<a href="#" class="dropdown-item disabled">Error fetching data</a>').show();
                        }
                    });
                } else {
                    $('#service-suggestions').hide();
                }
            });

            // Handle suggestion click
            $(document).on('click', '.service-item', function (e) {
                e.preventDefault();
                let serviceName = $(this).text();
                $('#lead_service_type').val(serviceName);
                $('#service-suggestions').hide();
            });

            // Fetch services on search form submission
            $('#myForm-search').on('submit', function (e) {
                e.preventDefault();
                let serviceType = $('#lead_service_type').val();

                if (serviceType.trim() !== '') {
                    $.ajax({
                        url: "{{ route('search.service') }}",
                        method: 'GET',
                        data: { service: serviceType },
                        success: function (data) {
                            let serviceTypeName = data[0].name;

                            let dynamicContent = '';
                            if (data.length > 0) {
                                dynamicContent +=`<div class="row">
                                                    <div class="col-12">
                                                        <h2 class="fs-title">What are your ${serviceTypeName} needs??</h2>
                                                    </div>
                                                </div>`;
                                data.forEach(function (item) {
                                    if (item.services && item.services.length > 0) {
                                        item.services.forEach(function (service) {
                                            dynamicContent += `
                                                <div class="field-div">
                                                    <input type="radio" id="service-${service.id}" name="need" value="${service.name}" required>
                                                    <label for="service-${service.id}">${service.name}</label>
                                                    <input type="hidden" name="service_id" value="${service.id}">
                                                </div>
                                            `;
                                        });
                                    }
                                });
                            } else {
                                dynamicContent = `
                                    <div class="field-div">
                                        <p>No services found for "${serviceType}".</p>
                                    </div>
                                `;
                            }
                            $('#dynamic-services').html(dynamicContent);
                        },
                        error: function () {
                            $('#dynamic-services').html(`
                                <div class="field-div">
                                    <p>Something went wrong. Please try again later.</p>
                                </div>
                            `);
                        }
                    });
                } else {
                    alert('Please enter a service to search for.');
                }
            });

            // Hide suggestions on outside click
            $(document).click(function (e) {
                if (!$(e.target).closest('#service-suggestions, #lead_service_type').length) {
                    $('#service-suggestions').hide();
                }
            });

            $('#msform').on('submit', function (e) {
                e.preventDefault(); // Prevent the default form submission

                // Serialize form data
                let formData = $(this).serialize();

                // AJAX Request
                $.ajax({
                    url: "{{ route('lead_genrate') }}",
                    method: "POST",
                    data: formData,
                    beforeSend: function () {
                        // Optionally, show a loading indicator here
                        $('#submit-button').text('Submitting...').prop('disabled', true);
                    },
                    success: function (response) {
                        // On success, move to step 8 and display success message
                        const fieldsets = $('fieldset');
                        const currentFieldset = fieldsets.last(); // Assuming step 8 is the last fieldset
                        fieldsets.hide(); // Hide all fieldsets
                        currentFieldset.show(); // Show the success fieldset

                        // Reset the form or perform any additional success handling
                        $('#msform')[0].reset();
                        $('#submit-button').text('Submit').prop('disabled', false);
                    },
                    error: function (xhr) {
                        // Handle errors (e.g., validation, server issues)
                        alert("An error occurred: " + xhr.responseJSON.message || "Unknown error");
                        $('#submit-button').text('Submit').prop('disabled', false);
                    }
                });
            });
        });
    </script>

</body>

</html>

@extends('layout')
@section('title', 'About')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection
@section('content')
    <section>
        <div class="container col-md-8 mt-5 mb-5">
            @if (Session::has('msg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('msg') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="m-3" id="about_section">
                <h1 class="text-center">About Us</h1>
                <p>Welcome to our <b>Bite Burst</b>, where the rich and diverse flavor comes alive. Here food is not just
                    only to fulfill your stomach; it is a tradition that showcases our hospitality and the way we welcome
                    guests. As in our language we say <b>“Dawat ho ya na ho, Dil se milna Chahiye”</b> <i>(Which basically
                        means being Pakistani it is in our blood that we treat our guests with Food which includes love ,
                        emotions and happiness towards people)</i>. Our blog is promoting enthusiasm, love, spirituality,
                    and bringing closer friends and family. In Our blog you’ll be providing yummy and easy recipes which
                    will light up your taste birds and soul. Join us in our journey and remember as they say in Pakistan,
                    <b>"Khushi ka rasta pait is hokar guzarta hai."</b> <i>(The path to happiness goes through the
                        stomach)</i>. Enjoy every bite and stay connected with us till the end.
                </p>
                <h3>"No Matter where you go on God's Earth, never forget the scent of your own soil."
                </h3>
                <img src="{{ asset('images/food_1.jpg') }}" alt="food 1">
                <div class="para">
                    <h2>What is Bite Burst?</h2>
                    <p>Bite Burst is a platform we have chosen to promote our Pakistani cuisine, highlighting its tradition
                        and its impotence. Every culture is famous for something and for us, it is our traditional flavors.
                        We will share an easy to make recipe and the story associated with it.
                    </p>
                </div>
                <div class="para">
                    <h2>Why Bite Burst?</h2>
                    <p>Starting of with this Quote for our loved ones leaving overseas and missing their family so this for
                        you all that being living overseas you are still going to be connected with our yummy and super
                        duper recipe which will help everyone to make your tummy and soul happy.
                    </p>
                </div>
                <img src="{{ asset('images/food_2.jpg') }}" alt="food 2">
                <div class="para">
                    <h2>What will we Provide?</h2>
                    <p>We are covering the famous and easy to make recipe which is mostly followed in every household. We
                        are sharing yummy desi Chatkara Dishes, spicy, and filled with love and passion.
                        The Dishes are Chicken Bihari boti, Chicken Daal and many more and some famous drinks mostly we use
                        in our houses to serve guests as well.
                    </p>
                </div>
                <div class="para">
                    <h2>What Inspired us?</h2>
                    <p>Our culinary inspiration comes from our beloved grandparents, whom we call Dadi, Nani in our
                        Language. We have found memories of watching them in the kitchen, tirelessly working for hours to
                        create delicious dishes. Their love for cooking is a huge inspiration for us. We all can relate that
                        more then us our grandparents seem to be excited for summer vacation, when the time will come and we
                        all cousins would gather to go to our favorite place. Although they are no longer with us, ww have
                        kept their memories alive through the recipes they pass down to us.</p>
                    <p>Now, as adult, we recreate the dishes they once made, preserving their legacy and the joy their
                        cooking brough to our life.
                    </p>
                </div>
                <form action="{{ route('comment') }}" method="POST">
                    @method('Post')
                    @csrf
                    <div class="input-group">
                        <input type="text" name="name" placeholder="Name">
                        <input type="email" name="email" placeholder="Email">
                    </div>
                    <div class="textarea-group">
                        <textarea name="comment" id="comment" cols="30" rows="5" placeholder="Comment"></textarea>
                    </div>
                    <input type="submit" value="Send" id="submit">
                </form>
            </div>
        </div>
    </section>
@endsection
